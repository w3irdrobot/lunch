@extends('layouts.master')

@section('content')
<form action='/user-orders' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <div class='row'>
        <div class='col-sm-6'>
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Add Order
                </div>
                <div class='panel-body'>
                <table class='table grid'>
                    <tr>
                        <td class='form-left'><label>Choose Restaurant</label></td>
                        <td class='form-right'><select class="form-control" name='UserOrder[restaurant_id]'>
                            @foreach ($restaurants as $restaurant)
                            <option value='{{ $restaurant->id }}'>{{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Your Order</label></td>
                        <td><input type='text' class="form-control" name="UserOrder[order]" value="{{ $user_order->order }}" /><br></td>
                    </tr>
                    <tr>
                        <td><label>Make Default</label></td>
                        <td><input type='checkbox' name="UserOrder[default]" value="1" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' class='btn btn-success btn-outline' value='Save' /></input</td>
                    </tr>
                </table>
                </div>
</form>
@endsection