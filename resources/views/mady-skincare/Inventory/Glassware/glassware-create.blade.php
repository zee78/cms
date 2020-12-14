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
		<h2 class="main-content-title tx-24 mg-b-5">Add Glassware</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item"><a href="#">Inventory</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Glassware</li>
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
					<h6 class="card-title mb-1">Add Glassware</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formGlasswareCreate">
						@csrf
						<div class="">
							<div class="row">
								<!-- ***************** eployee first name  -->
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
									<label class="form-label">Glassware Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="glassware_name" placeholder="Enter Glassware Name" required="" type="text">
								</div>
									
								</div>
								
								<!-- ****************** employee last name *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Total Stock in Hand: <span class="tx-danger">*</span></label>
									<input class="form-control" name="stock_in_hand" placeholder="Enter Stock in Hand" required="" type="text">
								</div>
							    </div>

							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Breakage: <span class="tx-danger">*</span></label>
									<input type="text" name="breakge" class="form-control" required="">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Responsible Person: <span class="tx-danger">*</span></label>
									<input class="form-control" name="responsible_person" id="responsible_person" placeholder="Enter Name of Responsible Person" required="" type="text">
								</div>
							    </div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Glassware</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/Inventory/Glassware/glassware-create.js')}}"></script>
@endsection