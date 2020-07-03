<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>login page</title>
	<link rel="stylesheet" href="/style/admin/bs/css/bootstrap.css">
	<script src="/style/admin/bs/js/jquery.min.js"></script>
	<script src="/style/admin/bs/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">

				<div class="panel panel-primary">
					<div class="panel-heading">
						login page
					</div>
					<div class="panel-body">

						<form action="/check" method="post">
							<div class="form-group">
								{{csrf_field()}}
								<label for="">EMAIL</label>
								<input class="form-control" type="text" name="email" id="">
							</div>
							<div class="form-group">
								<label for="">PASS</label>
								<input class="form-control" type="password" name="pass" id="">
							</div>
							<div class="form-group">
								<a href="/recover">recover password</a>
							</div>

							<div class="form-group">
								<input type="submit" action="/reg" class="btn btn-success" value="register">
                                <input type="submit" class="btn btn-success" value="login">
								<input type="reset" class="btn btn-danger" value="reset">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
