@extends('layouts.master')

@section('content')
<h1 class="centerh1">New Order</h1>
<div class='row'>
    <div class='col-sm-3'></div>
    <div class='col-sm-6'>
        <form action='/organizations/{{$organization->id}}/order' method='POST'>
            {!! csrf_field() !!}
            @if($errors->any())
            <h4>{{$errors->first()}}</h4>
            @endif

            <div class='panel panel-default'>
                <div class='panel-heading'>
                    Order Details
                </div>
                <div class='panel-body'>
                    <div class='form-group'>
                        <label>Restaurant</label>
                        <select name='restaurant_id' class='form-control'>
                            @foreach ($organization->restaurants as $restaurant)
                                <option value='{{$restaurant->id}}'>{{$restaurant->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='form-group'>
                        <label>Due By</label>
                        <div class='input-group date'>
                            <input id="datepicker" class='form-control' type='text' name='OrganizationOrder[due_by]' value="{{ $organizationOrder->due_by }}" style="width: 100%;" placeholder="Please select a date and time."/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>     
                    </div>
                    <script>
                          $(function() {
                            $( "#datepicker" ).datetimepicker(
                             {
                            /*
                                timeFormat
                                Default: "HH:mm",
                                A Localization Setting - String of format tokens to be replaced with the time.
                            */
                            timeFormat: "hh:mm tt",
                            /*
                                hourMin
                                Default: 0,
                                The minimum hour allowed for all dates.
                            */
                            hourMin: 8,
                            /*
                                hourMax
                                Default: 23, 
                                The maximum hour allowed for all dates.
                            */
                            hourMax: 16,
                            /*
                                numberOfMonths
                                jQuery DatePicker option
                                that will show two months in datepicker
                            */
                            numberOfMonths: 1,
                            /*
                                minDate
                                jQuery datepicker option 
                                which set today date as minimum date
                            */
                            minDate: 0,
                            /*
                                maxDate
                                jQuery datepicker option 
                                which set 30 days later date as maximum date
                            */
                            maxDate: 30
                             });
                    });
                </script>
                    <div class='form-group'>
                        <td><input type='submit' class='form-control btn btn-success' value='Save' /></input</td>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class='col-sm-3'></div>
</div>
@endsection