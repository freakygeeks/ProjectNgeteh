<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale;
use App\SaleTemp;
use App\SaleProduct;
use App\Inventory;
use App\Customer;
use App\Product;
use App\Http\Requests\SaleRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class SaleController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$sales = Sale::orderBy('id', 'desc')->first();
		$customers = Customer::lists('name', 'id');
		return view('sale.index')
			->with('sale', $sales)
			->with('customer', $customers);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(SaleRequest $request)
	{

		// $this->validate($request, [
  //   		'product_id' => 'required',
		// ]);

	    $sales = new Sale;
        $sales->customer_id = Input::get('customer_id');
        $sales->user_id = Auth::user()->id;
        $sales->payment_type = Input::get('payment_type');
        $sales->comments = Input::get('comments');
        $sales->save();
        // process sale products
        $saleProducts = SaleTemp::all();

		foreach ($saleProducts as $value) {
			$saleProductsData = new SaleProduct;
			$saleProductsData->sale_id = $sales->id;
			$saleProductsData->product_id = $value->product_id;
			$saleProductsData->cost_price = $value->cost_price;
			$saleProductsData->selling_price = $value->selling_price;
			$saleProductsData->quantity = $value->quantity;
			$saleProductsData->total_cost = $value->total_cost;
			$saleProductsData->total_selling = $value->total_selling;
			$saleProductsData->save();
			//process inventory
			$products = Product::find($value->product_id);
			if($products->type == 1)
			{
				$inventories = new Inventory;
				$inventories->product_id = $value->product_id;
				$inventories->user_id = Auth::user()->id;
				$inventories->in_out_qty = -($value->quantity);
				$inventories->remarks = 'SALE'.$sales->id;
				$inventories->save();
				//process product quantity
	            $products->quantity = $products->quantity - $value->quantity;
	            $products->save();
        	}
        	else
        	{
        		//todo
        	}
		}
		//delete all data on SaleTemp model
		SaleTemp::truncate();
        $productssale = SaleProduct::where('sale_id', $saleProductsData->sale_id)->get();
            Session::flash('message', 'You have successfully added sales');
            //return Redirect::to('receivings');
            return view('sale.complete')
            	->with('sales', $sales)
            	->with('saleProductsData', $saleProductsData)
            	->with('saleProducts', $productssale);

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
