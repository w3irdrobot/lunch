@extends('layouts.master')

@section('content')
<a href='/organizations/{{$organization->id}}/poll/create'>Add New Poll</a>
<a href='/organizations/{{ $organization->id }}'>Back to Dashboard</a>
<table class='table' border='1'>
    <tr>
        <th>Due Date</th>
        <th>Status</th>
        <th>Options</th>
        <th>Link</th>
    </tr>
    @foreach ($organization->polls as $poll)
        <tr>
            <td>{{ date('F j, Y g:ia',strtotime($poll->closed_by)) }}</td>
            <td>{{ $poll->displayStatus() }}</td>
            <td>
                @foreach ($poll->restaurants as $restaurant)
                    {{ $restaurant->name }} - {{ $restaurant->pollRestaurants($poll->id)->users()->count() }}<br>
                @endforeach
                @if ($poll->displayStatus() == 'Open')
                <a href='/polls/{{$poll->id}}/restaurant/add'>Add Restaurant</a>
                @endif
            </td>
            <td>
                <a href='/polls/{{$poll->id}}'>Vote and Results</a>
                @if (!$poll->closed_at)
                <br>
                <a href='/polls/{{$poll->id}}/close'>Close Vote</a>
                @endif
            </td>
        </tr>
    @endforeach
</table>
@endsection