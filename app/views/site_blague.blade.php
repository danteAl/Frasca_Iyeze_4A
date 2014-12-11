<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="UTF-8">
	<title>Private Jokes </title>
	<link rel="icon" href="{{ asset('img/smiley.png') }}" type="image/png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.cs">
		{{ HTML::style('css/main.css') }}
	</head>
	<body>
		<div  class="container">
		<header  style="background-image:url('{{ asset('img/tete.jpg') }}')" class="jumbotron" id="entete">
			<h1>Bienvenue sur votre site de blague !</h1>
		</header>
		<nav class="navbar navbar-default">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					@yield('navigation')
				</ul>
			</div>
		</nav>
		<section class="row">
			@yield('content')
		</section>
		<ul class="pagination">
			@yield('content2')
		</ul>
		<hr>
		<footer>Project ESIEA</footer>
		</div>
		{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'); }}
		{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'); }}
	</body>
</html>