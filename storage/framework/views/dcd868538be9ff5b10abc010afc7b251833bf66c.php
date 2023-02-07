<?php $__env->startSection('title', 'Product Type'); ?>

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
			<button class="btn btn-square btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModalfat"  type="button">[+] Add  New Product</button><br/><br/>
			<div class="card">
				<div class="card-header">
					<h5>Product List</h5>
				</div>

				<div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					   <div class="modal-content">
						  <div class="modal-header">
							 <h5 class="modal-title" id="exampleModalLabel2">New Product</h5>
							 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
						  </div>
						  <div class="modal-body">
							 <form method="POST" action="<?php echo e(route('register_product.upload')); ?>" >
								<?php echo csrf_field(); ?>
								<div class="mb-3">
								   <label class="col-form-label" for="recipient-name">Product ID:</label>
								   <input class="form-control" type="text" name="product_id">
								</div>

								<div class="mb-2">
									<label class="col-form-label">Product Type:</label>
									<select class="form-control " name="product_type_id">
										<optgroup label="Product Types">
											<?php echo e($product_types =  App\Models\ProductType::select('*')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $product_types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->id); ?>" ><?php echo e($item->product_type_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>
									</select>
								</div>

						

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Product Name:</label>
									<input class="form-control" type="text" name="product_name">
								</div>


								<div class="mb-3">
									<label class="col-form-label" for="message-text">Description:</label>
									<textarea class="form-control" id="message-text" name="description"></textarea>
								 </div>

								 <div class="mb-2">
									<label class="col-form-label">Manufacturer:</label>
									<select class="form-control " name="manufacturer_id">
										<optgroup label="Manufacturers">
											<option value="">Select Manufacturer</option>
											<?php echo e($manufacturers =  App\Models\Manufacturer::select('*')->get()); ?>

											<?php $__empty_1 = true; $__currentLoopData = $manufacturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
											<option value="<?php echo e($item->id); ?>" ><?php echo e($item->manufacturer_name); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
											<?php endif; ?>
										</optgroup>
									</select>
								</div>

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Landed Cost:</label>
									<input class="form-control" type="text" name="landed_cost">
								</div>

								<div class="mb-3">
									<label class="col-form-label" for="recipient-name">Selling Price:</label>
									<input class="form-control" type="text" name="selling_price">
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
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Description</th>
									<th>Landed Cost</th>
									<th>Selling Price</th>
								
									<th>Manufacturer</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($product->product_id ?? null); ?></td>
									<td><?php echo e($product->product_name ?? null); ?></td>
									<td><?php echo e($product->description ?? null); ?></td>
									<td><?php echo e($product->landed_cost ?? null); ?></td>
									<td><?php echo e($product->selling_price ?? null); ?></td>
									<td><?php echo e($product->mm ?? null); ?></td>
								</tr>

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5" style="color:red">Oops! No products captured yet</td>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/products/product-list.blade.php ENDPATH**/ ?>