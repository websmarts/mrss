@extends('layouts.default')

@include('admin.pages.partials.menubar')


@section('content')
<h2 name="element_{{ $page->element('page_heading')->id }}" class="text_editor editable" >{!! $page->element('page_heading')->content !!}
</h2>

<div name="element_{{ $page->element('page_content')->id }}" class="html_editor editable"> {!! $page->element('page_content')->content !!}
</div>

@endsection

@section('scripts')
@include('admin.pages.partials.editors')
@endsection
