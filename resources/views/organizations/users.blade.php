@extends('layouts.master')

@section('content')
<h1>Users</h1>

<ul>
    @foreach ($organization->users as $user)
    <li>{{ $user->getFullName() }}</li>
    @endforeach
</ul>

<h1>Add user to organization</h1>

<form action="{{ route('organizationInvite', ['id' => $organization->id]) }}" method="POST">
    {!! csrf_field() !!}

    <input type="email" name="email">

    <input type="submit" value="Add">

</form>
@endsection