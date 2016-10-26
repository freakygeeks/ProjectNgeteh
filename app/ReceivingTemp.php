<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingTemp extends Model {

	public function product()
    {
        return $this->belongsTo('App\Product');
    }

}
