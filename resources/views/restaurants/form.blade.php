@extends('layouts.master')

@section('content')
<form action='/organizations/{{ $organization_id }}/restaurant' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <table class='table grid'>
        <tr><th colspan='2'>Add Restaurant</th></tr>
        <tr>
            <td><label>Name</label></td>
            <td><input type='text' name='Restaurant[name]' value="{{ $restaurant->name }}" /></td>
        </tr>
        <tr>
            <td></td>
            <td><input type='submit' value='Save' /></td>
        </tr>
    </table>
</form>
@endsection