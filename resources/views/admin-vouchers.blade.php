<!doctype html>
<html lang="en">

@include("includes/header")
@section('ActiveVoucher','active')

<body>
	<div class="wrapper">
		@include("includes/sidemenu")
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid myContainer">
					<div class="row">
						<div class="col-md-8">
                            <div class="header">
                                <h4 class="title">Create Voucher</h4>
                            </div>
                            <div class="container-fluid">
                                {{-- {{Form::open(['action'=>'updateController@addVoucher','method'=>'POST','enctype'=>'multipart/form-data'])}} --}}
                                <form action="/admin/addVoucher/" method="POST">
                                    {{ csrf_field() }}
                                <div class='row'>
                                    <div class='col-8'>
                                        <div class=''>
                                            {{Form::label('Title')}}
                                            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            {{Form::label('Description')}}
                                            {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Description','resize'=>'false'])}}
                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            {{Form::label('Date')}}
                                            {{Form::date('date','',['class'=>'form-control','placeholder'=>'Description'])}}
                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            {{Form::label('amount')}}
                                            {{Form::number('amount','',['class'=>'form-control','placeholder'=>'Amount'])}}
                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            {{Form::label('Picture')}}
											{{Form::file('picture',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{Form::submit('Add Voucher',['class'=>'btn btn-primary right'])}}
                                {{Form::close()}}
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul>
							<li>
								<a href="#">
                                Home
                            </a>
							</li>
							<li>
								<a href="#">
                                Company
                            </a>
							</li>
							<li>
								<a href="#">
                                Portfolio
                            </a>
							</li>
							<li>
								<a href="#">
                               Blog
                            </a>
							</li>
						</ul>
					</nav>
					<p class="copyright pull-right">
						&copy;
						<script>
							document.write(new Date().getFullYear())
						</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
					</p>
				</div>
			</footer>

		</div>
	</div>


</body>

<!--   Core JS Files   -->
<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/bootstrap-multiselect.js" type="text/javascript"></script>
<link href="/css/bootstrap-multiselect.css" rel="stylesheet" />
<!--  Charts Plugin -->
<script src="/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="/js/demo.js"></script>



</html>
<style>
	.related-offer-pointer{
		cursor:pointer;
	}
	.related-offer-pointer:hover{
		background: lightblue;
	}
	.right{
		float:right;
	}
	#seleted-offers{
		border:1px solid lightgray; 
		min-height:50px;
		border-radius: 2px;
	}

</style>
