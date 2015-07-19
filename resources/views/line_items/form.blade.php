@extends('layouts.master')

@section('content')

<h1 class='centerh1'>My Order</h1>
<h3 class='center'>for {{$orgOrder->restaurant()->name}}</h3>
<div class='row' style='margin-top: 10px;'>
    <div class='col-sm-3'></div>
    <div class='col-sm-6'>
        <div class='panel panel-default'>
            <div class='panel-body'>
                <form action='/organizations-orders/{{$orgOrder->id}}/lineitem' method='POST'>
                    {!! csrf_field() !!}
                    @if($errors->any())
                    <h4>{{$errors->first()}}</h4>
                    @endif

                    @if(count($oldOrders) >0)
                        <div class='panel panel-default'>
                            <div class='panel-heading'>
                                Use Old Order
                            </div>
                            <div class='panel-body'>
                                <div class='form-group'>
                                    <label>Select Order</label>
                                    <select name='LineItem[user_order]' class='form-control'>
                                        @foreach($oldOrders as $userOrder)
                                            <option value='{{$userOrder->id}}' {{ $userOrder->default == 1 ? 'selected' : '' }}>{{$userOrder->order}} {{ $userOrder->default == 1 ? '(DEFAULT)' : '' }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class='panel panel-default'>
                        <div class='panel-heading'>
                           New Order
                        </div>
                        <div class='panel-body'>
                            <div class='form-group'>
                                <label>Your Order</label>
                                <input class='form-control' type='text' name="UserOrder[order]" value="" />
                            </div>
                            <div class='form-group'>
                                <label>Make Default for {{$orgOrder->restaurant()->name}}</label>
                                <select name='UserOrder[default]' class='form-control'>
                                    <option value='0'>No</option>
                                    <option value='1'>Yes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input class='form-control btn btn-success' type='submit' value='Save' />
                    <br><hr>
                    <a href='/organizations-orders/{{$orgOrder->organization_id}}/lineitem/reject' class='form-control btn btn-danger'>No Thanks, I Packed</a>
                </form>
            </div>
        </div>
    </div>
    <div class='col-sm-3'></div>
</div>
@endsection