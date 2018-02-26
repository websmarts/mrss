@extends('layouts.admin')

@section('content')
<h1>Product Manager</h1>

<p><a href="{{ route('admin.product.edit',0)}}">Add a product</a></p>


<table class="table table-striped">
	<thead>
		<tr>
			<th>Product</th>
			<th>Description</th>
			<th>Product group</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>

	@foreach($products  as $product)
		<tr>
			<td>
				{{ $product->name }}
			</td>

			<td>
				{{ $product->description }}
				@foreach($product->options as $opt)
					<div>- {{ $opt->description }}</div>
				@endforeach
			</td>

			<td>
				{{ $product->product_group }}
			</td>
			<td align="right">
				<a href="{{ route('admin.product.edit',['id'=>$product->id]) }}" class="btn btn-primary">Edit</a>
			</td>
		</tr>

	@endforeach
</tbody>
</table>

</form>

@endsection
