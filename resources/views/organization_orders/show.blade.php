@extends('layouts.master')

@section('content')

<a href='/organizations/{{ $orgId }}/order'>Back to Orders</a>

<h3>Users Orders</h3>
<ul>
    @foreach($orgOrder->lineItems as $lineItem)
        <li>
            {{ $lineItem->userOrder->order }} - {{ $lineItem->userOrder->users->getFullName() }} 
            <a href='mailto:{{ $lineItem->userOrder->users->email }}'>{{ $lineItem->userOrder->users->email }}</a>
            | 
            Cost: {{ $lineItem->cost ? number_format($lineItem->cost,2) : 'Not Set' }}
            Paid: {{ $lineItem->paid ? 'PAID' : 'Not Paid' }}
            <a href='/line-item/{{$lineItem->id}}/update'>Update</a>
        </li>
    @endforeach
</ul>
@endsection