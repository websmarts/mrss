<script>
	var save_url = "{{ route('admin.page.update',['page'=>$page->name])}}";
	var current_domain = "{{ env('APP_URL') }}".replace("//","\/\/");
</script>

@include('admin.pages.partials.image_selector')

@include('admin.pages.partials.tinymce')

@include('admin.pages.partials.tinymce_inline_text_editor')

@include('admin.pages.partials.tinymce_inline_html_editor')

@include('admin.pages.partials.pagesave')
