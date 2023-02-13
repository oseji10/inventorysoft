@extends('layouts.simple.master')
@section('title', 'Stock')

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
			<span><a href="stock-transfer-history"><button class="btn btn-square btn-info "   type="button">Stock Transfer History</button></a></span>
			<span><button class="btn btn-square btn-secondary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button">Stock Count History</button></span><br/><br/>
			<div class="card">
				<div class="card-header">
					<h5>Stock List</h5>
				</div>

				<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					   <div class="modal-content">
						  <div class="modal-header">
							 <h5 class="modal-title" id="exampleModalLabel2">New Stock</h5>
							 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <div class="modal-body">
							 <form method="POST" action="{{route('register_stock.upload')}}" >
								@csrf
								{{-- <div class="mb-3">
								   <label class="col-form-label" for="recipient-name">Stock ID:</label>
								   <input class="form-control" type="text" name="stock_id">
								</div> --}}

								<div class="mb-2">
									<label class="col-form-label">Manufacturer Name:</label>
									<select class="form-control " name="manufacturer_id">
										<optgroup label="Manufacturers">
											<option value="">-----Select Manufacturer-----</option>
											{{$manufacturers =  App\Models\Manufacturer::select('*')->get();}}
											@forelse($manufacturers as $item)
											<option value="{{$item->manufacturer_id}}" >{{$item->manufacturer_name}}</option>
											@empty
											@endforelse
										</optgroup>
									</select>
								</div>


								<div class="mb-2">
									<label class="col-form-label">Supplier:</label>
									<select class="form-control " name="supplier_id">
										<optgroup label="Suppliers">
											<option value="">-----Select Supplier-----</option>
											{{$suppliers =  App\Models\Supplier::select('*')->get();}}
											@forelse($suppliers as $item)
											<option value="{{$item->supplier_id}}" >{{$item->supplier_name}}</option>
											@empty
											@endforelse
										</optgroup>
									</select>
								</div>

						

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Batch Number:</label>
									<input class="form-control" type="text" name="batch_number">
								</div>


								<div class="mb-3">
									<label class="col-form-label" for="message-text">Invoice Number:</label>
									<input class="form-control" type="text" name="invoice_number">
								 </div>

							

								 <div class="mb-2">
									<label class="col-form-label">Product:</label>
									<select class="form-control " name="product_id">
										<optgroup label="Products">
											<option value="">-----Select Product-----</option>
											{{$products =  App\Models\Product::select('*')->get();}}
											@forelse($products as $item)
											<option value="{{$item->product_id}}" >{{$item->product_name}} {{$item->description}}</option>
											@empty
											@endforelse
										</optgroup>
									</select>
								</div>

								<div class="mb-2">
									<label class="col-form-label">Warehouse:</label>
									<select class="form-control " name="warehouse_id">
										<optgroup label="Warehouses">
											<option value="">-----Select Warehouse-----</option>
											{{$warehouses =  App\Models\Warehouse::select('*')->get();}}
											@forelse($warehouses as $item)
											<option value="{{$item->warehouse_id}}" >{{$item->warehouse_name}}</option>
											@empty
											@endforelse
										</optgroup>
									</select>
								</div>


								<div class="mb-3">
									<label class="col-form-label" for="message-text">Quantity Received</label>
									<input class="form-control" type="number" name="quantity_received">
								 </div>
							
								 <div class="mb-3">
									<label class="col-form-label" for="recipient-name">Expiry Date:</label>
									<input class="form-control" type="date" name="expiry_date">
								 </div>

								 <div class="modal-footer">
									 <button class="btn btn-primary" type="submit">Save</button>
									<button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
								 </div>
							 </form>
						  </div>
						
					   </div>
					</div>
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
									<th>Qty Rec.</th>
									<th>Qty. Sold</th>
									<th>Qty. Exp.</th>
									<th>Qty. Trf.</th>
									<th>Qty. Avail.</th>
									
									<th>Date Received</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@forelse ($stock as $item)
								<tr>
									<td>{{$item->stock_id ?? null}}</td>
									<td>{{$item->warehouse_list->warehouse_name2 ?? null}}</td>
									<td>{{$item->product_list->product_name2 ?? null}} {{$item->product_list->description2 ?? null}}</td>
									<td>{{$item->manufacturer_list->manufacturer_name2 ?? null }}</td>
									<td>{{$item->quantity_received ?? null}}</td>
									<td>{{$item->quantity_sold ?? null}}</td>
									<td>{{$item->quantity_expired ?? null}}</td>
									<td>{{$item->quantity_transferred ?? null}}</td>
									<td>{{$item->quantity_expired ?? null}}</td>
									<td>{{$item->created_at ?? null}}</td>
									<td><button class="btn btn-square btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalfat-{{$item->stock_id}}">Transfer</button></td>
								</tr>

								<div class="modal fade" id="exampleModalfat-{{$item->stock_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									   <div class="modal-content">
										  <div class="modal-header">
											 <h5 class="modal-title" id="exampleModalLabel2">Transfer Stock - {{$item->stock_id}}</h5>
											 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <div class="modal-body">
											 <form method="POST" action="{{route('transfer_stock.upload')}}" >
												@csrf
						
												<div class="mb-3">
													<label class="col-form-label" for="message-text">Quantity Available</label>
													<input readonly class="form-control" type="number" value="{{($item->quantity_received)-($item->quantity_sold+$item->quantity_expired+$item->quantity_transferred)}}" name="">
												 </div>

												<div class="mb-3">
													<label class="col-form-label" for="message-text">Quantity To Transfer</label>
													<input class="form-control" type="number" name="quantity_dispatched">
													<input class="form-control" type="hidden" name="initial_stock_id" value="{{$item->stock_id}}">
													<input class="form-control" type="hidden" name="sent_from" value="{{$item->warehouse_id}}">
													
												 </div>
											
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
									<td colspan="5" style="color:red">Oops! No stock added yet</td>
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