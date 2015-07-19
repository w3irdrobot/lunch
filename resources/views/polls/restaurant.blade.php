@extends('layouts.master')

@section('content')
<div class='row'>
    <div class='col-sm-3'></div>
    <div class='col-sm-6'>
<form action='/polls/{{ $poll->id }}/restaurant/store' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif

        <div class='panel panel-default'>
            <div class='panel-heading'>
                Add Restaurant
            </div>
            <div class='panel-body'>
                <div class='form-group'>
                    <label>Restaurant</label>
                    <select name='restaurant_id' class='form-control'>
                        @foreach ($restaurants as $restaurant)
                            <option value='{{$restaurant->id}}'>{{$restaurant->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <input type='submit' class='form-control btn btn-success' value='Save' /></td>
                </div>
            </div>
        </div>
    </div>
    <div class='col-sm-3'>
</div>
</form>
@endsection