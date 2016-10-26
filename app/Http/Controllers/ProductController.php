<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Http\Requests;
#use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all(); /** $product must be the same name in View folder **/
        return view('product.index', compact('products'));
        //return view('product.index')->withProduct($product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, Product $products)
    {
        return view('product.create', compact('products', 'sales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'name' => 'required',
            'quantity' => 'required',
            'cost_price' => 'required',
            'selling_price' => 'required'
        ]);
        //dd($request->all());
        $input = $request->all();
        Product::create($input);
        //return redirect()->back();
        return redirect()->action('ProductController@index');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    //public function show($id)
    public function show(Product $products)
    {
        //$product = Product::find($id);
        return view('product.show', compact('products'));
        //return view('product.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    //public function edit($id)
    public function edit(Product $products)
    {
        // $product = Product::findOrFail($id);
        // return view('product.edit')->withProduct($product);
        return view('product.edit', compact('products'));
        //return view('product.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    //public function update($id)
    public function update(Request $request, Product $products)
    {
        $products->update($request->all());
        return view('product.show', compact('products'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    //public function destroy($id)
    public function destroy(Request $request, Product $products)
    {
        //$product = Product::findOrFail($id);
        //$this->path()->('destroy', $product);
        $products->delete();
        return redirect()->back();
        //return redirect()->route('product.index');
        //return redirect('/product');
    }
}
