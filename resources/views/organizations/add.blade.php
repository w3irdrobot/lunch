@extends('layouts.master')

@if (Auth::check())

    @section('content')
    <div class="nolog">
        <iframe src="//giphy.com/embed/1456BVmlt3zRa8" width="480" height="480" frameBorder="0" style="max-width: 100%" class="giphy-embed" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
    </div>
    @endsection

@else
    @section('content')
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="title" style="margin-right: 32%; text-align: center;">
        <h1> Create Organization </h1>
        </br>
   </div>

    <div class="model-creations">
        <form action="{{ route('createOrganization') }}" method="POST" style="padding: 5px;">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <input id="register-submit" type="submit" value="Create">
        </form>
    </div>
    @endsection
@endif

