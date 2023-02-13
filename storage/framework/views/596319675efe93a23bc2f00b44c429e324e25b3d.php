<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/animate.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/chartist.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>
<br/>
<?php $__env->startSection('breadcrumb-title'); ?>

<h3>Welcome <b><?php echo e(Auth::user()->first_name ?? null); ?>!</b> <br/>You're logged in as a <b><?php echo e(Auth::user()->role_info->role_name ?? null); ?></b></h3>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row second-chart-list third-news-update">
		
		
		







 
 
 


 <?php if(Auth::user()->role_id=="3" ?? null): ?>
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Sales Today</span>
				<h4>&#8358;
					<?php echo e(number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->whereDay('sale.created_at', Carbon\Carbon::now()->day)
					->value('cons'), 2)); ?>

				</h4>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Sales This Week</span>
				<h4 class="mb-0 counter">
					&#8358;
					<?php echo e(number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->whereBetween('sale.created_at', [Carbon\Carbon::now()->startOfWeek(), Carbon\Carbon::now()->endOfWeek()])
					->value('cons'), 2)); ?>

				</h4>
			 </div>
	   </div>
	</div>
 </div>


 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Sales This Month</span>
				<h4 class="mb-0 counter">
					&#8358;
					<?php echo e(number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('cons'), 2)); ?>

				</h4>
			 </div>
	   </div>
	</div>
 </div>


 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class="bg-primary b-r-4 card-body">
			 <div class="media-body">
				<span class="m-0">Total Sales</span>
				<h4 class="mb-0 counter">
					&#8358;
					<?php echo e(number_format(DB::table('sale')
					->selectRaw('SUM(sale.unit_cost*sale.quantity_sold) as cons')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('cons'), 2)); ?>

				</h4>
			 </div>
	   </div>
	</div>
 </div>


 
 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					<?php echo e((DB::table('product')
					->selectRaw('COUNT(product.id) as products')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('products'))); ?>

				</h4>
				<span class="m-0">Products</span>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					<?php echo e((DB::table('manufacturer')
					->selectRaw('COUNT(manufacturer.id) as manufacturer')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('manufacturer'))); ?>

				</h4>
				<span class="m-0">Product Manufacturers</span>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					<?php echo e((DB::table('warehouse')
					->selectRaw('COUNT(warehouse.id) as warehouses')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('warehouses'))); ?>

				</h4>
				<span class="m-0">Warehouses</span>
			 </div>
	   </div>
	</div>
 </div>

 <div class="col-sm-6 col-xl-3 col-lg-6">
	<div class="card o-hidden">
	   <div class=" card-body">
			 
				<div class="media-body right-chart-content">
				
				<h4 class="mb-0 counter">
					<?php echo e((DB::table('supplier')
					->selectRaw('COUNT(supplier.id) as suppliers')
					// ->whereMonth('sale.created_at', Carbon\Carbon::now()->month)
					->value('suppliers'))); ?>

				</h4>
				<span class="m-0">Suppliers</span>
			 </div>
	   </div>
	</div>
 </div>

 
 </div>

 
 <?php endif; ?>
		

			


			


		
		






	</div>
</div>
<script type="text/javascript">
	var session_layout = '<?php echo e(session()->get('layout')); ?>';
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/chartist/chartist-plugin-tooltip.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/knob/knob-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/apex-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apex-chart/stock-prices.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead/typeahead.custom.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/handlebars.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/typeahead-search/typeahead-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/dashboard/index.blade.php ENDPATH**/ ?>