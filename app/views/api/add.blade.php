@extends('site_blague')
 
@include('navigation')
 
@section('content')

@if($errors->has('title'))
	<div class="col-md-12">
    	<div class="alert alert-danger">
  			{{ $errors->first('title') }}
   		</div>
	</div>
@endif
    
@if($errors->has('story'))
	<div class="col-md-12">
    	<div class="alert alert-danger">
    		{{ $errors->first('story') }}
    	</div>
    </div>
@endif

<div class="col-md-12">
	<div class="well">
      {{ Form::open(array('url' => 'api/addJoke')) }}
      		{{ Form::label('category', 'Categorie de votre blague :') }}
	        <select name="catego">
			    @foreach($categories as $category)
			    	<option value="{{ $category->id }}">{{ $category->category }}</option>
			    @endforeach
			</select>
			<br/>
            {{ Form::label('title', 'Titre de votre blague :') }}
            {{ Form::text('title', '', $attributes = array('class' => 'form-control')) }}
            {{ Form::label('story', 'L\'histoire de votre blague :') }}
            {{ Form::textarea('story', '', $attributes = array('class' => 'form-control')) }}
            <br/>
            {{ Form::submit('Ajouter', array('class' => 'btn btn-default')) }}
            {{ Form::close() }}
	</div>
</div>
<br/>

@stop