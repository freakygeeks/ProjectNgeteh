<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = ['number', 'date'];

    public function path()
    {
    	return '/orders/' . $this->id;
    }

    public function sale()
    {
    	return $this->hasMany(Sale::class);
    }
}
