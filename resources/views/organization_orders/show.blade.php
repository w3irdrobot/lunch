@extends('layouts.master')

@section('content')

<h1 class='centerh1'>Users Orders</h1>
<h3 class='center'>
    {{ $orgOrder->restaurant()->name }} on {{date('F j, Y',strtotime($orgOrder->created_at))}}
</h3>
<div class='center'>
    <a href='/organizations/{{ $orgId }}/order' class='btn btn-primary btn-outline'>Back to Orders</a>
</div>
<table class='table table-striped' style='margin-top: 5px;'>
    <tr>
        <th>User</th>
        <th>Order</th>
        <th>Cost</th>
        <th>Paid</th>
        <th></th>
    </tr>
    @foreach($orgOrder->lineItems as $lineItem)
        <tr>
            <td>
                {{ $lineItem->userOrder->users->getFullName() }} 
                <a href='mailto:{{ $lineItem->userOrder->users->email }}'>{{ $lineItem->userOrder->users->email }}</a>
            </td>
            <td>
                {{ $lineItem->userOrder->order }}
            </td>
            <td>
                {{ $lineItem->cost ? '$' . number_format($lineItem->cost,2) : 'Not Set' }}
            </td>
            <td style='text-align: left; font-size: 20px;'>
                @if($lineItem->paid)
                    <i class="fa fa-check-circle success"></i>
                @else
                    <i class="fa fa-times-circle error"></i>
                @endif
            </td>
            <td style='text-align: right;'>
                <a href='/line-item/{{$lineItem->id}}/update' class='btn btn-info'>Update</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection