@extends('layouts.master')

@if (Auth::check())

@section('content')

<div class='row'>
    <div class='col-lg-3'></div>
    <div class='col-lg-6'>

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <h1 class='centerh1'> Create Organization </h1>
        <div class='panel panel-default' style='margin-top: 10px;'>
            <div class='panel-heading'>
                Organization Details
            </div>
            <div class='panel-body'>
                <form action="{{ route('createOrganization') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class='form-control' type="text" name="name">
                    </div>
                    <div class="form-group">
                        <input  type="submit" value="Create Organization" class='form-control btn btn-success'>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <div class='col-lg-3'></div>
</div>

@endsection

@else

@section('content')
<div class="nolog">
    <iframe src="//giphy.com/embed/1456BVmlt3zRa8" width="480" height="480" frameBorder="0" style="max-width: 100%" class="giphy-embed" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
</div>
@endsection

@endif

