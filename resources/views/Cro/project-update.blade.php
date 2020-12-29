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
		<h2 class="main-content-title tx-24 mg-b-5">CRO</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Project</li>
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
					<h6 class="card-title mb-1">Add Project</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formCroProjectUpdate">
						@csrf
						<div class="">
							<div class="row">
								<!-- ***************** eployee first name  -->
								<div class="col-lg-6 col-md-6">
									<div class="form-group">
									<label class="form-label">Project Type: <span class="tx-danger">*</span></label>
									<input type="hidden" id="projectId" value="{{ $getSingleData->id }}">
									<select class="form-control" name="project_type">
										<option value="{{ $getSingleData->project_type }}" selected=""> {{ $getSingleData->project_type }}</option>
										<option value="Lab Based">Lab Based</option>
										<option value="Data Collection">Data Collection</option>
										<option value="Literature Based">Literature Based</option>
									</select>
								</div>
									
								</div>
								<!-- ****************** employee last name *************** -->
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Title: <span class="tx-danger">*</span></label>
									<input class="form-control" name="title" placeholder="Project Title" required="" type="text" value="{{ $getSingleData->title }}">
								</div>
							    </div>
							</div>
							<div class="row">
								<div class="col-lg-6 col-md-6">

								
								<div class="form-group">
									<label class="form-label">Funder Type: <span class="tx-danger">*</span></label>
									<select class="form-control" name="funder_type">
										<option value="{{ $getSingleData->funder_type }}" selected=""> {{ $getSingleData->funder_type }}</option>
										<option value="Professional">Professional</option>
										<option value="National Organization">National Organization</option>
										<option value="International Organization">International Organization</option>
									</select>
								</div>

							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Funder name: </label>
									<!-- <input class="form-control" type="text" name="funder_name" placeholder="Funder name"> -->
									<select class="form-control select2" name="funder_name" id="funder_name">
										<option label="Choose one"></option>
												        
									</select>
								</div>


							    </div>

							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">

								
								<div class="form-group">
									<label class="form-label">Amount: <span class="tx-danger">*</span></label>
									<input class="form-control" name="amount" placeholder="Amount" required="" type="text" value="{{ $getSingleData->amount }}">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Start Date: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="start_date" placeholder="MM/DD/YYYY" required="" type="text" value="{{ $getSingleData->start_date }}">

							 	</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">
								
								<div class="form-group">
									<label class="form-label">End Date: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="end_date" placeholder="MM/DD/YYYY" required="" type="text" value="{{ $getSingleData->end_date }}">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-lg-6 col-md-6">

									<div class="form-group">
									<label class="form-label">Team Lead: <span class="tx-danger">*</span></label>
									<input class="form-control" name="team_lead" placeholder="Team lead" required="" type="text" value="{{ $getSingleData->team_lead }}">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 col-md-6">
							
								<div class="form-group">
									<label class="form-label">Team Members: </label>
									<input class="form-control" type="text" name="team_members" placeholder="Team members" value="{{ $getSingleData->team_members }}">
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<!-- div class="col-lg-6 form-group">
									<label class="form-label">Status</label>
									<select class="form-control" name="status">
										<option value="in_process">In Process</option>
										<option value="completed">Completed</option>
									</select>
								</div>
 -->							</div>
							<div class="row">
								
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Submit Project</button>
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
<script src="{{ URL::asset('assets/CustomJs/Cro/project-update.js')}}"></script>
@endsection