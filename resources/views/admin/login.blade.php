<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login page</title>
	<link rel="stylesheet" href="../style/admin/bs/css/bootstrap.min.css">
	<script src="../style/admin/bs/js/jquery.min.js"></script>
	<script src="../style/admin/bs/js/bootstrap.min.js"></script>
	<style>
		.row{
			margin-top:200px;
		}
		.input-group{
			margin:10px 0px;
			width:100%;
			text-align:center;
		}

	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">
							backend login page
						</h3>
					</div>

					<div class="panel-body">
						<form action="../admin/check" method="post">
							{{csrf_field()}}
							<div class="input-group">
								<span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span></span>
								<input name="name" type="text" class="form-control" placeholder="Username">
							</div>

							<div class="input-group">
								<span class="input-group-addon"> <span class="glyphicon glyphicon-lock"></span></span>
								<input name="pass" type="password" class="form-control" placeholder="Password">
							</div>

							<div class="input-group">
								<span class="input-group-addon"> <span class="glyphicon glyphicon-lock"></span></span>
								<!--<input type="text" name="code" style="width:50%" class="form-control" placeholder="please enter captcha">-->
								<!--<img src="../admin/yzm" onclick="this.src='/admin/yzm?m'+Math.random()" alt="">-->
							</div>

							<div class="input-group" >
								<input name="submit" type="submit" value="submit" class="btn btn-sm btn-success">
								&nbsp;
								&nbsp;
								<input name="reset" type="reset" value="reset" class="btn btn-sm btn-danger">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
