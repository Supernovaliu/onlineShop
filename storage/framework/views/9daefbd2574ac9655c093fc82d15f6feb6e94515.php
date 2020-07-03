<?php $__env->startSection('main'); ?>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">administrator management</a></li>
		<li class="active">administrator list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> batch delete</button>
			<!-- <a href="/admin/admin/create" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add administrator</a> -->
			<a href="javascript:;" data-toggle="modal" data-target="#add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add administrator</a>

			<p class="pull-right tots" >total <span id="tot"><?php echo e($tot); ?></span> record</p>
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
			<th>NAME</th>
			<th>TIME</th>
			<th>STATUS</th>
			<th>OPERATION</th>

			<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><input type="checkbox" name="" id=""></td>
				<td><?php echo e($value->id); ?></td>
				<td><?php echo e($value->name); ?></td>
				<td><?php echo e(date('Y-m-d H:i:s',$value->time)); ?></td>

				<?php if($value->status): ?>
					<td><span class="btn btn-danger" onclick="status(this,<?php echo e($value->id); ?>,1)">banned</span></td>
				<?php else: ?>

					<td><span class="btn btn-success" onclick="status(this,<?php echo e($value->id); ?>,0)">normal</span></td>
				<?php endif; ?>

				<td><a href="javascript:;" onclick="edit(<?php echo e($value->id); ?>)" data-toggle="modal" data-target="#edit" class="glyphicon glyphicon-pencil"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="deletes(this,<?php echo e($value->id); ?>)" class="glyphicon glyphicon-trash"></a></td>
			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


		</table>
		<!-- pagination -->
		<div class="panel-footer">
			<?php echo e($data->links()); ?>


		</div>
	</div>
</div>
<!-- bullet box -->
<div class="modal fade" id="add">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">add administrator</h4>
			</div>
			<div class="modal-body">
				<form action="" onsubmit="return false;" id="formAdd">
					<div class="form-group">
						<label for="">user name</label>
						<input type="text" name="name" class="form-control" placeholder="please enter user name" id="">
						<div id="userInfo">

						</div>
					</div>
					<div class="form-group">
						<label for="">password</label>
						<input type="password" name="pass" class="form-control" placeholder="please enter password" id="">
						<div id="passInfo">

						</div>
					</div>
					<div class="form-group">
						<label for="">confirm password</label>
						<input type="password" name="repass" class="form-control" placeholder="please enter password again" id="">
					</div>
					<div class="form-group">
						<label for="">status</label>
						<br>
						<input type="radio" name="status" checked value="0" id="">normal
						<input type="radio" name="status" value="1" id="">banned
					</div>
					<div class="form-group pull-right">
						<input type="submit" id="submit" value="submit" onclick="add()" class="btn btn-success">
						<input type="reset" id="reset" value="reset" class="btn btn-danger">
					</div>

					<div style="clear:both"></div>
				</form>
			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->



<div class="modal fade" id="edit">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title">modify information</h4>
			</div>
			<div class="modal-body" id="body">

			</div>

		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>

	// ajax modify data

	function save(){
		// form serilizasion

		str=$("#formEdit").serialize();

		// submit to next page

		$.post("/admin/admin/1",{str:str,"_method":'put','_token':'<?php echo e(csrf_token()); ?>'},function(data){


			if (data==1) {

				window.location.reload();

			}else if(data){


				// password hint

				if (data.pass) {
					str="<div class='alert alert-danger'>"+data.pass+"</div>";
				}else{
					str="<div class='alert alert-success'>√</div>";
				}

				$("#passInfo1").html(str);



			}else{
				alert('add failed');
			}
		});
	}


	function edit(id){
		// send ajax request
		$.get("/admin/admin/"+id+"/edit",{},function(data){

			if (data) {

				$("#body").html(data);
			};

		});

	}
	// ajax modify status

	function status(obj,id,status){

		// send ajax request

		if (status) {
			// send ajax request

			$.post('/admin/admin/ajaxStatu',{id:id,"_token":"<?php echo e(csrf_token()); ?>","status":"0"},function(data){

				if (data==1) {
					$(obj).parent().html('<td><span class="btn btn-success" onclick="status(this,'+id+',0)">normal</span></td>')
				}else{

					alert('modify failed');
				}

			})
		}else{

			$.post('/admin/admin/ajaxStatu',{id:id,"_token":"<?php echo e(csrf_token()); ?>","status":"1"},function(data){

				if (data==1) {
					$(obj).parent().html('<td><span class="btn btn-danger" onclick="status(this,'+id+',1)">banned</span></td>')
				}else{

					alert('modify failed');
				}

			})
		}
	}
	// ajax delete

	function deletes(obj,id){
		// send ajax request

		$.post("/admin/admin/"+id,{"_token":'<?php echo e(csrf_token()); ?>',"_method":"delete"},function(data){

			if (data==1) {
				// remove data

				$(obj).parent().parent().remove();

				// calculate quantity

				tot=Number($("#tot").html());

				$("#tot").html(--tot);
			}else{
				alert('delete failed');
			}
		})
	}
	// add operation

	function add(){
		// form serilization

		str=$("#formAdd").serialize();

		// submit to next page

		$.post('/admin/admin',{str:str,'_token':'<?php echo e(csrf_token()); ?>'},function(data){
			if (data==1) {
				// close bullet box
				$(".close").click();
				// reset form
				$("#reset").click();

				// clear hint

				$("#passInfo").html('');
				$("#nameInfo").html('');

				window.location.reload();


			}else if(data){
				// user name hint
				var str='';
				if (data.name) {
					str="<div class='alert alert-danger'>"+data.name+"</div>";
				}else{
					str="<div class='alert alert-success'>√</div>";
				}

				$("#userInfo").html(str);

				// password hint

				if (data.pass) {
					str="<div class='alert alert-danger'>"+data.pass+"</div>";
				}else{
					str="<div class='alert alert-success'>√</div>";
				}

				$("#passInfo").html(str);



			}else{
				alert('add failed');
			}
		});
	}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.public.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ProgramFiles\wamp3.2.0\www\onlineShop\resources\views/admin/admin/index.blade.php ENDPATH**/ ?>