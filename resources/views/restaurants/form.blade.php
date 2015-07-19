@extends('layouts.master')

@section('content')
<form action='/organizations/{{ $organization_id }}/restaurant' method='POST'>
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
                                    <td><label>Name</label></td>
                                    <td><input type='text' name='Restaurant[name]' value="{{ $restaurant->name }}" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type='submit' value='Save' class='btn btn-success btn-outline'/></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>    
@endsection