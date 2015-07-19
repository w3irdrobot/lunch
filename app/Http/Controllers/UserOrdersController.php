<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\UserOrder;

class UserOrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if($request->input('restaurant')) {
            $user_orders = $request->user()->userOrders()
                    ->where('restaurant_id', '=', $request->input('restaurant'))
                    ->get();
        } else {
            $user_orders = $request->user()->userOrders;
        }
        
        $restaurants = Restaurant::orderBy('name')->get();
        
        return view('userOrders.list', [
            'restaurants' => $restaurants,
            'selected_restaurant' => $request->input('restaurant'),
            'user_orders' => $user_orders,
        ]);        
    }  
    
    public function create(Request $request)
    {
        $restaurants = Restaurant::orderBy('name')->get();
        
        return view('userOrders.form', [
            'restaurants' => $restaurants,
            'user_order' => new \App\UserOrder()
        ]);
    }
    
    public function store(Request $request)
    {
        $user_order = new \App\UserOrder();
        $user_order->fill($request->input('UserOrder',[]));
        $user_order->user_id = $request->user()->id;
        if(!isset($user_order->default)) {
            $user_order->default = 0;
        }
        else {
            $user_orders = UserOrder::orderBy('id')->get();
            foreach($user_orders as $this_order) {
                if($this_order->restaurant_id == $user_order->restaurant_id) {
                    $this_order->default = 0;
                    $this_order->save();
                }
            }
        }
        if($user_order->isValid()) {
            $user_order->save();
            return redirect()->route('user_orders.index');
        } else {
            return redirect()->route('user_orders.create')
                ->withErrors($user_order->getErrors())
                ->withInput();
        }
    }
    
    public function makeDefault(Request $request)
    {
        $this_order = UserOrder::find($request->id);
        $restaurant_id = $this_order->restaurant_id;
        $user_orders = UserOrder::orderBy('id')->get();
        foreach($user_orders as $user_order) {
            if($user_order->restaurant_id == $restaurant_id) {
                $user_order->default = ($user_order->id == $request->id) ? 1 : 0;
                $user_order->save();
            }
        }        
        
        return redirect()->route('user_orders.index', array('restaurant' => $restaurant_id));
    }
}
