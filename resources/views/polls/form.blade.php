@extends('layouts.master')

@section('content')
<form action='/organizations/{{$poll->organization_id}}/poll' method='POST'>
    {!! csrf_field() !!}
    @if($errors->any())
    <h4>{{$errors->first()}}</h4>
    @endif
    
    <div class="math">
    	<h1>Poll Creation</h1>
	</div>
    
    <p class="p-desc">When should the votes be in by?</p>
    <div class='input-group date'>
        <input id="datepicker" type='text' name='Poll[closed_by]' value="{{ $poll->closed_by }}" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    <script>
	  $(function() {
	    $( "#datepicker" ).datepicker();
	  });
    </script>
    <input id="poll_save" type='submit' value='Save' />
</form>
@endsection