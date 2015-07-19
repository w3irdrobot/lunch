@extends('layouts.master')

@section('header')
<link rel="stylesheet" href="/css/order-print.css" />
@endsection

@section('content')

<h1 class='centerh1 print-hide'>Users Orders</h1>
<h3 class='center'>
    {{ $orgOrder->restaurant()->name }} on {{date('F j, Y',strtotime($orgOrder->created_at))}}
</h3>
<div class='center print-hide'>
    <a href='/organizations/{{ $orgId }}/order' class='btn btn-primary btn-outline'>Back to Orders</a>
</div>
<table class='table table-striped' style='margin-top: 5px;'>
    <tr>
        <th>User</th>
        <th>Order</th>
        <th class="print-hide">Cost</th>
        <th class="print-hide">Paid</th>
        <th class="print-hide"></th>
    </tr>
    @foreach($orgOrder->lineItems as $lineItem)
        <tr>
            <td>
                {{ $lineItem->userOrder->users->getFullName() }}
                <a href='mailto:{{ $lineItem->userOrder->users->email }}' class="print-hide">{{ $lineItem->userOrder->users->email }}</a>
            </td>
            <td>
                {{ $lineItem->userOrder->order }}
            </td>
            <td class="print-hide">
                {{ $lineItem->cost ? '$' . number_format($lineItem->cost,2) : 'Not Set' }}
            </td>
            <td style='text-align: left; font-size: 20px;' class="print-hide">
                @if($lineItem->paid)
                    <i class="fa fa-check-circle success"></i>
                @else
                    <i class="fa fa-times-circle error"></i>
                @endif
            </td>
            <td style='text-align: right;' class="print-hide">
                <a href='/line-item/{{$lineItem->id}}/update' class='btn btn-info'>Update</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection