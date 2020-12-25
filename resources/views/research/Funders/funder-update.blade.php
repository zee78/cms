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
		<h2 class="main-content-title tx-24 mg-b-5">Add Potential Funders</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Potential Funders</li>
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
					<h6 class="card-title mb-1">Add Potential Funders</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="fundersUpdate">
						@csrf
						<div class="">
							<div class="row ">
								<!-- ***************** eployee first name  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
									<label class="form-label">Funding Organization Name: <span class="tx-danger">*</span></label>
									<input class="form-control" type="hidden" id="fundersId" value="{{ $getSingleData->id }}">
									<input class="form-control" name="funding_organization_name" placeholder="Enter Organization Name" required="" value="{{ $getSingleData->funding_organization_name }}" type="text">
								</div>
									
								</div>
								<!-- ****************** employee last name *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Website: </label>
									<input type="text" name="website" class="form-control" value="{{ $getSingleData->website }}" placeholder="Enter Website">
								</div>
							    </div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Email: <span class="tx-danger">*</span></label>
									<input type="email" name="email" class="form-control" value="{{ $getSingleData->email }}" placeholder="Email">
								</div>

							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Contact Detail: <span class="tx-danger">*</span></label>
									<input class="form-control" name="phoneNo" value="{{ $getSingleData->phoneNo }}" placeholder="Enter Contact Detail" required="" type="text">
								</div>

							    </div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee password  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Team Lead: <span class="tx-danger">*</span></label>
									<input class="form-control" name="team_lead" id="team_lead" placeholder="Enter Team Lead" required="" value="{{ $getSingleData->team_lead }}" type="text">
								</div>
						    	</div> 
								<!-- ****************** employee confirm password *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Contact Status: <span class="tx-danger">*</span></label>
									<select class="form-control" name="status">
										<option selected="" value="{{ $getSingleData->status }}"> {{ $getSingleData->status }}</option>
										<option value="in_process">In Process</option>
										<option value="contacted">Contacted</option>
									</select>
								</div>

							    </div> 
								
							</div>
							<div class="row mb-3">
								<!-- ***************** eployee address  -->
								<div class="col-md-12 col-lg-12">

								<div class="form-group">
									<label class="form-label">Response: <span class="tx-danger">*</span></label>
									<textarea cols="10" rows="3" class="form-control" name="response" placeholder="Response">{{ $getSingleData->response }}</textarea>
								</div>

						    	</div>
								
								
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Funders</button>
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
<script src="{{ URL::asset('assets/CustomJs/Research/Funders/funder-update.js')}}"></script>
@endsection