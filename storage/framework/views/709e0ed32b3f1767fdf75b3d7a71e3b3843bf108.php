<?php $__env->startSection('main'); ?>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">product management</a></li>
		<li class="active">product list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> batch delete</button>
			<a href="/admin/goods/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add product</a>

			<p class="pull-right tots" >total 10 records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th><input type="checkbox" name="" id=""></th>
			<th>ID</th>
			<th>Title</th>
			<th>INFO</th>
			<th>IMG</th>
			<th>PRICE</th>
			<th>NUM</th>
			<th>OPERATION</th>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><input type="checkbox" name="" id=""></td>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->title); ?></td>
					<td><?php echo e($value->info); ?></td>
					<td>
						<img width="200px" src="/Uploads/goods/<?php echo e($value->img); ?>" alt="">
						<br>
						<?php $__currentLoopData = $value->limg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<img width="50px" src="/Uploads/goods/<?php echo e($val->img); ?>" alt="">


						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</td>
					<td><?php echo e($value->price); ?></td>
					<td><?php echo e($value->num); ?></td>
					<td><a href="">edit</a> <a href="">delete</a></td>
				</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



		</table>
		<!-- pagination -->
		<div class="panel-footer">
			<nav style="text-align:center;">
				<?php echo e($data->links()); ?>

				<!-- <ul class="pagination">
					<li><a href="#">&laquo;</a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#">&raquo;</a></li>
				</ul> -->
			</nav>

		</div>
	</div>
</div>
<script>

	// delete data

	function del(id){



		if (confirm("are you sure to delete?")) {
			// send post request
			$.post("/admin/types/"+id,{'_token':"<?php echo e(csrf_token()); ?>",'_method':'delete'},function(data){

				if (data==1) {
					window.location.reload();
				};

			})
		};

	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/goods/index.blade.php ENDPATH**/ ?>