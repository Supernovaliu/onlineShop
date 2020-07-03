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
			<button class="btn btn-danger">edit order status</button>

		</div>

		<div class="panel-body">
			<form action="" method="post">
				<?php echo e(csrf_field()); ?>

				<div class="form-group">
					<label for="">order number</label>
					<input class="form-control" type="text" name="" value="<?php echo e($_GET['code']); ?>" id="">
				</div>

				<div class="form-group">
					<label for="">order status</label>
					<select class="form-control"  name="sid" id="">
						<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($_GET['sid']==$value->id): ?>
								<option selected value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
							<?php else: ?>
								<option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>

							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-success" value="submit">
				</div>
			</form>
		</div>

		<div class="panel-footer">

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/orders/edit.blade.php ENDPATH**/ ?>