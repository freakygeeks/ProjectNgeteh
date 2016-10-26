@extends('layout-sale')

@section('content')
	
		<h1>Sale</h1>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Sale Lists
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


         @if (count($sales) > 0)

                            <tbody>
                                @foreach ($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->order_id }}</td>
                                        <td class="table-text"><div><a href="{{ $sale->path() }}">{{ $sale->product->code }}</a></div>
                                        </td>
                                        <td>{{ $sale->product->name }}</td>
                                        <td>{{ $sale->quantity }}</td>
                                        <td>RM {{ $sale->product->selling_price }}</td>
                                        <td>RM {{ $sale->total_selling_price }}</td>
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="/sales/{{ $sale->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-sales-{{ $sale->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
@stop