<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ReceivingTemp;
use App\Product;
use DB, \Auth, \Redirect, \Validator, \Input, \Session, \Response;
use Illuminate\Http\Request;

class ReceivingTempApiController extends Controller {

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
		return Response::json(ReceivingTemp::with('product')->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('receiving.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// cek item_id sudah ada atau belum, jika sudah ada update quantity,
		// jika belum ada tambahkan data (info@mytuta.com)
	//	$result_item_id = ReceivingTemp::where('item_id', '=', Input::get('item_id'))->first();
		//	if ($result_item_id === null) {

				$this->newProduct();


			//			}
			//		else
			//	{
						/* $ReceivingTemps = ReceivingTemp::find($result_item_id->item_id);
						$ReceivingTemps->quantity = 5;
						$ReceivingTemps->total_cost = 54;
						$ReceivingTemps->save();
						return $ReceivingTemps; */
			//		echo "warik";
			//	$this->updateItem();
			//	}
	}
public function updateProduct()
{
	$ReceivingTemps = ReceivingTemp::find(3);
	$ReceivingTemps->quantity = 5;
	$ReceivingTemps->total_cost = 54;
	$ReceivingTemps->save();
	return $ReceivingTemps;
}
public function newProduct()
{
	$type = Input::get('type');
	if ($type == 1)
	{
		$ReceivingTemps = new ReceivingTemp;
		$ReceivingTemps->product_id = Input::get('product_id');
		$ReceivingTemps->cost_price = Input::get('cost_price');
		$ReceivingTemps->total_cost = Input::get('total_cost');
		$ReceivingTemps->quantity = 1;
		$ReceivingTemps->save();
		return $ReceivingTemps;
	}
	else
	{
		$productkits = ProductKitProduct::where('product_kit_id', Input::get('product_id'))->get();
		foreach($productkits as $value)
		{
			$product = Product::where('id', $value->product_id)->first();
			$ReceivingTemps = new ReceivingTemp;
			$ReceivingTemps->product_id = $value->product_id;
			$ReceivingTemps->cost_price = $product->cost_price;
			$ReceivingTemps->total_cost = $product->cost_price * $value->quantity;
			$ReceivingTemps->quantity = $value->quantity;
			$ReceivingTemps->save();
			//return $ReceivingTemps;
		}
			return $ReceivingTemps;
	}
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
		$ReceivingTemps = ReceivingTemp::find($id);
        $ReceivingTemps->quantity = Input::get('quantity');
        $ReceivingTemps->total_cost = Input::get('total_cost');
        $ReceivingTemps->save();
        return $ReceivingTemps;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ReceivingTemp::destroy($id);
	}

}
