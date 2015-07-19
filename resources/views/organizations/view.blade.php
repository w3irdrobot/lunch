@extends('layouts.master')

@section('content')

<div class='row'>
    <div class='col-lg-9'>
        <h1>{{ $organization->name }}</h1>
        <a href='/organizations/{{ $organization->id }}/restaurant'>Our Restaurants</a> | 
        <a href='/organizations/{{ $organization->id }}/poll'>Our Polls</a> | 
        <a href='/organizations/{{ $organization->id }}/order'>Our Orders</a>
    </div>
    <div class='col-lg-3'>
        <div class='panel panel-default orglist'>
            <div class='panel-heading'>
                Organizations
            </div>
            <div class='panel-body'>
                <ul>
                @foreach($roles as $role)
                <li><a href='/organizations/{{$role->organization_id}}' class='btn btn-info'>{{$role->organization->name}}</a></li>
                @endforeach
                </ul>
            </div>
            <div class='panel-footer'>
                <a href='/organizations/add' class='btn btn-success' style='width: 100%'>Add New Organization</a>
            </div>
        </div>
        
    </div>
</div>

@endsection