<?php $__env->startSection('title', 'Stock Transfer History'); ?>

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
									<th>Stock ID</th>
									<th>Warehouse</th>
									<th>Product</th>
									<th>Manuafacturer</th>
									<th>Qty Dispatched.</th>
									<th>Qty. Received</th>
									
									
									<th>Date Received</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $__empty_1 = true; $__currentLoopData = $stock; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr>
									<td><?php echo e($item->stock_id ?? null); ?></td>
									<td><?php echo e($item->warehouse_name ?? null); ?></td>
									<td><?php echo e($item->product_name ?? null); ?> <?php echo e($item->description ?? null); ?></td>
									<td><?php echo e($item->manufacturer_short_name ?? null); ?></td>
									<td><?php echo e($item->quantity_dispatched ?? null); ?></td>
									<td><?php echo e($item->quantity_received ?? 0); ?></td>
									
									<td><?php echo e($item->created_at ?? null); ?></td>
									<?php switch($item->transfer_status):
									case ('PENDING RECEIPT'): ?>
										<td style="color:brown">PENDING RECEIPT</td>
										<?php break; ?>
						 			<?php case ('RECEIVED'): ?>
										<td style="color:green">RECEIVED</td>
									<?php endswitch; ?>

									<?php switch($item->transfer_status):
									case ('PENDING RECEIPT'): ?>
									<td><button class="btn btn-square btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModalfat-<?php echo e($item->stock_id); ?>">RECEIVE</button></td>
										<?php break; ?>
						 			<?php case ('RECEIVED'): ?>
										<td></td>
									<?php endswitch; ?>


									
									
								</tr>

								<div class="modal fade" id="exampleModalfat-<?php echo e($item->stock_id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog" role="document">
									   <div class="modal-content">
										  <div class="modal-header">
											 <h5 class="modal-title" id="exampleModalLabel2">Transfer Stock - <?php echo e($item->stock_id); ?></h5>
											 <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
										  </div>
										  <div class="modal-body">
											 <form method="POST" action="<?php echo e(route('confirm_stock_transfer.upload')); ?>" >
												<?php echo csrf_field(); ?>
						
												<div class="mb-3">
													<label class="col-form-label" for="message-text">Quantity Dispatched</label>
													<input readonly class="form-control" type="number" value="<?php echo e(($item->quantity_dispatched)); ?>" name="quantity_dispatched">
												 </div>

												<div class="mb-3">
													<label class="col-form-label" for="message-text">Quantity To Transfer</label>
													<input class="form-control" type="number" name="quantity_received">
													<input class="form-control" type="hidden" name="initial_stock_id" value="<?php echo e($item->initial_stock_id); ?>">
													<input class="form-control" type="hidden" name="stock_id" value="<?php echo e($item->stock_id); ?>">
													
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

								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5" style="color:red">Oops! No stock transferred yet</td>
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
<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/pages/stock/stock-transfer-history.blade.php ENDPATH**/ ?>