@extends('layouts.default')

@section('content')
<div class="page_content_wrapper">
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}

<div id="app">
    <message-us></message-us>
</div>

</div>

@endsection

@section('scripts')

<script>/* eslint-disable no-new */
        new Vue({
          el: '#app'
        })
</script>

@endsection

