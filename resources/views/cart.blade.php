@extends('layouts.default')

@section('content')
{{-- dump($locations) --}}
{{-- dump($products) --}}

<app></app>

@endsection


@section('scripts')

<script>
let LOCATIONS = JSON.parse(@json($locations));
let PRODUCTS = JSON.parse(@json($products));
</script>

<script src="{{ mix('js/booking.js') }}"></script>
@endsection
