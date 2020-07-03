@extends('admin.public.admin')

@section('main')
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">product management</a></li>
		<li class="active">modify product</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> product page</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> modify product</a>




		</div>
		<div class="panel-body">
			<form action="">
				<div class="form-group">
					<label for="">User</label>
					<input type="text" name="" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">PASS</label>
					<input type="password" name="" class="form-control" id="">
				</div>

				<div class="form-group">
					<input type="submit" value="submit" class="btn btn-success">
					<input type="reset" value="reset" class="btn btn-danger">
				</div>

			</form>
		</div>

	</div>
</div>
@endsection
