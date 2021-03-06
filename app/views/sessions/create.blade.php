@extends('layouts.default')

@section('content')
	<h1>Sign in</h1>


	{{ Form::open(['route' => 'Login_path']) }}

		<div class="form-group">
			{{ Form::label('email', 'Email:')}}
			{{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>


		<div class="form-group">
			{{ Form::label('password', 'Password:')}}
			{{ Form::password('password', null, ['class' => 'form-control', 'required' => 'required']) }}
		</div>


		<div class="form-group">
			{{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
		</div>

	{{ Form::close() }}
@stop