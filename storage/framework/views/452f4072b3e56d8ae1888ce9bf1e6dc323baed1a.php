<!doctype html>
<html lang="en">
  <?php echo $__env->make("includes/header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
 <?php $__env->startSection('ActiveListTourOperators','active'); ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="wrapper">
    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="header">
                                <h4 class="title">Edit Tour Operator Operator <b><?php echo e($d->title); ?></b></h4>
							</div>
                            <form action="/admin/submitEditTourOperator/" method="POST">
                            <?php echo e(csrf_field()); ?>

							<div class="container-fluid">
								<div class='row'>
                                    <div class='col-md-8'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Title')); ?>

                                            <?php echo e(Form::text('title',$d->title,['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Description')); ?>

                                            <?php echo e(Form::textarea('description',$d->description,['class'=>'form-control','id'=>'textarea1','max-rows'=>5])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Terms')); ?>

                                            <?php echo e(Form::textarea('terms',$d->terms,['class'=>'form-control','id'=>'textarea2','max-rows'=>5])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Cancellation terms')); ?>

                                            <?php echo e(Form::textarea('cancellationterms',$d->cancellationterms,['class'=>'form-control','id'=>'textarea3','max-rows'=>5])); ?>

                                        </div>
                                    </div>
                                </div>
								<div class='row'>
                                    <div class='col-md-12'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Company')); ?>

                                            <?php echo e(Form::text('company',$d->company,['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
							
								<div class='row'>
                                    <div class='col-12'>
                                    <div class='form-group'>
                                        <div class='col-md-5'>
                                            <?php echo e(Form::label('First Name')); ?>

                                            <?php echo e(Form::text('first_name',$d->first_name,['class'=>'form-control'])); ?>

                                        </div>
                                        <div class='col-md-5'>
                                            <?php echo e(Form::label('Last Name')); ?>

                                            <?php echo e(Form::text('last_name',$d->last_name,['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Email')); ?>

                                            <?php echo e(Form::text('email',$d->email,['class'=>'form-control','type'=>'email'])); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('phone number')); ?>

                                                <?php echo e(Form::text('phone',$d->phone,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('Fax')); ?>

                                                <?php echo e(Form::text('fax',$d->fax,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('Website')); ?>

                                                <?php echo e(Form::text('www',$d->www,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('Address')); ?>

                                                <?php echo e(Form::text('address',$d->address,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('Pobox')); ?>

                                                <?php echo e(Form::text('pobox',$d->pobox,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('City')); ?>

                                                <?php echo e(Form::text('city',$d->city,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <div class='col-md-3'>
                                                <?php echo e(Form::label('Zip code')); ?>

                                                <?php echo e(Form::text('zip',$d->zip,['class'=>'form-control','type'=>'email'])); ?>

                                            </div>   
                                            <div class='col-md-6'>
                                                <?php echo e(Form::label('Country')); ?>

                                                <?php echo e(Form::text('country',$d->country,['class'=>'form-control','type'=>'email'])); ?>

                                                <?php echo e(Form::hidden('uid',$d->uid)); ?>

                                            </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-12'>
                                        <div class='form-group'>
                                            <?php echo e(Form::label('Terms Of Confirmation')); ?>

                                            <?php echo e(Form::textarea('terms_confirmation',$d->terms_confirmation,['class'=>'form-control','id'=>'textarea4','type'=>'email'])); ?>

                                        </div>   
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="clearfix"></div>	
							</div>
                            <?php echo e(Form::submit('Submit Edit Tour Operator',['class'=>'btn-primary btn btn-fill pull-right','type'=>'Submit'])); ?>

                            <?php echo e(Form::close()); ?>

						</div>
					</div>
                </div>
            </div>
        </div> 
    </div>


</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
