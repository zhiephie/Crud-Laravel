<!-- app/view/crud/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
	<title>crud with laravel</title>
{{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css') }}
{{ HTML::style('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css') }}
{{ HTML::script('//code.jquery.com/jquery-1.10.2.min.js') }}
{{ HTML::script('//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js') }}
{{ HTML::script('//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js') }}
<script type="text/javascript">
	$(document).ready( function () {
    $('#example').dataTable();
} );
</script>
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
<h1>All the crud</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Email</td>
			<td>Level</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
		@foreach($crud as $key => $value)
		<tr>
		<td>{{ $value->id }}</td>
		<td>{{ $value->name }}</td>
		<td>{{ $value->email }}</td>
		<td>{{ $value->nerd_level }}</td>
		<td>
			<!-- delete the nerd (uses the destroy method DESTROY /crud/{id} -->
			<!-- we will add this later since its a little more complicated than the other two buttons -->
			{{ Form::open(array('url' => 'crud/' . $value->id, 'class' => 'pull-right')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}
			<a class="btn btn-small btn-success" href="{{URL::to('crud/' . $value->id) }}">Show</a>
			<a class="btn btn-small btn-info" href="{{URL::to('crud/' . $value->id . '/edit') }}">Edit</a>
		</td>
		</tr>
		@endforeach
	</tbody>
</table>
<?php echo $crud->links(); ?>
</div>
</body>
</html>
