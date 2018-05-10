@extends('layouts.default')

@include('admin.pages.partials.menubar')

@section('slides')
@include('layouts.partials.carousel')
@endsection

@section('content')





      <div class="row" style="background: #fff; margin-top:10px;text-align: center">
        <h2 name="element_{{ $page->element('section_1_heading')->id }}" class="text_editor editable">{!! $page->element('section_1_heading')->content !!}</h2>
        <div class="col-sm-12">
          <div style="text-align: center">

            <img
            class="lfm editable"
            id="holder_{{ $page->element('section_1_image')->id }}"
            data-input="element_{{ $page->element('section_1_image')->id }}"
            data-preview="holder_{{ $page->element('section_1_image')->id }}"
            src="{!! $page->element('section_1_image')->content !!}"
            alt="We Bring Icon"
            width="300" >
            <input id="element_{{ $page->element('section_1_image')->id }}" class="lfm-input" type="hidden" name="filepath" value="{!!  $page->element('section_1_image')->content  !!}">

          </div>
          <div name="element_{{ $page->element('section_1_blurb')->id }}" class="louder html_editor editable">{!! $page->element('section_1_blurb')->content !!}</div>
          <a href="{{ route('storage') }}" class="btn btn-default btn-lg" style="margin-top:15px" >How It Works</a>
          <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" style="margin-top:15px" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>

        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->


    <div class="greyline" style="width:80%;margin: auto ; margin-top:50px;"></div>

      <div class="row" style="background: #fff; margin-top:10px;text-align: center">
        <h2 name="element_{{ $page->element('section_2_heading')->id }}" class="text_editor editable" >{!! $page->element('section_2_heading')->content !!}</h2>
        <div class="col-sm-12">
          <div style="text-align: center">
            <img
            class="lfm editable"
            id="holder_{{ $page->element('section_2_image')->id }}"
            data-input="element_{{$page->element('section_2_image')->id }}"
            data-preview="holder_{{$page->element('section_2_image')->id }}"
            src="{!! $page->element('section_2_image')->content !!}"
            alt="We Move Icon"
            width="300" />
            <input id="element_{{$page->element('section_2_image')->id}}" class="lfm-input" type="hidden" name="filepath" value="{!! $page->element('section_2_image')->content !!}">
          </div>

          <div  name="element_{{ $page->element('section_2_blurb')->id }}"  class="louder html_editor editable">{!! $page->element('section_2_blurb')->content !!}</div>

          <a href="{{ route('removal') }}" class="btn btn-default btn-lg" style="margin-top:15px" >How It Works</a>
          <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" style="margin-top:15px" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->

    <div  class="greyline" style="width:80%; margin: auto; margin-top:50px;"></div>

      <div class="row" style="background: #fff; margin-top:10px;text-align: center">
        <h2 name="element_{{ $page->element('section_3_heading')->id }}" class="text_editor editable" >{!! $page->element('section_3_heading')->content !!}</h2>
        <div class="col-sm-12">
          <div style="text-align: center">
            <img
            class="lfm editable"
            id="holder_{{ $page->element('section_3_image')->id }}"
            data-input="element_{{$page->element('section_3_image')->id }}"
            data-preview="holder_{{$page->element('section_3_image')->id }}"
            src="{!! $page->element('section_3_image')->content !!}"
            alt="More Storage"
            width="100%" >
            <input id="element_{{$page->element('section_3_image')->id}}" class="lfm-input" type="hidden" name="filepath" value="{!! $page->element('section_3_image')->content !!}">
          </div>

          <div  name="element_{{ $page->element('section_3_blurb')->id }}"  class="louder html_editor editable">{!! $page->element('section_3_blurb')->content !!}</div>

          <a href="{{ route('modules') }}" class="btn btn-default btn-lg" style="margin-top:15px" >Module Specs You Need to Know</a>
          
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->

     

     
      <div style="text-align:center;margin-top: 50px">
        <img
        class="lfm editable"
        id="holder_{{ $page->element('section_4_image')->id }}"
        data-input="element_{{$page->element('section_4_image')->id }}"
        data-preview="holder_{{$page->element('section_4_image')->id }}"
        src="{!! $page->element('section_4_image')->content !!}"
        alt="Why people choose us"
        width="100%" >
        <input id="element_{{$page->element('section_4_image')->id}}" class="lfm-input" type="hidden" name="filepath" value="{!! $page->element('section_4_image')->content !!}">
      </div>





@endsection

@section('scripts')
@include('admin.pages.partials.editors')
@endsection
