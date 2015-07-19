@extends('layouts.master')

@section('content')
<div class='row'>
    <div class='col-sm-4'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                Add user to organization
            </div>
            <div class='panel-body'>
                <form action="{{ route('organizationInvite', ['id' => $organization->id]) }}" method="POST">
                    {!! csrf_field() !!}

                    <input type="email" class='form-control' name="email" placeholder='Email Address'><br>
                    <input type="submit" class='btn btn-success btn-outline' value="Add">
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
                <table class="table grid skinny">
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