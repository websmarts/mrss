<div id="mySidenav" class="sidenav" style="background: #111">

	<a href="{{ route('admin.locations') }}" >Locations</a>
	<a href="{{ route('admin.cartage.removal') }}">DIY Removal Fees</a>
	<a href="{{ route('admin.cartage.return') }}">Storage Return Fees</a>
	<a href="{{ route('admin.products') }}">Products</a>
	<p>Pages</p>
	<a href="{{ route('admin.pages',['page'=>'home']) }}">Home</a>
	<a href="{{ route('admin.pages',['page'=>'modules']) }}">Modules</a>
	<a href="{{ route('admin.pages',['page'=>'storage']) }}">Storage</a>
	<a href="{{ route('admin.pages',['page'=>'removal']) }}">Removal</a>
	<a href="{{ route('admin.pages',['page'=>'faqs']) }}">FAQs</a>
	<a href="{{ route('admin.pages',['page'=>'contact']) }}">Contact</a>
	<a href="{{ route('admin.pages',['page'=>'privacy']) }}">Privacy</a>
	<a href="{{ route('admin.pages',['page'=>'terms']) }}">Terms</a>


	<p>Chunks</p>
	<a href="{{ route('admin.chunks') }}">Chunks</a>

	<p>File Manager</p>
	<a href="{{ route('admin.filemanager') }}">Files</a>

</div>
