<?php

namespace App\Http\Controllers;

use App\Models\StockTransfer;
use App\Models\Stock;
use Illuminate\Http\Request;
// use App\Http\Requests\ConsumerRequest;
use DB;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StockController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.stock.stock-list');
    }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


    public function register_stock(Request $request)
    {
      $this->validate($request, [
        'product_id' => 'required|string',
      ]);
  	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
											
											// generate a pin based on 2 * 7 digits + a random character
											$pin = mt_rand(1000, 9999)
												. mt_rand(1000, 9999)
												. $characters[rand(0, strlen($characters) - 1)];
											
											// shuffle the result
											$stock_id = str_shuffle($pin);
  
      // \Log::info($request->all());
      $stock = new Stock();
      $stock->stock_id = $stock_id;
      $stock->manufacturer_id = $request->manufacturer_id;
      $stock->supplier_id = $request->supplier_id;
      $stock->batch_number = $request->batch_number;
      $stock->invoice_number = $request->invoice_number;
      $stock->product_id = $request->product_id;
      $stock->warehouse_id = $request->warehouse_id;
      $stock->quantity_received = $request->quantity_received;
      $stock->quantity_sold = $request->quantity_sold;
      $stock->quantity_expired = $request->quantity_expired;
      $stock->quantity_transferred = $request->quantity_transferred;
      $stock->expiry_date = $request->expiry_date;
      $stock->added_by = auth()->id();
  
      $stock->save();
  
      return back()->with('success', "Stock successfully uploaded.");
    }
    


//     public function allstocks()
//     {

//         $stock = DB::table('stock')
//         ->select('stock.*', 'manufacturer.manufacturer_name')
//             ->leftjoin('manufacturer', 'manufacturer.manufacturer_id', '=', 'stock.manufacturer_id')
//             // ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
//             ->get();
// // return $users;
//         return view('pages.stock.stock-list', compact('stock') );

//     }

    public function allstocks()
    {
    $stock = Stock::query()
    // ->where('added_by', '=', Auth::user()->id)
    ->with(['manufacturer_list' => function ($query) {$query->select('manufacturer_id', 'manufacturer_name as manufacturer_name2');}])
    ->with(['product_list' => function ($query) {$query->select('product_id', 'product_name as product_name2', 'description as description2');}])
    ->with(['warehouse_list' => function ($query) {$query->select('warehouse_id', 'warehouse_name as warehouse_name2');}])
    ->get();
        return view('pages.stock.stock-list', compact('stock') );

    }

    public function transfer_stock(Request $request)
    {
    //   $this->validate($request, [
    //     'stock_id' => 'required|string',
    //   ]);
  	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
											
	// generate a pin based on 2 * 7 digits + a random character
$pin = mt_rand(1000, 9999)
. mt_rand(1000, 9999)
. $characters[rand(0, strlen($characters) - 1)];
											
// shuffle the result
	$stock_id = str_shuffle($pin);
  
      // \Log::info($request->all());
      $stock_transfer = new StockTransfer();
      $stock_transfer->stock_id = $stock_id;
      $stock_transfer->initial_stock_id = $request->initial_stock_id;
      $stock_transfer->sent_from = $request->sent_from;
      $stock_transfer->sent_to = $request->sent_to;
      $stock_transfer->quantity_received = $request->quantity_received;
      $stock_transfer->sent_by = auth()->id();
 
      $stock_transfer->save();
  
      return back()->with('success', "Stock successfully transferred.");
    }

//     public function transfer_stock2(Request $request){
//     DB::transaction(function () {
// 	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
											
// 											// generate a pin based on 2 * 7 digits + a random character
// $pin = mt_rand(1000, 9999)
// . mt_rand(1000, 9999)
// . $characters[rand(0, strlen($characters) - 1)];
											
// // shuffle the result
// 	$stock_id = str_shuffle($pin);
  
//       // \Log::info($request->all());
//       $stock_transfer = new StockTransfer();
//       $stock_transfer->stock_id = $stock_id;
//       $stock_transfer->initial_stock_id = $request->initial_stock_id;
//       $stock_transfer->sent_from = $request->sent_from;
//       $stock_transfer->sent_to = $request->sent_to;
//       $stock_transfer->quantity_received = $request->quantity_received;
//       $stock_transfer->sent_by = auth()->id();
 
//       $stock_transfer->save();
  
//       return back()->with('success', "Stock successfully transferred.");
//     }, 5);
    
//     }

}