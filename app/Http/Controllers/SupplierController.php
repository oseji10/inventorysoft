<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
// use App\Http\Requests\ConsumerRequest;
use DB;

class SupplierController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.suppliers.supplier-list');
    }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


    public function register_supplier(Request $request)
    {
      $this->validate($request, [
        'supplier_name' => 'required|string',
      ]);
  
  
      // \Log::info($request->all());
      $supplier = new Supplier();
      $supplier->supplier_id = $request->supplier_id;
      $supplier->supplier_name = $request->supplier_name;
      $supplier->supplier_short_name = $request->supplier_short_name;
      $supplier->supplier_address = $request->supplier_address;
      
      $supplier->added_by = auth()->id();
  
      $supplier->save();
  
      return back()->with('success', "Supplier successfully registered.");
    }
    


    public function allsuppliers()
    {

        $suppliers = DB::table('supplier')
        ->select('supplier.*')->get();
        return view('pages.suppliers.supplier-list', compact('suppliers') );

    }


}