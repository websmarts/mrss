@extends('layouts.default')

@section('content')
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}
@endsection
