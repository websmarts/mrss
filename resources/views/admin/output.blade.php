@extends('layouts.admin')

@section('content')
<h1>TinyMCE in Laravel Output </h1>

<div class="row">
	<div class="col-sm-4 col-sml-offset-4">{!! $content !!}</div>
</div>


@endsection
