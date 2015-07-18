<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;

class PollsController extends Controller
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
        $organization = \App\Organization::findOrFail($request->input('organization', 2));
        return view('polls.list', [
            'organization' => $organization,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
    
    public function addRestaurant($id) {
        $poll = \App\Poll::findOrFail($id);
        
        return view('polls.restaurant', [
            'poll' => $poll,
            'restaurants' => Restaurant::orderBy('name')->get(),
        ]);
    }
    
    public function storeRestaurant(Request $request, $id) {
        $poll = \App\Poll::findOrFail($id);
        $restaurant = Restaurant::findOrFail($request->input('restaurant_id'));
        $poll->restaurants()->save($restaurant);
        
        return redirect()->route('poll.index');
    }
}
