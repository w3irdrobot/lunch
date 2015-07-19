@extends('layouts.master')

@section('content')

<a href='user-orders/create' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i> Create New Order</a>
<br><br>
<div class='row'>
     <div class='col-sm-6'>
         <div class='panel panel-default'>
             <div class='panel-heading'>
                 Filters
             </div>
             <div class='panel-body'>
                <form name="filter" action='/user-orders' method='get'>
                    <label for='restaurant'>Restaurant</label>
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
</div>



<div class='row'>
     <div class='col-sm-12'>
         <div class='panel panel-default'>
             <div class='panel-heading'>
                Orders
             </div>
             <div class='panel-body'>

                <table class='table grid'>
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
             </div>
         </div>
     </div>
</div>
@endsection