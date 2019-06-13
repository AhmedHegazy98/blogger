<div class="form-group {{ $errors->has('name') ? 'has-error':'' }}">
    {!! Form::label('name') !!}
    {!! Form::text('name',null,['class'=>'form-control']) !!}

    @if($errors->has('name'))
        <span class="help-block"> {{$errors->first('name')}} </span>
    @endif
    
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error':'' }} ">
    {!! Form::label('email') !!}
    {!! Form::email('email',null,['class'=>'form-control']) !!}

    @if($errors->has('email'))
        <span class="help-block"> {{$errors->first('email')}} </span>
    @endif

</div>

