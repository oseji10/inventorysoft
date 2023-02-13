<?php $__env->startSection('title', 'Transactions'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/photoswipe.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/new.css')); ?>">



<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('breadcrumb-items'); ?>
<li class="breadcrumb-item">Users</li>
<li class="breadcrumb-item active">User Profile</li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="user-profile">
		<div class="row">
			<!-- user profile first-style start-->
			<div class="col-sm-12">
				<div class="card hovercard text-center">
					
					
				
					<?php $__currentLoopData = $find_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
					
					<div class="info">
						<div class="row">
							<div class="col-sm-6 col-lg-4 order-sm-1 order-xl-0">
								<div class="row">
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-envelope"></i>   Email</h6>
											<span><?php echo e($user->customer_email ?? null); ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-calendar"></i>   Date created</h6>
											<span><?php echo e($user->created_at ?? null); ?></span>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-lg-4 order-sm-0 order-xl-1">
								<div class="user-designation">
									<div class="title"><h2><?php echo e($user->customer_name ?? null); ?> </h2></div>
									
								</div>
							</div>
							<div class="col-sm-6 col-lg-4 order-sm-2 order-xl-2">
								<div class="row">
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-phone"></i>   Contact Phone Number</h6>
											<span><?php echo e($user->customer_phone_number ?? null); ?></span>
											<span><?php echo e($user->customer_phone_number_2 ?? null); ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="ttl-info text-start">
											<h6><i class="fa fa-location-arrow"></i>   Address</h6>
											<span><?php echo e($user->customer_address ?? null); ?></span>
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
					
					<div class="card-body">
						
							
							
							<?php if(session('success')): ?>
							<div class="alert alert-success dark" role="alert">
							  <?php echo e(@session('success')); ?>  
							</div>
							<?php endif; ?>
							<?php if(session('error')): ?>
							<div class="alert alert-danger dark" role="alert">
							  <?php echo e(@session('error')); ?>  
							</div>
							<?php endif; ?>
					
			

							<div class="table-responsive">
								<table class="table" id="data_table">
									<thead>
										
										<tr>
											
							
											<th scope="col">Product Name</th>
											<th scope="col">Quantity</th>
											<th scope="col">Unit Cost</th>
											<th scope="col">Sub Total</th>
											<th scope="col">Action</th>
										</tr>
										
								
									</thead>
									<tbody id="todos-list" name="todos-list">
										<?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<div class="modal fade" id="exampleModal-<?php echo e($data->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
											<div class="modal-dialog" role="document">
											   <div class="modal-content">
												  <div class="modal-header">
													 <h5 class="modal-title" id="exampleModalLabel">Delete from Transaction </h5>
													 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
												  </div>
												  <div class="modal-body"><h5>Are you sure you want to delete: <br/><?php echo e($data->product_name); ?> <?php echo e($data->description); ?>?</h5>
												
												</div>
												  <div class="modal-footer">
													
													
													 <a href="delete_transaction/<?php echo e($data->id); ?>"> <button class="btn btn-secondary" type="submit">Delete</button></a>
													  
													 <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
												  </div>
											   </div>
											</div>
										 </div>

										<tr id="todo<?php echo e($data->id); ?>">
											
										
											<td><?php echo e($data->product_name); ?> <?php echo e($data->description); ?></td>
											<td><?php echo e($data->quantity); ?></td>
											<td>&#8358;<?php echo e($data->selling_price); ?></td>
											<td>&#8358;<?php echo e(number_format(($data->selling_price)*($data->quantity),2)); ?></td>
											<td><a data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal-<?php echo e($data->id); ?>"><i style="color:red" class="fa fa-times"></i></a></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<?php endif; ?>
										
										
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
											
											<input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
			
											<div class="mb-2">
												<label class="col-form-label">Product:</label>
												<select class="form-control" name="product_id" id="product_id">
													
														<?php echo e($products =  App\Models\Product::select('*')->get()); ?>

														<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
														<option value="<?php echo e($item->product_id); ?>" ><?php echo e($item->product_name); ?> <?php echo e($item->description); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
														<?php endif; ?>
													
												</select>

											</div>
			
									<input value="<?php echo e($user->id); ?>" type="hidden" id="customer_id" name="customer_id"/>
									<input value="<?php echo e(Auth::user()->warehouse_id); ?>" type="hidden" id="warehouse_id" name="warehouse_id"/>
									<input value="<?php echo e($user->customer_phone_number); ?>" type="hidden" id="customer_phone_number" name="customer_phone_number"/>
									
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
										 <form  method="POST" action="<?php echo e(route('register_transaction.upload')); ?>" >
											
											<?php echo csrf_field(); ?>
											<input type="hidden" name="customer_id" value="<?php echo e($user->id); ?>"/>
			
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
								
								<button id="btn-add" class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#formModal">Add</button>
								<button class="btn btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#formModal22">Complete Transaction</button>
								
							</div>
							
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>

				</div>
			</div>

				
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/photoswipe/photoswipe-ui-default.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/photoswipe/photoswipe.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/new.js')); ?>"></script>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="<?php echo e(asset('js/ajax.js')); ?>" defer></script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/transactions/transaction-page.blade.php ENDPATH**/ ?>