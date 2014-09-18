<!-- app/view/crud/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
 	<title>crud with laravel</title>
 	{{ HTML::style('public/assets/css/bootstrap.min.css') }}
 </head>
 <body>
 <div class="container">
 <nav class="navbar navbar-inverse">
 	<div class="navbar navbar-header">
 		<a class="navbar-brand" href="{{ URL::to('crud') }}">Crud</a>
 	</div>
 	<ul class="nav navbar-nav">
 	<li><a href="{{ URL::to('crud') }}">View All</a></li>
 	<li><a href="{{ URL::to('crud/create') }}">Create</a></li>
 	</ul>
 </nav>
<h1>Create</h1>

{{ HTML::ul($errors->all() ) }}

{{ Form::open(array('url' => 'crud')) }}

	<div class="form-group">
		{{ Form::label('nama', 'Name') }}
		{{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('nerd_level', 'Level') }}
		{{ Form::select('nerd_level', array('0' => 'Select a Level', '1' => 'Sees Sunlight', '2' => 'Foosball Fanatic', '3' => 'Basement Dweller'), Input::old('nerd_level'), array('class' => 'form-control')) }}
	</div>	

	{{ Form::submit('Create!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
