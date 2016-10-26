@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('report-sale.reports')}} - {{trans('report-sale.sales_report')}}</div>

				<div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="well well-sm">{{trans('report-sale.grand_total')}}: RM {{DB::table('sale_products')->sum('total_selling')}}</div>
                        </div>
                        <div class="col-md-4">
                            <div class="well well-sm">{{trans('report-sale.grand_profit')}}: RM {{DB::table('sale_products')->sum('total_selling') - DB::table('sale_products')->sum('total_cost')}}</div>
                        </div>
                    </div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('report-sale.sale_id')}}</td>
            <td>{{trans('report-sale.date')}}</td>
            <td>{{trans('report-sale.products_purchased')}}</td>
            <td>{{trans('report-sale.sold_by')}}</td>
            <td>{{trans('report-sale.sold_to')}}</td>
            <td>{{trans('report-sale.price')}}</td>
            <td>{{trans('report-sale.profit')}}</td>
            <td>{{trans('report-sale.payment_type')}}</td>
            <td>{{trans('report-sale.comments')}}</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($saleReport as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{DB::table('sale_products')->where('sale_id', $value->id)->sum('quantity')}}</td>
            <td>{{ $value->user->name }}</td>
            <td>{{ $value->customer->name }}</td>
            <td>RM {{DB::table('sale_products')->where('sale_id', $value->id)->sum('total_selling')}}</td>
            <td>RM {{DB::table('sale_products')->where('sale_id', $value->id)->sum('total_selling') - DB::table('sale_products')->where('sale_id', $value->id)->sum('total_cost')}}</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedSales{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">
                    {{trans('report-sale.detail')}}</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedSales{{ $value->id }}">
                <td colspan="10">
                    <table class="table">
                        <tr>
                            <td>{{trans('report-sale.product_id')}}</td>
                            <td>{{trans('report-sale.product_name')}}</td>
                            <td>{{trans('report-sale.quantity_purchase')}}</td>
                            <td>{{trans('report-sale.price')}}</td>
                            <td>{{trans('report-sale.profit')}}</td>
                        </tr>
                        @foreach(ReportSalesDetailed::sale_detailed($value->id) as $SaleDetailed)
                        <tr>
                            <td>{{ $SaleDetailed->product_id }}</td>
                            <td>{{ $SaleDetailed->product->product_name }}</td>
                            <td>{{ $SaleDetailed->quantity }}</td>
                            <td>RM {{ $SaleDetailed->selling_price * $SaleDetailed->quantity}}</td>
                            <td>RM {{ ($SaleDetailed->quantity * $SaleDetailed->selling_price) - ($SaleDetailed->quantity * $SaleDetailed->cost_price)}}</td>
                        </tr>
                        @endforeach
                    </table>
                </td>
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