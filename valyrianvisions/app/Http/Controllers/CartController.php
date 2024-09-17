<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
class CartController extends Controller
{
    public function save(Request $req){
        $cart = Cart::firstORCreate([
            'user_id' => auth()->user()->getKey()
            
        ]);

        $cartitem = CartItem::firstORCreate([
            'cart_id' => $cart->getKey(),
            'pro_id'=> $req->input('pro_id')
        ]);

        return redirect('cart/cart')->with('success', 'Item Added to Cart');
    }

    public function index(){
        $cart = Cart::where('user_id', auth()->user()->getKey())->first();

        if (!$cart) {
            return view('cart.cart', ['cartItems' => [], 'totalPrice' => 0]);
        }

        // Get the cart items associated with the cart
        $cartItems = CartItem::where('cart_id', $cart->getKey())->with('product')->get();

        // Calculate the total price of the cart
        $totalPrice = $cartItems->sum(function ($cartItem) {
            return $cartItem->product->pro_price;
        });

        return view('cart.cart', [
            'cartItems' => $cartItems,
            'totalPrice' => $totalPrice,
            'shipping' => 5, // Static shipping value
        ]);
    }

    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
        $cartItem->delete();

        return redirect('cart/cart')->with('success', 'Item removed from cart');
    }
}
