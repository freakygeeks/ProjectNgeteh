@extends('layout-sale')

@section('content')

		<h1>Sale Order No. &nbsp;&nbsp;
            <input name="quantity" class="btn btn-default dropdown-toggle">{{ old('number') }}
            <button type="submit" class="btn btn-primary">Complete Sale</button>
                 </h1><br>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale Item Lists
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Order No</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Sale Qty</th>
                                <th>Selling Price</th>
                                <th>Total Price</th>
                                <th>Delete</th>
                                <th>&nbsp;</th>
                            </thead>
                            @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->order_id }}</td>
                                <td>{{ $sale->product->code }}</td>
                            	<td>{{ $sale->product->name }}</td>
                            	<td>{{ $sale->quantity }}</td>
                            	<td>RM {{ $sale->product->selling_price }}</td>
                                <td>RM {{ $sale->total_selling_price }}</td>
                            	<td>
                                    <form action="/sales/{{ $sale->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-sales-create-{{ $sale->id }}" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </table>
                        <h4>Total Amount Due : RM {{ $total }}</h4>
                    </div>
                </div>

    <div class="panel">
		<form method="POST" action="{{ url('sales') }}">
			{{ csrf_field() }}
			<div class="panel-heading">
                <h3>Add an Item Sale</h3>
                    <table>
                            <thead>
                                <th>Product Name</th>
                                <th>Sale Quantity</th>
                            </thead>
                        <tbody>
                        <tr>
                           <td class="form-group">{{ Form::select('id', $productList, null, [ 'id' => 'name', 'class' => 'btn btn-default dropdown-toggle']) }}</td>
                           &nbsp;
			               <td class="form-group"><input name="quantity" class="btn btn-default dropdown-toggle">{{ old('quantity') }}</td>
                           <td><button type="submit" class="btn btn-primary">Add</button></td>
                        </tr>
                        </tbody>
                    </table>
            </div>
		</form>
    </div>

@stop