<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>pos</title>

	<!-- Global stylesheets -->
			<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

	<link href="{{asset('/backEnd/admin')}}/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{asset('/backEnd/admin')}}/assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{asset('/backEnd/admin')}}/assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="{{asset('/backEnd/admin')}}/assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{asset('/backEnd/admin')}}/assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->

	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/ui/nicescroll.min.js"></script>


	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/tables/datatables/extensions/responsive.min.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/plugins/forms/selects/select2.min.js"></script>

	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/core/app.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/pages/datatables_responsive.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/custom.js"></script>
	<!-- /theme JS files -->
	<style type="text/css">
		.swal2-title{
			font-size: 14px!important;
		}
		.panel>.dataTables_wrapper .table-bordered {
	    border: 1px solid #ddd;
	    }
	    .dataTables_length {
	    margin: 20px 0 20px 20px;
	    }
	    .dataTables_filter {
	    margin: 20px 0 20px 20px;
	    }
	    .dataTables_info {
	    margin-bottom: 20px;
	    }
	    .dataTables_paginate {
	    margin: 20px 0 20px 20px;
	    }
	    .action-icon {
	    padding: 0px 10px 0 0;
	    }
	    input[type=search]{
	    	margin-left: 10px!important;
	    }
	</style>

</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		@include('backEnd.admin.includes.header')
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">
				<!-- User menu -->
					@include('backEnd.admin.includes.userMenu')
				<!-- /user menu -->

					<!-- Main navigation -->
					@include('backEnd.admin.includes.menu')

					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line">
						<ul class="breadcrumb">
							<li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
							<li><a href="index.html">Home</a></li>
							<li class="active">Dashboard</li>
						</ul>
					</div>
				</div>
				<!-- /page header -->
				<!-- Content area -->
				
					<div class="content">
						<div class="panel panel-flat">
							<div class="panel-heading">
								<h4 class="panel-title">@yield('panel-title')</h4>
								<div class="heading-elements">
									<ul class="icons-list">
				                		<li><a data-action="collapse"></a></li>
				                		<li><a data-action="reload"></a></li>
				                		<li><a data-action="close"></a></li>
				                	</ul>
			                	</div>
							</div>
								<!-- /main charts -->
							<div class="row">
								<div class="col-lg-12">
									{{-- @php
										$currentUrl = \URL::current();
										$locale = App::getLocale();
										$urlArray = explode('public', $currentUrl);
										$fullUrl = URL::to('bn'.$urlArray[1]);
										echo $fullUrl;
									@endphp --}}
		 	          				@yield('content')
								</div>
								@include('sweetalert::alert')

							</div>
								<!-- /main charts -->

						</div>
						<!-- Footer -->
						<div class="footer text-muted">
							&copy; 2020. <a href="#">Pos System</a> by <a href="#" target="_blank">Arafat Rahman</a>
						</div>
						<!-- /footer -->

					</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
	<div style="font-size: 100px!important;">
		
        @include('sweetalert::alert')

	</div>

</body>
</html>
