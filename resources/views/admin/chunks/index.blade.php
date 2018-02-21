@extends('layouts.admin')

@section('content')
<h1>Content Chunks Manager</h1>


<div style="display:flex; padding-bottom:10px; border-bottom:1px solid #888; margin:40px 0">
	<div style="width:250px;margin-right:20px;"><strong>Chunk name</strong><br /><i>description</i></div>
	<div>Chunk value</div>
</div>
<form method="post" action="">
	{{ csrf_field() }}
@foreach($chunks as $c)
<div style="display:flex">
	<div style="width:250px;margin-right:20px;"><strong>{{ $c->name}}</strong><br /><i>{{ $c->description }}</i></div>
	<div><textarea name="chunk[{{$c->name}}]">{{$c->content}}</textarea></div>
</div>

@endforeach

<button class="btn btn-primary" type="submit" style="margin-top:40px">Save</button>
</form>
@endsection
