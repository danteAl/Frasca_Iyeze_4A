@extends('site_blague')
 
@include('navigation')
 
@section('content')
    <br>
    <div class="row col-md-12">
        @if (Session::has('flash_error'))
            <div class="col-md-7">
                <div class="alert alert-danger">
                    {{ Session::get('flash_error') }}
                </div>
            </div>
        @endif
        
        <div class="col-md-7">
            {{ Form::open(array('url' => 'auth/login', 'method' => 'POST', 'class' => 'form-horizontal well')) }}
            <div class="form-group">
                {{ Form::label('pseudo', 'Pseudo :', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-9">
                    {{ Form::text('pseudo', '', $attributes = array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Mot de passe :', array('class' => 'col-md-3 control-label')) }}
                <div class="col-md-9">
                    {{ Form::password('password', $attributes = array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="checkbox pull-right">
                {{ Form::checkbox('souvenir') }}Se rappeler de moi
            </div>
            <div class="form-group">
                <div class="col-md-offset-3 col-md-9">
                    {{ Form::submit('Se connecter', array('class' => 'btn btn-success')) }}
                    {{ link_to('remind/remind', 'Mot de passe oublie', array('class' => 'btn btn-success')) }}
                </div>
            </div>
            {{ Form::close()}}
        </div>
    </div>
    
    <div class="col-md-12">
    </br>
        Pour creer un nouveau coompte il vous suffit de cliquer sur ce bouton :
        {{ link_to('auth/inscription', 'S\'inscrire', array('class' => 'btn btn-info')) }}
    </div>
     
@stop