@extends('layouts.master')

<form action='/poll/{{ $poll->id }}/restaurant/store' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <label>Restaurant</label>
    <select name='restaurant_id'>
        @foreach ($restaurants as $restaurant)
            <option value='{{$restaurant->id}}'>{{$restaurant->name}}</option>
        @endforeach
    </select>
    <input type='submit' value='Save' />
</form>