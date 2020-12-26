			<!-- Sidemenu -->
			<div class="main-sidebar main-sidebar-sticky side-menu">
				<div class="sidemenu-logo">
					<a class="main-logo" href="{{ url('/' . $page='index') }}">
						<img src="{{URL::asset('assets/img/brand/logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
						<img src="{{URL::asset('assets/img/brand/icon.png')}}" class="header-brand-img icon-logo" alt="logo">
						<img src="{{URL::asset('assets/img/brand/logo-light.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
						<img src="{{URL::asset('assets/img/brand/icon-light.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
					</a>
				</div>
				<div class="main-sidebar-body">
					<ul class="nav">
						<li class="nav-label">Dashboard</li>
						<li class="nav-item show">
							<a class="nav-link" href="{{ url('/') }}"><i class="fe fe-airplay"></i><span class="sidemenu-label">Dashboard</span></a>
						</li>
						<li class="nav-label">Research</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('research/' . $page='research-task') }}"><i class="fe fe-database"></i><span class="sidemenu-label">Research Task</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('research/' . $page='funders') }}"><i class="fe fe-mail"></i><span class="sidemenu-label">Funder List</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('research/' . $page='training-form') }}"><i class="fe fe-award"></i><span class="sidemenu-label">Workshop/Seminar/Training Form</span></a>
						</li>
						<li class="nav-label">Mady’Skincare</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('skincare/'. $page='formulation')}}"><i class="fe fe-layers"></i><span class="sidemenu-label">Formulation</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-package"></i><span class="sidemenu-label">Inventory</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('skincare/' . $page='inventory/chemical') }}">Chemicals</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('skincare/' . $page='inventory/glasssware') }}">Glassware</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('skincare/' . $page='inventory/equipment') }}">Equipment</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('skincare/' . $page='inventory/batch') }}">Batch</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('skincare/' . $page='inventory/soldstatus') }}">Sold Status</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('skincare/'. $page='vendors')}}"><i class="fe fe-layers"></i><span class="sidemenu-label">Vendors</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('skincare/'. $page='purchase-order')}}"><i class="fe fe-layers"></i><span class="sidemenu-label">Purchase Order</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('skincare/'. $page='costing')}}"><i class="fe fe-layers"></i><span class="sidemenu-label">Costing</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('skincare/'. $page='trend-analysis')}}"><i class="fe fe-layers"></i><span class="sidemenu-label">Trend Analysis</span></a>
						</li>
						<li class="nav-label">Consultancies </li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('consultancies/'. $page='consultancy')}}"><i class="fe fe-file"></i><span class="sidemenu-label">Consultancy Data</span></a>
						</li>
						<li class="nav-label">CRO</li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('cro/'. $page='project')}}"><i class="fe fe-compass"></i><span class="sidemenu-label">Projects</span></a>
						</li>
						<li class="nav-label">Community Awareness Projects </li>
						<li class="nav-item">
							<a class="nav-link" href="{{url('community-awareness/'. $page='project')}}"><i class="fe fe-compass"></i><span class="sidemenu-label">Projects</span></a>
						</li>
						<li class="nav-label">Settings </li>

						@if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('HR') || Auth::id() == '1')
						  <li class="nav-item">
							<a class="nav-link with-sub" href=""><i class="fe fe-aperture"></i><span class="sidemenu-label">Rback</span><i class="angle fe fe-chevron-right"></i></a>
							<ul class="nav-sub">
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('/roles') }}">Roles</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('/permissions') }}">Permissions</a>
								</li>
								<li class="nav-sub-item">
									<a class="nav-sub-link" href="{{ url('employees') }}">Users</a>
								</li>
								
							</ul>
						</li>
						@endif


						<!-- <li class="mt-3">
							<a class="btn ripple btn-success  btn-block text-white text-icon"><i class="fe fe-rotate-cw mr-1"></i>Upgrade to pro</a>
							<a class="btn ripple btn-success  btn-block text-white iconbtn"><i class="fe fe-rotate-cw mr-1"></i></a>
						</li> -->
					</ul>
				</div>
			</div>
			<!-- End Sidemenu -->
