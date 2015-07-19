@extends('layouts.master')

@section('content')

<h1 class='centerh1'>Organization Restaurants</h1>
<div class='center'>
    <a href='/organizations/{{$organization->id}}/restaurant/create' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i>Add New Restaurant</a>
    <a href='/organizations/{{ $organization->id }}' class='btn btn-success btn-outline'>Back to Dashboard</a>
</div>
<div class='row' style='margin-top: 5px;'>
    <div class='col-lg-3'></div>
    <div class='col-lg-6'>
        <table class='table table-striped'>
            <tr>
                <th>Name</th>
                <th style='text-align: right;'>Used By Org</th>
            </tr>
            @foreach ($restaurants as $restaurant)
                <tr>
                    <td>{{ $restaurant->name }}</td>
                    <td style='text-align: right;'>
                        @if ($restaurant->is_used)
                        <a href='/organizations/{{ $organization->id }}/restaurant/remove/{{ $restaurant->id }}' class='btn btn-sm btn-danger'>Remove</a>
                        @else
                        <a href='/organizations/{{ $organization->id }}/restaurant/add/{{ $restaurant->id }}' class='btn btn-sm btn-success'>Add</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class='col-lg-3'></div>
</div>

@endsection