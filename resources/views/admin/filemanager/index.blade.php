@extends('layouts.admin')


@section('content')

<h1>File Manager</h1>

<h3>Slider Images</h3>
<p>Use the image manager to upload slider images to the <strong>slides</strong> folder.<br>
	 The slide images are in 750 pixels wide and 250 pixels high. The images should be jpeg or png formats.<br />


	<button class="lfm_image">Image Manager</button>
</p>

<h3>Files</h3>

<p>
Use this button can be used to upload non-image files, eg PDFs<br />
<button class="lfm_file">File Manager</button>
</p>


@endsection

@section('scripts')

<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>

 	var domain = "{{ url('/laravel-filemanager') }}";
 	$(document).ready(function(){
         $('.lfm_image').filemanager('image', {prefix: domain});
         $('.lfm_file').filemanager('file', {prefix: domain});
 	});
</script>
@endsection

