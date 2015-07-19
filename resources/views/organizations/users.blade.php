@extends('layouts.master')

@section('content')
<h1>Add user to organization</h1>

<form action="{{ route('organizationInvite', ['id' => $organization->id]) }}" method="POST">
    {!! csrf_field() !!}

    <input type="email" name="email">

    <input type="submit" value="Add">

</form>

<table class="table grid skinny">
    <tr><th>Users</th></tr>
    @foreach ($organization->users as $user)
    <tr><td>{{ $user->getFullName() }}</td></tr>
    @endforeach
</table>
@endsection