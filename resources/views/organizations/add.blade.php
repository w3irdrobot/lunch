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

<form action="{{ route('createOrganization') }}" method="POST">
    {!! csrf_field() !!}

    <label for="name">Name</label>
    <input type="text" name="name">
    <input type="submit" value="Create">
</form>
@endsection