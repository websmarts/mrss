@extends('layouts.default')



@section('content')


@include('layouts.partials.carousel')

{{-- dump($page) --}}

       
@include('layouts.partials.testimonials')

<div style="margin-top:30px">
@include('layouts.partials.contact_buttons')
</div>

@endsection
