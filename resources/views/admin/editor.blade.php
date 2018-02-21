@extends('layouts.admin')

@section('content')
<div class="row">

	<div class="col-sm-6 col-sm-offset-4">

		<h1 class="basic_editor" id="heading" name="heading">TinyMCE in Laravel</h1>



		<div class="full_editor" id="editbox" name="content">This is the textarea</div>


		<button class="btn btn-primary" style="margin-top: 20px"  id="save_button">Save</button>


	</div>
</div>
@endsection

@section('scripts')
 <!-- TinyMCE -->
    <script src="{{ URL::to('src/js/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
    var editor_config = {
      path_absolute : "/",
      selector : ".full_editor",
      plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern autoresize"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
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
	  selector: '.basic_editor',
	  inline: true,
	  plugins: "save",
	  toolbar: 'undo redo save',
	  menubar: false
	});

    </script>

    <script>
    	// jQuery Page Save Handler
    	$( document ).ready(function() {



		    // click handler for save_button
		    $('#save_button').on('click', function(event) {
		    	event.preventDefault();
		    	save_page();
		    });

		    var save_page = function() {

		    	for(i=0; i<tinymce.editors.length; i++){
		    		console.log($(tinymce.editors[i].targetElm).attr('name'));
				    console.log(tinymce.editors[i].getContent() );


				    //console.log($("[name='" + tinymce.editors[i].targetElm.name + "']").val(""));
				}
		    	//console.log(tinymce.get('heading').getContent());
		    	//console.log(tinymce.get('editbox').getContent());
		    	// $('.editable').each(function(index){
		    	// 	console.log($(this).html());
		    	// })

		    }


		});

    </script>

@endsection
