@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('product.inventory_data_tracking')}}</div>

				<div class="panel-body">
					@if (Session::has('message'))
						<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif

					{!! Html::ul($errors->all()) !!}

					<table class="table table-bordered">
					<tr><td>Product Code</td><td>{{ $product->product_code }}</td></tr>
					<tr><td>{{trans('product.product_name')}}</td><td>{{ $product->product_name }}</td></tr>
					<tr><td>{{trans('product.current_quantity')}}</td><td>{{ $product->quantity }}</td></tr>
					
					{!! Form::model($product->inventory, array('route' => array('inventory.update', $product->id), 'method' => 'PUT')) !!}
					<tr><td>{{trans('product.inventory_to_add_subtract')}} *</td><td>{!! Form::text('in_out_qty', Input::old('in_out_qty'), array('class' => 'form-control')) !!}</td></tr>
					<tr><td>{{trans('product.comments')}}</td><td>{!! Form::text('remarks', Input::old('remarks'), array('class' => 'form-control')) !!}</td></tr>
					<tr><td>&nbsp;</td><td>{!! Form::submit(trans('product.submit'), array('class' => 'btn btn-primary')) !!}</td></tr>
					{!! Form::close() !!}
					</table>

					<table class="table table-striped table-bordered">
					    <thead>
					        <tr>
					            <td>{{trans('product.inventory_data_tracking')}}</td>
					            <td>{{trans('product.employee')}}</td>
					            <td>{{trans('product.in_out_qty')}}</td>
					            <td>{{trans('product.remarks')}}</td>
					        </tr>
					    </thead>
					    <tbody>
					    @foreach($product->inventory as $value)
					        <tr>
					            <td>{{ $value->created_at }}</td>
					            <td>{{ $value->user->name }}</td>
					            <td>{{ $value->in_out_qty }}</td>
					            <td>{{ $value->remarks }}</td>
					        </tr>
					    @endforeach
					    </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection