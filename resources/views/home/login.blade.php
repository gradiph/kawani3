@extends('layouts.app')
@section('title') Login | @stop
@section('content')

<div class="col-lg-offset-4 col-lg-4">
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="glyphicon glyphicon-user"></span> Login
        </div>
        <div class="panel-body">
            {{ Form::open(['url' => url('login/proses'), 'role' => 'form']) }}
                <div class="form-group">
                    {{ Form::label('username','Username',['class' => 'control-label']) }}
                    @if($errors->has())
                        <span class="label label-danger">{{ $errors->first('username') }}</span>
                    @endif
                    {{ Form::text('username','',['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password','Password',['class' => 'control-label']) }}
                    @if($errors->has())
                        <span class="label label-danger">{{ $errors->first('password') }}</span>
                    @endif
                    {{ Form::password('password',['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        <div class="checkbox">
                            <label>
                                {{ Form::checkbox('remember') }} Remember Me
                            </label>
<!--
                            <label>
                            <input type="checkbox"> Remember me
                            </label>
-->
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-3 col-lg-9">
                        {{ Form::submit('Login',['class' => 'btn btn-primary']) }}
                    </div>
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop
