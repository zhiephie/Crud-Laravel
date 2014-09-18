<!-- app/views/crud/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>crud with laravel</title>
 	{{ HTML::style('public/assets/css/bootstrap.min.css') }}
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
	<div class="navbar-header">
	  <a class="navbar-brand" href="{{ URL::to('crud') }}">Crud</a>
	</div>
	<ul class="nav navbar-nav">
	   <li><a href="{{ URL::to('crud') }}">View All</a></li>
	   <li><a href="{{ URL::to('crud/create') }}">Create</a></li>
	</ul>
    </nav>

<h1>Showing {{ $crud->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $crud->email }}</h2>
		<p>
		<strong>Email:</strong> {{ $crud->email }}<br>
		<strong>Level:</strong> {{ $crud->nerd_level }}
		</p>
	</div>
</div>
</body>
</html>
