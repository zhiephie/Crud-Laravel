<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css">
<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
    $('#example').dataTable();
} );
</script>
<body>
<div class="container">			
<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th class="al-r">Actions</th>
		</tr>
	</thead>
	<tbody>
	@foreach($users as $key => $value)
		<tr class="odd gradeX">
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td class="al-r">edit delete</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
</body>
</html>