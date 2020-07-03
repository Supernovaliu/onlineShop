<?php $__env->startSection('main'); ?>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">user management</a></li>
		<li class="active">user list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">user display</button>

			<p class="pull-right tots" >total <?php echo e($tot); ?> records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>ID</th>
			<th>TEL</th>
			<th>EMAIL</th>
			<th>REGITIME</th>
			<th>STATUS</th>


			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->id); ?></td>
				<td><?php echo e($value->tel); ?></td>
				<td><?php echo e($value->email); ?></td>
				<td><?php echo e(date('Y-m-d H:i:s',$value->time)); ?></td>

				<!-- 0 1 2 -->

				<?php if($value->status==0): ?>
					<td><span class="btn btn-primary">not activated</span></td>

				<?php elseif($value->status==1): ?>
					<td><span class="btn btn-success">activated</span></td>

				<?php else: ?>
					<td><span class="btn btn-danger">black list</span></td>
				<?php endif; ?>
			</tr>

			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		</table>
		<!-- pagination -->
		<div class="panel-footer">
			<?php echo e($data->links()); ?>


		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/user/index.blade.php ENDPATH**/ ?>