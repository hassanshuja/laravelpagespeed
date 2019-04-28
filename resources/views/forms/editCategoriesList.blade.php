@include('../includes/header')
@section('ActiveListCategories','active')
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
<div class="wrapper">
        @include("../includes/sidemenu")
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                              
                                <div class="row">
                                        <div class="col-md-12">
                                            
                                            {{Form::open(['action'=>'mainController@listCategoriesForEdit','method'=>'GET'])}}
                                            {{Form::label('Search')}}
                                            <div class='col-md-5'>
                                                {{Form::text('search','',['class'=>'form-control'])}}
                                            </div>
                                            <div class='col-md-3'>
                                                {{Form::submit('search',['class'=>'form-control btn btn-primary'])}}
                                            </div>
                                            {{Form::close()}}
                                        </div>
                                        @if(isset($_GET['search']))
                                        <a href="/admin/listCategories">Clear Search</a>
                                        @endif
                                    </div>
                            </div>
                            @include('../includes/message')
                            <table class='table'>
                                <tr><td >Title</td><td>Created at:</td><td>Hidden</td><td>Deleted:</td><td></td><td>*</td></tr>
                                @foreach($data as $d)
                                <tr id={{$d->uid}}>
                                        <td>{{$d->title}}</td>
                                        <td>{{\Carbon\Carbon::createFromTimeStamp($d->crdate)}}</td>
                                        <td>{{$d->hidden}}</td>
                                        <td>{{$d->deleted}}</td>
                                        <td>
                                            @if($loop->index==0)
                                                <button class='btn-xs btn disabled' id="{{$d->uid}}" >▲</button>
                                            @else
                                                <button class='btn-xs btn' id="{{$d->uid}}" onclick='catRankUp({{$d->uid}},{{$data[$loop->index-1]->uid}})'>▲</button>
                                            @endif
                                            @if($loop->last)
                                                <button class='btn-xs btn disabled' id="{{$d->uid}}" >▼</button>
                                            @else
                                                <button class='btn-xs btn' id="{{$d->uid}}" onclick='catRankDown({{$d->uid}},{{$data[$loop->index+1]->uid}})'>▼</button>
                                            @endif
                                            <button class='btn-xs btn cutButton' onClick="cutItemCat({{$d->uid}})">Cut</button>
                                            <button class='btn-xs btn pasteButton' onClick="pasteItemCat({{$d->uid}})">Shift Down</button>
                                            <button class='btn-xs btn cancelButton' id="itemCancel_{{$d->uid}}" onClick="cancelMoveItemCat({{$d->uid}})">Cancel</button>
                                        </td>
                                        <td><a href='/admin/editCategoryForm/{{$d->uid}}'><button class='btn btn-primary'>Edit</button></a>
                                        @if($d->hidden==1)
                                            <button class='btn btn-success' onclick="categoryAction({{$d->uid}},'unHide')">Un Hide</button>
                                        @endif
                                        @if($d->hidden==0)
                                            <button class='btn btn-warning' onclick="categoryAction({{$d->uid}},'hide')">Hide</button>
                                        @endif
                                        @if($d->deleted==1)
                                            <button class='btn btn-success' onclick="categoryAction({{$d->uid}},'unDelete')">Un Delete</button>
                                        @endif
                                        @if($d->deleted==0)
                                            <button class='btn btn-danger' onclick="categoryAction({{$d->uid}},'delete')">Delete</button>
                                        @endif

                                    </tr>
                                @endforeach
                                </table>
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
   
    </html>
    