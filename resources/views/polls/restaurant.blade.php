@extends('layouts.master')

@section('content')

<h1 class='centerh1'>Add a Restaurant</h1>

<div class='row'>
    <div class='col-lg-3'></div>
    <div class='col-lg-6'>
        <form action='/polls/{{ $poll->id }}/restaurant/store' method='POST'>
            {!! csrf_field() !!}
            @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif
            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Add Restaurant to your Organization
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
                        <input type='submit' class='btn btn-success form-control' value='Save' />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class='col-lg-3'></div>
</div>
@endsection