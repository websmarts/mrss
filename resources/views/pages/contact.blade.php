@extends('layouts.default')

@section('content')
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}

<div class="flex">
    <div class="flex1">
        <p><strong>Phone</strong><br />{!! chunk('contact_phone',$chunks) !!}</p>

        <p><strong>Email</strong><br />{!! chunk('contact_email',$chunks) !!}</p>

        <p><strong>Address</strong><br />{!! chunk('contact_address',$chunks) !!}</p>

        <p><strong>Store Hours</strong><br />{!! chunk('contact_store_hours',$chunks) !!}</p>
    
    </div>
    <div class="flex1">{!! chunk('contact_map',$chunks) !!}</div>
    
    <div class="flex1"> @include('layouts.partials.contact_buttons')</div>
</div>

@endsection
