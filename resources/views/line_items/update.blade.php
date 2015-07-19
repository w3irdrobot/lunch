@extends('layouts.master')

@section('content')
<form class='form' action='/line-item/{{$lineItem->id}}/update' method='POST' style='background-color: white;'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    
    <h1 class='centerh1'>Update User Order</h1>
    <div class='panel panel-default'>
        <div class='panel-heading'>
            User Order - {{$lineItem->userOrder->users->getFullName()}}
        </div>
        <div class='panel-body'>
            <div class='form-group'>
                <label>Cost of Order ($)</label>
                <input class='form-control' type='text' name="LineItem[cost]" value="{{$lineItem->cost}}" placeholder='5.99' />
            </div>
            <div class='form-group'>
                <label>Has the user paid?</label>
                <select class='form-control' name='LineItem[paid]'>
                    <option value='0'>No</option>
                    <option value='1' {{$lineItem->paid ? 'selected' : ''}}>Yes</option>
                </select>
            </div>
            <div class='form-group'>
                <input type='submit' value='Save' class='btn btn-primary' />
            </div>
        </div>
    </div>
    
</form>

@endsection