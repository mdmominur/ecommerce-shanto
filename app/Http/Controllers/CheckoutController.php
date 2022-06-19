<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Cart;
use App\Models\order;



class CheckoutController extends Controller
{
    function index(){
        $cartitem = Cart::where('id', Auth::id())->get();
        return view('frontend.checkout',compact('cartitem'));
    }

    function placeorder(Request $request){

        $order = new Order();
        $order->fullname = $request->input('fullname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->save();

    }
}
