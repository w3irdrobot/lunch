@extends('layouts.master')

@section('content')
<a href='/organizations/{{ $organization->id }}/restaurant/create' class='btn btn-success btn-outline'>Add New Restaurant</a>
<a href='/organizations/{{ $organization->id }}' class='btn btn-success btn-outline'>Back to Dashboard</a>
<br><br>
<div class='row'>
    <div class='col-sm-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Restaurants
            </div>
            <div class='panel-body'>
                <table class='table grid'>
                    <tr>
                        <th>Name</th>
                        <th>Used By Org</th>
                    </tr>
                    @foreach ($restaurants as $restaurant)
                        <tr>
                            <td>{{ $restaurant->name }}</td>
                            <td>
                                @if ($restaurant->is_used)
                                <a href='/organizations/{{ $organization->id }}/restaurant/remove/{{ $restaurant->id }}'>Remove</a>
                                @else
                                <a href='/organizations/{{ $organization->id }}/restaurant/add/{{ $restaurant->id }}'>Add</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection