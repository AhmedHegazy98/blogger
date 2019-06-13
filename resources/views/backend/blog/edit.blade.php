@extends('layouts.backend.main')
@php($page_name ='Edit post')
@section('title', "MyBlog | $page_name")

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Edit post</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/blog') }}"> Blog</a></li>
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
                            {!! Form::model($post,[
                                'method'=>'PuT',                                
                                'url' => ['backend/blog',$post->id],
                                'files' => TRUE
                            ]) !!}
                                
                                @include('backend/blog/form')
                                <hr>
                                {!! Form::submit('Edit post',['class'=>'btn btn-primary']) !!}

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
