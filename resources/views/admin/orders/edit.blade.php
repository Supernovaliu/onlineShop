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
			<button class="btn btn-danger">edit order status</button>

		</div>

		<div class="panel-body">
			<form action="" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">order number</label>
					<input class="form-control" type="text" name="" value="{{$_GET['code']}}" id="">
				</div>

				<div class="form-group">
					<label for="">order status</label>
					<select class="form-control"  name="sid" id="">
						@foreach($data as $value)
							@if($_GET['sid']==$value->id)
								<option selected value="{{$value->id}}">{{$value->name}}</option>
							@else
								<option value="{{$value->id}}">{{$value->name}}</option>

							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="submit">
				</div>
			</form>
		</div>

		<div class="panel-footer">

		</div>
	</div>
</div>
@endsection
