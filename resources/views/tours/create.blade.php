@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">

<div class="panel panel-primary">

<div class="panel-heading">New Tour</div>

{!! Form::open(array('route' => 'tours.store', 'method' => 'POST', 'files' => true)) !!}
<div class="panel-body">

	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <strong>Whoops!</strong> There were some problems with your input.
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	{!! Form::label('name', 'Name: ', []) !!}
	{!! Form::text('name', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('name'))
		    <span class="help-block">
		        <strong>{{ $errors->first('name') }}</strong>
		    </span>
		@endif

	{!! Form::label('description', 'Description', ['class' => 'form-spacing-top']) !!}
	{!! Form::text('description', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('description'))
		    <span class="help-block">
		        <strong>{{ $errors->first('description') }}</strong>
		    </span>
		@endif

	{!! Form::label('address', 'Address: ', ['class' => 'form-spacing-top']) !!}
	{!! Form::text('address', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('address'))
		    <span class="help-block">
		        <strong>{{ $errors->first('address') }}</strong>
		    </span>
		@endif

	{!! Form::label('phone', 'Phone: ', ['class' => 'form-spacing-top']) !!}
	{!! Form::number('phone', null, ['class' => 'form-control input-sm']) !!}
		@if ($errors->has('phone'))
		    <span class="help-block">
		        <strong>{{ $errors->first('phone') }}</strong>
		    </span>
		@endif

	{!! Form::label('image', 'Update Logo', ['class' => 'form-spacing-top']) !!}
	{!! Form::file('image', ['class' => 'form-control']) !!}
		@if ($errors->has('image'))
		    <span class="help-block">
		        <strong>{{ $errors->first('image') }}</strong>
		    </span>
		@endif

	{!! Form::label('toperator_id', 'Select Operator', ['class' => 'form-spacing-top']) !!}
	{!! Form::select('toperator_id',array_merge(['0' => 'Please Select'], $topArray), null, ['class' => 'form-control']) !!}
		@if ($errors->has('toperator_id'))
		    <span class="help-block	">
		        <strong>{{ $errors->first('toperator_id') }}</strong>
		    </span>
		@endif

	{!! Form::submit('Save', ['class' => 'btn btn-success btn-block btn-h1-spacing']) !!}
{!! Form::close() !!}

</div>

</div>

</div>
</div>
</div>
@endsection