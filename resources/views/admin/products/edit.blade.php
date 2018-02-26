@extends('layouts.admin')

@section('content')
<form method="post" action="{{ route('admin.product.update',['product'=>$product->id ?:0]) }}" class="form-horizontal">
	{{ csrf_field() }}




<div style="border: 1px solid #888; border-radius: 5px; padding:10px; margin-bottom:40px">

	<h3 style="margin-top:10px">{{ $product->id ?'Edit Product':'Add a Product' }}</h3>
	<p><a href="{{ route('admin.products') }}">Back to product list</a></p>
	<div class="row" style="margin-bottom: 20px">
		<label for="product_image" class="col-sm-3 control-label">Product image</label>
		<div class="col-sm-3" style="margin-left:10px;">
		<img
	        class="lfm editable"
	        id="image_holder"
	        data-input="image_path"
	        data-preview="image_holder"
	        src="{{ asset($product->image_path) }}"
	        alt="Product image"
	        width="100"
	        height="100" >
	    </div>
        <div class="col-sm-5">
    		<input style="width:100%" id="image_path" class="lfm-input" type="text" name="image_path" value="{{ $product->image_path }}">
    	</div>
    </div>


	<fieldset style="margin-bottom: 50px">
			<label for="name" class="col-sm-3 control-label">Product name</label>
			<div class="col-sm-9">
				<input class="form-control" name="name" value="{{$product->name}}"/>
			</div>



			<label for="notes" class="col-sm-3 control-label">Notes</label>
			<div class="col-sm-9">
				<textarea class="form-control" name="notes">{{$product->notes}}</textarea>
			</div>

			<label for="payment_period" class="col-sm-3 control-label">Payment period</label>
			<div class="col-sm-9">
				<select class="form-control" name="payment_period" >
					<option value="">Select payment period...</option>
					<option value="weekly" {{ $product->payment_period =='weekly' ? ' selected="selected"':''}}>Weekly</option>
					<option value="once off" {{ $product->payment_period =='once off' ? ' selected="selected"':''}}>Once off</option>
				</select>
			</div>

			<label for="payment_period" class="col-sm-3 control-label">Product group</label>
			<div class="col-sm-9">
				<select class="form-control" name="product_group" >
					<option value="">Select product group ...</option>
					@foreach($productGroups as $pg)
						<option value="{{$pg->name}}" {{ $pg->name == $product->product_group ? ' selected="selected"':''}}>{{$pg->name}}</option>
					@endforeach
				</select>
			</div>
			<label for="display_order" class="col-sm-3 control-label">Display order</label>
			<div class="col-sm-9">
				<input class="form-control" name="display_order" value="{{$product->display_order}}"/>
			</div>
			</fieldset>

			@foreach($product->options as $opt)
			<fieldset style="margin-bottom:10px; padding-bottom: 10px; border-bottom: 1px dashed #888">
				<p>Option: {{ $loop->iteration }}</p>
				<label for="qty" class="col-sm-3 control-label">Quantity</label>
				<div class="col-sm-9">
					<input class="form-control" name="options[{{$opt->id}}][qty]" value="{{$opt->qty}}" />
				</div>

				<label for="price" class="col-sm-3 control-label">Price ($)</label>
				<div class="col-sm-9">
					<input class="form-control" name="options[{{$opt->id}}][price]" value="{{$opt->price}}"/>
				</div>

				<label for="description" class="col-sm-3 control-label">Description</label>
				<div class="col-sm-9">
					<input class="form-control" name="options[{{$opt->id}}][description]" value="{{$opt->description}}"/>
				</div>
			</fieldset>
			@endforeach

			<fieldset>
				<p>Add a product option</p>
				<label for="qty" class="col-sm-3 control-label">Quantity</label>
				<div class="col-sm-9">
					<input class="form-control" name="options[0][qty]" value="" "/>
				</div>

				<label for="price" class="col-sm-3 control-label">Price ($)</label>
				<div class="col-sm-9">
					<input class="form-control" name="options[0][price]" value=""/>
				</div>

				<label for="description" class="col-sm-3 control-label">Description</label>
				<div class="col-sm-9">
					<input class="form-control" name="options[0][description]" value=""/>
				</div>
			</fieldset>




			<div style="text-align: right;"><button href="#" class="btn btn-primary" style="margin-top:15px;">Save</button></div>
</div>
@endsection

@section('scripts')

@include('admin.pages.partials.image_selector')
@endsection
