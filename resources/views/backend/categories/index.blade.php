@extends('layouts.backend.main')

@section('title', 'MyCategories | Categories index')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Categories
                <small>Display All Categories</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/categories') }}">Categories</a></li>
                <li> All Categories</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{ url('backend/categories/create') }}" class="btn btn-success"> Add New</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">

                            <!-- Messages  -->
                            @include('backend/categories/message')

                            <table class="table table-borderd ">
                            	<thead>
                            		<tr>
                            			<td width="100">Action</td>
                            			<td width="100">Name</td>
                            			<td width="90">Post Count</td>
                            		</tr>
                            	</thead>
                            
                            <tbody>
                            	@foreach($categories as $category)
	                            	<tr>
	                            		<td>
                                            {!! Form::open(['method'=>'DELETE','url'=>["/backend/categories/$category->id"]]) !!}
    	                            			<a href='{{ url("/backend/categories/$category->id/edit") }}' class="btn btn-xs btn-default">
    	                            				<i class="fa fa-edit"></i>
    	                            			</a>
    	                            			<button type="submit" class="btn btn-xs btn-danger">
    	                            				<i class="fa fa-times"></i>
    	                            			</button>
                                            {!! Form::close() !!}
	                            		</td>
                                        <td> {{$category->name}}</td>
	                            		<td>{{$category->posts->count()}}</td>
	                            	</tr>
                            	@endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                    
                        	<div class="pull-right">
                        		<small>{{$category->count()}} item</small>
                        	</div>
                        </div>
                        
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>

@endsection
