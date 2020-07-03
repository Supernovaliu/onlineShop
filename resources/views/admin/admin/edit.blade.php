<form action="" onsubmit="return false;" id="formEdit">
	<div class="form-group">
		<label for="">user name</label>
		<input type="text" name="name" disabled value="{{$data->name}}" class="form-control" placeholder="please enter previous password" id="">
		<input type="hidden" name="id" value="{{$data->id}}">
	</div>
	<div class="form-group">
		<label for="">password</label>
		<input type="password" name="pass" value="{{$data->pass}}" class="form-control" placeholder="please enter new password" id="">
		<div id="passInfo1">

		</div>
	</div>
	<div class="form-group">
		<label for="">confirm password</label>
		<input type="password" name="repass" value="{{$data->pass}}" class="form-control" placeholder="please enter password again" id="">
	</div>
	<div class="form-group">
		<label for="">status</label>
		<br>

		@if($data->status)
			<input type="radio" name="status"  value="0" id="">normal
			<input type="radio" name="status" checked value="1" id="">banned
		@else

			<input type="radio" name="status" checked value="0" id="">normal
			<input type="radio" name="status" value="1" id="">banned
		@endif

	</div>
	<div class="form-group pull-right">
		<input type="submit" value="submit" onclick="save()" class="btn btn-success">
		<input type="reset" id="reset1" value="reset" class="btn btn-danger">
	</div>

	<div style="clear:both"></div>
</form>
