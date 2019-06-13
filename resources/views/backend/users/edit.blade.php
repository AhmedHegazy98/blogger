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
                                'files' => TRUE
                            ]) !!}

                                @include('backend/users/form')
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
