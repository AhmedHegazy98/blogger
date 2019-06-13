@extends('layouts.backend.main')

@section('title', 'MyBlog | Edit account')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                account
                <small>Edit account</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                 <li> Edit account</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        @include('backend/users/message')
                        <div class="box-body ">
                            {!! Form::model($users,[
                                'method'=>'PUT',                                
                                'url' => '/edit-account',
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
