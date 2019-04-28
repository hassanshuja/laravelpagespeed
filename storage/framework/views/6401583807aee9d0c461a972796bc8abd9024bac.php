<!doctype html>
<html lang="en">
  <?php echo $__env->make("includes/header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
<?php $__env->startSection('ActiveSeasonChange','active'); ?>
<div class="wrapper">
    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h2>Change Current Season</h2>
					<div class="col-md-8">
                        <?php echo e(Form::open(['action'=>'updateController@submitEditSeason','method'=>'POST'])); ?>

                        <select name="season" id="" class='form-control'>
                            <option value="" Selected>Please Select current season</option>
                            <option value="0">Summer</option>
                            <option value="1">Winter</option>
                        </select>
                        <br><br>
                        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary right','style'=>'float:right'])); ?>

                        <?php echo e(Form::close()); ?>

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
	CKEDITOR.replace('textarea1');
	CKEDITOR.replace('textarea2');
	CKEDITOR.replace('textarea3');

</script>
</html>
