<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function cart()
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $carts = Cart::where('ip_address', $ip_address)->orderBy('id', 'desc')->paginate(10);

        return view('frontend.cart', compact('carts'));
    }
    public function addToCart($id)
    {
        $ip_address = $_SERVER['REMOTE_ADDR'];

        $allreadyExist = Cart::where('product_id', $id)->count();
        if (!!$allreadyExist) {
            return redirect('/cart')->with('dangerMsg', 'Product already exist in the cart');
        }
        Cart::insert([
            'product_id' => $id,
            'ip_address' => $ip_address
        ]);

        return redirect('/cart')->with('successMsg', 'Product added to the cart');
    }

    public function cartRemove($id)
    {
        Cart::findOrFail($id)->delete();
        return back()->with('dangerMsg', 'Product removed from cart');
    }
}
