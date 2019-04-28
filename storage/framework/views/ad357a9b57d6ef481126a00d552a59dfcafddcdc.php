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
<?php $__env->startSection('ActiveOffer','active'); ?>
<style media="screen">
	#price-options{
		transition: all 1s;
	}
</style>
<body>
	
	<form action="/admin/addOffer/" method="POST" enctype="multipart/form-data">
		<?php echo e(csrf_field()); ?>

			<div id="imageModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="closeImgModal()" >&times;</span>
              
                <!-- Modal Content (The Image) -->
                <img class="modal-content">
				
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
			</div>
			<div class="wrapper">
		<?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid myContainer">
					<div class="row">
						<div class="col-md-10">
							<div class="card tabbsSteps">
								<div class="header">
									<h4 class="title">Create Offers</h4>
								</div>
								<div class="content">
										<ul class="nav nav-tabs">
											<li class="active show"><a data-toggle="tab" href="#home" class="btn btn-info active show" role="button">General</a></li>
											<li><a data-toggle="tab" href="#menu1" class="btn btn-info" role="button">Related Offers</a></li>
											<li><a data-toggle="tab" href="#menu2" class="btn btn-info" role="button">Images</a></li>
											<li><a data-toggle="tab" href="#menu3" class="btn btn-info" role="button">Categories & Regions</a></li>
											<li><a data-toggle="tab" href="#menu4" class="btn btn-info" role="button">Terms of payment</a></li>
											
											
										</ul>
											  
											  <div class="tab-content">
												<div id="home" class="tab-pane fade in active show">
														<h3>General</h3>
														<div class="container-fluid">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Title'); ?>

																		<?php echo Form::text('title','',['class'=>'form-control','placeholder'=>'Title','required'=>'required']); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Title Tag'); ?>

																		<?php echo Form::text('title_tag','',['class'=>'form-control','placeholder'=>'Title Tag']); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo e(Form::label('Tour Operator')); ?>

																		<?php echo e(Form::select('touroperator',$data['tourOperators'],[],['class'=>'form-control'])); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Address'); ?>

																		<?php echo Form::text('address','',['class'=>'form-control','placeholder'=>'Address']); ?>

																	</div>
																</div>
															</div>
															<div class='row'>
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('List status'); ?>

																		<?php echo Form::textarea('list_status','',['class'=>'form-control','id'=>'textarea1','data-provide'=>'markdown','placeholder'=>'List status','rows'=>5]); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('List subtitle'); ?>

																		<?php echo Form::textarea('list_subtitle','',['class'=>'form-control','id'=>'textarea6','placeholder'=>'List subtitle','style'=>'resize:none;','rows'=>5]); ?>

																	</div>
																</div>
															</div>
															<div class='row'>
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Subtitle'); ?>

																		<?php echo Form::textarea('subtitle','',['class'=>'form-control','id'=>'textarea3','data-provide'=>'markdown','placeholder'=>'Subtitle','style'=>'resize:none;','rows'=>4]); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Meta description'); ?>

																		<?php echo Form::textarea('meta_description','',['class'=>'form-control','id'=>'textarea2','data-provide'=>'markdown','placeholder'=>'Meta description','style'=>'resize:none;','rows'=>3]); ?>

																	</div>
																</div>
															</div>
															
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Body Text'); ?>

																		<?php echo Form::textarea('bodytext','',['class'=>'form-control','id'=>'textarea4','placeholder'=>'Body Text','style'=>'resize:none;','rows'=>4]); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Additional Information'); ?>

																		<?php echo Form::textarea('informacion','',['class'=>'form-control','id'=>'textarea5','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3]); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Additional Information (Booking Confirmation'); ?>

																		<?php echo Form::textarea('informacion_confirmation','',['class'=>'form-control','id'=>'textarea13','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3]); ?>

																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		<?php echo Form::label('Included'); ?>

																		<?php echo Form::textarea('included','',['class'=>'form-control','id'=>'textarea7','placeholder'=>'Included','rows'=>5]); ?>

																	</div>
																</div>
															</div>
														</div>
												</div>
												<div id="menu1" class="tab-pane fade">
														<div class="container-fluid">
															<div class='row'>
																<div class='col-md-8'>
																		<br><hr>
																		<h3>Related Offers</h3>
																	
																	<label for="">Search For related offers</label>
																	<input type="text" placeholder="Search For Related Offers"  autocomplete="off" name="" onkeyup='search_ro(event)' id="search_related_categories" class='form-control'/>
																	
																		<ul class='list-group' id='dropdown-list'>
					
																		</ul>
																	<?php echo e(Form::label('Selected related items')); ?>

																	<ul id='seleted-offers' class='list-group'>
					
																	</ul>
																</div>
															</div>
														</div>
												</div>
												<div id="menu2" class="tab-pane fade">
													<div class="container-fluid">
														<div class="row">
															<div class="col-md-12">
																	<hr>
																<h3>Images</h3>
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
													</div>
												</div>
												<div id="menu3" class="tab-pane fade">
													<div class="container-fluid">
															<div class="row">
																	<div class="col-md-12">
																			<hr>
																		<h3>Categories & Regions</h3>
																		<div class="form-group">
																			<?php echo e(Form::label('Categories')); ?><br/>
																			
																			
																			<select name='categories[]' class='form-control' id='category-multiselect' multiple='true'>
																					<?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																						<optgroup label="<?php echo e($dd->title); ?>">
																							<?php $__currentLoopData = $dd->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																								<optgroup label="<?php echo e($sc->title); ?>">
																									<?php $__currentLoopData = $data['subCategoriesMS']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																										<?php if($t->parent==$sc->uid): ?>
																											<option value="<?php echo e($t->uid); ?>"><?php echo e($t->title); ?></option>
																										<?php endif; ?>
																									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																								</optgroup>
																							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																						</optgroup>
																					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																				</select>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group">
																			<?php echo e(Form::label('Region')); ?><br/>
																			<?php echo e(Form::select('regions[]',$data['allRegions'],'Please Select',['class'=>'form-control','id'=>'region-multiselect','multiple'=>'multiple'])); ?>

																		</div>
																	</div>
																</div>
													</div>
												</div>
												<div id="menu4" class="tab-pane fade">
														<div class="container-fluid">
																<div class="row">
																		<div class="col-md-12">
																			  <hr>
																	  <h3>Terms of payment</h3>
																	  <div class="form-check">
																		
																		  <?php echo e(Form::checkbox('creditcard_required', 1, null, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

																		  <?php echo e(Form::label('creditcard_required', 'Credit Card required', array('class' => 'form-check-label',))); ?>

																	  </div>
																  </div>
															  </div>
															  <div class="row">
																  <div class="col-md-12">
																	  <div class="form-group">
																		  <?php echo Form::label('Terms of payment'); ?>

																		  <?php echo Form::textarea('terms','',['class'=>'form-control','id'=>'textarea8','placeholder'=>'Terms of payment','rows'=>5,'style'=>'resize:none']); ?>

																	  </div>
																  </div>
															  </div>
															  <div class="row">
																  <div class="col-md-12">
																	  <div class="form-group">
																		  <?php echo Form::label('Terms of cancellation'); ?>

																		  <?php echo Form::textarea('cancellationterms','',['class'=>'form-control','id'=>'textarea9','placeholder'=>'Terms of cancellation','rows'=>5,'style'=>'resize:none']); ?>

																	  </div>
																  </div>
															  </div>
															</div>
													  </div>
													  <div id="menu5" class="tab-pane fade">
															<div class="container-fluid">
																	<div class="row">
																			<div class="col-md-12">
																					<hr>
																				<h3>Package</h3>
																			</div>
																			<div class="col-md-12">
																					<div class="form-group">
																						<?php echo e(Form::label("Unit By Price (default 'per person')")); ?>

																						<?php echo e(Form::text('price_unit_text','',['class'=>'form-control','placeholder'=>'Unit Price'])); ?>

																					</div>
																					<div class="form-group">
																						<?php echo e(Form::label("Unit per service")); ?>

																						<?php echo e(Form::text('included_unit_text','',['class'=>'form-control','placeholder'=>'Unit Price'])); ?>

																					</div>
																				</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<?php echo Form::label('Min people'); ?>

																					<?php echo Form::number('min_persons','',['class'=>'form-control','placeholder'=>'Min people']); ?>

																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																						<?php echo Form::label('Max people'); ?>

																						<?php echo Form::number('max_persons','',['class'=>'form-control','placeholder'=>'Max people']); ?>

																				</div>
																			</div>
																		</div>
																			
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type', 0, null, ['class' => 'form-check-input'])); ?>

																					<?php echo e(Form::label('', 'Pro person', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type', 1, null, ['class' => 'form-check-input'])); ?>

																					<?php echo e(Form::label('', 'Pro Yacht', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type', 2, null, ['class' => 'form-check-input'])); ?>

																					<?php echo e(Form::label('', 'Pro room', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type', 3, null, ['class' => 'form-check-input'])); ?>

																					<?php echo e(Form::label('', 'Pro package', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type', 4, null, ['class' => 'form-check-input'])); ?>

																					<?php echo e(Form::label('', 'Pro family package', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type', 98, null, ['class' => 'form-check-input'])); ?>

																					<?php echo e(Form::label('', 'Flat-rate', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					<?php echo e(Form::radio('person_type',99, null, ['class' => 'form-check-input','calut='])); ?>

																					<?php echo e(Form::label('', '(Without name)', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																		</div>
																		<div class='row'>
																			<div class="form-group">
																				<div class='col-md-12'>
																					<?php echo e(Form::label("Person type text (if you have choosen 'Without Name' on checkboxes)")); ?>

																					<?php echo e(Form::text('person_type_text','',['class'=>'form-control','placeholder'=>'Unit Price'])); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					<?php echo Form::label('days'); ?>

																					<?php echo Form::number('day','',['class'=>'form-control','placeholder'=>'Days']); ?>

																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<?php echo Form::label('nights'); ?>

																					<?php echo Form::number('night','',['class'=>'form-control','placeholder'=>'Nights']); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					<?php echo Form::label('Price information'); ?>

																					<?php echo Form::textarea('priceinfo','',['class'=>'form-control','id'=>'textarea10','placeholder'=>'Price information','rows'=>3,'style'=>'resize:none']); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-check">
																					<?php echo e(Form::checkbox('hasgroupoffer', 1, null, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

																					<?php echo e(Form::label('hasgroupoffer', 'Group requests', array('class' => 'form-check-label',))); ?>

																				</div>
																			</div>
																			<div class="col-md-8">
																				<div class="formgroup">
																					<?php echo Form::text('groupoffertitle','',['class'=>'form-control','placeholder'=>'Group offer title']); ?>

																				</div>
																			</div>
																		</div>
																		<div class="row">
																				<div class="col-md-2">
																					
																					
																				</div>
																			</div>
																			<div class="price-options" id="price-options">
									
																			</div>
																			<div class="adiv-price-options" id="another-price-options">
									
																			</div>
																			<script type="text/javascript">
																				var inc=1;
																				function showElements(){
																					var x = document.getElementById('price-options');
																					x.style.display='block';
																				}
									
																				function addDiv() {
																					var itm = $("#price-options");
									
																					var pr=$('div#another-price-options');
																					$.ajax({
																						method:'GET',
																						dataType : 'html',
																						url:'/admin/getPricesForm/'+inc,
																						success:function(data){
																							pr.append(data);
																							inc++;
																						}
																					});
																				}
																				function removeDiv(id) {
																					var name='price-options-'+id;
																					var elem = document.getElementById(name);
																					console.log(elem);
																					elem.parentNode.removeChild(elem);
																					inc--;
																				}
																			</script>
																			
																			
																			<div class="row">
																				<div class="col-md-3">
																					
																				</div>
																			</div>
																			<div class="additional-options"id="additional-options">
									
																			</div>
																			<script type="text/javascript">
																				var inc=1;
																				function createAdditional() {
																					var itm = $("#additional-options");
									
																					var pr=$('div#additional-options');
																					$.ajax({
																						method:'GET',
																						dataType : 'html',
																						url:'/admin/getAdditionalsForm/'+inc,
																						success:function(data){
																							pr.append(data);
																							inc++;
																						}
																					});
																				}
																				function removeAdditional(id) {
																					var name='additional-options-'+id;
																					var elem = document.getElementById(name);
																					console.log(elem);
																					elem.parentNode.removeChild(elem);
																					inc--;
																				}
																			</script>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
								
																					<?php echo e(Form::label('Start Date')); ?>

																					<?php echo e(Form::date('starttime',\Carbon\Carbon::now(),['class'=>'form-control'])); ?>

								
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					<?php echo e(Form::label('End Date')); ?>

																					<?php echo e(Form::date('endtime',\Carbon\Carbon::now(),['class'=>'form-control'])); ?>

																				</div>
																			</div>
																		</div>
																</div>
														  </div>
													<div id="menu6" class="tab-pane fade">
															<div class="container-fluid">
																	<div class="row">
																			<div class="col-md-12">
																				  <div class="card card-body"style="box-shadow:none;">
																						<div class="row">
																							<div class="col-md-12">
																								<div class="form-check">
																									<?php echo e(Form::checkbox('hasspeciallistsettings', 1, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('special-list', 'Use special list settings', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-md-6">
																								<div class="form-group">
																									<?php echo Form::label('Special Type'); ?>

																									<?php echo Form::text('special_list_person_type_text','',['class'=>'form-control','placeholder'=>'Special type']); ?>

																								</div>
																							</div>
																							<div class="col-md-6">
																								<div class="form-group">
																									<?php echo Form::label('Adult price'); ?>

																									<?php echo Form::text('special_list_price','',['class'=>'form-control','placeholder'=>'Adult price']); ?>

																								</div>
																							</div>
																						</div>
																						<div class='row'>
																							<div class='form-group'>
																								<div class="col-md-5">
																									<?php echo e(Form::label('Min Persons')); ?>

																									<?php echo e(Form::number('special_list_min_persons', ' ', ['class' => 'form-control'])); ?>

																								</div>
																					
																							</div>	
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-5">
																									<?php echo e(Form::radio('special_list_person_type', 0, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', 'Pro person', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									<?php echo e(Form::radio('special_list_person_type', 1, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', 'Pro Yacht', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									<?php echo e(Form::radio('special_list_person_type', 2, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', 'Pro room', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									<?php echo e(Form::radio('special_list_person_type', 3, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', 'Pro package', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									<?php echo e(Form::radio('special_list_person_type', 4, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', 'Pro family package', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									<?php echo e(Form::radio('special_list_person_type', 98, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', 'Flat-rate', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									<?php echo e(Form::radio('special_list_person_type', 99, null, ['class' => 'form-check-input'])); ?>

																									<?php echo e(Form::label('', '(Without name)', array('class' => 'form-check-label',))); ?>

																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-md-2">
																								<div class="form-group">
																									<?php echo Form::label('Currency'); ?>

																									<select name="special_list_currency" id="" class='form-control'>
																										<option value="0" selected>CH</option>
																										<option value="1">EURO</option>
																									</select>
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-md-12">
																								<div class="form-group">
																									<?php echo Form::label('Vaucher text'); ?>

																									<?php echo Form::textarea('vauchertext','',['class'=>'form-control','id'=>'textarea11','placeholder'=>'Vaucher text','style'=>'resize:none;','rows'=>3]); ?>

																								</div>
																							</div>
																						</div>
																					  </div>
																			</div>
																		</div>
																</div>
														  </div>
														</div>
										
										<?php echo e(Form::submit('Create Offer',['class'=>"btn btn-info btn-fill pull-right"])); ?>

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

	<?php echo Form::close(); ?>

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

<script type="text/javascript">
	$(document).ready(function() {
		demo.initChartist();
		var name="<b><?php echo e(Session::get('user')->username); ?></b>";
		$.notify({
			icon: 'pe-7s-gift',
			message: "Welcome to Admin Panel, "+name

		}, {
			type: 'info',
			timer: 4000
		});
	});

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
    CKEDITOR.replace('textarea5',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea6',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
	CKEDITOR.replace('textarea7',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea8',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea9',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea10',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea11',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea12',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea13',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
</script>

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