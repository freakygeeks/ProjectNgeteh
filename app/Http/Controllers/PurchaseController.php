<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purchase;
use DB;
use App\Http\Requests;

class PurchaseController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $purchases = Purchase::all(); /** $sale must be the same name in View folder **/
        return view('purchase.index', compact('purchases'));
    }
}
