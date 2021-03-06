<?php $__env->startSection('main'); ?>


<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">system management</a></li>
		<li class="active">typesads list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">types ads display</button>
			<a href="/admin/sys/types/create" class="btn btn-success">add types ads</a>

			<p class="pull-right tots" >total records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name="" id="">	</th>
			<th>ID</th>
			<th>IMG</th>
			<th>TITLE</th>
			<th>TYPE</th>
			<th>CATEGORY</th>

			<th>OPERATION</th>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td><?php echo e($value->id); ?></td>
					<td><img width="200px" src="/Uploads/ads/<?php echo e($value->img); ?>" alt=""></td>
					<td><?php echo e($value->title); ?></td>
					<td>

						<?php if($value->type): ?>
							main
						<?php else: ?>
							description

						<?php endif; ?>


					</td>
					<td><?php echo e($value->name); ?></td>
					<td><a href="">edit</a></td>

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

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/sys/types/index.blade.php ENDPATH**/ ?>