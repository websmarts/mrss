@extends('layouts.default')



@section('content')


@include('layouts.partials.carousel')

{{-- dump($page) --}}

<div style="background: #fff; margin-top:10px;text-align: center">
  <h2>{!! $page->element('section_1_heading')->content !!}</h2>
  <div>
    <img   src="{!! $page->element('section_1_image')->content !!}" alt="We Bring Icon" style="margin: auto;max-width:70%;" class="img-responsive" >
    <div class="louder">{!! $page->element('section_1_blurb')->content !!}</div>
    <a href="{{ route('storage') }}" class="btn btn-default btn-lg" style="margin-top:15px" >How It Works</a>
    <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" style="margin-top:15px" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>

  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div  class="greyline"  style="width:80%;margin: auto ; margin-top:50px;"></div>

<div style="background: #fff; margin-top:10px;text-align: center">
  <h2>{!! $page->element('section_2_heading')->content !!}</h2>
  <div>
    <img   src="{!! $page->element('section_2_image')->content !!}" alt="We Bring Icon" style="margin: auto;max-width:70%;" class="img-responsive" >
    <div class="louder">{!! $page->element('section_2_blurb')->content !!}</div>

    <a href="{{ route('removal') }}" class="btn btn-default btn-lg" style="margin-top:15px" >How It Works</a>
    <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" style="margin-top:15px" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>
  </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div  class="greyline"  style="width:80%;margin: auto ; margin-top:50px;"></div>

<div style="background: #fff; margin-top:10px;text-align: center">
  <h2>{!! $page->element('section_3_heading')->content !!}</h2>
  <div>
    <img   src="{!! $page->element('section_3_image')->content !!}" alt="Our Storage Modules"  style="margin: auto;" class="img-responsive"  >
    <div class="louder">{!! $page->element('section_3_blurb')->content !!}</div>

    <a href="{{ route('modules') }}" class="btn btn-default btn-lg" style="margin-top:15px" >{{chunk('button_text_modules_page',$chunks)}}</a>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->

<div style="text-align: center;margin-top:50px"><img   src="{!! $page->element('section_4_image')->content !!}" alt="Why people choose us" style="margin: auto" class="img-responsive"></div>





       
@include('layouts.partials.testimonials')

<div style="margin-top:30px">
@include('layouts.partials.contact_buttons')
</div>


@endsection
