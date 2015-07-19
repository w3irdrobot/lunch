@extends('layouts.master')

@section('content')

<div class='row'>
    <div class='col-lg-9 well'>
        <div class='pull-right'>
            <a href='/organizations/{{$organization->id}}/users' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i> View & Invite User</a>
            <a href='/organizations/{{ $organization->id }}/restaurant' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i> Our Restaurants</a>
        </div>
        <h1>{{ $organization->name }}</h1>
        <div class='row'>
            <div class='col-sm-6'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Orders
                    </div>
                    <div class='panel-body'>
                        <ul>
                        @foreach($organization->orders() as $order)
                        <li>
                            <span class='restaurant'>{{$order->restaurant()->name}}</span>
                            <span class='date'>{{date('F j',strtotime($order->created_at))}}</span>
                            @if ($order->closed_at)
                            <span class='error'>Closed</span>
                            @else
                            <span class='success'>Open</span>
                            @endif
                            <a href='/organizations-orders/{{$order->id}}/lineitem/create' class='btn btn-xs {{!$order->closed_at ? '' : 'disabled'}}'><i class='fa fa-plus'></i> Order</a>
                            <a href='/organizations/{{$order->organization()->id}}/organizations-orders/{{$order->id}}' class='btn btn-xs'> <i class='fa fa-folder-open'></i> View</a>
                        </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class='panel-footer'>
                        <a href='/organizations/{{$organization->id}}/order' class='btn btn-success btn-sm' style='width: 48%'><i class='fa fa-list'></i> View All</a>
                        <a href='/organizations/{{$organization->id}}/order/create' class='btn btn-success btn-sm' style='width: 48%'><i class='fa fa-plus'></i> Create New</a>
                    </div>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class='panel panel-default'>
                    <div class='panel-heading'>
                        Polls
                    </div>
                    <div class='panel-body'>
                        <ul>
                        @foreach($organization->polls()->orderBy('created_at','desc')->take(5)->get() as $poll)
                        <li>
                            <span class='restaurant'>{{date('F j',strtotime($poll->created_at))}}</span>
                            @if ($poll->closed_at)
                            <span class='error'>Closed</span>
                            @else
                            <span class='success'>Open</span>
                            @endif
                            <a href='/polls/vote/{{$poll->id}}' class='btn btn-xs'><i class='fa fa-check-square'></i> Vote</a>
                        </li>
                        @endforeach
                        </ul>
                    </div>
                    <div class='panel-footer'>
                        <a href='/organizations/{{$organization->id}}/poll' class='btn btn-success btn-sm' style='width: 48%'><i class='fa fa-list'></i> View All</a>
                        <a href='/organizations/{{$organization->id}}/poll/create' class='btn btn-success btn-sm' style='width: 48%'><i class='fa fa-plus'></i> Create New</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='col-lg-3'>
        <div class='panel panel-default orglist'>
            <div class='panel-heading'>
                My Settings
            </div>
            <div class='panel-body'>
                <a href='/user-orders' class='btn btn-success' style='width: 100%; margin-top:5px;'>My Orders</a>
                <a href='/slack/outgoing-vote/{{ $organization->id }}' class='btn btn-success' style='width: 100%; margin-top:5px;'>Slack Vote Reminder</a>
                <a href='/slack/outgoing-order/{{ $organization->id }}' class='btn btn-success' style='width: 100%; margin-top:5px;'>Slack Order Reminder</a>
            </div>
        </div>
        <div class='panel panel-default orglist'>
            <div class='panel-heading'>
                Organizations
            </div>
            <div class='panel-body'>
                <ul>
                @foreach($roles as $role)
                <li>
                    <a href='/organizations/{{$role->organization_id}}' class='btn btn-info {{$role->organization_id == $organization->id ? 'disabled' : ''}}'>
                        {{$role->organization->name}} {{$role->organization_id == $organization->id ? ' (Active)' : '' }}
                    </a>
                </li>
                @endforeach
                </ul>
            </div>
            <div class='panel-footer'>
                <a href='/organizations/add' class='btn btn-success' style='width: 100%'>Add New Organization</a>
            </div>
        </div>
    </div>
</div>

@endsection