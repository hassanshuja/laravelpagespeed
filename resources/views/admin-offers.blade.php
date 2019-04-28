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
		
		@keyframes zoom {
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
		@media only screen and (max-width: 700px){
			.modal-content {
				width: 100%;
			}
		}
				</style>
@include("includes/header")
@section('ActiveOffer','active')
<style media="screen">
	#price-options{
		transition: all 1s;
	}
</style>
<body>
	
	<form action="/admin/addOffer/" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
			<div id="imageModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="closeImgModal()" >&times;</span>
              
                <!-- Modal Content (The Image) -->
                <img class="modal-content">
				
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
			</div>
			<div class="wrapper">
		@include("includes/sidemenu")
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
											{{-- <li><a data-toggle="tab" href="#menu5" class="btn btn-info" role="button">Package</a></li> --}}
											{{-- <li><a data-toggle="tab" href="#menu6" class="btn btn-info" role="button">Expanded Options</a></li> --}}
										</ul>
											  
											  <div class="tab-content">
												<div id="home" class="tab-pane fade in active show">
														<h3>General</h3>
														<div class="container-fluid">
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Title')!!}
																		{!!Form::text('title','',['class'=>'form-control','placeholder'=>'Title','required'=>'required'])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Title Tag')!!}
																		{!!Form::text('title_tag','',['class'=>'form-control','placeholder'=>'Title Tag'])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{{Form::label('Tour Operator')}}
																		{{Form::select('touroperator',$data['tourOperators'],[],['class'=>'form-control'])}}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Address')!!}
																		{!!Form::text('address','',['class'=>'form-control','placeholder'=>'Address'])!!}
																	</div>
																</div>
															</div>
															<div class='row'>
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('List status')!!}
																		{!!Form::textarea('list_status','',['class'=>'form-control','id'=>'textarea1','data-provide'=>'markdown','placeholder'=>'List status','rows'=>5])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('List subtitle')!!}
																		{!!Form::textarea('list_subtitle','',['class'=>'form-control','id'=>'textarea6','placeholder'=>'List subtitle','style'=>'resize:none;','rows'=>5])!!}
																	</div>
																</div>
															</div>
															<div class='row'>
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Subtitle')!!}
																		{!!Form::textarea('subtitle','',['class'=>'form-control','id'=>'textarea3','data-provide'=>'markdown','placeholder'=>'Subtitle','style'=>'resize:none;','rows'=>4])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Meta description')!!}
																		{!!Form::textarea('meta_description','',['class'=>'form-control','id'=>'textarea2','data-provide'=>'markdown','placeholder'=>'Meta description','style'=>'resize:none;','rows'=>3])!!}
																	</div>
																</div>
															</div>
															
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Body Text')!!}
																		{!!Form::textarea('bodytext','',['class'=>'form-control','id'=>'textarea4','placeholder'=>'Body Text','style'=>'resize:none;','rows'=>4])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Additional Information')!!}
																		{!!Form::textarea('informacion','',['class'=>'form-control','id'=>'textarea5','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Additional Information (Booking Confirmation')!!}
																		{!!Form::textarea('informacion_confirmation','',['class'=>'form-control','id'=>'textarea13','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3])!!}
																	</div>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12">
																	<div class="form-group">
																		{!!Form::label('Included')!!}
																		{!!Form::textarea('included','',['class'=>'form-control','id'=>'textarea7','placeholder'=>'Included','rows'=>5])!!}
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
																	{{Form::label('Selected related items')}}
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
																		{{-- {!!Form::label('Image')!!} --}}
																		{{-- {{Form::file('picture[]',['style'=>'display:block','multiple'=>'multiple','id'=>'offerPhotos'])}} --}}
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
																			{{Form::label('Categories')}}<br/>
																			{{-- {{Form::select('categories[]',$data['category'],null,['class'=>'form-control','id'=>'category-multiselect','multiple'=>'multiple'])}} --}}
																			
																			<select name='categories[]' class='form-control' id='category-multiselect' multiple='true'>
																					@foreach($data['categories'] as $dd)
																						<optgroup label="{{$dd->title}}">
																							@foreach($dd->subCategories as $sc)
																								<optgroup label="{{$sc->title}}">
																									@foreach($data['subCategoriesMS'] as $t)
																										@if($t->parent==$sc->uid)
																											<option value="{{$t->uid}}">{{$t->title}}</option>
																										@endif
																									@endforeach
																								</optgroup>
																							@endforeach
																						</optgroup>
																					@endforeach
																				</select>
																		</div>
																	</div>
																</div>
																<div class="row">
																	<div class="col-md-12">
																		<div class="form-group">
																			{{Form::label('Region')}}<br/>
																			{{Form::select('regions[]',$data['allRegions'],'Please Select',['class'=>'form-control','id'=>'region-multiselect','multiple'=>'multiple'])}}
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
																		{{-- <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
																		<label class="form-check-label" for="defaultCheck1">
																		  Credit card required
																		</label> --}}
																		  {{ Form::checkbox('creditcard_required', 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
																		  {{ Form::label('creditcard_required', 'Credit Card required', array('class' => 'form-check-label',)) }}
																	  </div>
																  </div>
															  </div>
															  <div class="row">
																  <div class="col-md-12">
																	  <div class="form-group">
																		  {!!Form::label('Terms of payment')!!}
																		  {!!Form::textarea('terms','',['class'=>'form-control','id'=>'textarea8','placeholder'=>'Terms of payment','rows'=>5,'style'=>'resize:none'])!!}
																	  </div>
																  </div>
															  </div>
															  <div class="row">
																  <div class="col-md-12">
																	  <div class="form-group">
																		  {!!Form::label('Terms of cancellation')!!}
																		  {!!Form::textarea('cancellationterms','',['class'=>'form-control','id'=>'textarea9','placeholder'=>'Terms of cancellation','rows'=>5,'style'=>'resize:none'])!!}
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
																						{{Form::label("Unit By Price (default 'per person')")}}
																						{{Form::text('price_unit_text','',['class'=>'form-control','placeholder'=>'Unit Price'])}}
																					</div>
																					<div class="form-group">
																						{{Form::label("Unit per service")}}
																						{{Form::text('included_unit_text','',['class'=>'form-control','placeholder'=>'Unit Price'])}}
																					</div>
																				</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					{!!Form::label('Min people')!!}
																					{!!Form::number('min_persons','',['class'=>'form-control','placeholder'=>'Min people'])!!}
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																						{!!Form::label('Max people')!!}
																						{!!Form::number('max_persons','',['class'=>'form-control','placeholder'=>'Max people'])!!}
																				</div>
																			</div>
																		</div>
																			
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type', 0, null, ['class' => 'form-check-input']) }}
																					{{ Form::label('', 'Pro person', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type', 1, null, ['class' => 'form-check-input']) }}
																					{{ Form::label('', 'Pro Yacht', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type', 2, null, ['class' => 'form-check-input']) }}
																					{{ Form::label('', 'Pro room', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type', 3, null, ['class' => 'form-check-input']) }}
																					{{ Form::label('', 'Pro package', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type', 4, null, ['class' => 'form-check-input']) }}
																					{{ Form::label('', 'Pro family package', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type', 98, null, ['class' => 'form-check-input']) }}
																					{{ Form::label('', 'Flat-rate', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="form-group">
																				<div class="col-md-12">
																					{{ Form::radio('person_type',99, null, ['class' => 'form-check-input','calut=']) }}
																					{{ Form::label('', '(Without name)', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																		</div>
																		<div class='row'>
																			<div class="form-group">
																				<div class='col-md-12'>
																					{{Form::label("Person type text (if you have choosen 'Without Name' on checkboxes)")}}
																					{{Form::text('person_type_text','',['class'=>'form-control','placeholder'=>'Unit Price'])}}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-6">
																				<div class="form-group">
																					{!!Form::label('days')!!}
																					{!!Form::number('day','',['class'=>'form-control','placeholder'=>'Days'])!!}
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					{!!Form::label('nights')!!}
																					{!!Form::number('night','',['class'=>'form-control','placeholder'=>'Nights'])!!}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-12">
																				<div class="form-group">
																					{!!Form::label('Price information')!!}
																					{!!Form::textarea('priceinfo','',['class'=>'form-control','id'=>'textarea10','placeholder'=>'Price information','rows'=>3,'style'=>'resize:none'])!!}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																			<div class="col-md-4">
																				<div class="form-check">
																					{{ Form::checkbox('hasgroupoffer', 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
																					{{ Form::label('hasgroupoffer', 'Group requests', array('class' => 'form-check-label',)) }}
																				</div>
																			</div>
																			<div class="col-md-8">
																				<div class="formgroup">
																					{!!Form::text('groupoffertitle','',['class'=>'form-control','placeholder'=>'Group offer title'])!!}
																				</div>
																			</div>
																		</div>
																		<div class="row">
																				<div class="col-md-2">
																					{{-- <button type="button" class="btn btn-primary btn-block" onclick="addDiv()">+ Add Option</button> --}}
																					{{-- <button type="button" class="btn btn-primary btn-block" onclick="addDiv()">+ Add Price</button> --}}
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
																					{{-- <button type="button" class="btn btn-primary btn-block" onclick="createAdditional()">+ Add additional</button> --}}
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
								
																					{{Form::label('Start Date')}}
																					{{Form::date('starttime',\Carbon\Carbon::now(),['class'=>'form-control'])}}
								
																				</div>
																			</div>
																			<div class="col-md-6">
																				<div class="form-group">
																					{{Form::label('End Date')}}
																					{{Form::date('endtime',\Carbon\Carbon::now(),['class'=>'form-control'])}}
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
																									{{ Form::checkbox('hasspeciallistsettings', 1, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('special-list', 'Use special list settings', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-md-6">
																								<div class="form-group">
																									{!!Form::label('Special Type')!!}
																									{!!Form::text('special_list_person_type_text','',['class'=>'form-control','placeholder'=>'Special type'])!!}
																								</div>
																							</div>
																							<div class="col-md-6">
																								<div class="form-group">
																									{!!Form::label('Adult price')!!}
																									{!!Form::text('special_list_price','',['class'=>'form-control','placeholder'=>'Adult price'])!!}
																								</div>
																							</div>
																						</div>
																						<div class='row'>
																							<div class='form-group'>
																								<div class="col-md-5">
																									{{ Form::label('Min Persons')}}
																									{{ Form::number('special_list_min_persons', ' ', ['class' => 'form-control']) }}
																								</div>
																					
																							</div>	
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-5">
																									{{ Form::radio('special_list_person_type', 0, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', 'Pro person', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									{{ Form::radio('special_list_person_type', 1, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', 'Pro Yacht', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									{{ Form::radio('special_list_person_type', 2, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', 'Pro room', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									{{ Form::radio('special_list_person_type', 3, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', 'Pro package', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									{{ Form::radio('special_list_person_type', 4, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', 'Pro family package', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									{{ Form::radio('special_list_person_type', 98, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', 'Flat-rate', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="form-group">
																								<div class="col-md-12">
																									{{ Form::radio('special_list_person_type', 99, null, ['class' => 'form-check-input']) }}
																									{{ Form::label('', '(Without name)', array('class' => 'form-check-label',)) }}
																								</div>
																							</div>
																						</div>
																						<div class="row">
																							<div class="col-md-2">
																								<div class="form-group">
																									{!!Form::label('Currency')!!}
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
																									{!!Form::label('Vaucher text')!!}
																									{!!Form::textarea('vauchertext','',['class'=>'form-control','id'=>'textarea11','placeholder'=>'Vaucher text','style'=>'resize:none;','rows'=>3])!!}
																								</div>
																							</div>
																						</div>
																					  </div>
																			</div>
																		</div>
																</div>
														  </div>
														</div>
										
										{{Form::submit('Create Offer',['class'=>"btn btn-info btn-fill pull-right"])}}
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

	{!! Form::close()!!}
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
		var name="<b>{{Session::get('user')->username}}</b>";
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
