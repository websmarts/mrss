@extends('layouts.default')

@include('admin.pages.partials.menubar')

@section('content')


@include('layouts.partials.carousel')


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


<hr style="width:200px; border-top: 2px dotted #888;margin-top:50px;">

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
            width="300" >
            <input id="element_{{$page->element('section_2_image')->id}}" class="lfm-input" type="hidden" name="filepath" value="{!! $page->element('section_2_image')->content !!}">


          <div  name="element_{{ $page->element('section_2_blurb')->id }}"  class="louder html_editor editable">{!! $page->element('section_2_blurb')->content !!}</div>

          <a href="{{ route('removal') }}" class="btn btn-default btn-lg" style="margin-top:15px" >How It Works</a>
          <a href="{{ route('cart') }}" class="btn btn-primary btn-lg" style="margin-top:15px" >Price / Book Now &nbsp;&nbsp;<i class="fas fa-mouse-pointer"></i></a>
        </div><!-- /.col-lg-12 -->
      </div><!-- /.row -->



@endsection

@section('scripts')
@include('admin.pages.partials.editors')
@endsection
