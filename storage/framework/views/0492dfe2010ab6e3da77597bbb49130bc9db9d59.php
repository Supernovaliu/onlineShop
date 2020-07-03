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
			<th>product name</th>
			<th>product picture</th>
			<th>price</th>
			<th>quantity</th>
			<th>sum</th>

			<?php

			$number=0;
			$money=0;
			 ?>
			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($value->title); ?></td>
				<td>
					<img width="200px" src="/Uploads/goods/<?php echo e($value->img); ?>" alt="">
				</td>
				<td><?php echo e($value->price); ?></td>
				<td><?php echo e($value->num); ?></td>
				<td><?php echo e($value->price*$value->num); ?></td>
				<?php
					$number+=$value->num;

					$money+=$value->price*$value->num;
				 ?>
			</tr>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			<tr>
				<td>total</td>
				<td>price：</td>
				<td><?php echo e($money); ?></td>
				<td>quantity：</td>
				<td><?php echo e($number); ?></td>
			</tr>



		</table>

		<div class="panel-footer">

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/orders/lists.blade.php ENDPATH**/ ?>