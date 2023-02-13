@extends('layouts.simple.master')
@section('title', 'Transactions')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/photoswipe.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/new.css')}}">

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}"> --}}
@endsection

@section('style')
@endsection

{{-- @section('breadcrumb-title')
<h3>User Profile</h3>
@endsection --}}

@section('breadcrumb-items')
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">User Profile</li>
@endsection

@section('content')
<div class="container-fluid">
	<div class="user-profile">
		<div class="row">
			<!-- user profile first-style start-->
			<div class="col-sm-12">
				<div class="card hovercard text-center">
					{{-- <div class="cardheader"></div> --}}
					{{-- <div class="user-image">
						<div class="avatar"><img alt="" src="{{asset('assets/images/user/7.jpg')}}"></div>
						<div class="icon-wrapper"><i class="icofont icofont-pencil-alt-5"></i></div>
					</div> --}}
				
					@foreach ($find_user as $user)
						
					
					<div class="info">
						<div class="row">
							<div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
								<div class="row">
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-envelope"></i>   Email</h6>
											<span>{{$user->customer_email ?? null}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-calendar"></i>   Date created</h6>
											<span>{{$user->created_at ?? null}}</span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
								<div class="user-designation">
									<div class="title"><h2>{{$user->customer_name ?? null}} </h2></div>
									{{-- <div class="desc mt-2">designer</div> --}}
								</div>
							</div>
							<div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
								<div class="row">
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-phone"></i>   Contact Phone Number</h6>
											<span>{{$user->customer_phone_number ?? null}}</span>
											<span>{{$user->customer_phone_number_2 ?? null}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-location-arrow"></i>   Address</h6>
											<span>{{$user->customer_address ?? null }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<hr>
			<h5 style="color:orange">PENDING TRANSACTION</h5>
					</div>
				</div>
			</div>

			
			<div class="col-sm-12">
				<div class="card">
					{{-- <div class="card-header">
						<h5>New Agent Upload Form</h5>
						<span>Only an authorized Coordinator is permitted to do this</span>
					</div> --}}
					<div class="card-body">
						{{-- <form class="theme-form" action="{{route('register_agent.perform')}}" method="POST"> --}}
							{{-- @csrf --}}
							{{-- <div class="mb-3">
								<label class="col-form-label pt-0" for="exampleInputEmail1">Username</label>
								<input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
							</div> --}}
							@if(session('success'))
							<div class="alert alert-success dark" role="alert">
							  {{ @session('success') }}  
							</div>
							@endif
							@if(session('error'))
							<div class="alert alert-danger dark" role="alert">
							  {{ @session('error') }}  
							</div>
							@endif
					
			

							<div class="table-responsive">
								<table class="table" id="data_table">
									<thead>
										
										<tr>
											{{-- <th scope="col">#</th> --}}
							
											<th scope="col">Product Name</th>
											<th scope="col">Quantity</th>
											<th scope="col">Unit Cost</th>
											<th scope="col">Sub Total</th>
											<th scope="col">Action</th>
										</tr>
										
								
									</thead>
									<tbody id="todos-list" name="todos-list">
										@forelse ($transactions as $data)
										<div class="modal fade" id="exampleModal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
											   <div class="modal-content">
												  <div class="modal-header">
													 <h5 class="modal-title" id="exampleModalLabel">Delete from Transaction </h5>
													 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
												  </div>
												  <div class="modal-body"><h5>Are you sure you want to delete: <br/>{{$data->product_name}} {{$data->description}}?</h5>
												
												</div>
												  <div class="modal-footer">
													{{-- <form method="DELETE" action="delete_user/{{$user->id}}"> --}}
													{{-- <input name="id" value="{{$user->id}}"/> --}}
													 <a href="delete_transaction/{{$data->id}}"> <button class="btn btn-secondary" type="submit">Delete</button></a>
													  {{-- </form> --}}
													 <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
												  </div>
											   </div>
											</div>
										 </div>

										<tr id="todo{{$data->id}}">
											{{-- <th scope="row">1</th> --}}
										
											<td>{{$data->product_name}} {{$data->description}}</td>
											<td>{{$data->quantity}}</td>
											<td>&#8358;{{$data->selling_price}}</td>
											<td>&#8358;{{number_format(($data->selling_price)*($data->quantity),2)}}</td>
											<td><a data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal-{{$data->id}}"><i style="color:red" class="fa fa-times"></i></a></td>
										</tr>
									@empty
									@endforelse
										
										{{-- <tr>
											<td colspan="3"></td>
											<td>Total:</td>
											<td>{{number_format(($transaction->selling_price)*($transaction->quantity),2)}}</td>
										</tr> --}}
									</tbody>
								</table>
							</div>



							<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								   <div class="modal-content">
									  <div class="modal-header">
										 <h5 class="modal-title" id="exampleModalLabel2">New Product</h5>
										 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										 <form  id="myForm" id="myForm" class="form-horizontal" novalidate="" >
											{{-- @csrf --}}
											<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
			
											<div class="mb-2">
												<label class="col-form-label">Product:</label>
												<select class="form-control" name="product_id" id="product_id">
													{{-- <optgroup label="Product Types"> --}}
														{{$products =  App\Models\Product::select('*')->get();}}
														@forelse($products as $item)
														<option value="{{$item->product_id}}" >{{$item->product_name}} {{$item->description}}</option>
														@empty
														@endforelse
													{{-- </optgroup> --}}
												</select>

											</div>
			
									<input value="{{$user->id}}" type="hidden" id="customer_id" name="customer_id"/>
									<input value="{{Auth::user()->warehouse_id}}" type="hidden" id="warehouse_id" name="warehouse_id"/>
									<input value="{{$user->customer_phone_number}}" type="hidden" id="customer_phone_number" name="customer_phone_number"/>
									
											<div class="mb-3">
												<label class="col-form-label" for="recipient-name">Quantity:</label>
												<input class="form-control" type="text" name="quantity" id="quantity" value="">
											</div>
			
											
											
			
											
										 </form>
										 <div class="modal-footer">
											<button class="btn btn-primary" id="btn-save" type="submit" value="add">Add</button>
										   <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
										</div>
										 <input type="hidden" id="todo_id" name="todo_id" value="0">
									  </div>
									
								   </div>
								</div>
							 </div>
				
							 <div class="modal fade" id="formModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								   <div class="modal-content">
									  <div class="modal-header">
										 <h5 class="modal-title" id="exampleModalLabel2">Payment Mode</h5>
										 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										 <form  method="POST" action="{{route('register_transaction.upload')}}" >
											{{-- @csrf --}}
											@csrf
											<input type="hidden" name="customer_id" value="{{$user->id}}"/>
			
											<div class="mb-2">
												<label class="col-form-label">Product:</label>
												<select class="form-control" name="payment_mode">
												<option>-------Select-------</option>
												<option value="POS">POS</option>
												<option value="Bank Transafer">Bank Transfer</option>
												<option value="Cash">Cash</option>
												</select>

											</div>
											<button class="btn btn-primary"  type="submit">Complete Transaction</button>
											<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
										 </form>
										 <div class="modal-footer">
										</div>
										 <input type="hidden" id="todo_id" name="todo_id" value="0">
									  </div>
									
								   </div>
								</div>
							 </div>

					</div>
				


			

			
						</form>
							<div class="card-footer">
								{{-- <form method="POST" action="{{route('register_transaction.upload')}}">
									@csrf
									<input type="hidden" name="customer_id" value="{{$user->id}}"/>
								</form> --}}
								<button id="btn-add" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#formModal">Add</button>
								<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#formModal22">Complete Transaction</button>
								{{-- <button class="btn btn-secondary">Cancel</button> --}}
							</div>
							
							@endforeach
					</div>

				</div>
			</div>

				{{-- </div> --}}
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/counter/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/counter/jquery.counterup.min.js')}}"></script>
<script src="{{asset('assets/js/counter/counter-custom.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe.min.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe-ui-default.min.js')}}"></script>
<script src="{{asset('assets/js/photoswipe/photoswipe.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/new.js')}}"></script>
{{-- <script src="{{asset('assets/js/touchspin/vendors.min.js')}}"></script> --}}
{{-- <script src="{{asset('assets/js/touchspin/touchspin.js')}}"></script>
<script src="{{asset('assets/js/touchspin/input-groups.min.js')}}"></script> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/ajax.js') }}" defer></script>



@endsection