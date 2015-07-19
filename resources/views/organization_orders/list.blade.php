@extends('layouts.master')

<a href='/organizations/{{ $organization->id }}/order/create'>New Order</a>
<a href='/organizations/{{ $organization->id }}'>Back to Dashboard</a>

<h1>Orders for {{ $organization->name }}</h1>

<table class='table' border='1'>
    <tr>
        <th>Date</th>
        <th>Restaurant</th>
        <th>Number of Line Items</th>
        <th>Status</th>
        <th>Links</th>
    </tr>
    @foreach ($organization->orders() as $orgOrder)
        <tr>
            <td>{{ $orgOrder->created_at }}</td>
            <td>{{ $orgOrder->restaurant()->name }}</td>
            <td>{{ $orgOrder->userOrders()->count() }}</td>
            <td>{{ $orgOrder->displayStatus() }}</td>
            <td>
                <a href='/organizations/{{ $organization->id }}/organizations-orders/{{ $orgOrder->id }}'>View Order</a>
                @if (!$orgOrder->closed_at)
                <br>
                <a href='/organizations/{{ $organization->id }}/organizations-orders/{{$orgOrder->id}}/close'>Close Order</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>