@extends('layouts.master')

@section('content')
<form action='/organizations/{{$organization->id}}/order' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <label>Restaurant</label>
    <select name='restaurant_id'>
        @foreach ($organization->restaurants as $restaurant)
            <option value='{{$restaurant->id}}'>{{$restaurant->name}}</option>
        @endforeach
    </select>
    <br>
    <label>Due By</label>
    <input type='text' name='OrganizationOrder[due_by]' value="{{ $organizationOrder->due_by }}" />
    <br>
    <input type='submit' value='Save' />
</form>
@endsection