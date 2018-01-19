@extends('layouts.spa')

@section('content')
<app></app>
@endsection


@section('scripts')
<script>

	let products = [
	{id: '1', code: 'P1', name: 'Product one', description: 'Product one description',notes:'product one notes', price:2500},
	{id: '2', code: 'P2', name: 'Product two', description: 'Product two description',notes:'product two notes', price:150},
	{id: '3', code: 'P3', name: 'Product three', description: 'Product three description',notes:'product three notes', price:912},
	{id: '4', code: 'P4', name: 'Product four', description: 'Product four description',notes:'product four notes', price:1234},
	{id: '5', code: 'P4', name: 'Insurance product', description: 'Insurance packages',notes:'Choose the number of insurance units you require. <br />1 unit of insurance = $1,000 cover  $2.30pw<br />2 units of insurance = $10,000 cover  $4.60pw<br />3 units of insurance = $15,000 cover  $6.90pw<br />4 units of insurance = $20,000 cover  $9.20pw<br />', price:230},
	];



</script>

<script src="{{ mix('js/spa.js') }}"></script>
@endsection
