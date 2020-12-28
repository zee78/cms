@extends('layouts.master')
@section('css')
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Datetimepicker css-->
<link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- ****************** custom js file ********************* -->
<link href="{{ URL::asset('assets/css/CustomCss/Rback/roles/role-create.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Purchase Order</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Purchase Order</li>
		</ol>
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
					<h6 class="card-title mb-1">Add Purchase Order</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="updatePurchaseOrder">
						@csrf
						<div class="">
							<div class="row">
								<!-- <div class="col-lg-6 form-group">
									<label class="form-label">Order No: <span class="tx-danger">*</span></label>
									<input type="text" name="order_no" class="form-control" placeholder="Order No..">
								</div> -->
								<input class="form-control" type="hidden" id="purchaseId" value="{{ $getSingleData->id }}">
								<!-- ***************** eployee first name  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
									<label class="form-label">Order Type: <span class="tx-danger">*</span></label>
									<select name="vendor_type" class="form-control">
										<option value="{{ $getSingleData->order_type }}" selected> {{ $getSingleData->order_type }}</option>
										<option value="Chemicals">Chemicals</option>
										<option value="Glassware">Glassware</option>
										<option value="Containers">Containers</option>
										<option value="Equipment">Equipment</option>
										<option value="Sticker">Sticker</option>
										<option value="Box">Box</option>
										<option value="Carton">Carton</option>
										<option value="Brochures">Brochures</option>
										<option value="Seals">Seals</option>
									</select>
								</div>
								</div>
								<!-- ****************** employee last name *************** -->
								<!-- ***************** eployee email  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<label class="form-label">Order Placed By: <span class="tx-danger">*</span></label>
										<input class="form-control" name="placed_by" placeholder="Order Placed By" required="" type="text" value="{{ $getSingleData->order_placed_by }}">
									</div>
							  </div>  
								
							</div>
							<div class="row">
								
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Date: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="date" placeholder="MM/DD/YYYY" required="" type="text" value="{{ $getSingleData->order_date }}">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->

								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Vender Name: <span class="tx-danger">*</span></label>
									<select class="form-control select2" name="vendor_name" id="vendor_name">
										<option label="Choose one"></option>
										<!-- <option value="{{ $getSingleData->vendor_name }}" selected>{{ $getSingleData->vendor_name }}</option> -->
												        
									</select>
								</div>
							    </div>
							</div>
							<div class="row">
								
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Cost: <span class="tx-danger">*</span></label>
									<input class="form-control" name="cost" placeholder="Enter Cost" required="" type="text" value="{{ $getSingleData->cost }}">
								</div>
							    </div>

							    <div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Order Procurement Person: <span class="tx-danger">*</span></label>
									<input class="form-control" name="procurement_person" placeholder="Order Procurement Person" required="" type="text" value="{{ $getSingleData->order_procurement_by }}">
								</div>
							    </div>
							    
							</div>
							<!-- <div class="row">
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Approved By: <span class="tx-danger">*</span></label>
									<input class="form-control" name="approved_by" placeholder="Approved by" required="" type="text">
								</div>
							    </div>
								
							</div> -->
							<div class="row">
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Receiving Data: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="receiving_date" placeholder="MM/DD/YYYY" required="" type="text" value="{{ $getSingleData->order_receiving_date }}">
								</div>
							    </div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Update Purchase Order</button>
						</div>
					</form>
				</div>
				
			</div>
		</div>
	</div>
</div>
<!-- End Row -->
</div>
</div>
<!-- End Main Content-->
@endsection
@section('js')
<!-- Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate/jquery.validate.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/jquery.validate/additional-methods.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/notify.js') }}"></script>
<!-- Simple-Datepicker js-->
<script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
<!-- Jquery-Ui js-->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- ********************** custom js file here *********************** -->
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/PurchaseOrder/purchase-order-update.js')}}"></script>

@endsection