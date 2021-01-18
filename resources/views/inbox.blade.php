@extends('layouts.master')
@section('css')
<!---Select2 css-->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Mutipleselect css-->
<link rel="stylesheet" href="{{ URL::asset('assets/plugins/multipleselect/multiple-select.css')}}">
<!---Jquery.mCustomScrollbar css-->
<link href="{{ URL::asset('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet">

<link rel="stylesheet" href="{{ URL::asset('assets/chat/style.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/chat/styles.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/chat/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ URL::asset('assets/chat/ionicons.min.css')}}">
<script src="{{ asset('js/app.js') }}" defer></script>
<style>
	.page-header{
		min-height: 10px;
	}
</style>
@endsection
@section('page-header')
					<!-- Page Header -->
					<div class="page-header">
						<!-- <div>
							<h2 class="main-content-title tx-24 mg-b-5">Welcome To Dashboard</h2>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Inbox</li>
							</ol>
						</div> -->
					</div>
					<!-- End Page Header -->
@endsection
@section('content')
					

					<!-- Row -->
					<div class="row row-sm justify-content-center">
						<div class="col-sm-12 col-xl-12 col-lg-12">
							<div id="app">
								<!-- {{$userdata}} -->
								<example-component :userdata="{{$userdata}}"></example-component>
								}
							</div>
						</div>
						
					</div>
					<!-- End Row -->


				</div>
			</div>
			<!-- End Main Content-->
@endsection
@section('js')
<!-- Flot Chart js-->
<script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
<script src="{{ URL::asset('assets/js/chart.flot.sampledata.js')}}"></script>
<!-- Chart.Bundle js-->
<script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
<!-- Peity js-->
<script src="{{ URL::asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>
<!-- Jquery-Ui js-->
<script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Select2 js-->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--MutipleSelect js-->
<script src="{{ URL::asset('assets/plugins/multipleselect/multiple-select.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/multipleselect/multi-select.js')}}"></script>
<!-- Jquery.mCustomScrollbar js-->
<script src="{{ URL::asset('assets/plugins/jquery.mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- index -->
<script src="{{ URL::asset('assets/js/index.js')}}"></script>
@endsection