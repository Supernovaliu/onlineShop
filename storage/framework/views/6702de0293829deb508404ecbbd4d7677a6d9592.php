<?php $__env->startSection('main'); ?>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">comment management</a></li>
		<li class="active">comment list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-success"> view comment</button>

			<p class="pull-right tots" >total 10 records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>ID</th>
			<th>UAME</th>
			<th>NAME</th>
			<th>PICTURE</th>
			<th>DESCRIPTION</th>
			<th>LEVEL</th>
			<th>TIME</th>
			<th>STATUS</th>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><?php echo e($value->name); ?></td>
					<td><?php echo e($value->title); ?></td>
					<td><img width="200px" src="/Uploads/goods/<?php echo e($value->gimg); ?>" alt=""></td>
					<td><?php echo e($value->text); ?></td>
					<td style="color:red"><?php echo e(str_repeat("★",$value->start)); ?><?php echo e(str_repeat('☆',5-$value->start)); ?></td>
					<td ><?php echo e(date("Y-m-d H:i:s",$value->time)); ?></td>
					<td>

						<select name="" onchange="a(this,<?php echo e($value->id); ?>)" id="">
						<?php if($value->statu==1): ?>
							<option value="0">unreviewed</option>
							<option selected value="1">normal</option>
							<option value="2">black list</option>

						<?php elseif($value->statu==2): ?>
							<option value="0">unreviewed</option>
							<option value="1">normal</option>
							<option selected value="2">black list</option>

						<?php else: ?>
							<option selected value="0">unreviewed</option>
							<option value="1">normal</option>
							<option value="2">black list</option>

						<?php endif; ?>

						</select>
					</td>

				</tr>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





		</table>
		<!-- pagination -->
		<div class="panel-footer">
			<nav style="text-align:center;">
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

	function a(obj,id){
		val=$(obj).val();
		// send ajax request
		$.post("/admin/comment/ajaxStatu",{"id":id,"statu":val,"_token":'<?php echo e(csrf_token()); ?>'},function(data){

			if (data==1) {
				alert('modify successfully');
			}else{
				alert('modify failed');
			}

		})
	}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/comment/index.blade.php ENDPATH**/ ?>