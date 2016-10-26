<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Inventory;
use App\Http\Requests\ProductRequest;
use \Auth, \Redirect, \Validator, \Input, \Session;
use Image;
use Illuminate\Http\Request;

class ProductController extends Controller {

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
			$products = Product::where('type', 1)->get();
			return view('product.index')->with('product', $products);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('product.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ProductRequest $request)
	{
		    $products = new Product;
            $products->product_code = Input::get('product_code');
            $products->product_name = Input::get('product_name');
            $products->size = Input::get('size');
            $products->description = Input::get('description');
            $products->cost_price = Input::get('cost_price');
            $products->selling_price = Input::get('selling_price');
            $products->quantity = Input::get('quantity');
            $products->save();
            // process inventory
            if(!empty(Input::get('quantity')))
			{
				$inventories = new Inventory;
				$inventories->product_id = $products->id;
				$inventories->user_id = Auth::user()->id;
				$inventories->in_out_qty = Input::get('quantity');
				$inventories->remarks = 'Manual Edit of Quantity';
				$inventories->save();
			}
            // process avatar
            $image = $request->file('avatar');
			if(!empty($image))
			{
				$avatarName = 'product' . $products->id . '.' . 
				$request->file('avatar')->getClientOriginalExtension();

				$request->file('avatar')->move(
				base_path() . '/public/images/products/', $avatarName
				);
				$img = Image::make(base_path() . '/public/images/products/' . $avatarName);
				$img->resize(100, null, function ($constraint) {
					$constraint->aspectRatio();
				});
				$img->save();
				$productAvatar = Product::find($products->id);
				$productAvatar->avatar = $avatarName;
	            $productAvatar->save();
        	}
            Session::flash('message', 'You have successfully added product');
            return Redirect::to('products/create');
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
			$products = Product::find($id);
	        return view('product.edit')
	            ->with('product', $products);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(ProductRequest $request, $id)
	{
            $products = Product::find($id);
            // process inventory
			$inventories = new Inventory;
			$inventories->product_id = $id;
			$inventories->user_id = Auth::user()->id;
			$inventories->in_out_qty = Input::get('quantity')- $products->quantity;
			$inventories->remarks = 'Manual Edit of Quantity';
			$inventories->save();
			// save update
            $products->product_code = Input::get('product_code');
            $products->product_name = Input::get('product_name');
            $products->size = Input::get('size');
            $products->description = Input::get('description');
            $products->cost_price = Input::get('cost_price');
            $products->selling_price = Input::get('selling_price');
            $products->quantity = Input::get('quantity');
            $products->save();
            // process avatar
            $image = $request->file('avatar');
			if(!empty($image)) {
				$avatarName = 'product' . $id . '.' . 
				$request->file('avatar')->getClientOriginalExtension();

				$request->file('avatar')->move(
				base_path() . '/public/images/products/', $avatarName
				);
				$img = Image::make(base_path() . '/public/images/products/' . $avatarName);
				$img->resize(100, null, function ($constraint) {
					$constraint->aspectRatio();
				});
				$img->save();
				$productAvatar = Product::find($id);
				$productAvatar->avatar = $avatarName;
	            $productAvatar->save();
        	}
            Session::flash('message', 'You have successfully updated product');
            return Redirect::to('products');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			$products = Product::find($id);
	        $products->delete();

	        Session::flash('message', 'You have successfully deleted product');
	        return Redirect::to('products');
	}

}
