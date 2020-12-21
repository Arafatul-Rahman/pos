<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>pos</title>

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
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

	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/core/app.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/pages/dashboard.js"></script>
	<script type="text/javascript" src="{{asset('/backEnd/admin')}}/assets/js/pages/layout_fixed_custom.js"></script>
	<!-- /theme JS files -->
	<style type="text/css">
		.swal2-title{
			font-size: 14px!important;
		}
	</style>
</head>

<body>
	@yield('content')
	@include('sweetalert::alert')

</body>
</html>
