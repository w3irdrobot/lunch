@extends('layouts.master')

<form action='/user-orders' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <label>Choose Restaurant</label>
    <select name='UserOrder[restaurant_id]'>
        @foreach ($restaurants as $restaurant)
        <option value='{{ $restaurant->id }}'>{{ $restaurant->name }}</option>
        @endforeach
    </select><br>
    <label>Your Order</label>
    <input type='text' name="UserOrder[order]" value="{{ $user_order->order }}" /><br>
    <label>Make Default</label>
    <input type='checkbox' name="UserOrder[default]" value="1" /><br>
    <input type='submit' value='Save' />
</form>