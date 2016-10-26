<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Receiving;
use App\ReceivingTemp;
use App\ReceivingProduct;
use App\Inventory;
use App\Supplier;
use App\Product;
use App\Http\Requests\ReceivingRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Illuminate\Http\Request;

class ReceivingController extends Controller {

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
			$receivings = Receiving::orderBy('id', 'desc')->first();
			$suppliers = Supplier::lists('company_name', 'id');
			return view('receiving.index')
				->with('receiving', $receivings)
				->with('supplier', $suppliers);
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
	public function store(ReceivingRequest $request)
	{
		    $receivings = new Receiving;
            $receivings->supplier_id = Input::get('supplier_id');
            $receivings->user_id = Auth::user()->id;
            $receivings->payment_type = Input::get('payment_type');
            $receivings->comments = Input::get('comments');
            $receivings->save();
            // process receiving items
            $receivingProducts = ReceivingTemp::all();
			foreach ($receivingProducts as $value) {
				$receivingProductsData = new ReceivingProduct;
				$receivingProductsData->receiving_id = $receivings->id;
				$receivingProductsData->product_id = $value->product_id;
				$receivingProductsData->cost_price = $value->cost_price;
				$receivingProductsData->quantity = $value->quantity;
				$receivingProductsData->total_cost = $value->total_cost;
				$receivingProductsData->save();
				//process inventory
				$products = Product::find($value->product_id);
				$inventories = new Inventory;
				$inventories->product_id = $value->product_id;
				$inventories->user_id = Auth::user()->id;
				$inventories->in_out_qty = $value->quantity;
				$inventories->remarks = 'PURCHASE'.$receivings->id;
				$inventories->save();
				//process item quantity
	            $products->quantity = $products->quantity + $value->quantity;
	            $products->save();
			}
			//delete all data on ReceivingTemp model
			ReceivingTemp::truncate();
			$productsreceiving = ReceivingProduct::where('receiving_id', $receivingProductsData->receiving_id)->get();
            Session::flash('message', 'You have successfully added receivings');
            //return Redirect::to('receivings');
            return view('receiving.complete')
            	->with('receivings', $receivings)
            	->with('receivingProductsData', $receivingProductsData)
            	->with('receivingProducts', $productsreceiving);


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
            $products = Product::find($id);
            // process inventory
			$receivingTemps = new ReceivingTemp;
			$inventories->product_id = $id;
			$inventories->quantity = Input::get('quantity');
			$inventories->save();
			
            Session::flash('message', 'You have successfully add product');
            return Redirect::to('receivings');
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
