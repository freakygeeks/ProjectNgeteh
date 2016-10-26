@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('product.list_products')}}</div>
               
				<div class="panel-body">
				<a class="btn btn-small btn-success" href="{{ URL::to('products/create') }}">{{trans('product.new_product')}}</a>
				<hr />
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('product.product_id')}}</td>
            <td>{{trans('product.product_code')}}</td>
            <td>{{trans('product.product_name')}}</td>
            <td>{{trans('product.size')}}</td>
            <td>{{trans('product.cost_price')}}</td>
            <td>{{trans('product.selling_price')}}</td>
            <td>{{trans('product.quantity')}}</td>
            <td>{{trans('product.admin')}}</td>
            <td>{{trans('product.avatar')}}</td>
        </tr>
    </thead>
    <tbody>
    @foreach($product as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->product_code }}</td>
            <td>{{ $value->product_name }}</td>
            <td>{{ $value->size }}</td>
            <td>RM {{ $value->cost_price }}</td>
            <td>RM {{ $value->selling_price }}</td>
            <td>{{ $value->quantity }}</td>
            <td>

                <a class="btn btn-small btn-success" href="{{ URL::to('inventory/' . $value->id . '/edit') }}">{{trans('product.inventory')}}</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('products/' . $value->id . '/edit') }}">{{trans('product.edit')}}</a>
                {!! Form::open(array('url' => 'products/' . $value->id, 'class' => 'pull-right')) !!}
                    {!! Form::hidden('_method', 'DELETE') !!}
                    {!! Form::submit(trans('product.delete'), array('class' => 'btn btn-warning')) !!}
                {!! Form::close() !!}
            </td>
            <td>{!! Html::image(url() . '/images/products/' . $value->avatar, 'a picture', array('class' => 'thumb')) !!}</td>
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