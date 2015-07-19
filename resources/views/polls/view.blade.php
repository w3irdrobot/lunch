@extends('layouts.master')

@section('content')

<div class='row'>
    <div class='col-lg-3'></div>
    <div class='col-lg-6 center'>
        <a href='/organizations/{{ $poll->organizations->id }}/poll' class='btn btn-success btn-outline'>Back to Poll List</a>
        <br><br>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Vote Now
            </div>
            <div class='panel-body'>
                <h1 class='center'>{{$poll->organizations->name}} poll for {{ date('F j Y',strtotime($poll->closed_by)) }}</h1>
                <h3 class='center'>Due By: {{ date('g:ia',strtotime($poll->closed_by)) }}</h3>

                @if ($poll->closed_at)
                <h3 style='color: red;' class='center'>VOTE CLOSED</h3>
                @endif

                @foreach ($pollRestaurants as $pollRestaurant)
                    @if ($response || $poll->closed_at)
                        <div class='btn btn-primary disabled form-control'>
                            {{ $pollRestaurant->restaurants->name }}: Vote Count {{ $pollRestaurant->users()->count() }}
                        </div>
                    @else
                        <a href='/polls/vote/{{ $pollRestaurant->id }}' class='btn btn-primary btn-outline form-control'>Vote for {{$pollRestaurant->restaurants->name}}</a><br>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class='col-lg-3'></div>
</div>    
@endsection