<div class="form-group {{ $errors->has('title') ? 'has-error':'' }}">
    {!! Form::label('title') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}

    @if($errors->has('title'))
        <span class="help-block"> {{$errors->first('title')}} </span>
    @endif
</div>
<div class="form-group {{ $errors->has('body') ? 'has-error':'' }}">
    {!! Form::label('body') !!}
    {!! Form::textarea('body',null,['class'=>'form-control']) !!}

    @if($errors->has('body'))
        <span class="help-block"> {{$errors->first('body')}} </span>
    @endif
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error':'' }} ">
    {!! Form::label('category_id','Category') !!}
    {!! Form::select('category_id', App\Category::pluck('name','id'), null,['class'=>'form-control','placeholder'=>'Choose category']) !!}

    @if($errors->has('category_id'))
        <span class="help-block"> {{$errors->first('category_id')}} </span>
    @endif

</div>
<div class="form-group {{ $errors->has('status') ? 'has-error':'' }} ">
    <label for="status">Status</label>
    <select class="form-control" id="status" name="status">
        @if($post->status == 0)
            <option value="0">public</option>
            <option value="1">private</option>
        @else
            <option value="1">private</option>
            <option value="0">public</option>
        @endif
    </select>

    @if($errors->has('status'))
        <span class="help-block"> {{$errors->first('status')}} </span>
    @endif
</div>

<div class="fileinput fileinput-new {{ $errors->has('image') ? 'has-error':'' }} " data-provides="fileinput">
    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
        @if($page_name ='Edit post')
            <img src="http://127.0.0.1:8000/{{$post->image}}">
        @elseif($page_name ='create post')
            <img src="https://www.ekahiornish.com/wp-content/uploads/2018/07/default-avatar-profile-icon-vector-18942381.jpg">
        @endif
    </div>
    <div>
        <span class="btn btn-default btn-file">
            <span class="fileinput-new">Change</span>
            <span class="fileinput-exists">Image</span>
            <input type="file" name="image">
        </span>
    </div>

    @if($errors->has('image'))
        <span class="help-block"> {{$errors->first('image')}} </span>
    @endif
</div>
