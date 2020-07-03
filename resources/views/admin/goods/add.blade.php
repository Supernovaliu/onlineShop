@extends('admin.public.admin')

@section('main')

<link rel="stylesheet" href="/up/uploadify.css">
<script src="/style/admin/bs/js/jquery.min.js"></script>
<script src="/up/jquery.uploadify.min.js"></script>

<script type="text/javascript" charset="utf-8" src="/baidu/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/baidu/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/baidu/lang/zh-cn/zh-cn.js"></script>
<!-- content -->
<div class="col-md-10">

	<ol class="breadcrumb">
		<li><a href="#"><span class="glyphicon glyphicon-home"></span> home page</a></li>
		<li><a href="#">product management</a></li>
		<li class="active">add product</li>

		<button class="btn btn-primary btn-xs pull-right"><span class="glyphicon glyphicon-refresh"></span></button>
	</ol>

	<!-- board -->
	<div class="panel panel-default">
		<div class="panel-heading">
			<a href="index.html" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> product page</a>
			<a href="" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> add product</a>

		</div>
		<div class="panel-body">
			<form action="/admin/goods" method="post">
					{{csrf_field()}}

				<div class="form-group">
					<label for="">product name</label>
					<input type="text" name="title" placeholder="please enter product name" class="form-control" id="">
				</div>
				<div class="form-group">
					<label for="">product description</label>
					<textarea name="info" id="" class="form-control"  placeholder="please enter product description"></textarea>
				</div>
				<div class="form-group">
					<label for="">product category</label>
					<select name="cid" class="form-control" id="">
						<option value="">please choose product category</option>

						@foreach($data as $value)

							@if($value->size==2)
								<option value="{{$value->id}}">{{$value->html}}</option>

							@else
								<option disabled value="{{$value->id}}">{{$value->html}}</option>

							@endif


						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">product price</label>
					<input type="text" name="price" placeholder="please enter product price" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">quantity</label>
					<input type="text" name="num" placeholder="please enter quantity" class="form-control" id="">
				</div>

				<div class="form-group">
					<label for="">picture</label>
					<input type="file" name="" id="uploads">
					<div id="main">

					</div>
					<input type="hidden" name="img" id="imgs">
				</div>
				<div class="form-group">
					<label for="">multiple picture</label>
					<input type="file" name="" id="uploads1">
					<div id="main1">

					</div>
					<input type="hidden" name="imgs" id="imgs1">
				</div>


				<div class="form-group">
					<label for="">description</label>
					<script id="editor" type="text/plain" name="text" style="width:100%;height:300px;"></script>
				</div>

				<div class="form-group">
					<label for="">configuration</label>
					<script id="editor1" type="text/plain" name="config" style="width:100%;height:300px;"></script>
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
		// call for editor
		var ue = UE.getEditor('editor');
		var ue1 = UE.getEditor('editor1');
		// define string
		var imgs='';
		// use uploadify plugin
        $('#uploads').uploadify({
        	// set text
            'buttonText' : 'picture upload',
            // set tranfer data
            'formData'     : {
            	'_token':'{{ csrf_token() }}',
            	'files':'goods',

            },
            // upload flash
            'swf'      : "/up/uploadify.swf",
            // upload url
            'uploader' : "/admin/shangchuan",
            // when upload successfully
            'onUploadSuccess' : function(file, data, response) {

            	// concate picture
            	imgs="<img width='200px'  src='/Uploads/goods/"+data+"'>";
            	// show pictures
            	$("#main").html(imgs);
            	// hide data
            	$("#imgs").val(data);

            }
        });

        // multiple pictures upload
		var imgs1='';

		var arr=[];

        $('#uploads1').uploadify({
        	// set text
            'buttonText' : 'multiple pictures upload',
            // set transfer data
            'formData'     : {
            	'_token':'{{ csrf_token() }}',
            	'files':'goods',

            },
            // upload flash
            'swf'      : "/up/uploadify.swf",
            // file upload url
            'uploader' : "/admin/shangchuan",
            // when file upload successfully
            'onUploadSuccess' : function(file, data, response) {

            	// concate pictures
            	imgs1+="<img width='200px'  src='/Uploads/goods/"+data+"'>";

            	arr.push(data);
            	// show pictures
            	$("#main1").html(imgs1);
            	// hide data
            	$("#imgs1").val(arr.join(','));

            }
        });
    });
</script>
@endsection
