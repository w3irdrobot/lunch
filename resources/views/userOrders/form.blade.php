@extends('layouts.master')

@section('content')
<h1 class='centerh1'>Add Order</h1>
<div class='row'>
    <div class='col-sm-3'></div>
    <div class='col-sm-6'>
        <form action='/user-orders' method='POST'>
            {!! csrf_field() !!}
            @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif
                    <div class='panel panel-default' style="margin-top: 5px;">
                        <div class='panel-heading'>
                            Order Details
                        </div>
                        <div class='panel-body'>
                        <div class='form-group'>
                            <label>Choose Restaurant</label>
                            <select class="form-control" name='UserOrder[restaurant_id]'>
                                @foreach ($restaurants as $restaurant)
                                <option value='{{ $restaurant->id }}'>{{ $restaurant->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='form-group'>
                            <label>Your Order</label>
                            <input type='text' class="form-control" name="UserOrder[order]" value="{{ $user_order->order }}" />
                        </div>
                        <div class='form-group'>
                            <label>Make Default</label><br>
                            <select class="form-control" name="UserOrder[default]">
                                <option value='0'>No</option>
                                <option value='1'>Yes</option>
                            </select>
                        </div>
                        <div class='form-group'>     
                            <input type='submit' class='btn btn-success form-control' value='Save' /></input>
                        </div>
                    </div>
        </form>
    <div class='col-sm-3'></div>       
</div>
@endsection