<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = ['code', 'name', 'quantity', 'cost_price', 'selling_price'];

    public function path()
    {
    	return '/products/' . $this->id;
    }

    public function sale()
    {
    	return $this->hasMany(Sale::class);
    	//return $this->hasMany('Sale');
    }
}
