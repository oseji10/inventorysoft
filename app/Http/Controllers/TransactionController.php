<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TempTransaction;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;
use DB;
use Auth;
use App\Models\User;
use App\Models\Sale;
use Response;
use Illuminate\Support\Collection;
use App\Models\Stock;
use App\Models\Product;
// use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    // public function show()
    // {
    //     // return view('pages.consumer-data.consumer-upload');
    //     return view('pages.transactions.transaction-page');
    // }

    public function consumer_list()
    {
        return view('pages.consumer-data.consumer-list');
    }


   
    public function find_customer (Request $request)
    {
        $find_user = Customer::select('*')
        ->where('customer_phone_number', '=', $request->search)
        ->orWhere('customer_email', '=', $request->search)
        ->get();
      
        if($find_user->isEmpty()) {

            // return $error;
            return back()->with('error', "Ooops! 🥺 Sorry this customer does not exist. Please register the customer");
            // return view('pages.transactions.transaction-list')->with('error', 'User NOT available');
        }
        else
        {
            $transactions = DB::table('temp_transaction')
            ->select('temp_transaction.*', 'product.product_name', 'product.description', 'product.selling_price')
            // ->sum('temp_transaction.quantity as total')
            ->leftjoin('product', 'product.product_id', '=', 'temp_transaction.product_id')
                // ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
                ->get();
            return view('pages.transactions.transaction-page', compact('find_user', 'transactions'))->with('success', 'User available');
        }
    }


    public function add_to_cart(Request $request)
    {
  
  
     
      $transactions = new TempTransaction();
      $transactions->customer_id = $request->customer_id;
      $transactions->product_id = $request->product_id;
      $transactions->quantity = $request->quantity;
    //   $transactions->stock_id = $request->stock_id;
      $transactions->warehouse_id = $request->warehouse_id;
      $transactions->initiated_by = auth()->id();
      $transactions->save();
  
    //   $find_user = Customer::select('*')
    //   ->where('customer_phone_number', '=', $request->customer_phone_number)
    // //   ->orWhere('customer_email', '=', $request->search)
    //   ->get();
      //   return back();


    //   $transactions = DB::table('temp_transaction')
    //   ->select('temp_transaction.*', 'product.*', )
    //   ->leftjoin('product', 'product.product_id', '=', 'temp_transaction.product_id')
    //   // ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
    //   ->get();


    //   return back()->withInput();
    return Response::json($transactions);

    }


    public function show2()
    {
        $transactions = TempTransaction::all();
        return view('pages.transactions.transaction-page')->with(compact('transactions'));
    }

public function register_transaction(Request $request){

    DB::beginTransaction();
 
    // ->reject(function ($name) {return empty($name);
    // });

    // return response()->json([
    //     "products" =>  $query->product_id
    //   ], 201);
    // return $products['id'];
// return $query;

    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$pin = mt_rand(1000, 9999)
	. mt_rand(1000, 9999)
	. $characters[rand(0, strlen($characters) - 1)];
	$transaction_id = str_shuffle($pin);
    
    // return $stock;
    foreach (TempTransaction::all() as $transaction) {
    $stock = Stock::query('select * from stock where product_id', '=', $transaction->product_id, 'and where quantity_received', '!<', $request->quantity)->first();
    
    //Fix this later. It picks the price of the first product
    $product = Product::query('select manufacturer_id, selling_price from product where product_id', '=', $transaction->product_id)->first();
    $sale = new Sale();
    $sale->transaction_id = $transaction_id;
    $sale->stock_id = $stock->stock_id;
    $sale->supplier_id = $stock->supplier_id;
    $sale->unit_cost = $product->selling_price;
    $sale->product_id = $transaction->product_id;
    $sale->manufacturer_id = $product->manufacturer_id;
    $sale->quantity_sold = $transaction->quantity;
    $sale->added_by = auth()->id();
    $sale->save();


    }
    $transactions = new Transaction();
    $transactions->transaction_id = $transaction_id;
    $transactions->sold_by = auth()->id();
    $transactions->bought_by = $request->customer_id;
    $transactions->warehouse_id = $transaction->warehouse_id;
    $transactions->payment_mode = $request->payment_mode;

    $transactions->save();

    DB::delete('delete from temp_transaction where customer_id = ?',[$request->customer_id]);

    DB::commit();
    // return back()->with('success', "Transaction complete.");
}

    public function alltransactions()
    {

        $transactions = DB::table('transaction')
        ->select('transaction.*', 'user.first_name', 'user.last_name')
            ->leftjoin('user', 'user.id', '=', 'transaction.sold_by')
            // ->leftjoin('tier', 'tier.id', '=', 'consumer_data.tier_id')
            ->get();
        return view('pages.transactions.transaction-list', compact('transactions') );

    }

    public function delete_transaction($id)
    {
        // DB::table('user')->where('id', $request->$id)->delete();
        DB::delete('delete from temp_transaction where id = ?',[$id]);
        // return "Success";
    }

}