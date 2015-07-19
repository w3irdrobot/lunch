@extends('layouts.master')

<a href="user-orders/create">Create New Order</a>
<table class='table' border='1'>
    <tr>
        <th>Restaurant</th>
        <th>Order</th>
        <th>Default</th>
        <th>Date Created</th>
    </tr>
    
    @foreach ($user_orders as $user_order)
        <tr>
            <td>{{ $user_order->restaurant->name }}</td>
            <td>{{ $user_order->order }}</td>
            <td>{{ $user_order->default == 1 ? "yes" : "no" }}
            @if ($user_order->default != 1)
                <a href="">Make Default</a>
            @endif
            </td>
            <td>{{ $user_order->created_at }}</td>
        </tr>
    @endforeach
</table>