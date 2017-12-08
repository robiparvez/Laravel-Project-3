@extends('layouts.app')

@section('content')

<div class="container">

    @if(Session::has('store_msg'))
        <div class="alert alert-info">
            {{Session::get('store_msg')}}
        </div>
    @elseif(Session::has('update_msg'))
        <div class="alert alert-info">
            {{Session::get('update_msg')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>
                            Name
                        </th>
                        <th>
                            Address
                        </th>
                        <th>
                            Logo
                        </th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($toperators_show as $t_op)
                    <tr>
                        <td>
                            {{ $t_op->name }}
                        </td>
                        <td>
                            {{ $t_op->address }}
                        </td>
                        <td>
                            <img hspace="50" src="{{ asset('images/'.$t_op->logo)}}"/>
                        </td>
                    </tr>
                    @endforeach --}}
                     <tr>
                        <td>
                            {{ $toperators_show->name }}
                        </td>
                        <td>
                        {{ $toperators_show->address }}
                        </td>
                        <td>
                            <img hspace="50" src="{{ asset('images/'.$toperators_show->logo)}}"/>
                        </td>
                    </tr>


                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <div class="well">
                    <hr>
                    <div class="row">
                        <div class="col-sm-6">
                            {{ Html::linkRoute('toperators.edit', 'Edit', array($toperators_show->id), ['class' => 'btn btn-primary btn-block'])  }}
                        </div>

                        <div class="col-sm-6">
                            {!! Form::open(array('route' => ['toperators.destroy', $toperators_show->id] , 'method' => 'DELETE' )) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-success btn-block']) !!}
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('toperators.index') }}" class="btn btn-default btn-block btn-h1-spacing">Show All Operators</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
