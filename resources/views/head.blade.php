<head>
    <!-- Required meta tags -->
    {{-- <meta charset="utf-8"> --}}
    @include('metaDataView')
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> --}}
        {{-- <meta name="title" content="My Title">
        <meta name="description" content="My Description"> --}}
        
    <meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" type="image/x-icon" sizes="16x16" href="/img/favicon.ico">
<link rel="shortcut icon" type="image/x-icon" sizes="16x16" href="/img/favicon.ico">
<link rel="apple-touch-icon-precomposed" type="image/x-icon" sizes="16x16" href="/img/favicon.ico">



<link rel="icon" type="image/ico" sizes="32x32" href="/img/favicon.ico">
<link rel="shortcut icon" type="image/ico" sizes="32x32" href="/img/favicon.ico">
<link rel="icon" type="image/ico" sizes="64x64" href="/img/favicon.ico">
<link rel="shortcut icon" type="image/ico" sizes="64x64" href="/img/favicon.ico">
<link rel="icon" type="image/ico" sizes="48x48" href="/img/favicon.ico">
<link rel="shortcut icon" type="image/ico" sizes="48x48" href="/img/favicon.ico">
<link rel="icon" type="image/ico" sizes="196x196" href="/img/favicon.ico">
<link rel="icon" type="image/ico" sizes="180x180" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="32x32" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="48x48" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="76x76" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="120x120" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="152x152" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="180x180" href="/img/favicon.ico">
<link rel="apple-touch-icon" type="image/ico" sizes="196x196" href="/img/favicon.ico">
<meta name="msapplication-TileColor" content="#2b5797">
<meta name="msapplication-TileImage" content="/img/favicon.ico">
<meta name="msapplication-config" content="browserconfig.xml">


<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
@if (strpos($_SERVER['REQUEST_URI'], "admin/") !== false)
    
    <script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker1.7.1.min.css')}}">
@endif   
<link rel="stylesheet" href="{{asset('css/all-pages.css').'?id2='.rand(1,200)}}">
<script async defer src="{{asset('js/front.js').'?id2=2.02'}}"></script>

    <style>
        .workingHoursHoldMain {
            float: right;
        }
        .numHoldER p {
            color: #003992;
            padding-right: 5px;
            max-width: 120px;
        }
        @media (max-width: 992px) {
            .desktopVersionMainMenu {
                display: none;
            }
            .mobileVersionMainMenu {
                display: inline-block;
            }
        }
        @media (min-width: 992px) {
            .desktopVersionMainMenu {
                display: inline-block;
            }
            .mobileVersionMainMenu {
                display: none;
            }
        }
    @media (max-width: 320px) {
        html, body {

            overflow-x: hidden;
        }

    }
    .carousel-item {
	transition: -webkit-transform 0.5s ease;
	transition: transform 0.5s ease;
	transition: transform 0.5s ease, -webkit-transform 0.5s ease;
	-webkit-backface-visibility: visible;
	        backface-visibility: visible;
    }
    .stepsIndic h5, .stepsHold h5 {
        display: inline-block;
    }
     .mobileStepTextHide{
        padding-left:5px;
    }
    @media (max-width: 992px) and (min-width: 768px){
        .numHoldER p {
            margin-bottom: 0;
            line-height: 30px !important;
        }
    }

    @media (min-width: 576px) and (max-width: 1500px) {
        .mainCont2.hiddeDiv {
            display: none;
        }

        .navInfoH {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            background: white;
            position: relative;
            height: 50px;
            z-index: 2;
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        .vouchHolder {
            zoom: 0.6;
        }

        .offerInfo1 h2 {
            font-size: 8px;
        }

        #voucherDescArea p {
            font-size: 8px;
        }
    }

    @media (min-width: 768px) and (max-width: 989px) {
        .vouchHolder {
            zoom: 0.8;
        }

        #voucherDescArea p {
            font-size: 8px;
        }
    }

    #form_navoverview{
        width: 90%;
        padding: 0;
        margin: 0 auto;
    }
    .btn-home-search{
        display: none;
    }
    .btn-home-search .btn{   
        color: #fff;
        width: 100%;
        margin: 1em auto;
    }
    @media (max-width: 576px){
       .btn-home-search{
            display: block;
        } 
        .navbar.navbar-expand-lg.nopadding button i {
            color: #fff;
        }
        .navbar.navbar-expand-lg.nopadding a img {
            max-width: 250px;
        }
        .section2 {
            width: 90%;
            margin: 0 5%;
        }
    }
      

            .sliderImageDescription{
                z-index: 11111111111;
                position: absolute;
                left: 0;
                background: rgba(0,0,0,0.5);
                bottom: 0px;
                right: 0;
                color: #fff;
                padding: 5px;
                font-size: 16px;
                text-align: center;
                text-transform: uppercase;
            }
        @media (max-width: 576px) {
            .sliderImageDescription{
                z-index: 11111111111;
                position: absolute;
                left: 0;
                background: rgba(0,0,0,0.5);
                bottom: 0px;
                right: 0;
                color: #fff;
                padding: 19px;
                font-size: 16px;
                text-align: center;
                text-transform: uppercase;
            }
        }
        .jssort052 .p {position:absolute;top:0;left:0;background-color:#fff;}
        .jssort052 .t {position:absolute;top:0;left:0;width:100%;height:100%;border:none;opacity:.45;}
        .jssort052 .p:hover .t{opacity:.8;}
        .jssort052 .pav .t, .jssort052 .pdn .t, .jssort052 .p:hover.pdn .t{opacity:1;}
        .sliderThumbP {
            display: flex;
        }
        .sliderThumbP img{
            width:100%;
            object-fit: cover;
        }
                           
	.jssora055 {display:block;position:absolute;cursor:pointer;}
	.jssora055 .a {fill:none;stroke:#fff;stroke-width:960;stroke-miterlimit:10;}
	.jssora055:hover {opacity:.8;}
	.jssora055.jssora055dn {opacity:.5;}
	.jssora055.jssora055ds {opacity:.3;pointer-events:none;}
     </style>                    

    <!-- Global site tag (gtag.js) - Google Analytics -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-8788907-1"></script>
   <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-8788907-1');
    </script>
</head>

