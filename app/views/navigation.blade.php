@section('navigation')
 
<li>{{ link_to_route('accueil', 'Accueil', null, ($actif == 0)? array('class' => 'actif'): null) }}</li>
  
<li>{{ link_to('top10', 'Top 10', ($actif == -2)? array('class' => 'actif'): null) }}</li>

<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories<span class="caret"></span></a>
	<ul class="dropdown-menu" role="menu">
	@foreach ($categories as $categorie)
		<li>{{ link_to('cat/'.$categorie->id, $categorie->category, ($actif == $categorie->id)? array('class' => 'actif'): null) }}</li>
	@endforeach
	</ul>
</li>

	@if (Auth::check())
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mon Compte<span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li>{{ link_to('myJokes', 'Mes Blagues', ($actif == -4)? array('class' => 'actif'): null) }}</li>
				<li>{{ link_to('api/newJoke', 'Ajouter une blague', ($actif == -3)? array('class' => 'actif'): null) }}</li>
			</ul>
		</li>
   		<li>{{ link_to('auth/logout', 'Deconnexion') }}</li>
	@else
    	<li>{{ link_to('auth/login', 'Connexion', ($actif == -1)? array('class' => 'actif'): null) }}</li>
	@endif

@stop