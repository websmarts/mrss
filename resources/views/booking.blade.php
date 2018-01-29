@extends('layouts.default')

@section('content')

<app></app>

@endsection


@section('scripts')
<script>



	let PRODUCTS = [
	{	id: 11,
		product_type: 'storage-module',
		name: 'Storage Module',
		description: 'Storage module description',
		notes:'Product notes for the Storage Module product',
		display_order: 0,
		payment_code: 'w',
		qty:0,
		options: [
			{qty: 1, description:'Module X 1', price:12.34, display_order: 1},
			{qty: 2, description:'Module X 2', price:24.56, display_order: 2},
			{qty: 3, description:'Module X 3', price:36.96, display_order: 3},
			{qty: 4, description:'Module X 4', price:47.89, display_order: 4},

		]
	},
	{	id: 111,
		product_type: 'removal-module',
		name: 'Removal Module',
		description: 'Removal  module description',
		notes:'Product notes for the Removal Module product',
		display_order: 0,
		payment_code: 'w',
		qty:0,
		options: [
			{qty: 1, description:'Removal M1 description', price:12.34, display_order: 1},
			{qty: 2, description:'Removal M2 description', price:24.56, display_order: 2},
			{qty: 3, description:'Removal M3 description', price:36.96, display_order: 3},
			{qty: 4, description:'Removal M4 description', price:47.89, display_order: 4},

		]
	},
	{	id: 12,
		product_type: 'extra',
		name: 'Marker payment_code',
		description: 'A water resistent market pen',
		notes:'Product notes for product',
		display_order: 1,
		payment_code: 'f',
		qty:0,
		options:[
	 		{ description: 'Product option description', price:15.0}
		]
	},
	{	id: 13,
		product_type: 'extra',
		name: 'Product three',
		description: 'Product three description',
		notes:'product three notes',
		display_order: 2,
		payment_code: 'f',
		qty:0,
		options: [
			{ description: 'Product three option description', price:9.12}
		]
	},
	{	id: 14,
		product_type: 'extra',
		name: 'Product four',
		description: 'Product four description',
		notes:'product four notes',
		display_order: 3,
		qty:0,
		payment_code: 'f',
		options: [
			{  description: 'Product four option description', price:12.34}
			]
	},
	{
		id: 15,
		product_type: 'insurance',
		name: 'Insurance product',
		description: 'Insurance cover',
		notes:'This is the Insurance product notes.',
		display_order: 10,
		payment_code: 'w',
		qty:0,
		options: [
			{qty: 1, description:'$5,000 cover', price:2.34, display_order: 1},
			{qty: 2, description:'$10,000 cover', price:4.34, display_order: 2},
			{qty: 3, description:'$15,000 cover', price:6.34, display_order: 3},
			{qty: 4, description:'$20,000 cover', price:8.34, display_order: 4},
			{qty: 5, description:'$50,000 cover', price:10.34, display_order: 5},
		]},
	];



</script>

<script src="{{ mix('js/booking.js') }}"></script>
@endsection
