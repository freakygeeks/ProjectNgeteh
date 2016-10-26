@extends('layout-product')

@section('content')

    <h1>Product</h1>
            <div class="panel panel-default">
            <div class="panel-heading">
                All Product
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">
                    <thead>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Product Qty</th>
                        <th>Cost Price</th>
                        <th>Selling Price</th>
                        <th>Update</th>
                        <th>Delete</th>
                        <th>&nbsp;</th>
                    </thead>

    @if (count($products) > 0)
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td class="table-text"><div><a href="{{ $product->path() }}">{{ $product->code }}</a></div></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>RM {{ $product->cost_price }}</td>
                                <td>RM {{ $product->selling_price }}</td>
                                <td><a href="/products/{{ $product->id }}/edit">Update</a></td>

                                <!-- Task Delete Button -->
                                <td>
                                    <form action="/products/{{ $product->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type="submit" id="delete-products-{{ $product->id }}" class="btn btn-danger">
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