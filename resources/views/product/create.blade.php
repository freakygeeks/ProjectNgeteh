@extends('layout-product')

@section('content')
	
		<h1>Add a Product</h1>

		<form method="POST" action="{{ url('products') }}">
			{{ csrf_field() }}

			<br>
			<h4>Product Code</h4>
			<div class="form-group">
				<input name="code" class="form-control" hidden="Product Code">{{ old('code') }}
			</div>

			<h4>Product Name</h4>
			<div class="form-group">
				<input name="name" class="form-control">{{ old('name') }}
			</div>

			<h4>Quantity</h4>
			<div class="form-group">
				<input name="quantity" class="form-control">{{ old('quantity') }}
			</div>

			<h4>Cost Price</h4>
			<div class="form-group">
				<input name="cost_price" class="form-control">{{ old('cost_price') }}
			</div>

			<h4>Selling Price</h4>
			<div class="form-group">
				<input name="selling_price" class="form-control">{{ old('selling_price') }}
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
		</form>

@stop