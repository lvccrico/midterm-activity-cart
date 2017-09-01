<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{	
	private $products;

	public function __construct(Product $products) {
		$this->products = $products;
	}	

    public function index() {
    	$products = $this->products->getAllProducts();
    	return view('shop', compact('products'));
    }

    public function show($id) {
    	$product = $this->products->getProductByProductPriceId($id);
    	return view('product', compact('product'));
    }
}