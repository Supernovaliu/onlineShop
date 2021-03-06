@extends('admin.public.admin')

@section('main')


<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">system management</a></li>
		<li class="active">ads list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">ads display</button>
			<a href="/admin/sys/ads/create" class="btn btn-success">add ads</a>

			<p class="pull-right tots" >total records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name="" id="">	</th>
			<th>ID</th>
			<th>IMG</th>
			<th>TITLE</th>
			<th>HREF</th>
			<th>SORT</th>

			<th>OPERATION</th>

			@foreach($data as $value)
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td>{{$value->id}}</td>
					<td><img width="200px" src="/Uploads/ads/{{$value->img}}" alt=""></td>
					<td>{{$value->title}}</td>
					<td>{{$value->href}}</td>
					<td>{{$value->sort}}</td>
					<td><a href="">delete</a><a href="">edit</a></td>

				</tr>
			@endforeach


		</table>

		<div class="panel-footer">


		</div>
	</div>
</div>
@endsection
