@extends('layout-product')

@section('content')

		<h1>Update a Product</h1>
		<form method="POST" action="/products/{{ $products-> id }}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<textarea name="code" class="form-control">{{ $products->code }} </textarea>
			</div>

			<div class="form-group">
				<textarea name="name" class="form-control">{{ $products->name }}</textarea>
			</div>

			<div class="form-group">
				<textarea name="quantity" class="form-control">{{ $products->quantity }}</textarea>
			</div>


			<div class="form-group">
				<textarea name="cost_price" class="form-control">{{ $products->cost_price }}</textarea>
			</div>

			<div class="form-group">
				<textarea name="selling_price" class="form-control">{{ $products->selling_price }}</textarea>
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
@stop