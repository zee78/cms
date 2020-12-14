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
		<h2 class="main-content-title tx-24 mg-b-5">Workshop/Seminar/Training</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Workshop/Seminar/Training</li>
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
					<h6 class="card-title mb-1">Workshop/Seminar/Training</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formTrainingCreate">
						@csrf
						<div class="">
							<div class="row ">
								<!-- ***************** eployee first name  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
									<label class="form-label">Title: <span class="tx-danger">*</span></label>
									<input class="form-control" name="title" placeholder="Enter Title" required="" type="text">
								</div>
									
								</div>
								<!-- ****************** employee last name *************** -->
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
									<label class="form-label">Type: </label>
									<select class="form-control" name="type">
										<option value="seminar">Seminar</option>
										<option value="workshop">Workshop</option>
										<option value="training">Training</option>
										<option value="individual_session">Individual Session</option>
										<option value="cbt/cct">CBT / CCT</option>
									</select>
								</div>
									
								</div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
									<label class="form-label">Date: <span class="tx-danger">*</span></label>
									<input type="text" name="date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" required="">
								</div>
									
								</div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Speaker: <span class="tx-danger">*</span></label>
									<input class="form-control" name="speaker" placeholder="Enter Speaker" required="" type="text">
								</div>
								</div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee password  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Number of Participants: <span class="tx-danger">*</span></label>
									<input class="form-control" name="number_participants" id="number_participants" required="" type="number">
								</div>
							    </div>
								<!-- ****************** employee confirm password *************** -->
								<div class="col-md-6 col-lg-6">

								<div class=" form-group">
									<label class="form-label">Total Received Amount: <span class="tx-danger">*</span></label>
									<input class="form-control" name="total_amount_received" id="total_amount_received" required="" type="number">
								</div>
								</div>
							</div>
							<div class="row mb-3">
								<!-- ***************** eployee address  -->
								<div class="col-md-12 col-lg-12">

								<div class="form-group">
									<label class="form-label">Total Amount Spent: <span class="tx-danger">*</span></label>
									<input type="number" class="form-control" name="total_amount_spent" required>
								</div>
							    </div>
								
								
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Form</button>
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
<script src="{{ URL::asset('assets/CustomJs/Research/TrainingForm/training-form-create.js')}}"></script>
@endsection