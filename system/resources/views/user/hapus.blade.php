@extends('layouts.app')
@section('title') Hapus User | @stop
@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Hapus Data
                </div>
                <div class="panel-body">
                    {{ Form::open(['url' => url('user/'.$users->id.'/delete/proses'), 'role' => 'form']) }}
                    {{ Form::hidden('id', $users->id) }}
                    {{ Form::label('username','Username (untuk login)') }}
                    {{ Form::text('username', $users->username, ['placeholder' => 'Username','class' => 'form-control','readonly' => 'readonly']) }}
                    <br />
                    {{ Form::label('nama','Nama') }}
                    {{ Form::text('nama', $users->nama, ['placeholder' => 'Nama','class' => 'form-control','readonly' => 'readonly']) }}
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
                    {{ Form::select('level', $level, $users->level, ['class' => 'form-control','readonly' => 'readonly']) }}
                    <br />
                    <div class="text-center">
                    	{{ Form::submit('Hapus Data', ['class' => 'btn btn-primary']) }}
                        <a href="{{url('user')}}" class="btn btn-warning">Kembali</a>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>

@stop
