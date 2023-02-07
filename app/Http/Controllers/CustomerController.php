<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Country;
use App\Models\Lga;
use App\Models\State;
use Illuminate\Http\Request;
use App\Http\Requests\ConsumerRequest;
use App\Models\RoleController;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ConsumerImport;
use Illuminate\Support\Facades\Auth;
use App\Models\Settings;
use App\Utilities\AppConstants;
use App\Utilities\AppHelpers;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Database\Eloquent\Relations\HasOne;




class CustomerController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pages.consumer-data.consumer-upload');
    }

    // public function upload_show()
    // {
    //     return view('pages.consumer-data.consumer_single-upload');
    // }


    public function upload_show()
    {
        $data['country'] = Country::get(["country_code", "country_name"]);
        return view('pages.customer-data.consumer_single-upload', $data);
    }
    public function fetchState(Request $request)
    {
        $data['state'] = State::where("country_code",$request->country_code)->get(["state_name", "state_code"]);
        return response()->json($data);
    }
    public function fetchCity(Request $request)
    {
        $data['lga'] = Lga::where("state_code",$request->state_code)->get(["lga_name", "lga_code"]);
        return response()->json($data);
    }



    public function customer_list()
    {
        return view('pages.customer.customer-list');
    }

    public function download_templates()
    {
        return view('pages.download-template');
    }


    public function fileImport(Request $request) 
    {

        try {
            Excel::import(new ConsumerImport, $request->file('file')->store('temp'));
            // return back();
            return  back()->with('success', 'Uploaded successfully');
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
               return back()->with('error', 'There was an error uploading your records. You might have some duplicates');
            }
            else{
             return back()->with('error', $e->getMessage());
            }
        }

        Excel::import(new ConsumerImport, $request->file('file')->store('temp'));
        return back();
        // return redirect('/consumer-list')->with('success', "Account successfully registered.");
    }

    /**
     * Handle account registration request
     * 
     * @param ConsumerRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    // public function register(ConsumerRequest $request) 
    // {
        // $consumer = Consumer::create($request->validated());

        // $push=$request->validated();
        // $push['username'] = $push['phone_number'];
        // $registration_number=$push['registration_number'];
        // $first_name=$push['first_name'];
        // $last_name=$push['last_name'];
        // $password=$push['password'];
        // $phone_number=$push['phone_number'];
        // $push['user_id'] = auth()->user()->id;
        
        
        // $user = Consumer::create($push);

        // auth()->login($user);
// return redirect('/consumer_single-upload')->with('success', "Consumer successfully registered.");
// return back()->with('success', "Consumer successfully registered.");
        // return redirect('/')->with('success', "Upload successful.");
    // }

    public function register_customer(Request $request)
  {
    $this->validate($request, [
      'customer_phone_number' => 'required|string',
    //   'remarks' => 'required|string',
    //   'created_by' => 'required',

    ]);


    // \Log::info($request->all());
    $customer = new Customer();
    $customer->customer_name = $request->customer_name;
    $customer->customer_email = $request->customer_email;
    $customer->customer_phone_number = $request->customer_phone_number;
    $customer->customer_phone_number_2 = $request->customer_phone_number_2;
    $customer->customer_address = $request->customer_address;
    $customer->customer_state = $request->customer_state;

    $customer->added_by = auth()->id();

    $customer->save();

    return back()->with('success', "Customer successfully registered.");
  }

    public function allcustomers()
    {
    $customers = Customer::query()
    // ->where('added_by', '=', Auth::user()->id)
    // ->with(['state_of_residence' => function ($query) {$query->select('state_code', 'state_name as state_of_residence');}])
    // ->with(['state_of_origin' => function ($query) {$query->select('state_code', 'state_name as state_of_birth');}])
    // ->with(['tier_info' => function ($query) {$query->select('code', 'description as tier_name');}])
    // ->with(['lga_info' => function ($query) {$query->select('lga_code', 'lga_name as lga_of_residence');}])
    // ->with(['country_info' => function ($query) {$query->select('country_code', 'country_name as country_of_residence');}])
    // ->with(['country_of_origin' => function ($query) {$query->select('country_code', 'country_name as country_of_birth');}])
    ->get();
        return view('pages.customer-data.customer-list', compact('customers') );

    }


}