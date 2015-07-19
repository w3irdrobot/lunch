@extends('layouts.master')

@section('content')
<a href="user-orders/create">Create New Order</a>
<form action='/user-orders' method='get'>
    <select name='restaurant'>
        <option value="">All</option>
        @foreach ($restaurants as $restaurant)
            <option value='{{ $restaurant->id }}'
                    {{ $selected_restaurant == $restaurant->id ? "selected" : "" }}>{{ $restaurant->name }}</option>
        @endforeach
    </select>
    <input type='submit' name='submit' value='submit'/>
</form>

<table class='table grid' border='1'>
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
            <td>
            @if ($user_order->default != 1)
                <a href="/user-orders/{{ $user_order->id }}/default">
                <img class="default unselected" src="/img/star.png" alt="DEFAULT"/>
                </a>
            @else
                <img class="default" src="/img/star.png" alt="DEFAULT"/>
            @endif
            </td>
            <td>{{ $user_order->created_at }}</td>
        </tr>
    @endforeach
</table>
@endsection