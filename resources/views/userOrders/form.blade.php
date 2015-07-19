@extends('layouts.master')

@section('content')
<form action='/user-orders' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <table class='table grid'>
        <tr><th colspan="2">Add Order</th></tr>
        <tr>
            <td class='form-left'><label>Choose Restaurant</label></td>
            <td class='form-right'><select name='UserOrder[restaurant_id]'>
                @foreach ($restaurants as $restaurant)
                <option value='{{ $restaurant->id }}'>{{ $restaurant->name }}</option>
                @endforeach
            </select>
            </td>
        </tr>
        <tr>
            <td><label>Your Order</label></td>
            <td><input type='text' name="UserOrder[order]" value="{{ $user_order->order }}" /><br></td>
        </tr>
        <tr>
            <td><label>Make Default</label></td>
            <td><input type='checkbox' name="UserOrder[default]" value="1" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value='Save' /></td>
        </tr>
    </table>
    
</form>
@endsection