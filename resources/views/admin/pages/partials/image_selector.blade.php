<!-- Image only Edit/Selector -->
<script src="/vendor/laravel-filemanager/js/lfm.js"></script>
<script>

 	var domain = "{{ url('/laravel-filemanager') }}";
 	$(document).ready(function(){
 		$('.lfm').filemanager('image', {prefix: domain});
 	});
</script>
