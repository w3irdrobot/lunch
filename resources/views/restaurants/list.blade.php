@extends('layouts.master')

<a href='/organization/{{ $organization->id }}/restaurant/create'>Add New Restaurant</a>
<a href='/organizations/{{ $organization->id }}'>Back to Dashboard</a>
<table class='table' border='1'>
    <tr>
        <th>Name</th>
        <th>Used By Org</th>
    </tr>
    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->name }}</td>
            <td>
                @if ($restaurant->is_used)
                <a href='/organization/{{ $organization->id }}/restaurant/remove/{{ $restaurant->id }}'>Remove</a>
                @else
                <a href='/organization/{{ $organization->id }}/restaurant/add/{{ $restaurant->id }}'>Add</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>