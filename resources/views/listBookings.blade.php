@include('includes/header')
@include('includes/sidemenu')
@section('ActiveBookings','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            {{Form::open(['method'=>'GET','action'=>'mainController@listBookings'])}}
            <div class="container-fluid">
            <div class='row'>
                <div class='col-md-5'>
                    {{Form::label('Search by user name')}}
                    {{Form::text('user_name','',['class'=>'form-control','placeholder'=>'Search Reservations By username'])}}
                </div>
                <div class='col-md-2'>
                    {{Form::button('Search',['class'=>'btn btn-primary','style'=>'margin-top:25px'])}}
                    {{Form::close()}}
                </div>   
                <div class='col-md-3'>
                     {{Form::open(['method'=>'GET','action'=>'mainController@listBookings'])}}
                     {{Form::label('Search by confirmation ID')}}
                     {{Form::text('confirmation_id','',['class'=>'form-control','placeholder'=>'Search Reservations by confirmation_id'])}}
                </div>
                <div class='col-md-2'>
                    {{Form::button('Search',['class'=>'btn btn-primary','style'=>'margin-top:25px'])}}                    
                </div>
            </div>
        </div>
        {{Form::close()}}
            
            <h2>Bookings</h2>
            <div class="container-fluid">
                <div class='row'>
                <div class='col-md-12'>
                    <table class='table'>
                       <tr><th>Offer Title</th><th>Order Date</th><th>Total Price</th><th>Created at:</th><th>Edit</th></tr>
                        @foreach($data as $d)
                            <tr>
                                <td>{{str_limit($d->name,50,"...")}}, <b>{{$d->confirmation_id}}</b></td>
                                <td>{{\Carbon\Carbon::createFromTimeStamp($d->booking_date)->format('d.m.Y')}}</td>
                                <td>{{$d->price_total}}{!!$d->currency==0?"<b> CHf</b>":"<b>&euro;</b>"!!}</td>
                                <td><b> {{\Carbon\Carbon::createFromTimeStamp($d->created_on)->format('d.m.Y @H:i')}} </b></td>
                               
                                <td><a href="/admin/editBooking/{{$d->uid}}"><button class='btn btn-primary'>Edit</button></a></td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $data->links() }}
                </div>
                </div>
            </div>
        </div>
    </div>
</div>