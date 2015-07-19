@extends('layouts.master')

@section('content')
<form action='/organizations-orders/{{$orgOrder->organization()->id}}/lineitem' method='POST' style='background-color: white;'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    
    <h3>Restaurant: {{$orgOrder->restaurant()->name}} {{$orgOrder->restaurant()->id}}</h3>
    
    @if($oldOrders)
        <fieldset>
            <legend>Use Old Order</legend>
            <select name='LineItem[user_order]'>
                @foreach($oldOrders as $userOrder)
                    <option value='{{$userOrder->id}}' {{ $userOrder->default == 1 ? 'selected' : '' }}>{{$userOrder->order}} {{ $userOrder->default == 1 ? '(DEFAULT)' : '' }}</option>
                @endforeach
            </select>
        </fieldset>
    <br><Br>
    @endif
    
    <fieldset>
        <legend>New Order</legend>
        <label>Your Order</label>
        <input type='text' name="UserOrder[order]" value="" /><br>
        <label>Make Default for {{$orgOrder->restaurant()->name}}</label>
        <select name='UserOrder[default]'>
            <option value='0'>No</option>
            <option value='1'>Yes</option>
        </select>
    </fieldset>
    
    <input type='submit' value='Save' />
    <br><Br>
    <a href='/organizations-orders/{{$orgOrder->organization_id}}/lineitem/reject'>No Thanks, I Packed</a>
    
    
</form>

@endsection