@extends('admin.public.admin')

@section('main')
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">user management</a></li>
		<li class="active">user list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">user display</button>

			<p class="pull-right tots" >total {{$tot}} records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>ID</th>
			<th>TEL</th>
			<th>EMAIL</th>
			<th>REGITIME</th>
			<th>STATUS</th>


			@foreach($data as $value)
			<tr>
				<td>{{$value->id}}</td>
				<td>{{$value->tel}}</td>
				<td>{{$value->email}}</td>
				<td>{{date('Y-m-d H:i:s',$value->time)}}</td>

				<!-- 0 1 2 -->

				@if($value->status==0)
					<td><span class="btn btn-primary">not activated</span></td>

				@elseif($value->status==1)
					<td><span class="btn btn-success">activated</span></td>

				@else
					<td><span class="btn btn-danger">black list</span></td>
				@endif
			</tr>

			@endforeach


		</table>
		<!-- pagination -->
		<div class="panel-footer">
			{{ $data->links() }}

		</div>
	</div>
</div>
@endsection
