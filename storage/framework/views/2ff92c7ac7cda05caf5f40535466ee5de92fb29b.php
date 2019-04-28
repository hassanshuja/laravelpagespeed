<!doctype html>
<html lang="en">
  <?php echo $__env->make("includes/header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<?php $__env->startSection('ActiveTourOperator','active'); ?>
<div class="wrapper">
    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="header">
								<h4 class="title">Create Tour Operator</h4>
							</div>
                            
                            <form action="/admin/addTourOperator/" method="POST">
                                <?php echo e(csrf_field()); ?>

							<div class="container-fluid">
								<div class='row'>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-8'>
                                            <?php echo e(Form::label('Title')); ?>

                                            <?php echo e(Form::text('title','',['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            <?php echo e(Form::label('Description')); ?>

                                            <?php echo e(Form::textarea('description','',['class'=>'form-control','id'=>'textarea1','max-rows'=>5])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            <?php echo e(Form::label('Terms')); ?>

                                            <?php echo e(Form::textarea('terms','',['class'=>'form-control','id'=>'textarea2','max-rows'=>5])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            <?php echo e(Form::label('Cancellation terms')); ?>

                                            <?php echo e(Form::textarea('cancellationterms','',['class'=>'form-control','id'=>'textarea3','max-rows'=>5])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            <?php echo e(Form::label('Company')); ?>

                                            <?php echo e(Form::text('company','',['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-2'>
                                            <?php echo e(Form::label('Gender')); ?>

                                            <?php echo e(Form::select('gender',['m'=>'Male','f'=>'Female'],'Please Select',['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-5'>
                                            <?php echo e(Form::label('First Name')); ?>

                                            <?php echo e(Form::text('first_name','',['class'=>'form-control'])); ?>

                                        </div>
                                        <div class='col-md-5'>
                                            <?php echo e(Form::label('Last Name')); ?>

                                            <?php echo e(Form::text('last_name','',['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('Email')); ?>

                                            <?php echo e(Form::text('email','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('phone number')); ?>

                                            <?php echo e(Form::text('phone','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('Fax')); ?>

                                            <?php echo e(Form::text('fax','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('Website')); ?>

                                            <?php echo e(Form::text('www','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('Address')); ?>

                                            <?php echo e(Form::text('address','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('Pobox')); ?>

                                            <?php echo e(Form::text('pobox','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('City')); ?>

                                            <?php echo e(Form::text('city','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-3'>
                                            <?php echo e(Form::label('Zip code')); ?>

                                            <?php echo e(Form::text('zip','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                        <div class='col-md-6'>
                                            <?php echo e(Form::label('Country')); ?>

                                            <?php echo e(Form::text('country','',['class'=>'form-control','type'=>'email'])); ?>

                                        </div>   
                                    </div>
                                </div>
                                <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-12'>
                                            <?php echo e(Form::label('Terms Of Confirmation')); ?>

                                            <?php echo e(Form::textarea('terms_confirmation','',['class'=>'form-control','id'=>'textarea4','type'=>'email'])); ?>

                                        </div>   
                                    </div>
                                </div>
                                <br/><br/>
                                <?php echo e(Form::submit('Submit Tour Operator',['class'=>'btn-primary btn btn-fill pull-right','type'=>'Submit'])); ?>

                                <div class="clearfix"></div>	
							</div>
							</div>
                            <?php echo e(Form::close()); ?>

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
