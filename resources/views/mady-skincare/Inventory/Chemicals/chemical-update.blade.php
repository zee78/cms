@extends('layouts.master')
@section('css')
<!---Select2 css-->
<meta name="csrf-token" content="{{ csrf_token() }}" />

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
		<h2 class="main-content-title tx-24 mg-b-5">Add Chemicals</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="#">Inventory</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Chemicals</li>
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
					<h6 class="card-title mb-1">Update Chemicals</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formChemicalUpdate">
						@csrf
						<div class="">
							<div class="row">
								<!-- ***************** eployee first name  -->
								<input type="hidden" id="chemicalId" value="{{ $chemicalData->id }}">
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
									<label class="form-label">Chemical Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="chemical_name" placeholder="Enter Chemical Name" required="" type="text"
									value="{{ $chemicalData->chemical_name }}">
								</div>
									
								</div>
								<!-- ****************** employee last name *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Total Stock in Hand: <span class="tx-danger">*</span></label>
									<input class="form-control" name="stock_in_hand" placeholder="Enter Stock in Hand" required="" type="text"
									value="{{ $chemicalData->stock_in_hand }}">
								</div>
							    </div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Unit Cost: <span class="tx-danger">*</span></label>
									<input type="text" name="unit_cost" class="form-control" required=""
									value="{{ $chemicalData->unit_cost }}">
								</div>
					    		</div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Quantity Used: <span class="tx-danger">*</span></label>
									<input class="form-control" name="quantity_used" id="quantity_used" placeholder="Enter Quantity Used" required="" type="text" value="{{ $chemicalData->quantity_used }}">
								</div>
							    </div>
								
							</div>
							<div class="row">
								<!-- ****************** employee confirm password *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Usage Details: <span class="tx-danger">*</span></label>
									<textarea class="form-control" rows="3" cols="10" name="usage_detail">
										{{ $chemicalData->usage_detail }}
									</textarea>
								</div>
							    </div>
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Quantity Remaining: <span class="tx-danger">*</span></label>
									<input class="form-control" name="quantity_remaining" id="quantity_remaining" placeholder="Enter Quantity Remaining" required="" type="text" value="{{ $chemicalData->quantity_remaining }}">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee roles  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Safety Stock Level: <span class="tx-danger">*</span></label>
									<input class="form-control" name="stock_level" id="stock_level" placeholder="Safety Stock Level" required="" type="text" value="{{ $chemicalData->stock_level }}">
								</div>
							    </div>
								<!-- ****************** employee date of birth *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Total Cost of Chemicals Used: <span class="tx-danger">*</span></label>
									<input class="form-control" name="cost_chemicals_used" placeholder="Total Cost of Chemicals Used" type="text" required="" value="{{ $chemicalData->cost_chemicals_used }}">
								</div>
						     	</div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee roles  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Wastage Amount: <span class="tx-danger">*</span></label>
									<input class="form-control" name="wastage_amount" id="wastage_amount" placeholder="Enter Wastage Amount" required="" type="text" value="{{ $chemicalData->wastage_amount }}">
								</div>
							    </div>
								<!-- ****************** employee date of birth *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Cost of Wastage: <span class="tx-danger">*</span></label>
									<input class="form-control" name="wastage_cost" placeholder="Cost of Wastage" type="text" required="" value="{{ $chemicalData->wastage_cost }}">
								</div>
							    </div>
								
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Update Chemicals</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/Inventory/Chemicals/chemical-update.js')}}"></script>

@endsection