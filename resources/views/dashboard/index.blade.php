
@extends('layouts.simple.master')

@section('title', 'Dashboard')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/date-picker.css')}}">
@endsection

@section('style')
@endsection
<br/>
@section('breadcrumb-title')

<h3>Welcome <b>{{Auth::user()->first_name ?? null}}!</b> <br/>You're logged in as a <b>{{Auth::user()->role_info->role_name ?? null}}</b></h3>

@endsection

{{-- @section('breadcrumb-items')
<li class="breadcrumb-item">Dashboard</li>
<li class="breadcrumb-item active">Default</li>
@endsection --}}

@section('content')
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		
		{{-- Sales Rep --}}
		{{-- @if (Auth::user()->role_id=="1" ?? null)
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments Today</span>


						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count();}}
							
						</h4>


						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>

		 <div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments This Week</span>
						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()}}
						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
		 <div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-primary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Enrolments This Month</span>
						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()}}
						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>

		 <div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card o-hidden">
			   <div class="bg-secondary b-r-4 card-body">
				  <div class="media static-top-widget">
					 <div class="align-self-center text-center"><i data-feather="calendar"></i></div>
					 <div class="media-body">
						<span class="m-0">My Total Enrolments</span>
						<h4 class="mb-0 counter">
							{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->count();}}
						</h4>
						<i class="icon-bg" data-feather="calendar"></i>
					 </div>
				  </div>
			   </div>
			</div>
		 </div> --}}


{{-- Supervisor Analytics --}}
{{-- @elseif (Auth::user()->role_id=="2" ?? null)
<div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments Today</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereDay('consumer_data.created_at', Carbon\Carbon::now()->day)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments Today</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count();}}</h4>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments This Week</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Week</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()}}</h4>
			 </div>
	   </div>
	</div>
 </div>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">My Agents' Enrolments This Month</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->where('user.coordinator_id', '=', Auth::user()->id)
					->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Month</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()}}</h4>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-secondary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">My Agents' Total Enrolments</span>
				<h4 class="mb-0 counter">
				{{DB::table('consumer_data')
				->select('select consumer_data.* from consumer_data')
				->where('user.coordinator_id', '=', Auth::user()->id)
				->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
				->count();}}</h4>
			 </div>
			 <hr/>
			 <div class="media-body">
				<span class="m-0">My Total Enrolments</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->count();}}</h4>
			 </div>
	   </div>
	</div>
 </div> --}}



 {{-- Admin Analytics --}}
 {{-- @elseif (Auth::user()->role_id=="3" ?? null) --}}
 {{-- @if (User::where('email', '=', Input::get('email'))->exists()) {
	// user found
 } --}}


 @if (Auth::user()->role_id=="3" ?? null)
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Sales Today</span>
				<h4>&#8358;
					{{number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->whereDay('sale.created_at', Carbon\Carbon::now()->day)
					->value('cons'), 2);
					}}
				</h4>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Sales This Week</span>
				<h4 class="mb-0 counter">
					&#8358;
					{{number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->whereBetween('sale.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->value('cons'), 2);
					}}
				</h4>
			 </div>
	   </div>
	</div>
 </div>


 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Sales This Month</span>
				<h4 class="mb-0 counter">
					&#8358;
					{{number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('cons'), 2);
					}}
				</h4>
			 </div>
	   </div>
	</div>
 </div>


 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Total Sales</span>
				<h4 class="mb-0 counter">
					&#8358;
					{{number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('cons'), 2);
					}}
				</h4>
			 </div>
	   </div>
	</div>
 </div>


 {{----------- Other Analytics----------}}
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 {{-- <div class="media-body"> --}}
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					{{(DB::table('product')
					->selectRaw('COUNT(product.id) as products')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('products'));
					}}
				</h4>
				<span class="m-0">Products</span>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 {{-- <div class="media-body"> --}}
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					{{(DB::table('manufacturer')
					->selectRaw('COUNT(manufacturer.id) as manufacturer')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('manufacturer'));
					}}
				</h4>
				<span class="m-0">Product Manufacturers</span>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 {{-- <div class="media-body"> --}}
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					{{(DB::table('warehouse')
					->selectRaw('COUNT(warehouse.id) as warehouses')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('warehouses'));
					}}
				</h4>
				<span class="m-0">Warehouses</span>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 {{-- <div class="media-body"> --}}
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					{{(DB::table('supplier')
					->selectRaw('COUNT(supplier.id) as suppliers')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('suppliers'));
					}}
				</h4>
				<span class="m-0">Suppliers</span>
			 </div>
	   </div>
	</div>
 </div>

 {{-- <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments This Week</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Week</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()}}</h4>
			 </div>
	   </div>
	</div>
 </div>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">All Agents' Enrolments This Month</span>
				<h4 class="mb-0 counter">
					{{DB::table('consumer_data')
					->select('select consumer_data.* from consumer_data')
					->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
					->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
					->count();}}
				</h4>
			 </div><hr/>
			 <div class="media-body">
				<span class="m-0">My Enrolments This Month</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()}}</h4>
			 </div>
		
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-secondary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">All Agents' Total Enrolments</span>
				<h4 class="mb-0 counter">
				{{DB::table('consumer_data')
				->select('select consumer_data.* from consumer_data')
				->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
				->count();}}</h4>
			 </div>
			 <hr/>
			 <div class="media-body">
				<span class="m-0">My Total Enrolments</span>
				<h4 class="mb-0 counter">{{App\Models\Consumer::where(['added_by' => Auth::user()->id])->count();}}</h4>
			 </div>
	   </div>
	</div> --}}
 </div>

 
 @endif
		
{{-- ______________________________________________________________________________________________________________________ --}}
			

{{-- Sales Rep Income Statistics --}}
			{{-- @if (Auth::user()->role_id=="1" ?? null)
			<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Earnings Today</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Earnings This Week</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Earnings This Month</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; {{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>Total Earnings </span>
						</div>
					</div>
				</div>
			</div>
		</div>
 --}}


		{{-- Supervisor Income Statistics --}}
		{{-- @elseif (Auth::user()->role_id=="2" ?? null)
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
								
							<span class="new-box"></span></h4>
							<span>My Agents' Earnings Today</span>
						</div>
					</div>
				</div>
<hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereDay('created_at', Carbon\Carbon::now()->day)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Earnings Today</span>
						</div>
					</div>
				</div>
			</div>

		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereBetween('consumer_data.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
							</h4>
							<span>My Agents' Earnings This Week</span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereBetween('created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Earnings This Week</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
								</h4>
							<span>My Agents' Earnings This Month</span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358;{{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->whereMonth('created_at', Carbon\Carbon::now()->month)->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Earnings This Month</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-xl-3 col-lg-6">
			<div class="card">
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; 
								{{number_format(DB::table('consumer_data')
								->selectRaw('SUM(consumer_data.commission) as cons')
								->where('user.coordinator_id', '=', Auth::user()->id)
								// ->whereMonth('consumer_data.created_at', Carbon\Carbon::now()->month)
								->leftjoin('user', 'user.coordinator_id','=','consumer_data.added_by')
								->value('cons'), 2);
								}}
								</h4>
							<span>My Agents' Total Earnings </span>
						</div>
					</div>
				</div><hr/>
				<div class="card-body">
					<div class="media align-items-center">
						<div class="media-body right-chart-content">
							<h4>&#8358; {{number_format(App\Models\Consumer::where(['added_by' => Auth::user()->id])->count()*(App\Models\Settings::select('agent_commission')->value('agent_commission')), 2)}}<span class="new-box"></span></h4>
							<span>My Total Earnings </span>
						</div>
					</div>
				</div>
			</div>
		</div> --}}



{{-- Admin Income Statistics --}}
{{-- @elseif (Auth::user()->role_id=="3" ?? null) --}}

	</div>
</div>
<script type="text/javascript">
	var session_layout = '{{ session()->get('layout') }}';
</script>
@endsection

@section('script')
<script src="{{asset('assets/js/chart/chartist/chartist.js')}}"></script>
<script src="{{asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob.min.js')}}"></script>
<script src="{{asset('assets/js/chart/knob/knob-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/notify/index.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.en.js')}}"></script>
<script src="{{asset('assets/js/datepicker/date-picker/datepicker.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.bundle.js')}}"></script>
<script src="{{asset('assets/js/typeahead/typeahead.custom.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/handlebars.js')}}"></script>
<script src="{{asset('assets/js/typeahead-search/typeahead-custom.js')}}"></script>
@endsection
