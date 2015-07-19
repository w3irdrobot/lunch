<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\UserOrders;

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
        $user_orders = $request->user()->userOrders;
        return view('userOrders.list', [
            'user_orders' => $user_orders,
        ]);        
    }  
    
    public function create(Request $request, $ordOrgId)
    {
        return view('userOrders.list', [
            'restaurant' => new \App\Restaurant(),
            'organization_id' => $orgId
        ]);
    }
}
