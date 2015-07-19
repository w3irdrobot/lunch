@extends('layouts.master')

@section('content')

<h1 class='centerh1'>Organization Users</h1>
<div class='center'>
    <a href='/organizations/{{ $organization->id }}' class='btn btn-success btn-outline'>Back to Dashboard</a>
</div>
<div class='row' style='margin-top: 5px;'>

<div class='row'>
    <div class='col-sm-4'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Add user to organization
            </div>
            <div class='panel-body'>
                <form action="{{ route('organizationInvite', ['id' => $organization->id]) }}" method="POST">
                    {!! csrf_field() !!}
                    <div class='form-group'>
                        <input type="email" class='form-control' name="email" placeholder='Email Address'>
                    </div>
                    <div class='form-group'>
                        <input type="submit" class='btn btn-success form-control' value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>  

    <div class='col-sm-8'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Users
            </div>
            <div class='panel-body'>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                    @foreach ($organization->users as $user)
                    <tr>
                        <td>{{ $user->getFullName() }}</td>
                        <td>{{ $user->getEmail() }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>    
@endsection