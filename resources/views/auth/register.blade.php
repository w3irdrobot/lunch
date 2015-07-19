@extends('layouts.main')

@section('content')
  <div class="title">
    <h1> Registration </h1>
    </br>
   </div>

<div class="center_form">


    <form id="registration" method="POST" action="/auth/register" style="padding: 10px;">
        {!! csrf_field() !!}

        <div class="form-group">
            <label>First Name</label>
            </br>
            <input type="text" name="firstName" value="{{ old('f<label>irstName') }}"></label>
        </div>

        <div class="form-group">
            <label>Last Name</label>
            </br>
            <input type="text" name="lastName" value="{{ old('lastName') }}">
        </div>

        <div class="form-group">
            <label>Email</label>
            </br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label>Password</label>
            </br>
            <input type="password" name="password">
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            </br>
            <input type="password" name="password_confirmation">
        </div>

        <div>
            <button id="register-submit" type="submit">Register</button>
        </div>
    </form>
</div>
@endsection