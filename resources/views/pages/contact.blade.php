@extends('layouts.default')

@section('content')
<div class="page_content_wrapper">
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}

<div class="flex">
    <div class="flex1">
        <p><strong>Phone</strong><br /><a href="tel:{!! spacetodash(chunk('contact_phone',$chunks)) !!}">{!! chunk('contact_phone',$chunks) !!}</a></p>

        <p><strong>Email</strong><br />{!! chunk('contact_email',$chunks) !!}</p>

        <p><strong>Address</strong><br />{!! chunk('contact_address',$chunks) !!}</p>

        <p><strong>Store Hours</strong><br />{!! chunk('contact_store_hours',$chunks) !!}</p>
    
    </div>
    <div class="flex1" style="margin-bottom: 30px;" >
        <div style="width:300px;margin:auto">{!! chunk('contact_map',$chunks) !!}</div>
    </div>
    
    <div class="flex1"> @include('layouts.partials.contact_buttons')</div>
</div>
</div>
@endsection
