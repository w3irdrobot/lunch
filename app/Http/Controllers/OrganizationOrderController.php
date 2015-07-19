<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OrganizationOrder;
use App\Organization;

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
        $lineItems = LineItem::where('organization_order_id', $id)->get();
        return view('organization_orders.show', ['lineItems' => $lineItems]);
    }
    
    public function index(Request $request,$orgId)
    {
        $organization = Organization::findOrFail($orgId);
        
        return view('organizationOrders.list', [
            'organization' => $organization,
        ]);
    }
    
    public function create()
    {
        
    }
    
    public function store(Request $request) {
        
    }
    
}
