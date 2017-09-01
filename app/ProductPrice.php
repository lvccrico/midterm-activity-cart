<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    protected $table = 'product_prices';
    protected $fillable = [
    	'product_id',
    	'description',
    	'price'
    ];

    public function product() {
    	return $this->belongsTo('App\Product');
    }
}