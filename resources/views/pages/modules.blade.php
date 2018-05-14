@extends('layouts.default')

@section('content')
<div class="page_content_wrapper">
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}

<p style=" text-align: center" ><a href="{{ route('cart') }}" class="btn btn-primary">Check out our prices / Make a booking</a>
</p>

</div>
@endsection
