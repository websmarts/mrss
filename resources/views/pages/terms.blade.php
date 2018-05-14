@extends('layouts.default')

@section('content')
<div class="page_content_wrapper">
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}
</div>
@endsection
