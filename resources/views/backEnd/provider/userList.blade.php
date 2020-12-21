@extends('backEnd.provider.layout.main')
@section('panel-title')
User List
@endsection
@section('content')
	

	<div class="panel panel-flat">
	<div class="panel-body">
		The <code>Responsive</code> extension for DataTables can be applied to a DataTable in one of two ways; with a specific <code>class name</code> on the table, or using the DataTables initialisation options. This method shows the latter, with the <code>responsive</code> option being set to the boolean value <code>true</code>. The <code>responsive</code> option can be given as a boolean value, or as an object with configuration options.
	</div>
		<table class="table datatable-responsive" id="data-table-load">
			<thead>
				<tr>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Job Title</th>
					<th>DOB</th>
					<th>Status</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
@endsection
