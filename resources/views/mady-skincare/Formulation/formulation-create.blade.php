@extends('layouts.master')
@section('css')
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!---Datetimepicker css-->
<link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
<!-- ****************** custom js file ********************* -->
<link href="{{ URL::asset('assets/css/CustomCss/Research/error.css')}}" rel="stylesheet">
@endsection
@section('page-header')
<!-- Page Header -->
<div class="page-header">
	<div>
		<h2 class="main-content-title tx-24 mg-b-5">Formulation</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Formulation</li>
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
					<h6 class="card-title mb-1">Add Formulation</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formFormulationCreate">
						@csrf
						<div class="">
							<div class="row">
								<!-- ***************** eployee first name  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
									<label class="form-label">Formulation Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="formulation_name" placeholder="Enter Formulation Name" required="" type="text">
								</div>
									
								</div>
								
								<!-- ****************** employee last name *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Ingredient Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="ingredient_name" placeholder="Enter Ingredient Name" required="" type="text">
								</div>
							    </div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Quantity: <span class="tx-danger">*</span></label>
									<input type="number" name="quantity" class="form-control" required="">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Equipment Used: <span class="tx-danger">*</span></label>
									<input class="form-control" name="equipment_used" id="equipment_used" placeholder="Enter Equipment Used" required="" type="text">
								</div>

							    </div>
								
							</div>
							<div class="row">
								<!-- ****************** employee confirm password *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Procedure: <span class="tx-danger">*</span></label>
									<input class="form-control" name="procedure" placeholder="Enter Procedure" required="" type="text">
								</div>
							    </div>
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Container Used: <span class="tx-danger">*</span></label>
									<input class="form-control" name="container_used" id="container_used" placeholder="Enter Container Used" required="" type="text">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee roles  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Label Type Used: <span class="tx-danger">*</span></label>
									<input class="form-control" name="label_type_used" id="label_type_used" placeholder="Enter Label Type Used" required="" type="text">
								</div>
							    </div>
								<!-- ****************** employee date of birth *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Pack Size: <span class="tx-danger">*</span></label>
									<input class="form-control" name="pack_size" placeholder="Pack Size" type="text" required="">
								</div>

						    	</div>
								
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Formulation</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/Formulation/formulation-create.js')}}"></script>
@endsection