@extends('layouts.default')

@section('content')

<app></app>

@endsection


@section('scripts')
<script>



	let PRODUCTS = [
	{	id: '11',
		product_type: 'storage-module',
		name: 'Storgae Module',
		description: 'Storage module description',
		notes:'product one notes',
		display_order: 0,
		qty:0,
		options: [
			{qty: 1, description:'M1 description', price:12.34, payment_code: 'w' , display_order: 1},
			{qty: 2, description:'M2 description', price:24.56, payment_code: 'w' , display_order: 2},
			{qty: 3, description:'M3 description', price:36.96, payment_code: 'w' , display_order: 3},
			{qty: 4, description:'M4 description', price:47.89, payment_code: 'w' , display_order: 4},

		]
	},
	{	id: '111',
		product_type: 'removal-module',
		name: 'Removal Module',
		description: 'Removal  module description',
		notes:'product one notes',
		display_order: 0,
		qty:0,
		options: [
			{qty: 1, description:'REmoval M1 description', price:12.34, payment_code: 'w' , display_order: 1},
			{qty: 2, description:'REmoval M2 description', price:24.56, payment_code: 'w' , display_order: 2},
			{qty: 3, description:'REmoval M3 description', price:36.96, payment_code: 'w' , display_order: 3},
			{qty: 4, description:'REmoval M4 description', price:47.89, payment_code: 'w' , display_order: 4},

		]
	},
	{	id: '12',
		product_type: 'extra',
		name: 'Product two',
		notes:'product two notes',
		display_order: 1,
		qty:0,
		options:[
	 		{code: 'E2',  description: 'Product two description', payment_code: 'f', price:15.0}
		]
	},
	{	id: '13',
		product_type: 'extra',
		name: 'Product three',
		notes:'product three notes',
		display_order: 2,
		qty:0,
		options: [
			{code: 'E3',  description: 'Product three description', payment_code: 'f',  price:9.12}
		]
	},
	{	id: '14',
		product_type: 'extra',
		name: 'Product four',
		notes:'product four notes',
		display_order: 3,
		qty:0,
		options: [
			{code: 'E4',  description: 'Product four description', payment_code: 'f',  price:12.34}
			]
	},
	{
		id: '15',
		product_type: 'insurance',
		name: 'Insurance product',
		description: 'Insurance packages',
		notes:'This is the Insurance product notes.',
		display_order: 10,
		qty:0,
		options: [
			{qty: 1, description:'I1 description', price:2.34, payment_code: 'w' , display_order: 1},
			{qty: 2, description:'I2 description', price:4.34, payment_code: 'w' , display_order: 2},
			{qty: 3, description:'I3 description', price:6.34, payment_code: 'w' , display_order: 3},
			{qty: 4, description:'I4 description', price:8.34, payment_code: 'w' , display_order: 4},
			{qty: 5, description:'I5 description', price:10.34, payment_code: 'w' , display_order: 5},
		]},
	];



</script>

<script src="{{ mix('js/booking.js') }}"></script>
@endsection
