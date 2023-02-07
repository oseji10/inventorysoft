<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;
// use App\Http\Requests\ConsumerRequest;
use DB;

class ManufacturerController extends Controller
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


    public function register_manufacturer(Request $request)
    {
      $this->validate($request, [
        'manufacturer_name' => 'required|string',
      ]);
  
  
      // \Log::info($request->all());
      $manufacturer = new Manufacturer();
      $manufacturer->manufacturer_id = $request->manufacturer_id;
      $manufacturer->manufacturer_name = $request->manufacturer_name;
      $manufacturer->manufacturer_short_name = $request->manufacturer_short_name;
      $manufacturer->manufacturer_address = $request->manufacturer_address;
      
      $manufacturer->added_by = auth()->id();
  
      $manufacturer->save();
  
      return back()->with('success', "Manufacturer successfully registered.");
    }
    


    public function allmanufacturers()
    {

        $manufacturers = DB::table('manufacturer')
        ->select('manufacturer.*')->get();
        return view('pages.manufacturers.manufacturer-list', compact('manufacturers') );

    }


}