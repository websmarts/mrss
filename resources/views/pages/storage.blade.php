@extends('layouts.default')

@section('content')
<h2>{!! $page->element('page_heading')->content !!}</h2>
<div class="page_content">{!! $page->element('page_content')->content !!}</div>

<div style="text-align: center">
<a href="{{ route('cart') }}" class="btn btn-primary btn-lg" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a></div>
@endsection
