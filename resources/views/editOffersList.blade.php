@include('includes/header')
@section('ActiveListOffers','active')
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
    </style>
<body>

	<div class="wrapper">
		@include("includes/sidemenu")
        
		<div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    {{Form::open(['action'=>'mainController@listOffersForEdit','method'=>'GET'])}}
                    <div class='col-md-12'>
                        <span>&nbsp;</span>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            {{Form::text('search','',['class'=>'form-control','style'=>'width:350px;margin-right:100px;margin-left:50px','placeholder'=>'Search For offer'])}}
                        </div>
                        <div class='col-md-3'>
                            {{Form::submit("Search",['class'=>'btn btn-primary'])}}
                            {{Form::close()}}
                        </div>
                    </div>
                    @if($get==1)
                        <a class='col-md-2' href="/admin/listOffers"><button class='btn btn-danger'>Clear search</button></a>
                    @endif 
                </div>
                <div class='row'>
                <div class='col-12'>
                    <ul class='list-group list-group-flush'>
                        <table class='table'>
                            <tr><th >Title</th><th >Created at</th><th></th><th></th></tr>
                        @foreach($data as $d)
                        <tr id={{$d->uid}}>
                            <td id="{{$d->uid}}"><a href="/admin/editOfferForm/{{$d->uid}}">{{$d->title}}</a></td>
                            <td>{{\Carbon\Carbon::createFromTimeStamp($d->crdate)}}</td>
                            <td>
                                @if($loop->index==0)
                                    <button class='btn-xs btn disabled' id="{{$d->uid}}">▲</button>
                                @else
                                    <button class='btn-xs btn' id="{{$d->uid}}" onclick='offerRankUp({{$d->uid}},{{$data[$loop->index-1]->uid}})'>▲</button>
                                @endif
                                @if($loop->last)
                                    <button class='btn-xs btn disabled' id="{{$d->uid}}">▼</button>
                                @else
                                    <button class='btn-xs btn' id="{{$d->uid}}" onclick='offerRankDown({{$d->uid}},{{$data[$loop->index+1]->uid}})'>▼</button>
                                @endif
                                <button class='btn-xs btn cutButton' onClick="cutItem({{$d->uid}})">Cut</button>
                                <button class='btn-xs btn pasteButton' onClick="pasteItem({{$d->uid}})">Shift Down</button>
                                <button class='btn-xs btn cancelButton' id="itemCancel_{{$d->uid}}" onClick="cancelMoveItem({{$d->uid}})">Cancel</button>
                            <td>
                               <button class='btn btn-danger btn' onclick="offerAction({{$d->uid}},'delete')" style='float:right'>Delete</button>
                                @if($d->hidden==1)
                                   <button class='btn btn-warning btn' onclick="offerAction({{$d->uid}},'unHide')" style='float:right'>UnHide Offer</button>
                                @elseif($d->hidden==0)
                                    <button class='btn btn-success btn' onclick="offerAction({{$d->uid}},'hide')" style='float:right'>Hidde Offer</button>
                                @endif
                                <a href="/admin/editOfferForm/{{$d->uid}}"><button class='btn btn-primary btn' style='float:right'>Edit</button></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </table>
                    <h3>Deleted Offers</h3>
                    <table class='table'>
                        @foreach($deleted as $del)
                        <tr>
                            <td id="{{$del->uid}}">{{$del->title}}</td>  
                            <td>{{\Carbon\Carbon::createFromTimeStamp($del->crdate)}}</td>
                            <td></td>
                            <td></td>
                            <td><a href="/admin/unDeleteOffer/{{$del->uid}}"><button class='btn btn-success btn' style='float:right'>Un-Delete</button></a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a >
                                Home
                            </a>
                        </li>
                        <li>
                            <a >
                                Company
                            </a>
                        </li>
                        <li>
                            <a >
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a >
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                
            </div>
        </footer>


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

</html>
