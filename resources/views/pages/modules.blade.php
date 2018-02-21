@extends('layouts.default')

@section('content')
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}

<p style=" text-align: center" ><a href="/booking" class="btn btn-primary">Check out our prices / Make a booking</a>
@endsection
