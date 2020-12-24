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
		<h2 class="main-content-title tx-24 mg-b-5">Add Research Task</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Add Research Task</li>
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
					<h6 class="card-title mb-1">Add task</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="researchUpdate">
						@csrf
						<div class="">
							<div class="row ">
								<!-- ***************** eployee first name  -->
								<div class="col-md-6 col-lg-6">
									<div class="form-group">
										<input class="form-control" type="hidden" id="researchId" value="{{ $getSingleData->id }}">
										<label class="form-label">Title: <span class="tx-danger">*</span></label>
										<input class="form-control" name="title" placeholder="Enter task title" required="" value="{{ $getSingleData->title }}" type="text">
									</div>
									
								</div>
								<!-- ****************** employee last name *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Project Type: <span class="tx-danger">*</span></label>
									<select class="form-control" name="project_type">
										<option value="{{ $getSingleData->project_type }}" selected="">{{ $getSingleData->project_type }}</option>
										<option value="Thesis">Thesis</option>
										<option value="Paper Writing">Paper Writing</option>
										<option value="Literature Review">Literature Review</option>
									</select>
								</div>
							</div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Funder Type: <span class="tx-danger">*</span></label>
									<select class="form-control" name="funder_type">
										<option value="{{ $getSingleData->funder_type }}" selected>{{ $getSingleData->funder_type }}</option>
										<option value="Student">Student</option>
										<option value="Professional">Professional</option>
										<option value="National Organization">National Organization</option>
										<option value="International Organization">International Organization</option>
									</select>
								</div>
							    </div>
								<!-- ****************** employee phone number *************** -->
								<div class="col-md-6 col-lg-6">
								
								<div class="form-group">
									<label class="form-label">Funder Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="funder_name" id="funder_name" placeholder="Enter Funder Name" value="{{ $getSingleData->funder_name }}" required="" type="text">
								</div>
								
								</div>
							</div>
							<div class="row">
								<!-- ****************** employee confirm password *************** -->
								<div class="col-md-12 col-lg-12">

								<div class="form-group">
									<label class="form-label">Amount: <span class="tx-danger">*</span></label>
									<input class="form-control" name="amount" placeholder="Enter Amount" required="" type="number" value="{{ $getSingleData->amount }}">
								</div>
							    </div>
							</div>
							<div class="row">
								<!-- ***************** eployee roles  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Start Date: <span class="tx-danger">*</span></label>
									<input type="text" name="start_date" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{ $getSingleData->start_date }}" required="">
								</div>
							    </div>
								<!-- ****************** employee date of birth *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">End Date: <span class="tx-danger">*</span></label>
									<input class="form-control fc-datepicker" name="end_date" placeholder="MM/DD/YYYY" type="text" required="" value="{{ $getSingleData->end_date }}">
								</div>
							    </div>
								
							</div>
							<div class="row">
								<!-- ***************** eployee password  -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Team Lead: <span class="tx-danger">*</span></label>
									<input class="form-control" name="team_lead" id="team_lead" placeholder="Enter Team Lead" required="" type="text" value="{{ $getSingleData->team_lead }}">
								</div>
							    </div>
								<!-- ****************** employee confirm password *************** -->
								<div class="col-md-6 col-lg-6">

								<div class="form-group">
									<label class="form-label">Team Members: <span class="tx-danger">*</span></label>
									<input class="form-control" name="team_members" placeholder="Enter Team Members" required="" type="text" value="{{ $getSingleData->team_members }}">
								</div>
							    </div>
								
							</div>
							<div class="row mb-3">
								<!-- ***************** eployee address  -->
								<div class="col-md-12 col-lg-12">

								<div class="form-group">
									<label class="form-label">Status: <span class="tx-danger">*</span></label>
									<select class="form-control" name="status">
										<option value="{{ $getSingleData->task_status }}" selected>{{ $getSingleData->task_status }}</option>
										<option value="In Process">In Process</option>
										<option value="Completed">Completed</option>
									</select>
								</div>
							    </div>
								
								
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Task</button>
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
<script src="{{ URL::asset('assets/CustomJs/Research/ResearchTask/research-task-update.js')}}"></script>
@endsection