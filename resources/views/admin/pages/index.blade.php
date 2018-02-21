@extends('layouts.admin')

@section('content')

<h1>Edit Page Elements: {{ $page->name }}</h1>

<div><button id="save_button">Save</button></div>


@foreach($page->elements as $e)
<div class="element_container" style="border:1px solid #777; padding:0 5px;width:710px;margin: 55px 0px">
@if($e->editor == 'image')
<div  style="display: flex;background: #777;color:#fff;padding:0 2px;">
		<div style="flex:3;margin-right: 30px;">{{ $e->name }}</div>
		<input style="flex:3; color:#444; background: #eee; border-radius: 5px; padding:6px;"  name="description_{{$e->id}}" class="element_description" value="{!! $e->description !!}"></input>
</div>
<div style="display: flex;">
	<div style="flex: 1">
		<img class="image_element" name="element_{{$e->id}}" id="holder_{{$e->id}}" src="{!! $e->content !!}" style="margin-top:15px;max-height:100px;">
	</div>
	<div style="width: 150px;padding-top:40px;">
		<div class="input-group">
		   <span class="input-group-btn">
		     <a id="lfm_{{$e->id}}" data-input="thumbnail_{{$e->id}}" data-preview="holder_{{$e->id}}" class="btn btn-primary lfm">
		       <i class="far fa-image"></i> Choose image
		     </a>
		   </span>
		   <input id="thumbnail_{{$e->id}}" class="form-control" type="hidden" name="filepath" value="{!! $e->content !!}">
		 </div>
	</div>
</div>

@else
<div >
	<div style="width:700px;padding:10px;" name="element_{{$e->id}}" class="{{$e->editor}}_editor content">{!! $e->content !!}</div>


	<div  style="display: flex; justify-content:space-between;background: #777;color:#fff;padding: 4px;">
		<div style="width:200px;margin-right: 30px;">{{ $e->name }}</div>
		<input style="width:60%;color:#444; background: #eee; border-radius: 5px; padding:6px;margin-botton: 5px"  name="description_{{$e->id}}" class="element_description" value="{!! $e->description !!}"></input>
	</div>

</div>




@endif
</div>
@endforeach

@endsection

@section('scripts')
<script>
	var save_url = "{{ route('admin.page.update',['page'=>$page->name])}}";
	var current_domain = "{{ env('APP_URL') }}".replace("//","\/\/");
</script>

 <!-- TinyMCE -->
    <script src="{{ URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
    var editor_config = {
      inline: true,
      path_absolute : "/",
      selector : ".html_editor",
      elementpath: false,
      forced_root_block : 'p',
      style_formats: [
	    {title: 'Bold text', inline: 'b'},
	    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
	    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
	    {title: 'Example 1', inline: 'span', classes: 'example1'},
	    {title: 'Example 2', inline: 'span', classes: 'example2'},
	    {title: 'Table styles'},
	    {title: 'Table striped', selector: 'table', styles: {border: 0},classes: 'table table-striped'}
	  ],
	  style_formats_merge: false,

      branding: false,
      menu: {},
      plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern autoresize"
    ],
	toolbar: " undo redo | table formatselect styleselect | alignleft aligncenter alignright alignjustify | bullist numlist | removeformat code image",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

    tinymce.init(editor_config);

    tinymce.init({
	  selector: '.text_editor',
	  inline: true,
	  forced_root_block : '',
	  plugins: "code",

	  toolbar: 'undo redo removeformat code',
	  menubar: false
	});


    </script>



    <script>
    	// jQuery Page Save Handler
    	$( document ).ready(function() {

    		function strip_domain_name(content){

    			return content.replace(current_domain, "")

    		}

    		function findItemById(id,data) {
    			var found = _.find(data,['id',id])
    			if(!found){
		    			data.push({id: id})
		    	}
		    	return _.find(data,['id',id])
    		}



		    // click handler for save_button
		    $('#save_button').on('click', function(event) {
		    	event.preventDefault();
		    	save_page_elements();
		    });

		    var save_page_elements = function() {

		    	let data = []

		    	// Get all the descriptions
		    	$('.element_description').each(function(idx,e){
		    		var id = parseInt(e.name.replace('description_',''))
		    		var item = findItemById(id,data)
		    		item.description = e.value

		    	});

		    	for(i=0; i<tinymce.editors.length; i++){
		    		// console.log($(tinymce.editors[i].targetElm).attr('name'));
				    // console.log(tinymce.editors[i].getContent() );

		    		var name = $(tinymce.editors[i].targetElm).attr('name')
		    		var id = parseInt(name.replace('element_',''))
		    		var item = findItemById(id,data)

		    		if( $(tinymce.editors[i].targetElm).hasClass('content') ){
		    			item.content = strip_domain_name(tinymce.editors[i].getContent())
		    		}
				}

				// get all the image filepath elements
				// The id has the key to the element_id
				$('img.image_element').each(function(index,elm){
					//var name = $(elm).attr('name')
					var id = parseInt($(elm).attr('name').replace('element_',''))
					var item = findItemById(id,data)
		    		item.content = strip_domain_name($(elm).attr('src'))
		    	})

		    	console.log(data)

				let postdata = {
					data: data
				}

				// Performing a POST request
				axios.post(save_url, postdata)
				  .then(function(response){
				    console.log('saved successfully')
				  });
		}
	})

    </script>


    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
	 <script>
	 	//var domain = "/laravel-filemanager";
	 	var domain = "{{ url('/laravel-filemanager') }}";
	 	$('.lfm').filemanager('image', {prefix: domain});
	 </script>

@endsection
