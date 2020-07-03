@extends('admin.public.admin')

@section('main')

<link rel="stylesheet" href="/up/uploadify.css">

<script src="/style/admin/bs/js/jquery.min.js"></script>

<script src="/up/jquery.uploadify.min.js"></script>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">system management</a></li>
		<li class="active">add ads</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ads page</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add ads</a>

		</div>
		<div class="panel-body">
			<form action="/admin/sys/ads" method="post">
					{{csrf_field()}}

				<div class="form-group">
					<label for="">TITLE</label>
					<input type="text" name="title" placeholder="please enter title" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">href</label>
					<input type="text" name="href" class="form-control" placeholder="please enter ads url"   id="">
				</div>
				<div class="form-group">
					<label for="">SORT</label>
					<input type="text" name="sort" placeholder="ascending order" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">Img</label>
					<input type="file" name="" id="uploads">
					<div id="main">

					</div>
					<input type="hidden" name="img" id="imgs">
				</div>



				<div class="form-group">
					<input type="submit" value="submit" class="btn btn-success">
					<input type="reset" value="reset" class="btn btn-danger">
				</div>

			</form>
		</div>

	</div>
</div>

<script>

	$(function() {
		var imgs='';
		// use uploadify plugin
        $('#uploads').uploadify({
        	// set text
            'buttonText' : 'picture upload',
            // set transfer data
            'formData'     : {
            	'_token':'{{ csrf_token() }}',
            	'files':'ads',

            },
            // upload flash
            'swf'      : "/up/uploadify.swf",
            // upload url
            'uploader' : "/admin/shangchuan",
            // when file upload successfully
            'onUploadSuccess' : function(file, data, response) {

            	// concate picture
            	imgs="<img width='200px'  src='/Uploads/ads/"+data+"'>";
            	// display picture
            	$("#main").html(imgs);
            	// hide data
            	$("#imgs").val(data);

            }
        });
    });
</script>
@endsection
