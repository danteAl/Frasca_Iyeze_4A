@extends('site_blague')
 
@include('navigation')
 
@section('content')
 
	@if (Session::has('flash_notice'))
        <div class="col-md-12">
            <div class="alert alert-success">
                {{ Session::get('flash_notice') }}
            </div>
        </div>
    @endif
    
    @if (Session::has('flash_error'))
        <div class="col-md-12">
            <div class="alert alert-danger">
                {{ Session::get('flash_error') }}
            </div>
        </div>
    @endif
    
	@for ($i = 0; $i < count($blagues); $i++)
		<div class="col-md-6">
			<h3>{{$blagues[$i]->title}}</h3>
			<p><b>{{ $blagues[$i]->green }}</b> {{ HTML::image('/img/vert.png', 'green like', array( 'width' => 30, 'height' => 30)) }}</p>
			<a class="btn btn-default" href="{{ url('blag/'.$actif.'/'.$blagues[$i]->id) }}">Histoire<span class="glyphicon glyphicon-play"></span></a>
		</div>
	@endfor
	
@stop

@section('content2')

 	<nav>
	@if (method_exists($blagues,'links'))
		{{$blagues->links()}}
	@endif
	<br/>
	</nav>
 
@stop