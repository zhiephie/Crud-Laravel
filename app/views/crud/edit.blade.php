<!-- app/views/crud/edit.blade.php -->

<DOCTYPE html>
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

<h1> Edit {{ $crud->name }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($crud, array('route' => array('crud.update', $crud->id), 'method' => 'PUT')) }}

	<div class="form-group">
	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
	{{ Form::label('email', 'Email') }}
	{{ Form::email('email', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
	{{ Form::label('nerd_level', 'Level') }}
	{{ Form::select('nerd_level', array('0' => 'Select a level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), null, array('class' => 'form-control')) }}
	</div>

{{ Form::submit('Edit!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
