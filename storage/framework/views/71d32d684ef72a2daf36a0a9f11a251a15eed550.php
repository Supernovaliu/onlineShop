<?php $__env->startSection('main'); ?>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">category management</a></li>
		<li class="active">add category</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> category page</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add category</a>

		</div>
		<div class="panel-body">
			<form action="/admin/types" method="post">
				<div class="form-group">
					<label for="">category name</label>
					<?php echo e(csrf_field()); ?>

					<input type="text" name="name" class="form-control" id="" placeholder="please enter category name">
					<input type="hidden" name="pid" value="<?php echo isset($_GET['pid'])?$_GET['pid']:0;?>">
					<input type="hidden" name="path" value="<?php echo isset($_GET['path'])?$_GET['path']:'0,';?>">
				</div>

				<div class="form-group">
					<label for="">TITLE</label>
					<input type="text" name="title" placeholder="请输入TITLE" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">KEYWORD</label>
					<input type="text" name="keywords" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">DESCRIPTION</label>
					<input type="text" name="description" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">SORT</label>
					<input type="text" name="sort" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">is node?</label>
					<br>
					<input type="radio" name="is_lou" value="1"  id="">yes
					<input type="radio" name="is_lou" value="0" checked id="">no
				</div>

				<div class="form-group">
					<input type="submit" value="submit" class="btn btn-success">
					<input type="reset" value="reset" class="btn btn-danger">
				</div>

			</form>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/types/add.blade.php ENDPATH**/ ?>