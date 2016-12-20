<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login | Kawani Sarana Petualang</title>
    {{ Html::style(asset('css/bootstrap.min.css')) }}
    {{ Html::script(asset('js/jquery-2.2.3.min.js')) }}
    {{ Html::script(asset('js/bootstrap.min.js')) }}
	<style>
        body {
            background: rgba(95,95,95,1);
            font-size: 1.5em;
            font-family: verdana;
            margin-top: 13%;
        }
        .loading {
            background: lightgoldenrodyellow url('{{asset('images/processing.gif')}}') no-repeat center 65%;
            height: 80px;
            width: 100px;
            position: fixed;
            border-radius: 4px;
            left: 50%;
            top: 50%;
            margin: -40px 0 0 -50px;
            z-index: 2000;
            display: none;
        }
    </style>
</head>
<body>
    <div class="col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-2 col-xs-8">
        <div id="login" class="panel panel-primary">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-user"></span> Login
                @if(Session::has('message'))
                    <span class="label label-danger">{{ Session::get('message') }}</span>
                @endif
            </div>
            <div class="panel-body bg-warning">
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
                        <div class="col-lg-offset-1 col-lg-5">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('remember') }} Remember Me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-4">
                            {{ Form::submit('Login',['class' => 'btn btn-danger btn-block']) }}
                        </div>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
    <div class="loading"></div>
</body>
<script>
function ajaxLoad(filename, content) {
	content = typeof content !== 'undefined' ? content : 'content';
	$('.loading').show();
	$.ajax({
		type: "GET",
		url: filename,
		contentType: false,
		success: function (data) {
			$("#" + content).html(data);
			$('.loading').hide();
		},
		error: function (xhr, status, error) {
			alert(xhr.responseText);
		}
	});
}
</script>
</html>
