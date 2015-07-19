@extends('layouts.master')

@section('content')
<form class='form' action='/line-item/{{$lineItem->id}}/update' method='POST' style='background-color: white;'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    
    <label>Cost</label>
    <input type='text' name="LineItem[cost]" value="{{$lineItem->cost}}" />
    <br><br>
    <label>Has Paid:</label>
    <select name='LineItem[paid]'>
        <option value='0'>No</option>
        <option value='1' {{$lineItem->paid ? 'selected' : ''}}>Yes</option>
    </select>
    
    <input type='submit' value='Save' />
    
</form>

@endsection