@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (Session::has('delete_msg'))
                <div class="alert alert-info">
                    {{ Session::get('delete_msg')}}
                </div>
            @endif
        	<a class="btn btn-success btn-block" href="{{ route('tours.create') }}">Create a Tour</a>
        	<hr>
        	<fieldset class="btn btn-default btn-block disable-pointer-hover"><strong>ALL TOURS</strong></fieldset>

            <table class="table table-striped table-hover">
            	<thead>
            		<tr>
            			<th>Name</th>
            			<th>Description</th>
            			<th>Address</th>
            			<th>Phone</th>
            			<th>Image</th>
            			<th>Action</th>
            		</tr>
            	</thead>
            	<tbody>
            		@foreach ($indexTour as $i_tour)
            		<tr>
            			<td>{{ $i_tour->name }}</td>
            			<td>{{ $i_tour->description }}</td>
            			<td>{{ $i_tour->address }}</td>
            			<td>{{ $i_tour->phone }}</td>
            			<td><img height="100" src="{{ asset('images/'. $i_tour->image) }}" width="100"/></td>
            			<td>

                            {!! Form::open(['route' => ['tours.destroy', $i_tour->id], 'method' => 'DELETE']) !!} {{-- place hte 'form open' at the beginning of <td> for placing delete button on this cell  --}}
                                {{ Html::linkRoute('tours.show', 'View', array($i_tour->id), array('class' => 'btn btn-xs btn-info')) }}
                                |
                                {{ Html::linkRoute('tours.edit', 'Edit', array($i_tour->id), array('class' => 'btn btn-xs btn-primary')) }}
                                |
                                {!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
            		</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection
