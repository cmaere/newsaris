<form action="{{ route('uploadfile')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
	<div class="form-group">
		<label class="col-lg-3 control-label">Upload admission file</label>
		<div class="col-lg-6">
			<input type="file" class="btn btn-default btn-file form-control" name="adm_file">
		</div>
		<div class="col-lg-3">
			<input type="submit" name="upload" class="btn btn-default form-control" value="Submit">
			<input type="hidden" name="_token" value="{{Session::token()}}">
		</div>
	</div>
</form>