@extends('layouts.master')

@section('content')
<form action='/organizations/{{$organization->id}}/order' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    <div class='row'>
    <div class='col-sm-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Add Restaurant
            </div>
            <div class='panel-body'>
                <table class='table grid'>
                    <tr>
                        <td><label>Restaurant</label></td>
                        <td>
                            <select name='restaurant_id'>
                                @foreach ($organization->restaurants as $restaurant)
                                    <option value='{{$restaurant->id}}'>{{$restaurant->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label>Due By</label></td>
                        <td><input type='text' name='OrganizationOrder[due_by]' value="{{ $organizationOrder->due_by }}" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' class='btn btn-success btn-outline' value='Save' /></input</td>
                    </tr>
                </table>
    </form>
@endsection