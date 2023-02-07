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
			<button class="btn btn-square btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button">[+] Add  New User</button><br/><br/>
			<div class="card">
				<div class="card-header">
					<h5>Users List</h5>
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
						
							<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								   <div class="modal-content">
									  <div class="modal-header">
										 <h5 class="modal-title" id="exampleModalLabel2">New User</h5>
										 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
									  </div>
									  <div class="modal-body">
										 <form method="POST" action="<?php echo e(route('register.perform')); ?>" >
											<?php echo csrf_field(); ?>

											<?php
											// Available alpha caracters
											$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
											
											// generate a pin based on 2 * 7 digits + a random character
											$pin = mt_rand(1000, 9999)
												. mt_rand(1000, 9999)
												. $characters[rand(0, strlen($characters) - 1)];
											
											// shuffle the result
											$string = str_shuffle($pin);
											?>

												<input class="form-control" id="exampleInputPassword1" type="hidden" name="password" value="<?php echo $string ?>">
												<input class="form-control" id="exampleInputPassword1" type="hidden" name="password_confirmation" value="<?php echo $string ?>">


											<div class="mb-3">
											   <label class="col-form-label" for="recipient-name">First Name:</label>
											   <input class="form-control" type="text" name="first_name">
											</div>
			
											
			
									
			
											<div class="mb-3">
												<label class="col-form-label" for="recipient-name">Lastname:</label>
												<input class="form-control" type="text" name="last_name">
											</div>
			
			
											<div class="mb-3">
												<label class="col-form-label" for="recipient-name">Othernames:</label>
												<input class="form-control" type="text" name="other_names">
											</div>
			
			
											<div class="mb-3">
												<label class="col-form-label" for="recipient-name">Email:</label>
												<input class="form-control" type="text" name="email">
											</div>
			
											<div class="mb-3">
												<label class="col-form-label" for="recipient-name">Phone:</label>
												<input class="form-control" type="text" name="phone_number">
											</div>
			
										
											<div class="mb-2">
												<label class="col-form-label">Role:</label>
												<select class="form-control " name="role_id">
													<optgroup label="Roles">
														<option value="">Select Role</option>
														<?php echo e($roles =  App\Models\Role::select('*')->get()); ?>

														<?php $__empty_1 = true; $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
														<option value="<?php echo e($item->id); ?>" ><?php echo e($item->role_name); ?></option>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
														<?php endif; ?>
													</optgroup>
												</select>
											</div>
			
			
											<div class="mb-2">
												<label class="col-form-label">Warehouse Assigned:</label>
												<select class="form-control " name="warehouse_id">
													<optgroup label="Warehouses">
														<option value="">Select Warehouse</option>
														<?php echo e($warehouses =  App\Models\Warehouse::select('*')->get()); ?>

														<?php $__empty_1 = true; $__currentLoopData = $warehouses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
														<option value="<?php echo e($item->id); ?>" ><?php echo e($item->warehouse_name); ?></option>
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


							<thead>
								<tr>
									<th>Username</th>
									<th>Email</th>
									<th>Name</th>
									<th>Phone Number</th>
									
									<th>Added By</th>
									<th>Created Date</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($user->username); ?></td>
									<td><?php echo e($user->email); ?></td>
									<td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?> <?php echo e($user->other_names); ?></td>
									<td><?php echo e($user->phone_number); ?></td>
									<td><?php echo e($user->first_name); ?></td>
									<td><?php echo e($user->created_At); ?></td>
								</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5" style="color:red">Oops! No users registered yet</td>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/user/user-list.blade.php ENDPATH**/ ?>