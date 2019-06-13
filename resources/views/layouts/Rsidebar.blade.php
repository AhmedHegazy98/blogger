
<?php $currentUser = Auth::user() ?>
            @if(isset($currentUser))  
            <div class="col-md-3">
            @else  
            <div class="col-md-offset-1 col-md-3">
            @endif
    <aside class="right-sidebar">

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
                    @foreach($posts->slice(0, 4)->shuffle() as $post )
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
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </aside>
</div>
