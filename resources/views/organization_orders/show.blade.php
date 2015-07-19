@extends('layouts.master')

@section('content')

<a href='/organizations/{{ $orgId }}/order'>Back to Orders</a>

<h3>Users Orders</h3>
<table class='table table-striped'>
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
            <td>
                <a href='/line-item/{{$lineItem->id}}/update' class='btn btn-info'>Update</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection