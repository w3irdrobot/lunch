@extends('layouts.master')

<h1>{{ $organization->name }}</h1>

<a href='/organization/{{ $organization->id }}/restaurant'>Our Restaurants</a>
<a href='/organization/{{ $organization->id }}/poll'>Our Polls</a>