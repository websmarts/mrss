@extends('layouts.default')

@section('content')

<div id="app"><booking-page></booking-page></div>

@endsection


@section('scripts')
<script>



	let PRODUCTS = [
	{	id: '11',
		product_type: 'module',
		name: 'Module',
		description: 'Storage module description',
		notes:'product one notes',
		display_order: 0,
		options: [
			{code: 'M1', description:'M1 description', price:12.34, display_order: 1},
			{code: 'M2', description:'M2 description', price:24.56, display_order: 2},
			{code: 'M3', description:'M3 description', price:36.96, display_order: 3},
			{code: 'M4', description:'M4 description', price:47.89, display_order: 4},

		]
	},
	{	id: '12',
		product_type: 'extra',
		name: 'Product two',
		notes:'product two notes',
		display_order: 1,
		options:[
	 		{code: 'E2',  description: 'Product two description', price:15.0}
		]
	},
	{	id: '13',
		product_type: 'extra',
		name: 'Product three',
		notes:'product three notes',
		display_order: 2,
		options: [
			{code: 'E3',  description: 'Product three description', price:9.12}
		]
	},
	{	id: '14',
		product_type: 'extra',
		name: 'Product four',
		notes:'product four notes',
		display_order: 3,
		options: [
			{code: 'E4',  description: 'Product four description', price:12.34}
			]
	},
	{
		id: '15',
		product_type: 'insurance',
		name: 'Insurance product',
		description: 'Insurance packages',
		notes:'This is the Insurance product notes.',
		display_order: 10,
		options: [
			{code: 'I1', description:'I1 description', price:2.34, display_order: 1},
			{code: 'I2', description:'I2 description', price:4.34, display_order: 2},
			{code: 'I3', description:'I3 description', price:6.34, display_order: 3},
			{code: 'I4', description:'I4 description', price:8.34, display_order: 4},
			{code: 'I5', description:'I5 description', price:10.34, display_order: 5},
		]},
	];



</script>

<script src="{{ mix('js/booking.js') }}"></script>
@endsection
