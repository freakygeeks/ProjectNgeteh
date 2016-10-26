@extends('app')

@section('content')
<div class="container">
	<div class="row">
        <div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">{{trans('report-receiving.reports')}} - {{trans('report-receiving.receivings_report')}}</div>

				<div class="panel-body">
<div class="well well-sm">{{trans('report-receiving.grand_total')}}: RM {{DB::table('receiving_products')->sum('total_cost')}}</div>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>{{trans('report-receiving.receiving_id')}}</td>
            <td>{{trans('report-receiving.date')}}</td>
            <td>{{trans('report-receiving.products_received')}}</td>
            <td>{{trans('report-receiving.received_by')}}</td>
            <td>{{trans('report-receiving.supplied_by')}}</td>
            <td>{{trans('report-receiving.total')}}</td>
            <td>{{trans('report-receiving.payment_type')}}</td>
            <td>{{trans('report-receiving.comments')}}</td>
            <td>&nbsp;</td>
        </tr>
    </thead>
    <tbody>
    @foreach($receivingReport as $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->created_at }}</td>
            <td>{{DB::table('receiving_products')->where('receiving_id', $value->id)->sum('quantity')}}</td>
            <td>{{ $value->user->name }}</td>
            <td>{{ $value->supplier->company_name }}</td>
            <td>RM {{DB::table('receiving_products')->where('receiving_id', $value->id)->sum('total_cost')}}</td>
            <td>{{ $value->payment_type }}</td>
            <td>{{ $value->comments }}</td>
            <td>
                <a class="btn btn-small btn-info" data-toggle="collapse" href="#detailedReceivings{{ $value->id }}" aria-expanded="false" aria-controls="detailedReceivings">{{trans('report-receiving.detail')}}</a>
            </td>
        </tr>
        
            <tr class="collapse" id="detailedReceivings{{ $value->id }}">
                <td colspan="9">
                    <table class="table">
                        <tr>
                            <td>{{trans('report-receiving.product_id')}}</td>
                            <td>{{trans('report-receiving.product_name')}}</td>
                            <td>{{trans('report-receiving.product_received')}}</td>
                            <td>{{trans('report-receiving.total')}}</td>
                        </tr>
                        @foreach(ReportReceivingsDetailed::receiving_detailed($value->id) as $receiving_detailed)
                        <tr>
                            <td>{{ $receiving_detailed->product_id }}</td>
                            <td>{{ $receiving_detailed->product->product_name }}</td>
                            <td>{{ $receiving_detailed->quantity }}</td>
                            <td>RM {{ $receiving_detailed->quantity * $receiving_detailed->cost_price}}</td>
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