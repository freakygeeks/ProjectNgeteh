<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;
use App\Product;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sales = Sale::all(); /** $sale must be the same name in View folder **/
        return view('sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request, Sale $sales)
    {
        // check if sales_id exist
        // exisst
        // get sale
        // retrive sales items
        // not exist

        $productList = Product::lists('name', 'id', 'selling_price');

        $sales = Sale::all();

        $total = 0;
        foreach ($sales as $sale) {
            $total += $sale->total_selling_price;
        }
        return view('sale.create', compact('sales', 'productList', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, Product $product)
    {
        $this->validate($request, [
            'id' => 'required',
            'quantity' => 'required',
        ]);

        //dd($request->all());
        // $input = $request->all();
        // Sale::create($input);
        // return redirect()->back();

        $id = $request->id; 
        $cost_price = Product::where('id' , '=', $id)->value('cost_price');
        $selling_price = Product::where('id' , '=', $id)->value('selling_price');

        $add = new Sale();
        $add->product_id = $request->id; 
        $add->quantity = $request->quantity;
        $add->total_cost_price = $request->quantity * $cost_price; 
        $add->total_selling_price = $request->quantity * $selling_price; 
        $add->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    // public function show($id)
    public function show(Sale $sales)
    {
        //$sale = Sale::find($id);
        return view('sale.show', compact('sales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Sale $sales)
    {
        return view('sale.edit', compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, Sale $sales)
    {
        $sales->update($request->all());
        return view('sale.show', compact('sales'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request, Sale $sales)
    {
        $sales->delete();
        return redirect()->back();
    }
}
