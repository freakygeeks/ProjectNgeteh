@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('product.update_product')}}</div>

				<div class="panel-body">
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($product, array('route' => array('products.update', $product->id), 'method' => 'PUT', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('product_code', trans('product.product_code')) !!}
					{!! Form::text('product_code', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('product_name', trans('product.product_name')) !!}
					{!! Form::text('product_name', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('size', trans('product.size')) !!}
					{!! Form::text('size', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('description', trans('product.description')) !!}
					{!! Form::text('description', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', trans('product.choose_avatar')) !!}
					{!! Form::file('avatar', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('cost_price', trans('product.cost_price')) !!}
					{!! Form::text('cost_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('selling_price', trans('product.selling_price')) !!}
					{!! Form::text('selling_price', null, array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('quantity', trans('product.quantity')) !!}
					{!! Form::text('quantity', null, array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit(trans('product.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection