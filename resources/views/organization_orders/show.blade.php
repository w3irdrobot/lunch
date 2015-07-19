@extends('layouts.master')

@section('content')
<ul>
    @foreach($lineItems as $lineItem)
    <li>{{ $lineItem->userOrder->order }}</li>
    @endforeach
</ul>
@endsection