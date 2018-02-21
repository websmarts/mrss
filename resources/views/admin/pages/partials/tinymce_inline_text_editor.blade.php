<!-- Basic Inline Text Editor - no root block inserts -->
<script>
$(document).ready(function(){
 	tinymce.init({
	  selector: '.text_editor',
	  inline: true,
	  forced_root_block : '',
	  plugins: "code",

	  toolbar: 'undo redo removeformat code',
	  menubar: false
	});
 });
</script>
