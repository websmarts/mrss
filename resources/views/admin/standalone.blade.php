@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col-sm-6 col-sm-offset-4">
		<h1>TinyMCE in Laravel</h1>

		<form method="post" action="{{ route('submit') }}">
			{{ csrf_field() }}


		<div class="input-group">
		   <span class="input-group-btn">
		     <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
		       <i class="fa fa-picture-o"></i> Choose
		     </a>
		   </span>
		   <input id="thumbnail" class="form-control" type="text" name="filepath">
		 </div>
		 <img id="holder" style="margin-top:15px;max-height:100px;">

		 <input class="btn btn-primary" style="margin-top: 20px" type="submit" name="b" />

		</form>
	</div>
</div>
@endsection

@section('scripts')

 <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
 <script>
 	var domain = "/laravel-filemanager";
 	$('#lfm').filemanager('image', {prefix: domain});
 </script>

@endsection
