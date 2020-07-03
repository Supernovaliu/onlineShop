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
		<li class="active">add category ads</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> category ads page</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add category ads</a>

		</div>
		<div class="panel-body">
			<form action="/admin/sys/types" method="post">
					{{csrf_field()}}

				<div class="form-group">
					<label for="">TITLE</label>
					<input type="text" name="title" placeholder="please enter title" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">category</label>
					<select name="cid" id="" class="form-control">
						@foreach($data as $value)
							<option value="{{$value->id}}">{{$value->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Type</label>
					<br>
					<input type="radio" name="type" id="" value="0" checked> small image
					<input type="radio" name="type" id="" value="1"> big image
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

        $('#uploads').uploadify({

            'buttonText' : 'picture upload',

            'formData'     : {
            	'_token':'{{ csrf_token() }}',
            	'files':'ads',

            },

            'swf'      : "/up/uploadify.swf",

            'uploader' : "/admin/shangchuan",

            'onUploadSuccess' : function(file, data, response) {


            	imgs="<img width='200px'  src='/Uploads/ads/"+data+"'>";

            	$("#main").html(imgs);

            	$("#imgs").val(data);

            }
        });
    });
</script>
@endsection
