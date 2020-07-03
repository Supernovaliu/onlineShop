@extends('admin.public.admin')

@section('main')
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">category management</a></li>
		<li class="active">category list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> batch delete</button>
			<a href="/admin/types/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add category</a>

			<p class="pull-right tots" >total 10 records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table style="word-wrap:break-word;word-break:break-all;" width="100px"; class="table-bordered table table-hover">
			<th><input type="checkbox" name="" id=""></th>
			<th>ID</th>
			<th>NAME</th>
			<th>Title</th>
			<th>KeyWord</th>
			<th>Description</th>
			<th>ADD BRANCH</th>
			<th>node</th>
			<th>OPERATION</th>

			@foreach($data as $value)
			<tr>
				<td><input type="checkbox" name="" id=""></td>
				<td>{{$value->id}}</td>

				<?php

					$arr=explode(',',$value->path);

					$tot=count($arr)-2;

				 ?>
				<td>{{str_repeat("|====",$tot)}}{{$value->name}}</td>
				<td>{{$value->title}}</td>
				<td>{{$value->keywords}}</td>
				<td>{{$value->description}}</td>
				@if($tot>=2)
					<td><a href="javascript:;">add branch</a></td>

				@else
					<td><a href="/admin/types/create?pid={{$value->id}}&path={{$value->path}}{{$value->id}},">add branch</a></td>

				@endif

				@if($value->is_lou)
					<td><span class="btn btn-success">yes</span></td>

				@else
					<td><span class="btn btn-danger">no</span></td>

				@endif
				<td><a href="/user/admin/1/edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="del({{$value->id}})" class="glyphicon glyphicon-trash"></a></td>
			</tr>
			@endforeach


		</table>
		<!-- pagination -->
		<div class="panel-footer">
			<nav style="text-align:center;">
				<ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul>
			</nav>

		</div>
	</div>
</div>
<script>

	// delete data
	function del(id){



		if (confirm("Are you sure to delete?")) {
			// send post request
			$.post("/admin/types/"+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){

				if (data==1) {
					window.location.reload();
				};

			})
		};

	}
</script>
@endsection
