
<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e(route('dashboard.show')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			
		</div>
		<div class="logo-icon-wrapper">
			<a href="<?php echo e(route('/')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/Gogetit-logo2.png')); ?>" width="50px" alt="Gogetit Logo"></a>
		<h2>ODT</h2>
		</div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<br/><br/>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><a href="/dashboard">Dashboard </a></h6>
                     		
						</div>
					</li>

					
					<?php if(Auth::user()->role_id==1 ?? null): ?>
						
					
					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="database"></i><span>My Consumer Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
							<li><a href="<?php echo e(route('consumer_single.show')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Single Consumer</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Bulk Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="box"></i><span>My Merchant Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
							<li><a href="<?php echo e(route('consumer_single.show')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Single Consumer</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Bulk Upload Consumers</a></li>
		                </ul>
					</li>


					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/download-template' ? 'active' : ''); ?>" href="/download-template">
							<i data-feather="arrow-down-circle"></i><span>Download Template </span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/edit-profile' ? 'active' : ''); ?>" href="/edit-profile">
							<i data-feather="user"></i><span>Edit My Profile </span>
							
						</a>
					</li>


					
					<?php elseif(Auth::user()->role_id==2 ?? null): ?>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/user' ? 'active' : ''); ?>" href="/my-agents">
							<i data-feather="users"></i><span>My Agents </span>
							
						</a>
						
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="database"></i><span>Consumer Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;'); ?>">
		                    <li><a href="<?php echo e(route('consumer-list.show')); ?>" class="<?php echo e(Route::currentRouteName()=='consumer' ? 'active' : ''); ?>">Consumer List</a></li>
							<li><a href="<?php echo e(route('consumer_single.show')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Upload Single Consumer</a></li>
		                    <li><a href="<?php echo e(route('consumer.upload')); ?>" class="<?php echo e(Route::currentRouteName()=='projectcreate' ? 'active' : ''); ?>">Bulk Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="#">
							<i data-feather="box"></i><span>Merchant Data </span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/consumer' ? 'down' : 'right'); ?>"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/merchant' ? 'block;' : 'none;'); ?>">
		                    <li><a href="#" class="<?php echo e(Route::currentRouteName()=='merchant' ? 'active' : ''); ?>">Merchant List</a></li>
		                    <li><a href="#" class="<?php echo e(Route::currentRouteName()=='merchant-upload' ? 'active' : ''); ?>">Upload Merchants</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/download-template' ? 'active' : ''); ?>" href="/download-template">
							<i data-feather="arrow-down-circle"></i><span>Download Template </span>
							
						</a>
					
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/edit-profile' ? 'active' : ''); ?>" href="/edit-profile">
							<i data-feather="user"></i><span>Edit My Profile </span>
							
						</a>
					</li>

					
					
					
					<?php elseif(Auth::user()->role_id==3 ?? null): ?>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/user' ? 'active' : ''); ?>" href="<?php echo e(route('user-list.show')); ?>">
							<i data-feather="users"></i><span>Users </span>
							
						</a>
						
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="warehouses-list">
							<i data-feather="database"></i><span>Warehouses </span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="customers-list">
							<i data-feather="users"></i><span>Customers </span>
							
						</a>
					</li>

				

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/download-template' ? 'active' : ''); ?>" href="product-type">
							<i data-feather="arrow-down-circle"></i><span>Product Type </span>
							
						</a>
					
					</li>


					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/consumer' ? 'active' : ''); ?>" href="product-list">
							<i data-feather="box"></i><span>Products </span>
							
						</a>
						
					</li>

				

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/edit-profile' ? 'active' : ''); ?>" href="supplier-list">
							<i data-feather="navigation-2"></i><span>Suppliers</span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/edit-profile' ? 'active' : ''); ?>" href="manufacturer-list">
							<i data-feather="cpu"></i><span>Manufacturers</span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/settings' ? 'active' : ''); ?>" href="stock-list">
							<i data-feather="inbox"></i><span>Stock </span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/settings' ? 'active' : ''); ?>" href="#">
							<i data-feather="dollar-sign"></i><span>Transactions </span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/edit-profile' ? 'active' : ''); ?>" href="/edit-profile">
							<i data-feather="user"></i><span>Edit My Profile </span>
							
						</a>
					</li>
				
					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/settings' ? 'active' : ''); ?>" href="#">
							<i data-feather="settings"></i><span>Settings </span>
							
						</a>
					</li>

					<li class="sidebar-list">
						
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/settings' ? 'active' : ''); ?>" href="#">
							<i data-feather="book"></i><span>Reports </span>
							
						</a>
					</li>

					<?php endif; ?>
					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>
<?php /**PATH /Users/victoroseji/Documents/jobs/IMS/resources/views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>