@extends('layouts.master')

@section('content')

<a href='/organizations/{{ $orgId }}/order'>Back to Orders</a>

<h3>Users Orders</h3>
<ul>
    @foreach($orgOrder->lineItems as $lineItem)
    <li>{{ $lineItem->userOrder->order }} - {{ $lineItem->userOrder->users->getFullName() }} <a href='mailto:{{ $lineItem->userOrder->users->email }}'>{{ $lineItem->userOrder->users->email }}</a></li>
    @endforeach
</ul>
@endsection