@extends('layouts.app')

@section('content')
	<div class="container">

		@if (Session::has('update_msg'))
			<div class="alert alert-info">
				{{ Session::get('update_msg') }}
			</div>
		@elseif(Session::has('store_msg'))
			<div class="alert alert-info">
				{{ Session::get('store_msg') }}
			</div>
		@endif

		<div class="row">
			<div class="col-md-8">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Address</th>
								<th>Phone</th>
								<th>Image</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $showTour->name }}</td>
								<td>{{ $showTour->description }}</td>
								<td>{{ $showTour->address }}</td>
								<td>{{ $showTour->phone }}</td>
								<td><img src="{{ asset('images/'. $showTour->image) }}" height="100" width="100"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<div class="col-sm-6">
							{{ Html::linkRoute('tours.edit', 'Edit', array($showTour->id), ['class' => 'btn btn-primary btn-block']) }}
						</div>
						<div class="col-sm-6">
							{!! Form::open( ['route' => ['tours.destroy',$showTour->id], 'method' => 'DELETE']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
							{!! Form::close() !!}
						</div>

						<div class="row">
							<div class="col-md-12">
								<hr>
								<a href="{{ route('tours.index') }}" class="btn btn-default btn-block">Show All Tours</a>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection