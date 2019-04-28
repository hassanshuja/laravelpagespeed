<!doctype html>
<html lang="en">
  @include("includes/header")
<body>
 @section('ActiveListTourOperators','active')
@foreach($data as $d)
<div class="wrapper">
    @include("includes/sidemenu")
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="header">
                                <h4 class="title">Edit Tour Operator Operator <b>{{$d->title}}</b></h4>
							</div>
                            <form action="/admin/submitEditTourOperator/" method="POST">
                            {{ csrf_field() }}
							<div class="container-fluid">
								<div class='row'>
                                    <div class='col-md-8'>
                                        <div class='form-group'>
                                            {{Form::label('Title')}}
                                            {{Form::text('title',$d->title,['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            {{Form::label('Description')}}
                                            {{Form::textarea('description',$d->description,['class'=>'form-control','id'=>'textarea1','max-rows'=>5])}}
                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            {{Form::label('Terms')}}
                                            {{Form::textarea('terms',$d->terms,['class'=>'form-control','id'=>'textarea2','max-rows'=>5])}}
                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            {{Form::label('Cancellation terms')}}
                                            {{Form::textarea('cancellationterms',$d->cancellationterms,['class'=>'form-control','id'=>'textarea3','max-rows'=>5])}}
                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            {{Form::label('Company')}}
                                            {{Form::text('company',$d->company,['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                </div>
							
								<div class='row'>
                                    <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-5'>
                                            {{Form::label('First Name')}}
                                            {{Form::text('first_name',$d->first_name,['class'=>'form-control'])}}
                                        </div>
                                        <div class='col-md-5'>
                                            {{Form::label('Last Name')}}
                                            {{Form::text('last_name',$d->last_name,['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            {{Form::label('Email')}}
                                            {{Form::text('email',$d->email,['class'=>'form-control','type'=>'email'])}}
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-6'>
                                                {{Form::label('phone number')}}
                                                {{Form::text('phone',$d->phone,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                            <div class='col-md-6'>
                                                {{Form::label('Fax')}}
                                                {{Form::text('fax',$d->fax,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-6'>
                                                {{Form::label('Website')}}
                                                {{Form::text('www',$d->www,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                            <div class='col-md-6'>
                                                {{Form::label('Address')}}
                                                {{Form::text('address',$d->address,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-6'>
                                                {{Form::label('Pobox')}}
                                                {{Form::text('pobox',$d->pobox,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                            <div class='col-md-6'>
                                                {{Form::label('City')}}
                                                {{Form::text('city',$d->city,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-3'>
                                                {{Form::label('Zip code')}}
                                                {{Form::text('zip',$d->zip,['class'=>'form-control','type'=>'email'])}}
                                            </div>   
                                            <div class='col-md-6'>
                                                {{Form::label('Country')}}
                                                {{Form::text('country',$d->country,['class'=>'form-control','type'=>'email'])}}
                                                {{Form::hidden('uid',$d->uid)}}
                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            {{Form::label('Terms Of Confirmation')}}
                                            {{Form::textarea('terms_confirmation',$d->terms_confirmation,['class'=>'form-control','id'=>'textarea4','type'=>'email'])}}
                                        </div>   
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="clearfix"></div>	
							</div>
                            {{Form::submit('Submit Edit Tour Operator',['class'=>'btn-primary btn btn-fill pull-right','type'=>'Submit'])}}
                            {{Form::close()}}
						</div>
					</div>
                </div>
            </div>
        </div> 
    </div>


</div>

@endforeach


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
