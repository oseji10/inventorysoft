{{-- @if (Auth::user()->check()) --}}
<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="{{route('dashboard.show')}}"><img class="img-fluid for-light" src="{{asset('assets/images/Gogetit-logo2.png')}}" alt=""><img class="img-fluid for-dark" src="{{asset('assets/images/logo/logo_dark.png')}}" alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			{{-- <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div> --}}
		</div>
		<div class="logo-icon-wrapper">
			<a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/Gogetit-logo2.png')}}" width="50px" alt="Gogetit Logo"></a>
		<h2>ODT</h2>
		</div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						{{-- <a href="{{route('/')}}"><img class="img-fluid" src="{{asset('assets/images/Gogetit-logo2.png')}}" alt=""></a> --}}
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<br/><br/>
					<li class="sidebar-main-title">
						<div>
							<h6 class="lan-1"><a href="/dashboard">Dashboard </a></h6>
                     		{{-- <p class="lan-2">{{ trans('lang.Dashboards,widgets & layout.') }}</p> --}}
						</div>
					</li>

					{{------------------------------Sales Agent Menu-------------------------}}
					@if (Auth::user()->role_id==1 ?? null)
						
					
					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="#">
							<i data-feather="database"></i><span>My Consumer Data </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/consumer' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('consumer-list.show')}}" class="{{ Route::currentRouteName()=='consumer' ? 'active' : '' }}">Consumer List</a></li>
							<li><a href="{{route('consumer_single.show')}}" class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">Upload Single Consumer</a></li>
		                    <li><a href="{{route('consumer.upload')}}" class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">Bulk Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="#">
							<i data-feather="box"></i><span>My Merchant Data </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/consumer' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('consumer-list.show')}}" class="{{ Route::currentRouteName()=='consumer' ? 'active' : '' }}">Consumer List</a></li>
							<li><a href="{{route('consumer_single.show')}}" class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">Upload Single Consumer</a></li>
		                    <li><a href="{{route('consumer.upload')}}" class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">Bulk Upload Consumers</a></li>
		                </ul>
					</li>


					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/download-template' ? 'active' : '' }}" href="/download-template">
							<i data-feather="arrow-down-circle"></i><span>Download Template </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/edit-profile' ? 'active' : '' }}" href="/edit-profile">
							<i data-feather="user"></i><span>Edit My Profile </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>


					{{-- Coordinator Dashboard --}}
					@elseif (Auth::user()->role_id==2 ?? null)

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/user' ? 'active' : '' }}" href="/my-agents">
							<i data-feather="users"></i><span>My Agents </span>
							{{-- <div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/user' ? 'down' : 'right' }}"></i></div> --}}
						</a>
						{{-- <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/user' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('user-list.show')}}" class="{{ Route::currentRouteName()=='user' ? 'active' : '' }}">User List</a></li>
		                    <li><a href="{{route('create.user')}}" class="{{ Route::currentRouteName()=='create-user' ? 'active' : '' }}">Create New User</a></li>
		                </ul> --}}
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="#">
							<i data-feather="database"></i><span>Consumer Data </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/consumer' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/consumer' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('consumer-list.show')}}" class="{{ Route::currentRouteName()=='consumer' ? 'active' : '' }}">Consumer List</a></li>
							<li><a href="{{route('consumer_single.show')}}" class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">Upload Single Consumer</a></li>
		                    <li><a href="{{route('consumer.upload')}}" class="{{ Route::currentRouteName()=='projectcreate' ? 'active' : '' }}">Bulk Upload Consumers</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="#">
							<i data-feather="box"></i><span>Merchant Data </span>
							<div class="according-menu"><i class="fa fa-angle-{{request()->route()->getPrefix() == '/consumer' ? 'down' : 'right' }}"></i></div>
						</a>
						<ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/merchant' ? 'block;' : 'none;' }}">
		                    <li><a href="#" class="{{ Route::currentRouteName()=='merchant' ? 'active' : '' }}">Merchant List</a></li>
		                    <li><a href="#" class="{{ Route::currentRouteName()=='merchant-upload' ? 'active' : '' }}">Upload Merchants</a></li>
		                </ul>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/download-template' ? 'active' : '' }}" href="/download-template">
							<i data-feather="arrow-down-circle"></i><span>Download Template </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/edit-profile' ? 'active' : '' }}" href="/edit-profile">
							<i data-feather="user"></i><span>Edit My Profile </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					
					
					{{-- Admin Dashboard --}}
					@elseif (Auth::user()->role_id==3 ?? null)

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/user' ? 'active' : '' }}" href="{{route('user-list.show')}}">
							<i data-feather="users"></i><span>Users </span>
							
						</a>
						{{-- <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/user' ? 'block;' : 'none;' }}">
		                    <li><a href="{{route('user-list.show')}}" class="{{ Route::currentRouteName()=='user' ? 'active' : '' }}">User List</a></li>
		                    <li><a href="{{route('create.user')}}" class="{{ Route::currentRouteName()=='create-user' ? 'active' : '' }}">Create New User</a></li>
		                </ul> --}}
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="warehouses-list">
							<i data-feather="database"></i><span>Warehouses </span>
							
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="customers-list">
							<i data-feather="users"></i><span>Customers </span>
							
						</a>
					</li>

				

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/download-template' ? 'active' : '' }}" href="product-type">
							<i data-feather="arrow-down-circle"></i><span>Product Type </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					
					</li>


					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/consumer' ? 'active' : '' }}" href="product-list">
							<i data-feather="box"></i><span>Products </span>
							
						</a>
						{{-- <ul class="sidebar-submenu" style="display: {{ request()->route()->getPrefix() == '/merchant' ? 'block;' : 'none;' }}">
		                    <li><a href="#" class="{{ Route::currentRouteName()=='merchants' ? 'active' : '' }}">Merchant List</a></li>
		                    <li><a href="#" class="{{ Route::currentRouteName()=='merchant-upload' ? 'active' : '' }}">Upload Merchants</a></li>
		                </ul> --}}
					</li>

				

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/edit-profile' ? 'active' : '' }}" href="supplier-list">
							<i data-feather="navigation-2"></i><span>Suppliers</span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/edit-profile' ? 'active' : '' }}" href="manufacturer-list">
							<i data-feather="cpu"></i><span>Manufacturers</span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/settings' ? 'active' : '' }}" href="stock-list">
							<i data-feather="inbox"></i><span>Stock </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/settings' ? 'active' : '' }}" href="transaction-list">
							<i data-feather="dollar-sign"></i><span>Transactions </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/edit-profile' ? 'active' : '' }}" href="/edit-profile">
							<i data-feather="user"></i><span>Edit My Profile </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>
				
					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/settings' ? 'active' : '' }}" href="#">
							<i data-feather="settings"></i><span>Settings </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					<li class="sidebar-list">
						{{-- <label class="badge badge-danger">{{ trans('lang.New') }}</label> --}}
						<a class="sidebar-link sidebar-title {{request()->route()->getPrefix() == '/settings' ? 'active' : '' }}" href="#">
							<i data-feather="book"></i><span>Reports </span>
							{{-- <div class="according-menu"><i class=""></i></div> --}}
						</a>
					</li>

					@endif
					
				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div>
