<!-- -->
@extends('master')

@section('content')
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default panel-fs">

                        <div class="panel-heading">
                            <h3 class="panel-title">Login</h3>
                        </div>

                        <div class="panel-body">
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{!!$error!!}</p>
                            @endforeach
                            {!!Form::open(['url'=>'/login','class'=>'form form-vertical'])!!}
                            <div class="form-group">
                                {!! Form::label('email','Email:',['class'=>'control-label']) !!}
                                {!! Form::text('email',Input::old('email'),['class'=>'form-control']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('password','Password:',['class'=>'control-label']) !!}
                                {!! Form::password('password',['class'=>'form-control']) !!}
                            </div>
                            <div class="text-right">
                                {!!Form::submit('Login',['class'=>'btn btn-primary'])!!}
                            </div>
                            {!!Form::close()!!}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop