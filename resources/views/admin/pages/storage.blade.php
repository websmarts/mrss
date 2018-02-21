@extends('layouts.default')

@include('admin.pages.partials.menubar')

@section('content')
<h2 name="element_{{ $page->element('page_heading')->id }}" class="text_editor editable" >{!! $page->element('page_heading')->content !!}
</h2>

<div name="element_{{ $page->element('page_content')->id }}" class="html_editor editable"> {!! $page->element('page_content')->content !!}
</div>

<div style="text-align: center">
<a href="{{ route('cart') }}" class="btn btn-primary btn-lg" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a></div>
@endsection

@section('scripts')
@include('admin.pages.partials.editors')
@endsection
