@extends('layouts.simple.master')
@section('title', 'Stock Transfer History')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatables.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/datatable-extension.css')}}">
@endsection

@section('style')
@endsection
<br/>
{{-- @section('breadcrumb-title')
<h3>Consumers</h3>
@endsection

@section('breadcrumb-items')
<li class="breadcrumb-item">Consumers</li>
<li class="breadcrumb-item active">Consumer List</li>
@endsection --}}

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<span><button class="btn btn-square btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button">[+] Add  New Stock</button></span>
			<a href="stock-list"><span><button class="btn btn-square btn-info " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button"> Stock </button></a></span>
			<span><button class="btn btn-square btn-secondary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button"> Stock Count History</button></span><br/><br/>
			<div class="card">
				<div class="card-header">
					<h5>Stock Transfer History</h5>
				</div>




				<div class="card-body">
					<div class="dt-ext table-responsive">
						<table class="display" id="export-button">
							
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
						
							<thead>
								<tr>
									<th>Stock ID</th>
									<th>Warehouse</th>
									<th>Product</th>
									<th>Manuafacturer</th>
									<th>Qty Dispatched</th>
									<th>Date Dispatched</th>
									<th>Qty. Received</th>
									<th>Date Received</th>
									{{-- <th>Qty. Trf.</th>
									<th>Qty. Avail.</th> --}}
									
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($stock as $item)
								<tr>
									<td>{{$item->stock_id ?? null}}</td>
									<td>{{$item->warehouse_name ?? null}}</td>
									<td>{{$item->product_name ?? null}} {{$item->description ?? null}}</td>
									<td>{{$item->manufacturer_short_name ?? null }}</td>
									<td>{{$item->quantity_dispatched ?? null}}</td>
									<td>{{$item->created_at ?? null}}</td>
									<td>{{$item->quantity_received ?? 0 }}</td>
									{{-- <td>{{$item->quantity_expired ?? null}}</td>
									<td>{{$item->quantity_transferred ?? null}}</td>
									<td>{{$item->quantity_expired ?? null}}</td> --}}
									<td>{{$item->updated_at ?? null}}</td>
									@switch($item->transfer_status)
									@case('PENDING RECEIPT')
										<td style="color:brown">PENDING RECEIPT</td>
										@break
						 			@case('RECEIVED')
										<td style="color:green">RECEIVED</td>
									@endswitch

									@switch($item->transfer_status)
									@case('PENDING RECEIPT')
									<td><button class="btn btn-square btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalfat-{{$item->stock_id}}">RECEIVE</button></td>
										@break
						 			@case('RECEIVED')
										<td></td>
									@endswitch


									{{-- <td style="color:brown">{{$item->transfer_status}}</td> --}}
									{{-- <td><button class="btn btn-square btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalfat-{{$item->stock_id}}">RECEIVE</button></td> --}}
								</tr>

								<div class="modal fade" id="exampleModalfat-{{$item->stock_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									   <div class="modal-content">
										  <div class="modal-header">
											 <h5 class="modal-title" id="exampleModalLabel2">Transfer Stock - {{$item->stock_id}}</h5>
											 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <div class="modal-body">
											 <form method="POST" action="{{route('confirm_stock_transfer.upload')}}" >
												@csrf
						
												<div class="mb-3">
													<label class="col-form-label" for="message-text">Quantity Dispatched</label>
													<input readonly class="form-control" type="number" value="{{($item->quantity_dispatched)}}" name="quantity_dispatched">
												 </div>

												<div class="mb-3">
													<label class="col-form-label" for="message-text">Quantity To Transfer</label>
													<input class="form-control" type="number" name="quantity_received">
													<input class="form-control" type="hidden" name="initial_stock_id" value="{{$item->initial_stock_id}}">
													<input class="form-control" type="hidden" name="stock_id" value="{{$item->stock_id}}">
													
												 </div>
{{-- 											
												 <div class="mb-2">
													<label class="col-form-label">Select Warehouse To Transfer To:</label>
													<select class="form-control " name="sent_to">
														<optgroup label="Warehouses">
															<option value="">-----Select Warehouse-----</option>
															{{$warehouses =  App\Models\Warehouse::select('*')->where('warehouse_id', '!=', $item->warehouse_id)->get();}}
															@forelse($warehouses as $item)
															<option value="{{$item->warehouse_id}}" >{{$item->warehouse_name}}</option>
															@empty
															@endforelse
														</optgroup>
													</select>
												</div>
				 --}}
												 <div class="modal-footer">
													 <button class="btn btn-square btn-primary" type="submit">Transfer</button>
													<button class="btn btn-square btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
												 </div>
											 </form>
										  </div>
										
									   </div>
									</div>
								 </div>

								@empty
								<tr>
									<td colspan="5" style="color:red">Oops! No stock transferred yet</td>
								  </tr>
								@endforelse
				
							</tbody>
			
						</table>
					</div>
				</div>
			</div>
		</div>



		</div>
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/jszip.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('assets/js/datatable/datatable-extension/custom.js')}}"></script>
@endsection