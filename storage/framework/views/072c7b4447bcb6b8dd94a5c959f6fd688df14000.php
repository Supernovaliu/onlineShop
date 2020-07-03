<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>backend management system</title>
	<link rel="shortcut icon" href="/style/admin/img/1.png">
	<link rel="stylesheet" href="/style/admin/bs/css/bootstrap.min.css">
	<script src="/style/admin/bs/js/jquery.min.js"></script>
	<script src="/style/admin/bs/js/bootstrap.min.js"></script>
	<style>
		.navbar-blue{
			background-color: #ccc;
		}

		.navbar .navbar-brand{
			color:black;
		}

		.navbar .navbar-brand:hover{
			color:black;
		}

		.navbar-default .navbar-nav>li>a{
			color:black;
		}
		.navbar-default .navbar-nav>li>a:hover{
			color:black;

		}

		.body{
			margin-top:90px;
		}
		.list-group{
			display:none;
		}
		.panel-primary>.panel-heading{
			background-color: #ccc;
		}
	</style>
</head>
<body>
	<div class="container">
		<!-- navigate bar -->
		<nav class="navbar navbar-default navbar-fixed-top navbar-blue" role="navigation">
			<div class="container-fluid">
			<!-- logo -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img style="display:inline" width="30px" src="/style/admin/img/1.png" alt="">   backend management system</a>
				</div>


				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="/admin/flush"><span class="glyphicon glyphicon-refresh"></span>clear cache</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown">backend management<span class="caret"></span></a>
						  <ul class="dropdown-menu" role="menu">
						    <li><a id="logname" href="#"><?php echo e(session("onlineShopAdminUserInfo.name")); ?></a></li>
						    <li><a id="passchange" href="#" data-toggle="modal" data-target="#editPass">change password</a></li>
						    <li><a href="#">homepage</a></li>
						    <li><a id="logout" href="/admin/logout">logout</a></li>
						  </ul>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>


		<!-- content -->
		<div class="row body">

			<!-- menu -->
			<div class="col-md-2">

				<!-- administrator management-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="admin" name="admin"><span class="glyphicon glyphicon-user"></span> administrator management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/admin">administrator list</a></li>

					</ul>
				</div>
				<!-- user management -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="user"><span class="glyphicon glyphicon-user"></span> user management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/user">user list</a></li>

					</ul>
				</div>


				<!-- category management -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="types"><span class="glyphicon glyphicon-tasks"></span> category management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/types">category list</a></li>
					</ul>
				</div>
				<!-- products management -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="goods"><span class="glyphicon glyphicon-gift"></span> product management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/goods">product list</a></li>
					</ul>
				</div>
				<!-- orders management -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="orders"><span class="glyphicon glyphicon-list-alt"></span> order management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/orders">order list</a></li>
					    <li class="list-group-item"><a href="/admin/orders/statu">order status list</a></li>
					</ul>
				</div>
				<!-- comment management -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="comment"><span class="glyphicon glyphicon-envelope"></span> comment management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/comment">comment list</a></li>
					</ul>
				</div>

				<!-- system management -->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h2 class="panel-title" id="sys"><span class="glyphicon glyphicon-certificate"></span> system management</h2>
					</div>
					<ul class="list-group">
					    <li class="list-group-item"><a href="/admin/sys/config">system configuration</a></li>
					    <li class="list-group-item"><a href="/admin/sys/slider">slider management</a></li>
					    <li class="list-group-item"><a href="/admin/sys/ads">ads management</a></li>
					    <li class="list-group-item"><a href="/admin/sys/types">category ads management</a></li>

					</ul>
				</div>
			</div>


			<?php echo $__env->yieldContent('main'); ?>
		</div>
	</div>


	<!-- change password -->
	<div class="modal fade" id="editPass">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title">change password</h4>
				</div>
				<div class="modal-body">
					<form action="">
						<div class="form-group">
							<label for="">previous password</label>
							<input type="password" name="" class="form-control" placeholder="please enter previous password" id="">
						</div>
						<div class="form-group">
							<label for="">new password</label>
							<input type="password" name="" class="form-control" placeholder="please enter new password" id="">
						</div>
						<div class="form-group">
							<label for="">confirm password</label>
							<input type="password" name="" class="form-control" placeholder="please enter password again" id="">
						</div>
						<div class="form-group pull-right">
							<input type="submit" value="submit" class="btn btn-success">
							<input type="reset" value="reset" class="btn btn-danger">
						</div>

						<div style="clear:both"></div>
					</form>
				</div>

			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
</body>
<?php

	// get url address parameter

	$path=$_SERVER['REDIRECT_URL'];

	// separate string

	$arr=explode('/', $path);

	// get name

	$name=isset($arr[2])?$arr[2]:'';

 ?>
<script>
	// menu change
	$(".panel-title").click(function(){
		$(".list-group").hide();
		$(this).parent().next().toggle(500);
	});

	$("#<?php echo e($name); ?>").click();
</script>
</html>
<?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/public/admin.blade.php ENDPATH**/ ?>