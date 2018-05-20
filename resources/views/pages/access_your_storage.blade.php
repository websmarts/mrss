@extends('layouts.default')

@section('content')
<div class="page_content_wrapper">
<h2>{!! $page->element('page_heading')->content !!}</h2>
{!! $page->element('page_content')->content !!}

<div id="app" >
    <access-storage-form></access-storage-form>
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
