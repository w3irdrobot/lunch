@extends('layouts.master')

@section('content')
<h1 class='centerh1'>Polls</h1>
<div class='center'>
<a href='/organizations/{{$organization->id}}/poll/create' class='btn btn-success btn-outline'><i class='fa fa-user-plus'></i>Add New Poll</a>
<a href='/organizations/{{ $organization->id }}' class='btn btn-success btn-outline'>Back to Dashboard</a>
</div>
<br>
<table class='table table-striped'>
    <tr>
        <th>Due Date</th>
        <th>Status</th>
        <th>Restaurant Options</th>
        <th></th>
    </tr>
    @foreach ($organization->polls as $poll)
        <tr>
            <td>{{ date('F j, Y g:ia',strtotime($poll->closed_by)) }}</td>
            <td>{{ $poll->displayStatus() }}</td>
            <td>
                @if ($poll->displayStatus() == 'Open')
                <div class="center">
                <a href='/polls/{{$poll->id}}/restaurant/add' class="btn btn-success btn-sm btn-outline"><i class="fa fa-plus"></i> Add Restaurant</a>
                </div>
                @endif
                <table class='table table-bordered table-condensed' style='margin-top: 4px;'>
                     @foreach ($poll->restaurants as $restaurant)
                    <tr>
                        <td style="text-align: left">
                            {{ $restaurant->name }}
                        </td>
                        <td style="text-align: right;">
                            {{ $restaurant->pollRestaurants($poll->id)->users()->count() }}
                        </td>
                    </tr>
                    @endforeach
                </table>
                
            </td>
            <td style="text-align: right;">
                @if (!$poll->closed_at)
                <a href='/polls/{{$poll->id}}/close' class='btn btn-info btn-sm'><i class="fa fa-times-circle"></i> Close Vote</a>
                @endif
                <a href='/polls/{{$poll->id}}' class='btn btn-primary btn-sm'><i class="fa fa-check-square"></i> Vote and Results</a>
            </td>
        </tr>
    @endforeach
</table>

@endsection