@extends('layout-product')

@section('content')

	</br></br>
    <h1>Product {{ $products->id }}</h1>
    <div class="row">

  <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Cost Price</th>
                                <th>Selling Price</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                <td>{{ $products->code }}</td>
                                <td>{{ $products->name }}</td>
                                <td>{{ $products->quantity }}</td>
                                <td>RM {{ $products->cost_price }}</td>
                                <td>RM {{ $products->selling_price }}</td>
                            </tbody>
                        </table>
  </div>
  
@stop
