<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        try{
            $products = Product::whereNull('deleted_at')->get();
            return view('product.index',compact('products'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function list(){
        try{
            $products = Product::whereNull('deleted_at')->get();
            return view('product.list',compact('products'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function view($id){
        try{
            $product = Product::where('id', $id)->first();
            return view('product.view',compact('product'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function add(){
        try{
            return view('product.add');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function create(Request $request){
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'discount' => 'required',
                'style' => 'required',
                'vendor' => 'required',
                'description' => 'required',
            ],
            [
                'name.required'=> 'Name is required',
                'price.required'=> 'Price is required',
                'discount.required'=> 'Discount is required',
                'style.required'=> 'style is required',
                'vendor.required'=> 'Vendor is required',
                'description.required'=> 'Description is required',
            ]);
            if ($validator->fails()) {
                return redirect()->withErrors($validator);
            }

            if ($request->get('name') != "" && $request->get('price') != "" && $request->get('discount') != "" && $request->get('style') != "" && $request->get('vendor') != "" && $request->get('description') != "")
            {
                $product = Product::create([
                    'name' => $request->get('name'),
                    'price' => $request->get('price'),
                    'discount' => $request->get('discount'),
                    'style' => $request->get('style'),
                    'vendor' => $request->get('vendor'),
                    'description' => $request->get('description'),
                ]);

                return redirect()->route('products-list');
             }
            else
            {
                return redirect()->back()->with('error','Adding product failed');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function edit($id){
        try{
            $product = Product::where('id', $id)->first();
            return view('product.edit',compact('product'));
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function update(Request $request, $id){
        try{
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'discount' => 'required',
                'style' => 'required',
                'vendor' => 'required',
                'description' => 'required',
            ],
            [
                'name.required'=> 'Name is required',
                'price.required'=> 'Price is required',
                'discount.required'=> 'Discount is required',
                'style.required'=> 'style is required',
                'vendor.required'=> 'Vendor is required',
                'description.required'=> 'Description is required',
            ]);
            if ($validator->fails()) {
                return redirect()->withErrors($validator);
            }

            if ($request->get('name') != "" && $request->get('price') != "" && $request->get('discount') != "" && $request->get('style') != "" && $request->get('vendor') != "" && $request->get('description') != "")
            {
                $product = Product::find($id);
                $product->name = $request->get('name');
                $product->price = $request->get('price');
                $product->discount = $request->get('discount');
                $product->style = $request->get('style');
                $product->vendor = $request->get('vendor');
                $product->description = $request->get('description');
                $product->updated_at = now();
                $product->save();

                return redirect()->route('products-list');
             }
            else
            {
                return redirect()->back()->with('error','Adding product failed');
            }
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    public function delete($id){
        try{
            $product = Product::where('id', $id)->delete();
            return redirect()->route('products-list');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }
}
