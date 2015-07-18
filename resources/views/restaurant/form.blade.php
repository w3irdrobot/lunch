@extends('layouts.master')

<form action='/restaurant' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <label>Name</label>
    <input type='text' name='Restaurant[name]' value="{{ $restaurant->name }}" />
    <input type='submit' value='Save' />
</form>