@extends('layout-sale')

@section('content')

		<h1>Update a Sale</h1>
		<form method="POST" action="/sales/{{ $sales-> id }}">
			{{ csrf_field() }}
			{{ method_field('PATCH') }}
			<div class="form-group">
				<textarea name="quantity" class="form-control">{{ $sales->quantity }}</textarea>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Update</button>
			</div>
		</form>
@stop