@extends ('layouts.main')

@section('content')
    <div class="container">
        <div class="row" id="content">

            @include('layouts.Lsidebar')
            <?php $currentUser = Auth::user() ?>
            @if(isset($currentUser))  
            <div class="col-md-6">
            @else  
            <div class="col-md-offset-1 col-md-7">
            @endif  
                @if(! $posts->count())
                    <div class="alert alert-info">
                        <p>NoThing Found</p>
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-info">
                        {{session('message')}}
                    </div>
                @endif
                <p><a href="{{ url('/backend/blog/create') }}" class="btn btn-primary">Write your blog post</a> </p>

            @foreach($posts as $post )
                    <article class="post-item">
                        <div class="post-item-image">
                            <a href="{{route('Blog.show',$post->id)}}">
                                <img src="{{$post->image}}" alt="">
                            </a>
                        </div>
                        <div class="post-item-body">
                            <div class="padding-10">
                                <h2><a href="{{route('Blog.show',$post->id)}}">{{$post->title}}</a></h2>
                            </div>
                            <div class="post-meta padding-10 clearfix">
                                <div class="pull-left">
                                    <ul class="post-meta-group">
                                        <li><i class="fa fa-user"></i><a href="{{route('auther', $post->auther['id'])}}">{{$post->auther['name']}}</a></li>
                                        <li><i class="fa fa-clock-o"></i><time>{{$post->date()}}</time></li>
                                        <li><i class="fa fa-tags"></i><a href="{{route('category', $post->category['id'])}}"> {{$post->category['name']}}</a></li>
                                        <li><i class="fa fa-comments"></i><a href="{{route('Blog.show',$post->id)}}">{{$post->comments->count()}} Comment</a></li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route('Blog.show',$post->id)}}">Continue Reading &raquo;</a>
                                </div>
                            </div>
                        </div>
                    </article>

                @endforeach
<!-- 
                <nav>
                    {{--<ul class="pager">--}}
                    {{--<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Newer</a></li>--}}
                    {{--<li class="next"><a href="#">Older <span aria-hidden="true">&rarr;</span></a></li>--}}
                    {{--</ul>--}}

                    {{--{{$posts->links()}}--}}

                </nav> -->
            </div>

            @include('layouts.Rsidebar')

        </div>
    </div>
@endsection

