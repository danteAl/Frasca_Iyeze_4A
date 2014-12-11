@extends('site_blague')
 
@include('navigation')
 
@section('content')
 
    <div class="col-md-12">
        <div class="well">
            <em class="pull-right">
                Ecrit par {{ $blague[0]->pseudo }} le {{date('d-m-Y',strtotime($blague[0]->created_at))}}
                <br/>
                <b><font size="6pt"> {{ $blague[0]->green }} </font></b>
                <a href="{{ url('api/like/'.$blague[0]->id) }}">
                {{ HTML::image('/img/vert.png', 'green like', array( 'width' => 50, 'height' => 50)) }}
                </a>
            </em>
            <h3>
                {{ $blague[0]->title }}
            </h3>
            <p>
                {{ nl2br($blague[0]->story) }}
            </p>
            @if (Auth::check() && $blague[0]->id_author == Auth::user()->id)
            	<em class="pull-right">
					<b><a href="{{ url('api/modifJoke/'.$blague[0]->id) }}">Modifier </a></b>
					ou 
					<b><a href="{{ url('api/deleteJoke/'.$blague[0]->id) }}">Supprimer</a></b>
				</em>
			@endif
        </div>
    </div>
 
@stop