@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('product.new_product')}}</div>

				<div class="panel-body">
					@if (Session::has('message'))
					<div class="alert alert-info">{{ Session::get('message') }}</div>
					@endif
					{!! Html::ul($errors->all()) !!}

					{!! Form::open(array('url' => 'products', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('product_code', trans('product.product_code')) !!}
					{!! Form::text('product_code', Input::old('product_code'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('product_name', trans('product.product_name').' *') !!}
					{!! Form::text('product_name', Input::old('product_name'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('size', trans('product.size')) !!}
					{!! Form::text('size', Input::old('size'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('description', trans('product.description')) !!}
					{!! Form::textarea('description', Input::old('description'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('avatar', trans('product.choose_avatar')) !!}
					{!! Form::file('avatar', Input::old('avatar'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('cost_price', trans('product.cost_price').' *') !!}
					{!! Form::text('cost_price', Input::old('cost_price'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('selling_price', trans('product.selling_price').' *') !!}
					{!! Form::text('selling_price', Input::old('selling_price'), array('class' => 'form-control')) !!}
					</div>

					<div class="form-group">
					{!! Form::label('quantity', trans('product.quantity')) !!}
					{!! Form::text('quantity', Input::old('quantity'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit(trans('product.submit'), array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection