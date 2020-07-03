<?php $__env->startSection('main'); ?>
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
			<tr>
				<td>name</td>
				<td><?php echo e($data->sname); ?></td>
			</tr>
			<tr>
				<td>phone</td>
				<td><?php echo e($data->stel); ?></td>
			</tr>
			<tr>
				<td>address</td>
				<td><?php echo e($data->addr); ?></td>
			</tr>
			<tr>
				<td>information</td>
				<td><?php echo e($data->addrInfo); ?></td>
			</tr>

			<tr>
				<td>email</td>
				<td><?php echo e($data->email); ?></td>
			</tr>

		</table>
		<!-- pagination -->
		<div class="panel-footer">

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/orders/addr.blade.php ENDPATH**/ ?>