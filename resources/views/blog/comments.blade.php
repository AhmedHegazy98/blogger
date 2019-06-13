<article class="post-comments">
    <h3><i class="fa fa-comments"></i> {{$postComments->count()}} Comment</h3>

    <div class="comment-body padding-10">
        <ul class="comments-list">
           @foreach($postComments as $comment)
                <li class="comment-item">
                    <div class="comment-heading clearfix">
                        <div class="comment-author-meta">
                            <h4>{{ $comment->auther_name }} <small>{{$comment->created_at->diffForHumans() }}</small></h4>
                        </div>
                    </div>
                    <div class="comment-content">
                        {!! $comment->body !!}
                    </div>
                </li>
            @endforeach
           
        </ul>
    </div>

<!-- Leave acomment form -->
    <div class="comment-footer padding-10">
        <h3>Leave a comment</h3>

            {!! Form::open(['url' => ["blog/$posts->id/comments"]]) !!}

                @if(Auth::user())
                <input type="hidden" name="auther_name" type="text" value="{{Auth::user()->name}}">
                @else
                 <input type="hidden" name="auther_name" type="text" value="visitor">
                @endif

                <div class="form-group required {{ $errors->has('body') ? 'has-error' : '' }}">
                    <label for="comment">Comment</label>
                    {!! Form::textarea('body', null, ['row' => 6, 'class' => 'form-control']) !!}
                    @if($errors->has('body'))
                        <span class="help-block">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="clearfix">
                    <div class="pull-left">
                        @if(Auth::user())
                            <button type="submit" class="btn btn-lg btn-success">Submit</button>
                        @else
                            <button class="btn btn-lg btn-success"><a href="{{url('/login')}}">Submit</a></button>
                        @endif
                    </div>
                    <div class="pull-right">
                        <p class="text-muted">
                            <span class="required">*</span>
                            <em>Indicates required fields</em>
                        </p>
                    </div>
                </div>
            {!! Form::close() !!}
    </div>
</article>

<!-- end Leave acomment form -->
