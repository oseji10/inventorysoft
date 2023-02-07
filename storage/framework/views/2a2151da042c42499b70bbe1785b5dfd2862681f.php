<?php $__env->startSection('title', 'HTML 5 Data Export'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatable-extension.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>


<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<button class="btn btn-square btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button">[+] Add  New Customer</button><br/><br/>
			<div class="card">
				<div class="card-header">
					<h5>Customer List</h5>
				</div>

				<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					   <div class="modal-content">
						  <div class="modal-header">
							 <h5 class="modal-title" id="exampleModalLabel2">New Customer</h5>
							 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <div class="modal-body">
							 <form method="POST" action="<?php echo e(route('register_customer.upload')); ?>" >
								<?php echo csrf_field(); ?>
								<div class="mb-3">
								   <label class="col-form-label" for="recipient-name">Name:</label>
								   <input class="form-control" type="text" name="customer_name">
								</div>
								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Email:</label>
									<input class="form-control" type="text" name="customer_email">
								</div>

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Phone Number:</label>
									<input class="form-control" type="text" name="customer_phone_number">
								</div>

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Alternate Phone Number:</label>
									<input class="form-control" type="text" name="customer_phone_number_2">
								</div>

								<div class="mb-3">
									<label class="col-form-label" for="message-text">Customer Address:</label>
									<textarea class="form-control" id="message-text" name="customer_address"></textarea>
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
						
							<thead>
								<tr>
									<th>Name</th>
									<th>Email</th>
									<th>Phone Number</th>
									<th>Phone Number 2</th>
								
								
									<th>Uploaded Date</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($customer->customer_name ?? null); ?></td>
									<td><?php echo e($customer->customer_email ?? null); ?></td>
									<td><?php echo e($customer->customer_phone_number ?? null); ?></td>
									<td><?php echo e($customer->customer_phone_number_2 ?? null); ?></td>
								
									<td><?php echo e($customer->created_at ?? null); ?></td>
								</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5" style="color:red">Oops! No customers captured yet</td>
								  </tr>
								<?php endif; ?>
								
							</tbody>
							
						</table>
					</div>
				</div>
			</div>
		</div>




		
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.select.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatable-extension/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/customer-data/customer-list.blade.php ENDPATH**/ ?>