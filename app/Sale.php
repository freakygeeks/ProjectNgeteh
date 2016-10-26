<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
	protected $fillable = ['order_id', 'product_id', 'quantity', 'total_cost_price', 'total_selling_price'];

    public function path()
    {
    	return '/sales/' . $this->id;
    }

    public function product()
    {
    	return $this->belongsTo(Product::class);
    	//return $this->belongsTo('Product');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
        //return $this->belongsTo('Product');
    }
}
