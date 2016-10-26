<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use DB;
use App\Http\Requests;

class SupplierController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $suppliers = Supplier::all(); /** $sale must be the same name in View folder **/
        return view('supplier.index', compact('suppliers'));
    }

}
