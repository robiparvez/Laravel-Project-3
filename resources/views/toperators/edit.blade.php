@extends('layouts.app')


@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8">


			<div class="panel panel-default">
				<div class="panel-heading">Edit Operators</div>
					<div class="panel-body">

					{!! Form::model($toperators_edit, ['route' => ['toperators.update', $toperators_edit->id], 'method' => 'PUT', 'files' => true]) !!}

					{!! Form::label('name', 'Name: ', []) !!}
					{!! Form::text('name', null, ['class' => 'form-control',]) !!}


					{!! Form::label('address', 'Address: ', ['style'=> 'margin-top: 20px;']) !!}
					{!! Form::text('address', null, ['class' => 'form-control']) !!}

					<div class="form-group">
						{!! Form::label('password', 'Password: ', ['style'=> 'margin-top: 20px;']) !!}
						<input type="password" name="password" value="{{ $toperators_edit->password }}" class="form-control" >
					</div>

					{!! Form::label('logo', 'Update Logo: ', []) !!}
					{{ Form::file('logo', null) }}

					{!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block', 'style'=> 'margin-top: 30px;']) !!}

					{{ Html::linkRoute('toperators.index', 'Cancel', array($toperators_edit->id),array('class' => 'btn btn-primary btn-block')) }}
					</div>
					<a href="{{ route('toperators.index') }}" class="btn btn-default btn-block btn-h1-spacing"><b>Show All Operators</b></a>
			</div>
			{!! Form::close() !!}
		</div>
		{{-- <div class="col-md-4">
			<div class="well">
				<hr>

				<div class="row">
					<div class="col-sm-6">
					</div>


					<div class="col-sm-6">
					</div>

					<div class="row">
						<div class="col-md-12">
						</div>
					</div>
				</div>
			</div>
		</div> --}}
	</div>
</div>

@endsection