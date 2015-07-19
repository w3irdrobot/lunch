<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;
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
        if($user_order->isValid()) {
            $user_order->save();
            return redirect()->route('user_order.index');
        } else {
            return redirect()->route('user_order.create')
                ->withErrors($user_order->getErrors())
                ->withInput();
        }
    }
}
