@include('includes/header')
@include('includes/sidemenu')
@section('ActiveListVouchers','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Vauchers</h2>
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-5'>
                        {{Form::open(['action'=>'mainController@listVauchers','method'=>'GET'])}}
                        {{Form::label('Search For Username')}}
                        {{Form::text('search','',['class'=>'form-control','placeholder'=>'Search For User Name or "Vaucher For"'])}}
                    </div>
                    <div class='col-md-4'>
                        {{Form::submit('Search',['class'=>'btn btn-primary','style'=>'margin-top:24px'])}}
                        {{Form::close()}}
                        @if(isset($_GET['search']))
                            <a href="/admin/listAllVauchers">Clear Search</a>
                        @endif
                    </div>
                </div>
                <div class='row'>
                    <table class='table'>
                       <tr><th>Offer</th><th class='col-md-3'>User Name</th><th>Date Created</th><th>Valid From</th><th>Total Price</th><th></th></tr>
                        @foreach($data as $d)
                            <tr>
                                <td>{{str_limit($d->title,30,"...")}}</td>
                                <td>{{str_limit($d->name,30,"...")}}</td>
                                <td>{{\Carbon\Carbon::createFromTimeStamp($d->crdate)->format('d.m.Y')}}</td>
                                <td>{{$d->valid_from}}</td>
                                <td>{{$d->total_price}} <b>{{$d->total_currency==0?"CHF":"EUR"}}</b></td>
                                <td><a href="/admin/editVoucherReservation/{{$d->uid}}"><button class='btn btn-primary'>Edit</button></a></td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>