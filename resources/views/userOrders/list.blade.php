@extends('layouts.master')

@section('content')
<div class='row'>

<div class='col-sm-3'>
    <a href='user-orders/create' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i> Create New Order</a>
</div>
<div class='col-sm-6'>
    <h1 class='centerh1'>My Orders</h1>
</div>
<div class='col-sm-3'>
         <div class='panel-body'>
            <form name="filter" action='/user-orders' method='get'>
                <label for='restaurant'>Filter by Restaurant</label>
                <select id="restaurant-filter" name='restaurant' class="form-control" onchange='this.form.submit()'>
                    <option value="">All</option>
                    @foreach ($restaurants as $restaurant)
                        <option value='{{ $restaurant->id }}'
                                {{ $selected_restaurant == $restaurant->id ? "selected" : "" }}>{{ $restaurant->name }}</option>
                    @endforeach
                </select>
                <noscript><input type='submit' class='btn btn-success btn-outline' name='submit' value='Filter'/></noscript>
            </form>                 
         </div>
     </div>
 </div>

                <table class='table table-striped'>
                    <tr>
                        <th>Restaurant</th>
                        <th>Order</th>
                        <th><center>Default</center></th>
                        <th>Date Created</th>
                    </tr>

                    @foreach ($user_orders as $user_order)
                        <tr>
                            <td>{{ $user_order->restaurant->name }}</td>
                            <td>{{ $user_order->order }}</td>
                            <td align='center'>
                            @if ($user_order->default != 1)
                                <a href="/user-orders/{{ $user_order->id }}/default" class="btn btn-primary btn-sm">
                                Make Default
                                </a>
                            @else
                                <i class='fa fa-check-circle success'></i> Default
                            @endif
                            </td>
                            <td>{{ $user_order->created_at }}</td>
                        </tr>
                    @endforeach
                </table>

@endsection