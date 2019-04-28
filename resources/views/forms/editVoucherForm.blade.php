<!doctype html>
<html lang="en">

@include("includes/header")
@section('ActiveVoucher','active')

<body>
	<div class="wrapper">
		@include("includes/sidemenu")
		<div class="main-panel">
			<div class="content">
				<div class="container-fluid myContainer">
					<div class="row">
						<div class="col-md-8">
                            <div class="header">
                                @foreach($data as $d)
                                <h4 class="title">Edit Voucher {{$d->title}}</h4>
                            </div>
                            <div class="content">
                                {{-- {{Form::open(['action'=>'updateController@submitEditVoucher','method'=>'POST','enctype'=>'multipart/form-data'])}} --}}
                                <form action="/admin/submitEditVoucher/" method='POST' enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class='row'>
                                        <div class='col-md-8'>
                                            {{Form::label('Currently Selected Picture')}}
                                            <br/>
                                            <img src="../../assets/voucher/{{$d->image}}" height='auto' width='200px' title="meinweekend" alt="meinweekend"/>
                                            <br><br><br>
                                            {{Form::hidden('uid',$d->uid)}}
                                            {{Form::label('Upload new picture')}}
                                            {{Form::file('picture',['class'=>'form-control','placeholder'=>'picture'])}}
                                        </div>
                                    </div>
                                    <br><br>
                                <div class='row'>
                                    <div class='row'>
                                        <div class='col-md-8'>
                                            {{Form::label('Title')}}
                                            {{Form::text('title',$d->title,['class'=>'form-control','placeholder'=>'Title'])}}
                                        </div>
                                    </div>
                                    <div class='row'>
                                        <div class='col-md-8'>
                                            {{Form::label('Description')}}
                                            {{Form::textarea('description',$d->description,['class'=>'form-control','placeholder'=>'Description','resize'=>'false'])}}
                                        </div>
                                    </div>
                            
                                </div>
                            </div>
                                {{Form::submit('Submit edit Voucher',['class'=>'btn btn-primary right'])}}
                                {{Form::close()}}
                        </div>	
                        @endforeach
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
