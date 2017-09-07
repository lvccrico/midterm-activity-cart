<?php

namespace App\Http\Controllers;

use App\Cart;
use App\User;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private $customerId;
    private $customerCart;

    public function __construct() {

        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->customerId = Auth::user()->customer->id;
            $this->customerCart = Customer::find($this->customerId)->carts()->first();

            return $next($request);
        }); 
   } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $items = $this->customerCart->items;
        $totalAmount = $this->customerCart->items->sum('pivot.amount');

        return view('cart')->with(['items' => $items, 'total_amount' => $totalAmount]);
    }

    /**
     * Store a newly created resource in storage.
     *

     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $duplicates = $this->customerCart->items->contains('id', $request->product_price_id);

        if ($duplicates) {
            return redirect('cart')->withSuccessMessage('Item is already in your cart!');
        }

        $this->customerCart->items()->syncWithoutDetaching([
            $request->product_price_id => [
                'amount'=> $request->amount, 
                'barcode' => $request->barcode, 
        ]]);

        return redirect('cart')->withSuccessMessage('Item was added to your cart!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productPriceId) {
        
        $item = $this->customerCart->items->where('pivot.product_id', '=', $request->product_price_id)->first();
        $totalPrice = $item->price * $request->quantity;

        $this->customerCart->items()->updateExistingPivot($productPriceId, ['quantity' => $request->quantity, 'amount' => $totalPrice]);
        session()->flash('success_message', 'Quantity was updated successfully!');

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($productPriceId)
    {
        $this->customerCart->items()->detach($productPriceId);
        return redirect('cart')->withMessage('Successfull removed item!');
    }

    public function emptyCart() { 
        $this->customerCart->items()->detach();
        return redirect('cart')->withMessage('Cart Cleard!');
    }
}