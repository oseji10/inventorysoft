<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;
// use App\Http\Requests\ConsumerRequest;
use DB;

class ProductTypeController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.products.product-type');
    }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


    public function register_product_type(Request $request)
    {
      $this->validate($request, [
        'product_type_name' => 'required|string',
      ]);
  
  
      // \Log::info($request->all());
      $product_type = new ProductType();
      $product_type->product_type_name = $request->product_type_name;
      $product_type->added_by = auth()->id();
  
      $product_type->save();
  
      return back()->with('success', "Product Type successfully registered.");
    }
    


    public function allproducttypes()
    {

        $product_types = DB::table('product_type')
        ->select('product_type.*')->get();
// return $users;
        return view('pages.products.product-type', compact('product_types') );

    }


}