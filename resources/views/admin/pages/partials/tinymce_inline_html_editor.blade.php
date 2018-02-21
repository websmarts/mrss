<!-- TinyMCE full HTML Inline Editor -->
<script>
  $(document).ready(function(){
    var editor_config = {
      inline: true,
      path_absolute : "/",
      selector : ".html_editor",
      elementpath: false,
      forced_root_block : 'p',
      style_formats: [
	    {title: 'Table striped', selector: 'table',classes: 'table table-striped'}
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
});
</script>
