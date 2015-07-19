@extends('layouts.master')

@section('content')
<div id="frontpage">
    <p>Pick up lunch for the group, without all the back and fourth.</p>
</div>

<div class="login"> 
    <ul class="nav nav-tabs">
      <li id="login_li" role="presentation" class="active gooseberry"><a href="#">Log In</a></li>
      <li id="registration_li" role="presentation" class="gooseberry"><a href="#">Registration</a></li>
    </ul>
    
    

    <form id="registration" method="POST" action="/auth/register" style="display: none;">
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

    <form id="login" method="POST" action="/auth/login">
        {!! csrf_field() !!}

        <div class="form-group">    
            <label> Email </label>
        </br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div class="form-group">    
            <label> Password  </label>
        </br> 
            <input type="password" name="password" id="password">
        </div>    

        <button id="login-submit" type="submit">Log In</button>
    </form>
</div>
 <script>
    (function(){ 
        jQuery("#registration_li").click(function() {
          jQuery("#login_li").removeClass("active");
          jQuery("#registration_li").addClass("active");
          jQuery('#login').css('display', 'none');
          jQuery('#registration').css('display', 'block');
        });

        jQuery("#login_li").click(function() {
          jQuery("#registration_li").removeClass("active");
          jQuery("#login_li").addClass("active");
          jQuery('#registration').css('display', 'none');
          jQuery('#login').css('display', 'block');
        });
        console.log("ran!");
     })();
</script>

@endsection