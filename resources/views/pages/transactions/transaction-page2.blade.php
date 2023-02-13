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
									<div class="title"><a target="_blank" href="">{{$user->customer_name ?? null}} </a></div>
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
					
							<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								   <div class="modal-content">
									  <div class="modal-header">
										 <h5 class="modal-title" id="exampleModalLabel2">New Product</h5>
										 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										 <form method="POST" action="{{route('add-to-cart.new')}}" >
											@csrf
										
			
											<div class="mb-2">
												<label class="col-form-label">Product:</label>
												<select class="form-control" name="product_id">
													{{-- <optgroup label="Product Types"> --}}
														{{$products =  App\Models\Product::select('*')->get();}}
														@forelse($products as $item)
														<option value="{{$item->product_id}}" >{{$item->product_name}} {{$item->description}}</option>
														@empty
														@endforelse
													{{-- </optgroup> --}}
												</select>

											</div>
			
									<input value="{{$user->id}}" type="hidden" name="customer_id"/>
									<input value="{{Auth::user()->warehouse_id}}" type="hidden" name="warehouse_id"/>
									<input value="{{$user->customer_phone_number}}" type="hidden" name="customer_phone_number"/>
									@endforeach
											<div class="mb-3">
												<label class="col-form-label" for="recipient-name">Quantity:</label>
												<input class="form-control" type="text" name="quantity">
											</div>
			
											
										
			
											 <div class="modal-footer">
												 <button class="btn btn-primary" type="submit">Add</button>
												<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
											 </div>
										 </form>
									  </div>
									
								   </div>
								</div>
							 </div>

							<div class="table-responsive">
								<table class="table">
									<thead>
										
										<tr>
											<th scope="col">#</th>
							
											<th scope="col">Product Name</th>
											<th scope="col">Quantity</th>
											<th scope="col">Unit Cost</th>
											<th scope="col">Total</th>
										</tr>
										
								
									</thead>
									<tbody>
										<?php $i = 1; ?>
										@foreach ($transactions as $transaction)
										<tr>
											<th scope="row"><?php 
											$i++;
												?></th>
										
											<td>{{$transaction->product_name}} {{$transaction->description}}</td>
											<td>{{$transaction->quantity}}</td>
											<td>Admin</td>
											<td>USA</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						{{-- <div class="row">
								<div class="col-form-label">Products</div>
								<div class="column">
								<select class="js-example-basic-single col-sm-12" name="role_id">
									<optgroup label="Products">
										{{$products =  App\Models\Product::select('product_name', 'description', 'product_id')->get();}}
										@forelse($products as $item)
										<option value="{{$item->product_id}}" >{{$item->product_name}} {{$item->description}}</option>
										@empty
										@endforelse
									</optgroup>
								</select>
							</div>
						
							<div class="column">
								
								
								<input class="form-control" id="first_name" type="text" name="first_name" placeholder="Enter Firstname">
								
						</div> --}}
					</div>
				

	
					  
{{-- 
							<div class="mb-3">
								<label class="col-form-label pt-0" for="first_name">Firstname</label>
								<input class="form-control" id="first_name" type="text" name="first_name" placeholder="Enter Firstname">
								@if ($errors->has('first_name'))
								<i style="color:coral">
									{{ $errors->first('first_name') }}
								</i>
								@endif
							</div> --}}

			

			
							<div class="card-footer">
								<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat">Add</button>
								{{-- <button class="btn btn-secondary">Cancel</button> --}}
							</div>

						</form>
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
@endsection