@extends('layouts.default')

@section('content')


@include('layouts.partials.carousel')

{{-- dump($page) --}}


      <div class="row" style="background: #fff; margin-top:10px;text-align: center">
        <h2>{!! $page->element('section_1_heading')->content !!}</h2>
        <div class="col-sm-12">
          <div style="text-align: center"><img   src="{!! $page->element('section_1_image')->content !!}" alt="We Bring Icon" width="400" ></div>
          <div class="louder">{!! $page->element('section_1_blurb')->content !!}</div>
          <a href="{{ route('storage') }}" class="btn btn-default btn-lg" >How It Works</a>
          <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>

        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->


<hr style="width:200px; border-top: 2px dotted #888;margin-top:50px;">

      <div class="row" style="background: #fff; margin-top:10px;text-align: center">
        <h2>{!! $page->element('section_2_heading')->content !!}</h2>
        <div class="col-sm-12">
          <div style="text-align: center"><img   src="{!! $page->element('section_2_image')->content !!}" alt="We Bring Icon" width="400" ></div>
          <div class="louder">{!! $page->element('section_2_blurb')->content !!}</div>

          <a href="{{ route('removal') }}" class="btn btn-default btn-lg" >How It Works</a>
          <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->



@endsection
