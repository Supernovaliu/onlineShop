<?php $__env->startSection('main'); ?>


<link rel="stylesheet" href="/up/uploadify.css">

<script src="/style/admin/bs/js/jquery.min.js"></script>

<script src="/up/jquery.uploadify.min.js"></script>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">system management</a></li>
		<li class="active">slider list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger">slider display</button>
			<a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add slider</a>


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
			<th>IMG</th>
			<th>HREF</th>
			<th>TITLE</th>
			<th>ORDER</th>
			<th>OPERATION</th>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<tr>
					<td><?php echo e($value->id); ?></td>
					<td><img width="200px" src="/Uploads/lun/<?php echo e($value->img); ?>" alt=""></td>
					<td><?php echo e($value->href); ?></td>
					<td><?php echo e($value->title); ?></td>
					<td><?php echo e($value->orders); ?></td>
					<td>operation</td>
				</tr>


			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



		</table>
		<!-- paginate -->
		<div class="panel-footer">
			<?php echo e($data->links()); ?>


		</div>
	</div>
</div>
<!-- add page -->
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">add slider</h4>
			</div>
			<div class="modal-body">
				<?php if(count($errors) > 0): ?>
				    <div class="alert alert-danger">
				        <ul>
				            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				                <li><?php echo e($error); ?></li>
				            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        </ul>
				    </div>
				<?php endif; ?>
				<form action="/admin/sys/slider" method="post">
					<?php echo e(csrf_field()); ?>

					<div class="form-group">
						<label for="">Title</label>
						<input type="text" name="title" class="form-control" placeholder="title" id="">

					</div>
					<div class="form-group">
						<label for="">Href</label>
						<input type="text" name="href" class="form-control" placeholder="link" id="">
					</div>
					<div class="form-group">
						<label for="">Orders</label>
						<input type="number" name="orders"  class="form-control" placeholder="ascending sort" id="">
					</div>
					<div class="form-group">
						<label for="">Img</label>
						<input type="file" name="" id="uploads">
						<div id="main">

						</div>
						<input type="hidden" name="img" id="imgs">
					</div>
					<div class="form-group pull-right">
						<input type="submit" value="submit" class="btn btn-success">
						<input type="reset" value="reset" class="btn btn-danger">
					</div>

					<div style="clear:both"></div>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
	$(function() {

		var imgs='';

        $('#uploads').uploadify({

            'buttonText' : 'picture upload',

            'formData'     : {
            	'_token':'<?php echo e(csrf_token()); ?>',
            	'files':'lun',

            },

            'swf'      : "/up/uploadify.swf",

            'uploader' : "/admin/shangchuan",

            'onUploadSuccess' : function(file, data, response) {


            	imgs="<img width='200px'  src='/Uploads/lun/"+data+"'>";

            	$("#main").html(imgs);

            	$("#imgs").val(data);

            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/sys/slider/index.blade.php ENDPATH**/ ?>