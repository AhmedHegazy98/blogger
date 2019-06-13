@extends('layouts.backend.main')

@section('title', 'Myusers | Add new user')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                users
                <small>Add new user</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/users') }}"> users</a></li>
                <li> Add new</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body ">
                            {!! Form::model($users,[
                                'method'=>'POST',                                
                                'url' => 'backend/users',
                                'files' => TRUE
                            ]) !!}

                            <div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
                                {!! Form::label('name') !!}
                                {!! Form::text('name',null,['class'=>'form-control']) !!}

                                @if($errors->has('name'))
                                    <span class="help-block"> {{$errors->first('name')}} </span>
                                @endif

                            </div>
                            <div class="form-group {{ $errors->has('email') ? 'has-error':'' }} ">
                                {!! Form::label('email') !!}
                                {!! Form::email('email',null,['class'=>'form-control']) !!}

                                @if($errors->has('email'))
                                    <span class="help-block"> {{$errors->first('email')}} </span>
                                @endif

                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error':'' }} ">
                                {!! Form::label('password') !!}
                                <input name="password" type="password"  id="password">

                                @if($errors->has('password'))
                                    <span class="help-block"> {{$errors->first('password')}} </span>
                                @endif
                            </div>



                            <hr>
                                {!! Form::submit('Create new user',['class'=>'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
