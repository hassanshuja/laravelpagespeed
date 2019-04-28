<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	{{-- <script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> --}}
	{{-- <script type="text/javascript" src="/js/bootstrap-multiselect.js"></script>  --}}
	{{-- <link rel="stylesheet" href="/css/bootstrap-multiselect.css" type="text/css"/>  --}}
	{{-- <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}"/> --}}
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="{{url('css/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> --}}
	<title>Admin panel, Meinweekend</title>

	<link href="/css/bootstrap-multiselect.css" rel="stylesheet" />
	<!-- Animation library for notifications   -->
	<link href="{{url('css/animate.min.css')}}" rel="stylesheet" />
	<!--  Light Bootstrap Table core CSS    -->
	<link href="{{url('css/admin.css')}}" rel="stylesheet" />
	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="{{url('css/demo.css')}}" rel="stylesheet" /><!--     Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="{{url('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

<?php /* amit comment this code */?>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css" rel="stylesheet" /> -->
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>-->

</head>
<div class='messages'>
	<script type="text/javascript" src="{{url('js/jquery-3.3.1.js')}}"></script>
	<script src="/js/ckeditor/ckeditor/ckeditor.js"></script>
	<script src="/js/bootstrap-multiselect.js" type="text/javascript"></script>
	<script src="{{url('js/rankSwap.js')}}?v=1.0" type='text/javascript'></script>
	<script src="{{url('js/updateScript.js')}}?v=5.0" type='text/javascript'></script>
	<script src="{{url('js/dates_editing.js')}}" type='text/javascript'></script>
	<script src="{{url('js/moment.min.js')}}" type="text/javascript"></script>
	<script src="{{url('js/popper.min.js')}}" type="text/javascript"></script>
	<script src="{{url('js/bootstrap-datepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{url('js/bootstrap-datepicker.de.js')}}"  charset="UTF-8"></script>
	@include('includes/message')
</div>


