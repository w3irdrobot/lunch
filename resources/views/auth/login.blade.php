@extends('layouts.master')

@section('content')

<div class="login"> 
    <form method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div>
            <p> Email </p>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <p> Password <p> 
            <input type="password" name="password" id="password">
        </div>

        <div>
            <input type="checkbox" name="remember"> Remember Me
        </div>

        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</div>
@endsection