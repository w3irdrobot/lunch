@extends('layouts.master')

<form action='/organization/{{$poll->organization_id}}/poll' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <label>Votes Due By</label>
    <input type='text' name='Poll[closed_by]' value="{{ $poll->closed_by }}" />
    <input type='submit' value='Save' />
</form>