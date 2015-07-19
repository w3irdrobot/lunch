@extends('layouts.master')

<a href='/organizations/{{ $poll->organizations->id }}/poll'>Back to Poll List</a>
<br><br>

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