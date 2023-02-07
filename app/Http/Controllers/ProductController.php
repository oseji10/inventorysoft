<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
// use App\Http\Requests\ConsumerRequest;
use DB;

class ProductController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.products.product-list');
    }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


    public function register_product(Request $request)
    {
      $this->validate($request, [
        'product_id' => 'required|string',
      ]);
  
  
      // \Log::info($request->all());
      $product = new Product();
      $product->product_id = $request->product_id;
      $product->product_name = $request->product_name;
      $product->description = $request->description;
      $product->landed_cost = $request->landed_cost;
      $product->selling_price = $request->selling_price;
      $product->product_type_id = $request->product_type_id;
      $product->manufacturer_id = $request->manufacturer_id;
      $product->added_by = auth()->id();
  
      $product->save();
  
      return back()->with('success', "Product successfully registered.");
    }
    


    public function allproducts()
    {

        $products = DB::table('product')
        ->select('product.*', 'manufacturer.manufacturer_name as mm')
            ->leftjoin('manufacturer', 'manufacturer.manufacturer_id', '=', 'product.manufacturer_id')
            // ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
            ->get();
// return $users;
        return view('pages.products.product-list', compact('products') );

    }


}