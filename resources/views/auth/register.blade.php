@extends('layouts.master')

<form method="POST" action="/auth/register{{ $query_params }}">
    {!! csrf_field() !!}

    <div>
        First Name
        <input type="text" name="firstName" value="{{ old('firstName') }}">
    </div>

    <div>
        Last Name
        <input type="text" name="lastName" value="{{ old('lastName') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div>
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>