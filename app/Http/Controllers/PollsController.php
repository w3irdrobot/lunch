<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\Poll;
use App\PollRestaurant;

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
    public function index(Request $request, $orgId)
    {
        $organization = \App\Organization::findOrFail($orgId);
        return view('polls.list', [
            'organization' => $organization,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($orgId)
    {
        $poll = new \App\Poll();
        $poll->organization_id = $orgId;
        return view('polls.form', [
            'poll' => $poll,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request,$orgId)
    {
        $poll = new \App\Poll();
        $poll->organization_id = $orgId;
        $poll->fill($request->input('Poll',[]));
        $poll->closed_by = date("Y-m-d H:i:s", strtotime($poll->closed_by));
        if($poll->isValid()) {
            $poll->save();
            return redirect()->route('poll.index',['orgId'=>$poll->organization_id]);
        } else {
            return redirect()->route('poll.create')
                ->withErrors($poll->getErrors())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        $pollResponse = $request->user()->pollResponses()->where('polls_restaurants.poll_id','=',$id)->first();
        $poll = \App\Poll::findOrFail($id);
        $pollRestaurants = PollRestaurant::where('poll_id','=',$id)->get();

        return view('polls.view', [
            'poll' => $poll,
            'response' => $pollResponse,
            'pollRestaurants' => $pollRestaurants,
        ]);
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
        
        return redirect()->route('poll.index',['orgId'=>$poll->organization_id]);
    }
    
    public function vote(Request $request, $id) {
        $pollRestaurant = PollRestaurant::findOrFail($id);
        $pollRestaurant->users()->save($request->user());
        
        return redirect()->route('poll.view',['id'=>$pollRestaurant->poll_id]);
    }
    
    public function close($id) {
        $poll = \App\Poll::findOrFail($id);
        $poll->closed_at = date('Y-m-d H:i:s');
        $poll->save();
        
        return redirect()->route('poll.index',['orgId'=>$poll->organization_id]);
    }
}
