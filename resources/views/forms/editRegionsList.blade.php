@include('../includes/header')
@include('../includes/message')
@section('ActiveListRegions','active')
<div class="wrapper">
        @include("includes/sidemenu")
    
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-md-12">
                                        {{Form::open(['action'=>'mainController@listRegionsForEdit','method'=>'GET'])}}
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
                                    <a href="/admin/listRegions">Clear Search</a>
                                    @endif
                                </div>
                            </div>
                            
                            <table class='table'>
                                <tr><td>Title</td><td>Created at:</td><td>Hidden</td><td>Deleted:</td><td></td><td></td></tr>
                                @foreach($data as $d)
                                    <tr>
                                        <td>{{$d->title}}</td>
                                        <td>{{\Carbon\Carbon::createFromTimeStamp($d->crdate)}}</td>
                                        <td>{{$d->hidden}}</td>
                                        <td>{{$d->deleted}}</td>
                                        <td><a href='/admin/editRegionForm/{{$d->uid}}'><button class='btn btn-primary'>Edit</button></a>
                                        @if($d->hidden==1)
                                            <button type='button' class='btn btn-success' onclick="regionAction({{$d->uid}},'unHide')">Un Hide</button>
                                        @endif
                                        @if($d->hidden==0)
                                           
                                            <button type='button' class='btn btn-warning' onclick="regionAction({{$d->uid}},'hide')">Hide</button>
                                        @endif
                                        @if($d->deleted==1)
                                            <button type='button' class='btn btn-success' onclick="regionAction({{$d->uid}},'unDelete')">Un Delete</button>
                                        @endif
                                        @if($d->deleted==0)
                                            <button type='button' class='btn btn-danger' onclick="regionAction({{$d->uid}},'delete')">Delete</button>
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
    