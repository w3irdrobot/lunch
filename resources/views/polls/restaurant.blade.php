@extends('layouts.master')

@section('content')
<form action='/polls/{{ $poll->id }}/restaurant/store' method='POST'>
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
                            <select name='restaurant_id' class='form-control'>
                                @foreach ($restaurants as $restaurant)
                                    <option value='{{$restaurant->id}}'>{{$restaurant->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' class='btn btn-success btn-outline' value='Save' /></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
    
    
</form>
@endsection