@extends('layouts.backend.main')

@section('title', 'Mycategories | Edit category')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                categories
                <small>Edit Category</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/categories') }}"> categories</a></li>
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
                            {!! Form::model($categories,[
                                'method'=>'PUT',                                
                                'url' => ['backend/categories',$categories->id],
                                'files' => TRUE
                            ]) !!}
                                
                                @include('backend/categories/form')
                                <hr>
                                {!! Form::submit('Edit Category',['class'=>'btn btn-primary']) !!}

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
