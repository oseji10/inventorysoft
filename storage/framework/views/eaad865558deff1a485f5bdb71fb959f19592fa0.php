<?php $__env->startSection('title', 'Warehouses'); ?>

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
			<button class="btn btn-square btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button">[+] Add  New Warehouse</button><br/><br/>
			<div class="card">
				<div class="card-header">
					<h5>Warehouses List</h5>
				</div>

				<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					   <div class="modal-content">
						  <div class="modal-header">
							 <h5 class="modal-title" id="exampleModalLabel2">New Warehouse</h5>
							 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <div class="modal-body">
							 <form method="POST" action="<?php echo e(route('register_warehouse.upload')); ?>" >
								<?php echo csrf_field(); ?>
								<div class="mb-3">
								   <label class="col-form-label" for="recipient-name">Warehouse ID:</label>
								   <input class="form-control" type="text" name="warehouse_id">
								</div>


						

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Warehouse Name:</label>
									<input class="form-control" type="text" name="warehouse_name">
								</div>


								<div class="mb-3">
									<label class="col-form-label" for="message-text">Warehouse Short Name:</label>
									<input class="form-control" type="text" name="warehouse_short_name">
								 </div>

								 <div class="mb-3">
									<label class="col-form-label" for="message-text">Warehouse Email:</label>
									<input class="form-control" type="text" name="warehouse_email">
								 </div>
							
								 <div class="mb-3">
									<label class="col-form-label" for="message-text">Warehouse Phone Number:</label>
									<input class="form-control" type="text" name="warehouse_phone">
								 </div>

								 <div class="mb-3">
									<label class="col-form-label" for="message-text">Warehouse Address:</label>
									<textarea class="form-control" id="message-text" name="warehouse_address"></textarea>
								 </div>
								 <div class="mb-2">
									<label class="col-form-label">Warehouse Manager:</label>
									<select class="form-control " name="warehouse_manager">
										<optgroup label="Users">
											<option value="">Select User</option>
											<?php echo e($users =  App\Models\User::select('*')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->id); ?>" ><?php echo e($item->first_name); ?> <?php echo e($item->last_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>
									</select>
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
									<th>Warehouse ID</th>
									<th>Warehouse Name</th>
									<th>Warehouse Short Name</th>
									<th>Warehouse Address</th>
									<th>Warehouse Email</th>
									<th>Warehouse Phone</th>
									<th>Status</th>
								
									<th>Uploaded Date</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($warehouse->warehouse_id ?? null); ?></td>
									<td><?php echo e($warehouse->warehouse_name ?? null); ?></td>
									<td><?php echo e($warehouse->warehouse_short_name ?? null); ?></td>
									<td><?php echo e($warehouse->warehouse_address ?? null); ?></td>
									<td><?php echo e($warehouse->warehouse_email ?? null); ?></td>
									<td><?php echo e($warehouse->warehouse_phone ?? null); ?></td>
									<td><?php echo e($warehouse->status ?? null); ?></td>
									<td><?php echo e($warehouse->created_at ?? null); ?></td>
								</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5" style="color:red">Oops! No warehouse captured yet</td>
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
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/warehouses/warehouse-list.blade.php ENDPATH**/ ?>