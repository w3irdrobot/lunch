@extends('layouts.master')

<table class='table'>
    <tr>
        <th>Name</th>
    </tr>
    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->name }}</td>
        </tr>
    @endforeach
</table>