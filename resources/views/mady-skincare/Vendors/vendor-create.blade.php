@extends('layouts.master')
@section('css')
<!---Select2 css-->
{{-- <meta name="csrf-token" content="{{ csrf_token() }}" /> --}}

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
		<h2 class="main-content-title tx-24 mg-b-5">Vendors</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Vendors</li>
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
					<h6 class="card-title mb-1">Add Vendors</h6>

				</div>
				<div class="mt-3 mb-3">
					<form  id="formVendorCreate">
						@csrf
						<div class="">
							<div class="row">
                                <!-- ***************** eployee first name  -->
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Vendors Type: <span class="tx-danger">*</span></label>
                                        <select name="vendor_type" class="form-control">
                                            <option value="chemicals">Chemicals</option>
                                            <option value="glassware">Glassware</option>
                                            <option value="containers">Containers</option>
                                            <option value="equipment">Equipment</option>
                                            <option value="labels">Labels</option>
                                            <option value="boxes">Boxes</option>
                                            <option value="brochures">Brochures</option>
                                            <option value="other">Other</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- ****************** employee last name *************** -->
                                <div class="col-lg-6 col-md-6">

								<div class="form-group">
									<label class="form-label">Vendor Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="vendor_name" placeholder="Enter Vendor Name" required="" type="text">
                                </div>
                                </div>

							</div>
							<div class="row">
                                <!-- ***************** eployee email  -->
                                <div class="col-lg-12 col-md-12">

								<div class="form-group">
									<label class="form-label">Contact Detail: <span class="tx-danger">*</span></label>
									<input class="form-control" name="phoneNo" placeholder="Enter Contact Detail" required="" type="text">
                                </div>
                                </div>
								<!-- ****************** employee phone number *************** -->
							</div>
							<div class="row">
                                <div class="col-lg-12 col-md-12">

								<div class="form-group">
									<label class="form-label">Address: <span class="tx-danger">*</span></label>
									<textarea cols="10" rows="3" class="form-control" name="address" placeholder="Address"></textarea>
                                </div>
                                </div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Add Vendors</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/Vendors/vendor-create.js')}}"></script>

@endsection

