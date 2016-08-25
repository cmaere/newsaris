<form action="{{ route('uploadfile')}}" method="POST" enctype="multipart/form-data" class="form-inline">
	@if (session('filefeedback'))
      <div class="alert alert-warning">
      	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('filefeedback') }}
      </div>
    @endif
    <div class="form-group">
    	<label for="entryyear">Entry year</label>
    	<input type="text" class="form-control" id="entryyear" name="entryyear" placeholder="e.g 2017">
  	</div>
	<div class="form-group">
		<label>Upload admission file</label>
		<input type="file" class="btn btn-default btn-file form-control" name="adm_file">
	</div>
	<input type="submit" name="upload" class="btn btn-default" value="Submit">
	<input type="hidden" name="_token" value="{{Session::token()}}">
</form>