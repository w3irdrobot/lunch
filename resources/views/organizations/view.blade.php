@extends('layouts.master')

@section('content')
<h1>{{ $organization->name }}</h1>

<a href='/organizations/{{ $organization->id }}/restaurant'>Our Restaurants</a> | 
<a href='/organizations/{{ $organization->id }}/poll'>Our Polls</a> | 
<a href='/organizations/{{ $organization->id }}/order'>Our Orders</a>

@endsection