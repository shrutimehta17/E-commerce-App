<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use Auth;

class CartController extends Controller
{
    public function index(){
        try{
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            $cart_id = $cart->id;
            $cart_items = CartItem::where('cart_id', $cart_id)->with('product')->get();
            return view('cart.index', compact('cart', 'cart_items'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function addToCart($id){
        try{
            $product = Product::find($id);
            $cart = Cart::where('user_id', auth()->user()->id)->count();

            if($cart == 0){

                $cart = Cart::create([
                    'user_id' => auth()->user()->id,
                    'total' => $product->price,
                    'discount' => $product->discount,
                ]);

                $cart_id = $cart->id;

                $cart_item = CartItem::create([
                    'cart_id' => $cart_id,
                    'product_id' => $id,
                    'price' => $product->price,
                    'discount' => $product->discount,
                ]);

                return redirect()->route('products');
            }
            else{
                $cart = Cart::where('user_id', auth()->user()->id)->first();
                $cart_id = $cart->id;

                $cart_item = CartItem::create([
                    'cart_id' => $cart_id,
                    'product_id' => $id,
                    'price' => $product->price,
                    'discount' => $product->discount,
                ]); 

                $total = CartItem::where('cart_id', $cart_id)->selectRaw('SUM(price) as total_price, SUM(discount) as total_discount')->first();

                $cartUpdate = Cart::find($cart_id);
                $cartUpdate->total = $total->total_price;
                $cartUpdate->discount = $total->total_discount;
                $cartUpdate->save();

                return redirect()->route('products');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
}
