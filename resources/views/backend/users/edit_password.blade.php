@extends('layouts.backend.main')

@section('title', 'Myusers | Edit user')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                users
                <small>Edit user</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/users') }}"> users</a></li>
                <li> Edit</li>
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
                                'method'=>'PUT',
                                'url' => ['backend/users',$users->id],
                            ]) !!}

                            <div class="form-group {{ $errors->has('old-password') ? 'has-error':'' }} ">
                                <input name="old-password" type="password" value="{{Auth::user()->password}}" id="old-password">

                                @if($errors->has('old-password'))
                                    <span class="help-block"> {{$errors->first('password')}} </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('new-password') ? 'has-error':'' }} ">
                                {!! Form::label('new-password') !!}<br>
                                {!! Form::password('new-password',null,['class'=>'form-control']) !!}

                                @if($errors->has('new-password'))
                                    <span class="help-block"> {{$errors->first('password')}} </span>
                                @endif
                            </div>

                            <div class="form-group {{ $errors->has('reset-new-password') ? 'has-error':'' }} ">
                                {!! Form::label('reset-new-password') !!}<br>
                                {!! Form::password('reset-password',null,['class'=>'form-control']) !!}

                                @if($errors->has('reset-password'))
                                    <span class="help-block"> {{$errors->first('password')}} </span>
                                @endif
                            </div>
                            <hr>
                            {!! Form::submit('Edit user',['class'=>'btn btn-primary']) !!}

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
