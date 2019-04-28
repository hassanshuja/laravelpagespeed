<!doctype html>
<html lang="en">
		<style>
				.pasteButton {
					display: none;
				}
				.cancelButton {
					display: none;
				}
				.cutButton {
					display: inline-block;
				}
				#myImg {
			border-radius: 5px;
			cursor: pointer;
			transition: 0.3s;
		}
		
		#myImg:hover {opacity: 0.7;}
		
		/* The Modal (background) */
		.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1000000000; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
		}
		
		/* Modal Content (Image) */
		.modal-content {
			margin: auto;
			display: block;
			width: 80%;
			max-width: 700px;
		}
		
		/* Caption of Modal Image (Image Text) - Same Width as the Image */
		#caption {
			margin: auto;
			display: block;
			width: 80%;
			max-width: 700px;
			text-align: center;
			color: #ccc;
			padding: 10px 0;
			height: 150px;
		}
		
		/* Add Animation - Zoom in the Modal */
		.modal-content, #caption { 
			animation-name: zoom;
			animation-duration: 0.6s;
		}
		
		@keyframes  zoom {
			from {transform:scale(0)} 
			to {transform:scale(1)}
		}
		
		/* The Close Button */
		.close {
			position: absolute;
			top: 15px;
			right: 35px;
			color: #f1f1f1;
			font-size: 40px;
			font-weight: bold;
			transition: 0.3s;
		}
		
		.close:hover,
		.close:focus {
			color: #bbb;
			text-decoration: none;
			cursor: pointer;
		}
		
		/* 100% Image Width on Smaller Screens */
		@media  only screen and (max-width: 700px){
			.modal-content {
				width: 100%;
			}
		}
				</style>
  <?php echo $__env->make("includes/header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
		<div id="imageModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="closeImgModal()" >&times;</span>
              
                <!-- Modal Content (The Image) -->
                <img class="modal-content">
              
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
              </div>
<?php $__env->startSection('ActiveCategory','active'); ?>
<div class="wrapper">
    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="header">
								<h4 class="title">Create/Manage Categories</h4>
							</div>
							<div class="content">
								
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												
												<form method='POST' action='/admin/addCategory/' id='newCategoryForm'>
													<?php echo e(csrf_field()); ?>

												<?php echo e(Form::label('Title')); ?>

												<?php echo e(Form::text('title','',['class'=>'form-control','placeholder'=>'Title','required'=>'required'])); ?>

											
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<?php echo e(Form::label('Title Tag')); ?>

												<?php echo e(Form::text('title_tag','',['class'=>'form-control','placeholder'=>'Title Tag'])); ?>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											
												<?php echo e(Form::label('Description')); ?>

												<?php echo e(Form::textarea('description','',['style'=>'resize:none','id'=>'textarea1','class'=>'form-control','placeholder'=>'Description','rows'=>5])); ?>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<?php echo e(Form::label('Description Meta')); ?>

												<?php echo e(Form::textarea('description_meta','',['style'=>'resize:none','id'=>'textarea2','class'=>'form-control','placeholder'=>'Description Meta','rows'=>5])); ?>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
													<button type="button" class="btn btn-primary btn-block" onclick="addNewPhoto()">Add Photos</button>
													
													
													<div id="multipleUploadInput" >
														<input type="file" id="offerPhotos" style="display:none;" multiple="multiple" />
													</div>
												<table id="imageTableOffer" class='table'>
												</table>
											</div>
										</div>
									</div>
									<div class='row'>
										<div class='col-md-4'>
											<?php echo e(Form::label('Box Layout')); ?>

											<select name="box_layout" class='form-control' id="">
												<option value="0">1x1</option>
												<option value="1">1x2</option>
												<option value="2">2x1</option>
												<option value="3">2x2</option>
											</select>
										</div>
									</div>
								
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<?php echo e(Form::label('parent')); ?>

												
												<select name='parent' class='form-control'>
													<option value='0' selected>No Parent</option>
													<?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<?php echo e(Form::label('Related')); ?>

												
												<select name='related' class='form-control'>
													<option value='0' selected>No Related</option>
													<?php $__currentLoopData = $data['category']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($k); ?>"><?php echo e($v); ?></option>
													<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												</select>
											</div>
										</div>
									</div>
									
									<div class='row'>
										<div class="col-md-12">
											<div class="form-group">
												<?php echo e(Form::label('Seo')); ?>

												<?php echo e(Form::textarea('seo','',['style'=>'resize:none','class'=>'form-control','id'=>'textarea3','placeholder'=>'Seoe','rows'=>5])); ?>

											</div>
										</div>
									</div>
									<div class='row'>
										<div class="col-md-5">
											<div class="form-group">
												<?php echo e(Form::label('Season')); ?>

												<?php echo e(Form::select('category_season',[1=>'spring',2=>'summer',3=>'autumn',4=>'winter'],'Please select',['class'=>'form-control'])); ?>

											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
										
												<?php echo e(Form::label('Title url')); ?>

												<?php echo e(Form::text('title_url','',['class'=>'form-control','placeholder'=>'This is what it is gonna say on website, if you do not define this the title is gonna show'])); ?>

												
											</div>
										</div>
									</div>


									<?php echo e(Form::submit('Submit Category',['class'=>'btn btn-info btn-fill pull-right','type'=>'Submit'])); ?>

									<?php echo e(Form::close()); ?>

									<div class="clearfix"></div>
								</form>
							</div>
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
	CKEDITOR.replace('textarea1');
	CKEDITOR.replace('textarea2');
	CKEDITOR.replace('textarea3');

</script>
</html>
