<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
// use App\Http\Requests\ConsumerRequest;
use DB;

class WarehouseController extends Controller
{
  public function __construct()
{
    // user must log in to use this controller
    $this->middleware('auth');        
}
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


    public function register_warehouse(Request $request)
    {
      $this->validate($request, [
        'warehouse_name' => 'required|string',
      ]);
  
  
      // \Log::info($request->all());
      $warehouse = new Warehouse();
      $warehouse->warehouse_id = $request->warehouse_id;
      $warehouse->warehouse_name = $request->warehouse_name;
      $warehouse->warehouse_email = $request->warehouse_email;
      $warehouse->warehouse_phone = $request->warehouse_phone;
      $warehouse->warehouse_address = $request->warehouse_address;
      $warehouse->warehouse_state = $request->warehouse_state;
      $warehouse->warehouse_short_name = $request->warehouse_short_name;
      $warehouse->warehouse_manager = $request->warehouse_manager;
      $warehouse->added_by = auth()->id();
  
      $warehouse->save();
  
      return back()->with('success', "Warehouse successfully registered.");
    }
    


    public function allwarehouses()
    {

        $warehouses = DB::table('warehouse')
        ->select('warehouse.*')->get();
        return view('pages.warehouses.warehouse-list', compact('warehouses') );

    }


}