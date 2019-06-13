@extends('layouts.backend.main')

@section('title', 'Myusers | User index')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users
                <small>Display All Users</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/users') }}">users</a></li>
                <li> All Users</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{ url('backend/users/create') }}" class="btn btn-success"> Add New</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">

                            <!-- Messages  -->
                            @include('backend/users/message')

                            <table class="table table-borderd ">
                            	<thead>
                            		<tr>
                            			<td width="80">Action</td>
                            			<td width="120">Name</td>
                                        <td width="100">Email</td>
                            			<td width="100">Post Count</td>
                            		</tr>
                            	</thead>
                            
                            <tbody>
                            	@foreach($users as $user)
	                            	<tr>
	                            		<td>
                                            {!! Form::open(['method'=>'DELETE','url'=>["/backend/users/$user->id"]]) !!}
    	                            			<a href='{{ url("/backend/users/$user->id/edit") }}' class="btn btn-xs btn-default">
    	                            				<i class="fa fa-edit"></i>
    	                            			</a>
    	                            			<button type="submit" class="btn btn-xs btn-danger">
    	                            				<i class="fa fa-times"></i>
    	                            			</button>
                                            {!! Form::close() !!}
	                            		</td>
                                        <td> {{$user->name}}</td>
	                            		<td> {{$user->email}}</td>
	                            		<td>{{$user->posts->count()}}</td>
	                            	</tr>
                            	@endforeach
                            </tbody>
                        </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                        	<!-- <div class="pull-left">
                        		<ul class="pagination ">
	                        		<li><a href="#">&laquo;</a></li>
	                        		<li><a href="#">1</a></li>
	                        		<li><a href="#">2</a></li>
	                        		<li><a href="#">3</a></li>
	                        		<li><a href="#">&raquo;</a></li>
	                        	</ul>
                        	</div> -->
                        	<div class="pull-right">
                        		<small>{{$user->count()}} item</small>
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
