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
		<li class="active">system list</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-body">
			<form action="/admin/sys/config" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label for="">Title</label>
					<input type="text" name="title" value="{{config('web.title')}}" class="form-control" placeholder="title" id="">

				</div>
				<div class="form-group">
					<label for="">KEYWORDS</label>
					<input type="text" name="keywords" value="{{config('web.keywords')}}" class="form-control" placeholder="link" id="">
				</div>
				<div class="form-group">
					<label for="">description</label>
					<input type="text" name="description"  value="{{config('web.description')}}" class="form-control" placeholder="ascending sort" id="">
				</div>
				<div class="form-group">
					<label for="">statistic</label>

					<textarea name="baidu" id="" value="" cols="30" class="form-control" rows="10">{{config('web.baidu')}}</textarea>
				</div>
				<div class="form-group">
					<label for="">Logo</label>
					<input type="file" name="" id="uploads">
					<div id="main">
						<img width="200px" src="/Uploads/sys/{{config('web.logo')}}" alt="">
					</div>
					<input type="hidden" name="logo" id="imgs" value="{{config('web.logo')}}">
					<input type="hidden" name="oldLogo" value="{{config('web.logo')}}">
				</div>
				<div class="form-group pull-right">
					<input type="submit" value="submit" class="btn btn-success">
					<input type="reset" value="reset" class="btn btn-danger">
				</div>

				<div style="clear:both"></div>
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
            	'files':'sys',

            },
            // file upload flash
            'swf'      : "/up/uploadify.swf",
            // file upload url
            'uploader' : "/admin/shangchuan",
            // when file upload successfully
            'onUploadSuccess' : function(file, data, response) {

            	// concate picture
            	imgs="<img width='200px'  src='/Uploads/sys/"+data+"'>";
            	// display picture
            	$("#main").html(imgs);
            	// hide data
            	$("#imgs").val(data);

            }
        });
    });
</script>
@endsection
