<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'category_id',
    	'barcode',
    	'image'
    ];

    public function prices() {
    	return $this->hasMany('App\ProductPrice');
    }

    public function getAllProducts() {
        $products = DB::table('products')
        ->join('product_prices', 'products.id', '=', 'product_prices.product_id')
        ->select('products.*', 'product_prices.id as price_id', 'product_prices.product_id', 'product_prices.description as price_description', 'product_prices.price')
        ->orderBy('name', 'asc')
        ->get(); 

        return $products;        
    }

    public function getProductById($id) {
        return $this->findOrFail($id);
    }

    public function getProductByProductPriceId($productPriceId) {

        $product = DB::table('products') 
        ->join('product_prices', 'products.id', '=', 'product_prices.product_id')
        ->select('products.*', 'product_prices.id as product_price_id', 'product_prices.description as price_description', 'product_prices.price')
        ->where('product_prices.id', '=', $productPriceId)
        ->first();
        
        return $product;
    }
}
