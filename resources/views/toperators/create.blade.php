@extends('layouts.app')


{{-- @section('title' | 'Create') --}}


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div align="center" class="panel-heading">
                    Create a Tour Operator
                </div>
                    {!! Form::open(array('route' => 'toperators.store', 'method' => 'POST', 'files' => true)) !!}
                    <div class="panel-body">

                            <div class="form-group">
                                    {!! Form::label('name', 'Name: ', []) !!}
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('password', 'Password: ', []) !!}
                                    {!! Form::password('password', null, ['class' => 'form-control']) !!}
                            </div>

                            <div class="form-group">
                                    {!! Form::label('address', 'Address: ', []) !!}
                                    {!! Form::text('address', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                    {!! Form::label('logo', 'Upload logo: ', []) !!}
                                    {!! Form::file('logo', []) !!}
                            </div>
                            {!! Form::submit('Save Changes', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) !!}
                    </div>
                    {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection

{{--  <div class="form-group">
        <label for="password">
            Password:
        </label>
        <input class="form-control" id="password" name="password" type="password">
        </input>
    </div> --}}