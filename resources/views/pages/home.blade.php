@extends('layouts.default')



@section('content')


@include('layouts.partials.carousel')

{{-- dump($page) --}}

<div class="row" style="background: #fff; margin-top:10px;text-align: center">
  <h2>{!! $page->element('section_1_heading')->content !!}</h2>
  <div class="col-sm-12">
    <img   src="{!! $page->element('section_1_image')->content !!}" alt="We Bring Icon" style="margin: auto;max-width:400px;" class="img-responsive" >
    <div class="louder">{!! $page->element('section_1_blurb')->content !!}</div>
    <a href="{{ route('storage') }}" class="btn btn-default btn-lg" style="margin-top:15px" >How It Works</a>
    <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" style="margin-top:15px" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>

  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->


<div class="greyline"  style="width:80%;margin: auto ; margin-top:50px;"></div>

       
@include('layouts.partials.testimonials')

<div style="margin-top:30px">
@include('layouts.partials.contact_buttons')
</div>

@endsection
