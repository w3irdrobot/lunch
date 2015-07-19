<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\LineItem;
use App\OrganizationOrder;
use Session;
use App\UserOrder;

class LineItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create(Request $request, $id)
    {
        $orgOrder = OrganizationOrder::findOrFail($id);
        $user = $request->user();
        
        $lineItem = LineItem::join('user_orders','user_orders.id','=','line_items.user_order')
                        ->where('user_orders.user_id','=',$user->id)
                        ->where('line_items.organization_order_id','=',$orgOrder->id)
                        ->select('line_items.*')
                        ->first();
        
        if($lineItem) {
            Session::flash('status', 'You have already placed an order.');
            return redirect()->route('orgorder.show',[
                'orgId'=>$orgOrder->organization()->id,
                'id'=>$lineItem->organization_order_id
            ]);
        }
        
        $oldOrders = $user->userOrders()->where('restaurant_id','=',$orgOrder->restaurant()->id)->get();
            
        return view('line_items.form', [
            'orgOrder' => $orgOrder,
            'LineItem' => new LineItem(),
            'user' => $user,
            'oldOrders' => $oldOrders,
        ]);
    }
    
    public function store(Request $request, $id) {
        $orgOrder = OrganizationOrder::findOrFail($id);
        
        $lineItem = new LineItem();
        $lineItem->organization_order_id = $id;
        if($request->input('UserOrder') && strlen($request->input('UserOrder')['order']) > 0) {
            
            if($request->input('UserOrder')['default'] == 1) {
                UserOrder::where('user_id','=',$request->user()->id)
                    ->where('restaurant_id','=',$orgOrder->restaurant()->id)
                    ->where('default','=','1')
                    ->update(['default'=>0]);
            }
            
            $userOrder = new UserOrder();
            $userOrder->fill($request->input('UserOrder'));
            $userOrder->user_id = $request->user()->id;
            $userOrder->restaurant_id = $orgOrder->restaurant()->id;
            $userOrder->save();
            
            $lineItem->user_order = $userOrder->id;
        } else {
            $lineItem->user_order = $request->input('LineItem')['user_order'];
        }
        
        if($lineItem->isValid()) {
            $lineItem->save();
            return redirect()->route('orgorder.show',[
                'orgId'=>$orgOrder->organization()->id,
                'id'=>$lineItem->organization_order_id
            ]);
        } else {
            return redirect()->route('lineitem.create',['id'=>$id])
                ->withErrors($lineItem->getErrors())
                ->withInput();
        }
    }
    
    public function update(Request $request, $id) {
        $lineItem = LineItem::findOrFail($id);
        
        return view('line_items.update', [
            'lineItem' => $lineItem,
        ]);
    }
    
    public function save(Request $request, $id) {
        $lineItem = LineItem::findOrFail($id);
        $lineItem->fill($request->input('LineItem'));
        
        if($lineItem->isValid()) {
            $lineItem->save();
            $orgOrder = $lineItem->organizationOrder;
            return redirect()->route('orgorder.show',['orgId'=>$orgOrder->organization()->id,'id'=>$orgOrder->id]);
        } else {
            return redirect()->route('lineitem.update',['id'=>$id])
                ->withErrors($lineItem->getErrors())
                ->withInput();
        }
    }
    
}