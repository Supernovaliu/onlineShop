@extends('admin.public.admin')

@section('main')
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">order management</a></li>
		<li class="active">order list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">order information</button>

		</div>
		<table class="table-bordered table table-hover">
			<tr>
				<td>name</td>
				<td>{{$data->sname}}</td>
			</tr>
			<tr>
				<td>phone</td>
				<td>{{$data->stel}}</td>
			</tr>
			<tr>
				<td>address</td>
				<td>{{$data->addr}}</td>
			</tr>
			<tr>
				<td>information</td>
				<td>{{$data->addrInfo}}</td>
			</tr>

			<tr>
				<td>email</td>
				<td>{{$data->email}}</td>
			</tr>

		</table>
		<!-- pagination -->
		<div class="panel-footer">

		</div>
	</div>
</div>
@endsection
