@extends('layouts.master')

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

<div class="model-creations">
    <form action="{{ route('createOrganization') }}" method="POST">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>
        <input type="submit" value="Create">
    </form>
</div>
@endsection