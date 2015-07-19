<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OrganizationOrder;
use App\Organization;
use App\Restaurant;

class OrganizationOrderController extends Controller
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
    public function show(Request $request, $orgId, $id)
    {
        $orgOrder = OrganizationOrder::findOrFail($id);
        return view('organization_orders.show', [
            'orgOrder' => $orgOrder,
            'orgId' => $orgId,
        ]);
    }
    
    public function index(Request $request,$orgId)
    {
        $organization = Organization::findOrFail($orgId);
        
        return view('organization_orders.list', [
            'organization' => $organization,
        ]);
    }
    
    public function create(Request $request,$orgId)
    {
        return view('organization_orders.form', [
            'organization' => Organization::findOrFail($orgId),
            'organizationOrder' => new OrganizationOrder(),
        ]);
    }
    
    public function store(Request $request,$orgId) {
        $orgOrder = new OrganizationOrder();
        $orgOrder->fill($request->input('OrganizationOrder',[]));

        $orgRestaurant = DB::select('select id from organizations_restaurants where organization_id=? and restaurant_id=? limit 1',
            [$orgId,$request->input('restaurant_id')]);
        
        $orgOrder->organization_restaurant_id = $orgRestaurant[0]->id;
        
        if($orgOrder->isValid()) {
            $orgOrder->save();
            return redirect()->route('orgorder.index',['orgId'=>$orgId]);
        } else {
            return redirect()->route('orgorder.create',['orgId'=>$orgId])
                ->withErrors($orgOrder->getErrors())
                ->withInput();
        }
    }
    
    public function view($orgId, $id) {
        $orgOrder = OrganizationOrder::findOrFail($id);
        
        return view('organization_orders.view', [
            'organization' => $organization,
            'orgId' => $orgId,
        ]);
    }
    
    public function close($orgId, $id) {
        $orgOrder = OrganizationOrder::findOrFail($id);
        $orgOrder->closed_at = date('Y-m-d H:i:s');
        $orgOrder->save();
        
        return redirect()->route('orgorder.index',['orgId'=>$orgId]);
    }
}
