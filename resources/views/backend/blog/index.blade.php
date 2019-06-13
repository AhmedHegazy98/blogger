@extends('layouts.backend.main')

@section('title', 'MyBlog | blog index')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blog
                <small>Display All Blog Posts</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                   <a href="{{ url('/home') }}"> <i class="fa fa-dashboard"></i> Dashboard</a>
                </li>
                <li class="active"><a href="{{ url('/backend/blog') }}">Blog</a></li>
                <li> All Posts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <div class="pull-left">
                                <a href="{{ url('backend/blog/create') }}" class="btn btn-success"> Add New</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body ">

                            <!-- Messages  -->
                            @include('backend/blog/message')
                             @if(! $posts->count())
                                <div class="alert alert-info">
                                    <p>NoThing Found</p>
                                </div>
                            @else
                            <table class="table table-borderd ">
                            	<thead>
                            		<tr>
                            			<td width="80">Action</td>
                            			<td width="120">Title</td>
                            			<td width="120">Author</td>
                            			<td width="150">Category</td>
                            			<td width="100">Date</td>
                            		</tr>
                            	</thead>
                            
                            <tbody>
                            	@foreach($posts as $post)
	                            	<tr>
	                            		<td>
                                            {!! Form::open(['method'=>'DELETE','url'=>["/backend/blog/$post->id"]]) !!}
    	                            			<a class="btn btn-xs btn-success" href='{{ url("/backend/blog/$post->id/edit") }}' class="btn btn-xs btn-default">
    	                            				<i class="fa fa-edit"></i>
    	                            			</a>
                                                @if ($post->provement == 0)
                                                    <a class="btn btn-xs btn-info" href='{{ url("/backend/provementt/$post->id") }}' class="btn btn-xs btn-default">
                                                    <i class="fa fa-success">AP</i>
                                                    </a>
                                                @endif 
    	                            			<button type="submit" class="btn btn-xs btn-danger">
    	                            				<i class="fa fa-times"></i>
    	                            			</button>
                                            {!! Form::close() !!}
	                            		</td>
                                        <td> {{$post->title}}</td>
	                            		<td>{{$post->Auther['name']}}</td>
	                            		<td> {{$post->category['name']}}</td>
	                            		<td>{{$post->created_at}}</td>
	                            	</tr>
                            	@endforeach
                                
                            </tbody>
                        </table>
                        @endif
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
