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
		<h2 class="main-content-title tx-24 mg-b-5">Costing</h2>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
			<li class="breadcrumb-item active" aria-current="page">Create Costing</li>
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
					<h6 class="card-title mb-1">Add Costing</h6>
					
				</div>
				<div class="mt-3 mb-3">
					<form  id="formCostingUpdate">
						@csrf
						<div class="">
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Product Name: <span class="tx-danger">*</span></label>
									<input class="form-control" type="hidden" id="costingId" value="{{ $getSingleData->id }}">
									<input type="text" name="product_name" class="form-control" placeholder="Product Name" value="{{ $getSingleData->product_name }}">
								</div>
								<!-- ***************** eployee first name  -->
								<div class="col-lg-6 form-group">
									<label class="form-label">Ingredient Name: <span class="tx-danger">*</span></label>
									<input type="text" name="ingredient_name" class="form-control" placeholder="Ingredient name" value="{{ $getSingleData->ingredient_name }}">
								</div>
								<!-- ****************** employee last name *************** -->
								
							</div>
							<div class="row">
								<!-- ***************** eployee email  -->
								<div class="col-lg-6 form-group">
									<label class="form-label">Quantity Used for 1 Pack: <span class="tx-danger">*</span></label>
									<input class="form-control" name="quantity_used" placeholder="Quantity used for 1 pack" required="" type="text" value="{{ $getSingleData->quantity_used }}">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Container Name: <span class="tx-danger">*</span></label>
									<input class="form-control" name="container_name" placeholder="Container name " required="" type="text" value="{{ $getSingleData->container_name }}">
								</div>
								<!-- ****************** employee phone number *************** -->
							</div>
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Container Cost: <span class="tx-danger">*</span></label>
									<input class="form-control" name="container_cost" placeholder="Container cost" required="" type="text" value="{{ $getSingleData->container_cost }}">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Sticker Cost: <span class="tx-danger">*</span></label>
									<input class="form-control" name="sticker_cost" placeholder="Sticker Cost" required="" type="text" value="{{ $getSingleData->sticker_cost }}">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Box Cost: <span class="tx-danger">*</span></label>
									<input class="form-control" name="box_cost" placeholder="Box cost" required="" type="text" value="{{ $getSingleData->box_cost }}">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Bag Cost: <span class="tx-danger">*</span></label>
									<input class="form-control" name="bag_cost" placeholder="Bag cost" required="" type="text" value="{{ $getSingleData->bag_cost }}">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Total Direct Cost: <span class="tx-danger">*</span></label>
									<input class="form-control" name="total_direct_cost" placeholder="Total direct cost" required="" type="text" value="{{ $getSingleData->total_direct_cost }}">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Gst (18%): <span class="tx-danger">*</span></label>
									<input class="form-control" name="gst" placeholder="Gst (18%)" required="" type="text" value="{{ $getSingleData->gst }}">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Marketing Cost (26%): <span class="tx-danger">*</span></label>
									<input class="form-control" name="marketing_cost" placeholder="Marketing cost (26%)" required="" type="text" value="{{ $getSingleData->marketing_cost }}">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Profit %age: <span class="tx-danger">*</span></label>
									<input class="form-control" name="profit_percentage" placeholder="Profit %age" required="" type="text" value="{{ $getSingleData->profit_percentage }}">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 form-group">
									<label class="form-label">Profit Amount in RS: <span class="tx-danger">*</span></label>
									<input class="form-control" name="profit_amount" placeholder="Profit amount in rs" required="" type="text" value="{{ $getSingleData->profit_amount }}">
								</div>
								<div class="col-lg-6 form-group">
									<label class="form-label">Market Retail Price: <span class="tx-danger">*</span></label>
									<input class="form-control" name="market_retail_price" placeholder="Market retail price " required="" type="text" value="{{ $getSingleData->market_retail_price }}">
								</div>
							</div>
							<button class="btn ripple btn-primary pd-x-20" type="submit">Update Costing</button>
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
<script src="{{ URL::asset('assets/CustomJs/MadySkincare/Costing/costing-update.js')}}"></script>
@endsection