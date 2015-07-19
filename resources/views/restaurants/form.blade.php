@extends('layouts.master')

@section('content')

<h1 class='centerh1'>Organization Restaurants</h1>

<div class='row'>
    
    <div class='col-sm-3'></div>
    <div class='col-sm-6'>
        <form action='/organizations/{{ $organization_id }}/restaurant' method='POST'>
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
                        <label>Name</label>
                        <input class='form-control' type='text' name='Restaurant[name]' value="{{ $restaurant->name }}" placeholder="McDonalds" />
                    </div>
                    <div class='form-group'>
                        <input type='submit' value='Save' class='btn btn-success form-control'/></td>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class='col-sm-3'></div>
</div>    
@endsection