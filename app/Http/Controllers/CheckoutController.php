<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Cart;
use App\Models\order;
use App\Models\Sale;

class CheckoutController extends Controller
{
    function index()
    {

        return view('frontend.checkout');
    }

    function placeorder(Request $request)
    {
        $request->validate([
            'fullname' => "required",
            'email' => "required",
            'phone' => "required",
            'address' => "required",
        ]);

        $ip_address = $_SERVER['REMOTE_ADDR'];
        $carts = Cart::where('ip_address', $ip_address)->get();
        $product_ids = [];
        $total_bill = 0;
        foreach ($carts as $item) {
            array_push($product_ids, $item->product_id);
            $total_bill += $item->getProduct->price;
        }

        $ip_address = $_SERVER['REMOTE_ADDR'];
        Sale::insert([
            'product_list' => implode('-', $product_ids),
            'ip_address' => $ip_address,
            'total_bill' => $total_bill,
            'customer_name' => $request->fullname,
            'customer_phone' => $request->phone,
            'customer_email' => $request->email,
            'customer_address' => $request->address,
        ]);

        Cart::where('ip_address', $ip_address)->delete();
        return redirect('/')->with('successMsg', 'Order purched successfully');
    }

    public function orderDelete($id)
    {
        Sale::findOrFail($id)->delete();
        return back()->with('dangerMsg', 'Sale deleted');
    }

    public function saleDetails($id)
    {
        $sales = Sale::findOrFail($id);
        $product_ids = explode("-", $sales->product_list);
        $products = Post::whereIn('id', $product_ids)->get();

        return view('admin.sales.details', compact('sales', 'products'));
    }
}
