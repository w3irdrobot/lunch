@extends('layouts.master')

@section('content')
<h1 class='centerh1'>Orders for {{ $organization->name }}</h1>
<div class='center'>
    <a href='/organizations/{{ $organization->id }}/order/create' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i> New Order</a>
    <a href='/organizations/{{ $organization->id }}' class='btn btn-primary btn-outline'>Back to Dashboard</a>
</div>
<br>
<table class='table table-striped'>
    <tr>
        <th>Date</th>
        <th>Restaurant</th>
        <th>Number of User Orders</th>
        <th>Status</th>
        <th></th>
    </tr>
    @foreach ($organization->orders() as $orgOrder)
        <tr>
            <td>{{ date('F j Y g:ia',strtotime($orgOrder->created_at)) }}</td>
            <td>{{ $orgOrder->restaurant()->name }}</td>
            <td>{{ $orgOrder->userOrders()->count() }}</td>
            <td>{{ $orgOrder->displayStatus() }}</td>
            <td style='text-align: right;'>
                @if (!$orgOrder->closed_at)
                <a href='/organizations/{{ $organization->id }}/organizations-orders/{{$orgOrder->id}}/close' class='btn btn-info btn-sm'><i class='fa fa-times-circle'></i> Close Order</a>
                @endif
                
                <a href='/organizations/{{ $organization->id }}/organizations-orders/{{ $orgOrder->id }}' class='btn btn-primary btn-sm'><i class='fa fa-list'></i> View User Orders</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection