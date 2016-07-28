@extends('layouts.app')
@section('title') Tambah User | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tambah Data
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('user/add/proses')]) }}
                    {{ Form::label('username','Username (untuk login)') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('username') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('username', '', ['autofocus' => 'autofocus', 'placeholder' => 'Username','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('nama','Nama') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('nama') }}</span>
                        <p></p>
                    @endif
                    {{ Form::text('nama', '', ['placeholder' => 'Nama','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('password','Password') }}
                    @if($errors->has())
                        <br />
                        <span class="label label-danger">{{ $errors->first('password') }}</span>
                        <p></p>
                    @endif
                    {{ Form::password('password', ['placeholder' => 'Password','class' => 'form-control']) }}
                    <br />
                    {{ Form::label('level','Level') }}
                    <?php
					$level = [
						'Kasir' => 'Kasir',
						'Gudang' => 'Gudang',
						'Staf' => 'Staf',
						'HRD' => 'HRD',
						'Keuangan' => 'Keuangan',
						'Direktur' => 'Direktur',
						'Admin' => 'Admin',
					];
					?>
                    {{ Form::select('level', $level, 'Kasir', ['class' => 'form-control']) }}
                    <br />
                    <div class="col-lg-offset-2">
                    	{{ Form::submit('Tambah Data', ['class' => 'btn btn-primary']) }} 
                        <button onclick="javascript:history.back()" class="btn btn-warning">Kembali</button>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@stop
