<?php namespace App\Http\Controllers;

use App\Product, App\Customer, App\Sale;
use App\Supplier, App\Receiving, App\User;
use App;
use App\Http\Controllers\Controller;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$products = Product::where('type', 1)->count();
		$customers = Customer::count();
		$suppliers = Supplier::count();
		$receivings = Receiving::count();
		$sales = Sale::count();
		$employees = User::count();
		return view('home')
			->with('products', $products)
			->with('customers', $customers)
			->with('suppliers', $suppliers)
			->with('receivings', $receivings)
			->with('sales', $sales)
			->with('employees', $employees);
	}

}
