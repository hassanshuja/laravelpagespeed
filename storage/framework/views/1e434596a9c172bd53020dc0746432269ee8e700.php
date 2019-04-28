<!doctype html>
<html lang="en">

<?php echo $__env->make("includes/header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveVoucher','active'); ?>

<body>
	<div class="wrapper">
		<?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid myContainer">
					<div class="row">
						<div class="col-md-8">
                            <div class="header">
                                <h4 class="title">Create Voucher</h4>
                            </div>
                            <div class="container-fluid">
                                
                                <form action="/admin/addVoucher/" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                <div class='row'>
                                    <div class='col-8'>
                                        <div class=''>
                                            <?php echo e(Form::label('Title')); ?>

                                            <?php echo e(Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])); ?>

                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            <?php echo e(Form::label('Description')); ?>

                                            <?php echo e(Form::textarea('description','',['class'=>'form-control','placeholder'=>'Description','resize'=>'false'])); ?>

                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            <?php echo e(Form::label('Date')); ?>

                                            <?php echo e(Form::date('date','',['class'=>'form-control','placeholder'=>'Description'])); ?>

                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            <?php echo e(Form::label('amount')); ?>

                                            <?php echo e(Form::number('amount','',['class'=>'form-control','placeholder'=>'Amount'])); ?>

                                        </div>
                                    </div>
                                    <div class='col-8'>
                                        <div class=''>
                                            <?php echo e(Form::label('Picture')); ?>

											<?php echo e(Form::file('picture',['class'=>'form-control'])); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                                <?php echo e(Form::submit('Add Voucher',['class'=>'btn btn-primary right'])); ?>

                                <?php echo e(Form::close()); ?>

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
