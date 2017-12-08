@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
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

			<div class="panel panel-primary">
				<div class="panel-heading">Edit Tour</div>
				<div class="panel-body">
					{!! Form::model($editTour, ['route' => ['tours.update', $editTour->id], 'method' => 'PUT', 'files' => true]) !!}

						{!! Form::label('name', 'Name: ', []) !!}
						{!! Form::text('name', null, ['class' =>'form-control input-sm']) !!}

						{!! Form::label('description', 'Description: ', ['class' => 'form-spacing-top']) !!}
						{!! Form::text('description', null, ['class' =>'form-control input-sm']) !!}

						{!! Form::label('address', 'Address: ', ['class' => 'form-spacing-top']) !!}
						{!! Form::text('address', null, ['class' => 'form-control input-sm']) !!}

						{!! Form::label('phone', 'Phone: ', ['class' => 'form-spacing-top']) !!}
						{!! Form::number('phone', null, ['class' => 'form-control input-sm']) !!}

						{!! Form::label('image', 'Update Image: ', ['class' => 'form-spacing-top']) !!}
						{!! Form::file('image', null, ['class' => 'form-control']) !!}

						{!! Form::label('toperator_id', 'Operator Name: ', ['class' => 'form-spacing-top']) !!}
						{!! Form::select('toperator_id', array_merge(['0' => 'Select Operator'], $editOperatorArray), null, ['class' => 'form-control']) !!}

						{{-- submit --}}
						{!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block form-spacing-top']) !!}
					{!! Form::close() !!}

					{{-- Cancel Edit --}}
					{{ Html::linkRoute('tours.index', 'Cancel Edit', array($editTour->id), ['class' => 'btn btn-danger btn-block btn-h1-spacing']) }}
				</div>
			</div>
		</div>

		{{-- <div class="col-md-4">
			<div class="well">
				<div class="row">
					<div class="col-md-12">

					</div>
				</div>
			</div>
		</div> --}}
	</div>
</div>
@endsection