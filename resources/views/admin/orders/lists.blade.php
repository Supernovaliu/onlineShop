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
			<th>product name</th>
			<th>product picture</th>
			<th>price</th>
			<th>quantity</th>
			<th>sum</th>

			<?php

			$number=0;
			$money=0;
			 ?>
			@foreach($data as $value)
			<tr>
				<td>{{$value->title}}</td>
				<td>
					<img width="200px" src="/Uploads/goods/{{$value->img}}" alt="">
				</td>
				<td>{{$value->price}}</td>
				<td>{{$value->num}}</td>
				<td>{{$value->price*$value->num}}</td>
				<?php
					$number+=$value->num;

					$money+=$value->price*$value->num;
				 ?>
			</tr>


			@endforeach

			<tr>
				<td>total</td>
				<td>price：</td>
				<td>{{$money}}</td>
				<td>quantity：</td>
				<td>{{$number}}</td>
			</tr>



		</table>

		<div class="panel-footer">

		</div>
	</div>
</div>
@endsection
