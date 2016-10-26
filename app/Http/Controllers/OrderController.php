<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::all(); /** $product must be the same name in View folder **/
        return view('order.index', compact('orders'));
        //return view('product.index')->withProduct($product);
    }
