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
		<h2 class="main-content-title tx-24 mg-b-5">Add Equipment</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="#">Inventory</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Equipment</li>
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
					<h6 class="card-title mb-1">Add Equipment</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formEquipmentCreate">
						@csrf
						<div class="">
							<div class="row">
								<!-- ***************** eployee first name  -->

								<div class="col-lg-6 col-md-6">

									<div class="form-group">
									<label class="form-label">Equipment Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="quipment_name" placeholder="Enter Equipment Name" required="" type="text">
								</div>
									
								</div>
								<!-- ****************** employee last name *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Number: <span class="tx-danger">*</span></label>
									<input class="form-control" name="equipment_number" placeholder="Enter Equipment Number" required="" type="text">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Functional Status: <span class="tx-danger">*</span></label>
									<input type="text" name="functional_status" class="form-control" required="">
								</div>
						    	</div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Hours Used: <span class="tx-danger">*</span></label>
									<input class="form-control" name="hours_used" id="hours_used" placeholder="Enter Hours Used " required="" type="text">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Start Time: <span class="tx-danger">*</span></label>
									<input type="time" name="start_time" class="form-control" required="">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">End Time: <span class="tx-danger">*</span></label>
									<input class="form-control" name="end_time" id="end_time" placeholder="" type="time">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Maintenance Date: <span class="tx-danger">*</span></label>
									<input type="text" name="maintenance_date" placeholder="MM/DD/YYYY" class="form-control fc-datepicker" required="">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Due Date: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="due_date" id="due_date" placeholder="MM/DD/YYYY" type="text">
								</div>
							    </div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Equipment</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/Inventory/Equipment/equipment-create.js')}}"></script>
@endsection