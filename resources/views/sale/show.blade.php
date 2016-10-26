@extends('layout-sale')

@section('content')

	</br></br>
    <h1>Sale {{ $sales->id }}</h1>
    <div class="row">

  <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Sale Qty</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <td>{{ $sales->product->code }}</td>
                                <td>{{ $sales->product->name }}</td>
                                <td>{{ $sales->quantity }}</td>
                                <td>{{ $sales->product->cost_price }}</td>
                                <td>{{ $sales->product->selling_price }}</td>
                            </tbody>
                        </table>
  </div>
  
@stop