@extends('layouts.app')

@section('content')
<div class="container">

    <div class="messages">

            {{-- Delete flash --}}
            @if(Session::has('delete_message'))
                <div class="alert alert-success" id="deleteMessage">
                    {{ Session::get('delete_message') }}
                </div>
            @endif
            {{-- //Delete flash --}}
            @yield('content')
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a class="btn btn-success btn-block" href="{{ route('toperators.create') }}">
                Create an Operation
            </a>
        </div>

        <br><br><br><br>
        <div class="col-md-8 col-md-offset-2">
            <center class="btn btn-primary btn-block disable-pointer-hover" >
                 ALL OPERATIONS
            </center>
            <table class="table table-bordered" style="margin-top: 10px;">
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Address
                    </th>
                    <th>
                        logo
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($toperators_index as $operation)
                <tr>
                    <td>
                        {{ $operation->name }}
                    </td>
                    <td>
                        {{ $operation->address }}
                    </td>
                    <td>
                        <img height="50" src="{{ asset('images/' . $operation->logo ) }}" width="50"/>
                    </td>
                    <td>
                        {{ Html::linkRoute('toperators.show', 'View', array($operation->id), array('class' => 'btn btn-success btn-sm')) }}

                        {!! Form::open(['route' => ['toperators.destroy', $operation->id], 'method' => 'DELETE']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm', 'style="margin-top: 10px;"']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection





