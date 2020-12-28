@extends('layouts.master')
@section('css')
<!---DataTables css-->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<link href="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/responsivebootstrap4.min.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
					<!-- Page Header -->
					<div class="page-header">
						<div>
							<h2 class="main-content-title tx-24 mg-b-5">Purchase Order</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page">List</li>
							</ol>
						</div>
						<div class="btn btn-list">
							<!-- <a class="btn ripple btn-primary" href="#"><i class="fe fe-external-link"></i> Export</a>
							<a class="btn ripple btn-secondary" href="#"><i class="fe fe-download"></i> Download</a>
							<a class="btn ripple btn-info" href="#"><i class="fe fe-help-circle"></i> Help</a>
							<a class="btn ripple btn-danger dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								<i class="fe fe-settings"></i> Settings <i class="fas fa-caret-down ml-1"></i>
							</a>
							<div  class="dropdown-menu tx-13">
								<a class="dropdown-item" href="#"><i class="fe fe-eye mr-2"></i>View</a>
								<a class="dropdown-item" href="#"><i class="fe fe-plus-circle mr-2"></i>Add</a>
								<a class="dropdown-item" href="#"><i class="fe fe-mail mr-2"></i>Email</a>
								<a class="dropdown-item" href="#"><i class="fe fe-folder-plus mr-2"></i>Save</a>
								<a class="dropdown-item" href="#"><i class="fe fe-trash-2 mr-2"></i>Remove</a>
								<a class="dropdown-item" href="#"><i class="fe fe-settings mr-2"></i>More</a>
							</div> -->
							<a class="btn ripple btn-secondary" href="{{ url('skincare/purchase-order/create') }}"><i class="fe fe-download"></i> Add New Order</a>
						</div>
					</div>
					<!-- End Page Header -->
@endsection
@section('content')
					<!-- Row -->
					<div class="row">
						<div class="col-lg-12">
							<div class="card custom-card">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Purchase Order</h6>
										<!-- <p class="text-muted card-sub-title">Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.</p> -->
									</div>
									<div class="table-responsive">
										@can('order edit')
										<!-- <h1>hello</h1> -->
													@endcan
										<table class="table" id="tblOrder">
											<thead>
												<tr>
													<th class="wd-20p">Sr#</th>
													<th class="wd-20p">Order No</th>
													<th class="wd-25p">Order Type</th>
													<th class="wd-25p">Placed By</th>
													<th class="wd-25p">Date</th>
													<th class="wd-25p">Vendor Name</th>
													<th class="wd-25p">Cost</th>
													<th class="wd-25p">Approved By</th>
													<th class="wd-25p">Procurement Person</th>
													<th class="wd-25p">Receiving Date</th>
													<th class="wd-25p">Order Status</th>
													<th class="wd-25p">Action</th>
													<!-- <th class="wd-25p">Action</th> -->
													
													<th class="wd-25p">Change Order Status</th> 
												</tr>
											</thead>
											<tbody>
										
											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- End Row -->

				</div>
			</div>
			<!-- End Main Content-->
						<!-- Modal effects -->
			<div class="modal" id="deleteModel">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content modal-content-demo">
						<div class="modal-header">
							<h6 class="modal-title">Alert</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
						</div>
						<form id="deleteData" > 
							@csrf
							 @method('DELETE')
						<input type="hidden" name="purchaseId" id="purchaseId">
						<div class="modal-body">
							<h6></h6>
							<p>are you sure you want to delete the record ?</p>
						</div>
						<div class="modal-footer">
							<button class="btn ripple btn-danger" id="confirmDelete" type="submit"> Delete </button>
							<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
						</div>
					   </form>
					</div>
				</div>
			</div>
			<!-- End Modal effects-->
@endsection
@section('js')
<!-- Data Table js -->
<script src="{{ URL::asset('assets/plugins/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/dataTables.buttons.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/jszip.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/pdfmake.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/vfs_fonts.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.html5.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.print.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/fileexport/buttons.colVis.min.js')}}"></script>

<script src="{{ URL::asset('assets/plugins/ionicons/ionicons.js')}}"></script>
<script src="{{ URL::asset('assets/js/modal.js')}}"></script>
<script src="{{ URL::asset('assets/js/notify.js') }}"></script>
<!-- ********************** custom js file here *********************** -->
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/PurchaseOrder/purchase-order-lists.js')}}"></script>

@endsection