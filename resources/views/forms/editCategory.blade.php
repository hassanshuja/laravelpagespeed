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
  @include("../includes/header")
<body>
		<div id="imageModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="closeImgModal()" >&times;</span>
              
                <!-- Modal Content (The Image) -->
                <img class="modal-content">
              
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
              </div>
<div class="wrapper">
    @include("../includes/sidemenu")
@foreach($category as $d)
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
					<div class="col-md-8">
						<div class="card">
							<div class="header">
                                <h4 class="title">Edit Category {{$d->title}}</h4>
							</div>
							<div class="content">
								
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												{{-- {!! Form::open(['action' => 'updateController@submitEditCategory','id'=>"categoryForm", 'files' =>true]) !!} --}}
												<form action="/admin/submitEditCategory/" method="POST" enctype="multipart/form-data">
													{{ csrf_field() }}
												{{Form::label('Title')}}
												{{Form::text('title',$d->title,['class'=>'form-control','placeholder'=>'Title'])}}
											
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												{{Form::label('Title Tag')}}
												{{Form::text('title_tag',$d->title_tag,['class'=>'form-control','placeholder'=>'Title Tag'])}}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											
												{{Form::label('Description')}}
												{{Form::textarea('description',$d->description,['style'=>'resize:none','id'=>'textarea1','class'=>'form-control','placeholder'=>'Description','rows'=>5])}}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
											
												{{Form::label('Description Meta')}}
												{{Form::textarea('description_meta',$d->description_meta,['style'=>'resize:none','id'=>'textarea2','class'=>'form-control','placeholder'=>'Description Meta','rows'=>5])}}
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
													<button type="button" class="btn btn-primary btn-block" onclick="catAddNewPhoto()">Change Photo</button>
												
													<div id="multipleUploadInput" >
														<input type="file" id="categoryPhoto" style="display:none;" multiple="multiple" />
													</div>
												<div class="chooseimagesHolder" style="padding-top:5px;width:100%;">
													<div class="firstImageHolder">
													<img src="{{url('assets'.$image)}}" id="categoryImage" >
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class='row'>
										<div class='col-md-4'>
											{{Form::label('Box Layout')}}
											<select name="box_layout" id="" class='form-control'>
												<option value="0" @if($d->box_layout==0) selected @endif>1x1</option>
												<option value="1" @if($d->box_layout==1) selected @endif>1x2</option>
												<option value="2" @if($d->box_layout==2) selected @endif>2x1</option>
												<option value="3" @if($d->box_layout==3) selected @endif>2x2</option>
											</select>
										</div>							
									</div>
								
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												
												{{Form::label('parent')}}
												{{--  {!!Form::select('parent',$parent+=$data['category'],'Please select',['class'=>'form-control'])!!}  --}}
												<select name='parent' class='form-control'>
													<option value='0'>No parent</option>
													@foreach($data['category'] as $k=>$v)
														<option value="{{$k}}" @if($parent == $k) selected @endif>{{$v}}</option>
													@endforeach

												</select>
												
												{{Form::hidden('uid',$d->uid)}}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
                                               
												{{Form::label('Related')}}
												{{--  {{Form::select('related',$related+=$data['category'],'Please select',['class'=>'form-control'])}}  --}}
												<select name='related' class='form-control'>
													<option value='0'>No related category</option>
													@foreach($data['category'] as $k=>$v)
														<option value="{{$k}}" @if($related == $k) selected @endif>{{$v}}</option>
													@endforeach

												</select>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												
											
												{{Form::label('Sorting')}}
												{{Form::number('sorting',$d->sorting,['class'=>'form-control','placeholder'=>'Sorting'])}}
											</div>
										</div>
								
									</div>
									<div class='row'>
										<div class="col-md-12">
												<div class="form-group">
											
													{{Form::label('Seo')}}
													{{Form::textarea('seo',$d->seo,['style'=>'resize:none','class'=>'form-control','id'=>'textarea3','placeholder'=>'Seoe','rows'=>5])}}
												</div>
											</div>
									</div>
									<div class='row'>
										<div class="col-md-12">
												<div class="form-group">
													{{Form::label('Season')}}
													<select name="category_season" id="" class='form-control'>
														<option value="0">Select Season of Category</option>
														<option value="1" @if($d->category_season==1) selected @endif>Spring</option>
														<option value="2" @if($d->category_season==2) selected @endif>Summer</option>
														<option value="3" @if($d->category_season==3) selected @endif>Autumn</option>
														<option value="4" @if($d->category_season==4) selected @endif>Winter</option>
													</select>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
										
												{{Form::label('Title url')}}
												{{Form::text('title_url',$d->title_url,['class'=>'form-control','placeholder'=>'This is what it is gonna say on website, if you do not define this the title is gonna show'])}}
												
											</div>
										</div>
									</div>


									{{Form::submit('Submit Edit Category',['class'=>'btn btn-info btn-fill pull-right','type'=>'Submit'])}}
									{{Form::close()}}
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
    @endforeach
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
   

</script>
</html>
