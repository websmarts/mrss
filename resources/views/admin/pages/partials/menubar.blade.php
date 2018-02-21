@section('admin_menubar')
<div style="border-bottom:2px solid #333; padding:1em; background:#ccc; display:flex; justify-content: space-between">
<button class="btn btn-primary" id="save_button">Save</button>

<div><a href="{{ route('admin') }}">Admin dashboard</a></div>
</div>
@endsection
