<!doctype html>
<html lang="en">
  @include("includes/header")
<body>
@section('ActiveTourOperator','active')
<div class="wrapper">
    @include("includes/sidemenu")
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="header">
								<h4 class="title">Create Tour Operator</h4>
							</div>
                            {{-- {{Form::open(['action'=>'updateController@addTourOperator','method'=>'POST'])}} --}}
                            <form action="/admin/addTourOperator/" method="POST">
                                {{ csrf_field() }}
							<div class="container-fluid">
								<div class='row'>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-8'>
                                            {{Form::label('Title')}}
                                            {{Form::text('title','',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            {{Form::label('Description')}}
                                            {{Form::textarea('description','',['class'=>'form-control','id'=>'textarea1','max-rows'=>5])}}
                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            {{Form::label('Terms')}}
                                            {{Form::textarea('terms','',['class'=>'form-control','id'=>'textarea2','max-rows'=>5])}}
                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            {{Form::label('Cancellation terms')}}
                                            {{Form::textarea('cancellationterms','',['class'=>'form-control','id'=>'textarea3','max-rows'=>5])}}
                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            {{Form::label('Company')}}
                                            {{Form::text('company','',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-2'>
                                            {{Form::label('Gender')}}
                                            {{Form::select('gender',['m'=>'Male','f'=>'Female'],'Please Select',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-5'>
                                            {{Form::label('First Name')}}
                                            {{Form::text('first_name','',['class'=>'form-control'])}}
                                        </div>
                                        <div class='col-md-5'>
                                            {{Form::label('Last Name')}}
                                            {{Form::text('last_name','',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            {{Form::label('Email')}}
                                            {{Form::text('email','',['class'=>'form-control','type'=>'email'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            {{Form::label('phone number')}}
                                            {{Form::text('phone','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                        <div class='col-md-6'>
                                            {{Form::label('Fax')}}
                                            {{Form::text('fax','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            {{Form::label('Website')}}
                                            {{Form::text('www','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                        <div class='col-md-6'>
                                            {{Form::label('Address')}}
                                            {{Form::text('address','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            {{Form::label('Pobox')}}
                                            {{Form::text('pobox','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                        <div class='col-md-6'>
                                            {{Form::label('City')}}
                                            {{Form::text('city','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-3'>
                                            {{Form::label('Zip code')}}
                                            {{Form::text('zip','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                        <div class='col-md-6'>
                                            {{Form::label('Country')}}
                                            {{Form::text('country','',['class'=>'form-control','type'=>'email'])}}
                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            {{Form::label('Terms Of Confirmation')}}
                                            {{Form::textarea('terms_confirmation','',['class'=>'form-control','id'=>'textarea4','type'=>'email'])}}
                                        </div>   
                                    </div>
                                </div>
                                <br/><br/>
                                {{Form::submit('Submit Tour Operator',['class'=>'btn-primary btn btn-fill pull-right','type'=>'Submit'])}}
                                <div class="clearfix"></div>	
							</div>
							</div>
                            {{Form::close()}}
						</div>
					</div>
                </div>
            </div>
        </div> 
    </div>


</div>



</body>

        <!--   Core JS Files   -->
    <script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>

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
<script>
	CKEDITOR.replace('textarea1',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea2',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea3',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea4',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
   
</script>
</html>
