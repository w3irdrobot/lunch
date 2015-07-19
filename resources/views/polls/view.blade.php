@extends('layouts.master')

@section('content')


<div class='row'>
    <div class='col-sm-2'></div>
    <div class='col-sm-8'>
        <a href='/organizations/{{ $poll->organizations->id }}/poll' class='btn btn-success btn-outline'>Back to Poll List</a>
        <br><br>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Current Poll
            </div>
            <div class='panel-body'>
                <h1>{{$poll->organizations->name}} poll for {{ date('F j Y',strtotime($poll->closed_by)) }}</h1>
                <h3>Due By: {{ date('g:ia',strtotime($poll->closed_by)) }}</h3>

                @if ($poll->closed_at)
                <h3 style='color: red;'>VOTE CLOSED</h3>
                @endif

                Restaurant Options:<br>
                @foreach ($pollRestaurants as $pollRestaurant)
                    @if ($response || $poll->closed_at)
                        {{ $pollRestaurant->restaurants->name }}: Vote Count {{ $pollRestaurant->users()->count() }} <br>  
                    @else
                        <a href='/polls/vote/{{ $pollRestaurant->id }}'>Vote for {{$pollRestaurant->restaurants->name}}</a><br>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class='col-sm-2'></div>
</div>    
@endsection