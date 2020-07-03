<?php $__env->startSection('main'); ?>

<style>
	.queren{
		display:none;
	}
</style>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">order management</a></li>
		<li class="active">order status list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">order status display</button>

			<p class="pull-right tots" >total <span><?php echo e(count($data)); ?></span> records</p>
			<form action="" class="form-inline pull-right">
				<div class="form-group">
					<input type="text" name="search" class="form-control" placeholder="please enter keywords" id="">
				</div>

				<input type="submit" value="search" class="btn btn-success">
			</form>


		</div>
		<table class="table-bordered table table-hover">
			<th>ID</th>
			<th>order status</th>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>

					<td><?php echo e($val->id); ?></td>
					<td><input type="text" value="<?php echo e($val->name); ?>"> <button onclick="save(this,<?php echo e($val->id); ?>)" class="btn btn-success queren">confirm</button></td>
				</tr>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		</table>

	</div>
</div>
<script>
	// data edit

	function save(obj,id){

		// get status information

		name=$(obj).prev("input").val();

		// send ajax request

		$.post("/admin/orders/statu/edit",{id:id,name:name,"_token":'<?php echo e(csrf_token()); ?>'},function(data){

			if (data) {
				$(obj).hide();
			}else{
				alert('edit failed');
			}
		});



	}

	$("input[type=text]").focus(function(){
		$(".queren").hide();

		$(this).next("button").show();
	});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/orders/statuList.blade.php ENDPATH**/ ?>