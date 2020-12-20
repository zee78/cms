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
		<h2 class="main-content-title tx-24 mg-b-5">Trend Analysis</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Trend Analysis</li>
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
					<h6 class="card-title mb-1">Add Trend Analysis</h6>

				</div>
				<div class="mt-3 mb-3">
					<form  id="formTrendCreate">
						@csrf
						<div class="">
							<div class="row">
                                <div class="col-lg-6 col-md-6">
								<div class="form-group">
									<label class="form-label">Product Name: <span class="tx-danger">*</span></label>
									<input type="text" name="product_name" class="form-control" placeholder="Product Name">
                                </div>
                                </div>
                                <!-- ***************** eployee first name  -->
                                <div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Packs Sold: <span class="tx-danger">*</span></label>
									<input type="text" name="packs_sold" class="form-control" placeholder="Packs sold">
                                </div>
                                </div>
								<!-- ****************** employee last name *************** -->

							</div>
							<div class="row">
                                <!-- ***************** eployee email  -->
                                <div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Amount Received: <span class="tx-danger">*</span></label>
									<input class="form-control" name="amount_received" placeholder="Amount Received" required="" type="text">
                                </div>
                                </div>

                                <div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Customer Feedback: </label>
									<textarea class="form-control" rows="2" cols="10" name="customer_feedback"></textarea>
                                </div>

                                </div>
								<!-- ****************** employee phone number *************** -->
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Submit Trend Analysis</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/TrendAnalysis/trend-analysis-create.js')}}"></script>

@endsection
