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
									<div class="title"><a target="_blank" href=""><?php echo e($user->customer_name ?? null); ?> </a></div>
									
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
					
							<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								   <div class="modal-content">
									  <div class="modal-header">
										 <h5 class="modal-title" id="exampleModalLabel2">New Product</h5>
										 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										 <form method="POST" action="<?php echo e(route('add-to-cart.new')); ?>" >
											<?php echo csrf_field(); ?>
										
			
											<div class="mb-2">
												<label class="col-form-label">Product:</label>
												<select class="form-control" name="product_id">
													
														<?php echo e($products =  App\Models\Product::select('*')->get()); ?>

														<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
														<option value="<?php echo e($item->product_id); ?>" ><?php echo e($item->product_name); ?> <?php echo e($item->description); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
														<?php endif; ?>
													
												</select>

											</div>
			
									<input value="<?php echo e($user->id); ?>" type="hidden" name="customer_id"/>
									<input value="<?php echo e(Auth::user()->warehouse_id); ?>" type="hidden" name="warehouse_id"/>
									<input value="<?php echo e($user->customer_phone_number); ?>" type="hidden" name="customer_phone_number"/>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
										<?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<th scope="row"><?php 
											$i++;
												?></th>
										
											<td><?php echo e($transaction->product_name); ?> <?php echo e($transaction->description); ?></td>
											<td><?php echo e($transaction->quantity); ?></td>
											<td>Admin</td>
											<td>USA</td>
										</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</tbody>
								</table>
							</div>
						
					</div>
				

	
					  


			

			
							<div class="card-footer">
								<button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat">Add</button>
								
							</div>

						</form>
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


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/transactions/transaction-page2.blade.php ENDPATH**/ ?>