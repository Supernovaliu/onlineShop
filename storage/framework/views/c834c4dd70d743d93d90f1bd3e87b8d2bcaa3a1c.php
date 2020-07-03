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

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><a href="/admin/orders/list?code=<?php echo e($value->code); ?>"><?php echo e($value->code); ?></a></td>
				<td><?php echo e($value->name); ?></td>
				<td>
					<a href="/admin/orders/addr?id=<?php echo e($value->aid); ?>">receiver information</a>
				</td>
				<td><?php echo e($value->ssname); ?></td>
				<td><?php echo e(date("Y-m-d H:i:s",$value->time)); ?></td>


				<td>
					<?php if($value->sid==6): ?>
						<a href="javascript:;">edit status</a>
					<?php else: ?>
						<a href="/admin/orders/edit?sid=<?php echo e($value->sid); ?>&code=<?php echo e($value->code); ?>">edit status</a>
					<?php endif; ?>

				</td>
			</tr>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



		</table>

		<div class="panel-footer">

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>