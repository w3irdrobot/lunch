@extends('layouts.master')

@section('content')
<h1>Orders for {{ $organization->name }}</h1>
<a href='/organizations/{{ $organization->id }}/order/create' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i> New Order</a>
<a href='/organizations/{{ $organization->id }}' class='btn btn-success btn-outline'>Back to Dashboard</a>
<br><br>
<div class='row'>
    <div class='col-sm-12'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Orders
            </div>
            <div class='panel-body'>

            <table class='table'>
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
            </div>
        </div>
    </div>
</div>
@endsection