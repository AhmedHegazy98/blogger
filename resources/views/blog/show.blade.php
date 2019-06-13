@extends ('layouts.main')

@section('content')
    <div class="container">
        <div class="row">

            @include('layouts.Lsidebar')

                    <?php $currentUser = Auth::user() ?>
                    @if(isset($currentUser))
                    <div class="col-md-6">
                    @else
                    <div class="col-md-offset-1 col-md-7">
                    @endif
                    <article class="post-item post-detail">
                    <div class="post-item-image">
                        <img src="http://127.0.0.1:8000/{{$posts->image }}" alt="here">
                    </div>

                    <div class="post-item-body">
                        <div class="padding-10">
                            <h1>{{$posts->title}}</h1>

                            <div class="post-meta no-border">
                                <ul class="post-meta-group">
                                    <li><i class="fa fa-user"></i><a href="{{ route('auther', $posts->auther['id']) }}"> {{$posts->auther['name']}}</a></li>
                                    <li><i class="fa fa-clock-o"></i><time> {{$posts->date()}}</time></li>
                                    <li><i class="fa fa-tags"></i><a href="{{ route('category', $posts->category['id']) }}"> {{$posts->category['name']}}</a></li>
                                    <li><i class="fa fa-comments"></i><a href="#">{{$postComments->count()}} Comment</a></li>
                                </ul>
                            </div>

                            <p>{{ $posts->body }}</p>
                        </div>
                    </div>
                </article>


                
                <!-- Comments Here   -->
                @include('blog/comments')
            </div>


<div class="col-md-3">
    <aside class="right-sidebar">

        <!--  <div class="search-widget">
             <div class="input-group">
               <input type="text" class="form-control input-lg" placeholder="Search for...">
               <span class="input-group-btn">
                 <button class="btn btn-lg btn-default" type="button">
                     <i class="fa fa-search">Fa-S</i>
                 </button>
               </span>
             </div>
         </div> -->

        <div class="widget">
            <div class="widget-heading">
                <h4>Topics</h4>
            </div>
            <div class="widget-body">
                <ul class="categories">
                    @foreach ($categories as $category)
                        <li>
                            <a href="{{ route('category', $category->id) }}"><i class="fa fa-angle-right"></i> {{ $category->name }}</a>
                            <span class="badge pull-right">{{ $category->posts->count() }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Popular Article</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($arr_posts->slice(0, 4)->shuffle() as $post )
                        <li>
                            <div class="post-image">
                                <a href="#">
                                    <img src="/img/Post_Image_5_thumb.jpg" />
                                </a>
                            </div>
                            <div class="post-body">
                                <h6><a href="{{route('Blog.show',$post->id)}}">{{$post->title}}</a></h6>
                                <div class="post-meta">
                                    <span>{{$post->date()}}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="widget">
            <div class="widget-heading">
                <h4>Writers</h4>
            </div>
            <div class="widget-body">
                <ul class="popular-posts">
                    @foreach($users->slice(0, 4)->shuffle() as $user )
                        <li>
                            <div class="post-image">
                                <a href="#">
                                    <img src="/img/Post_Image_5_thumb.jpg" />
                                </a>
                            </div>
                            <div class="post-body">
                                <h6><a href="{{ route('auther', $user->id) }}"> {{$user->name }}</a></h6>
                                <div class="post-meta">
                                    <span>Follow +</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </aside>
</div>

        </div>
    </div>

@endsection

