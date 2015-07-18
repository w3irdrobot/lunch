@extends('layouts.master')

<table class='table' border='1'>
    <tr>
        <th>Name</th>
    </tr>
    @foreach ($restaurants as $restaurant)
        <tr>
            <td>{{ $restaurant->name }}</td>
        </tr>
    @endforeach
</table>