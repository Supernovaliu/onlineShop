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
			<button class="btn btn-danger">order display</button>

			<p class="pull-right tots" >total 10 records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>order number</th>
			<th>user</th>
			<th>receiver information</th>
			<th>status</th>
			<th>order time</th>
			<th>operation</th>

			@foreach($data as $value)
			<tr>
				<td><a href="/admin/orders/list?code={{$value->code}}">{{$value->code}}</a></td>
				<td>{{$value->name}}</td>
				<td>
					<a href="/admin/orders/addr?id={{$value->aid}}">receiver information</a>
				</td>
				<td>{{$value->ssname}}</td>
				<td>{{date("Y-m-d H:i:s",$value->time)}}</td>


				<td>
					@if($value->sid==6)
						<a href="javascript:;">edit status</a>
					@else
						<a href="/admin/orders/edit?sid={{$value->sid}}&code={{$value->code}}">edit status</a>
					@endif

				</td>
			</tr>


			@endforeach



		</table>

		<div class="panel-footer">

		</div>
	</div>
</div>
@endsection
