@extends('layouts.default')

@section('content')
<div class="page_content_wrapper">
{{-- dump($locations) --}}
{{-- dump($products) --}}

<app></app>

</div>

@endsection


@section('scripts')

<script>
let LOCATIONS = JSON.parse(@json($locations));
let PRODUCTS = JSON.parse(@json($products));
let CARTAGE = JSON.parse(@json($cartage));
let HOWHEAROPTIONS = @json($howhearoptions);
</script>

<script src="{{ mix('js/booking.js') }}"></script>
@endsection
