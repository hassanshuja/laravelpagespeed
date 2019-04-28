@include('includes/header')
@include('includes/sidemenu')
@section('ActiveListVouchers','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Redirects</h2>
            <div class="container-fluid">
                <div class='row'>
                    <table class='table'>
                       <tr><th>id</th><th class='col-md-3'>Redirect From</th><th>Redirect To</th><th>Date Created</th>{{--<th>Total Price</th>--}}</tr>
                        @foreach($data as $d)
                            <tr>
                                <td>{{str_limit($d->uid,30,"...")}}</td>
                                <td>{{$d->url}}</td>
                                <td>{{$d->destination}}</td>
                                <td>{{\Carbon\Carbon::createFromTimeStamp($d->crdate)->format('d.m.Y')}}</td>
                                {{-- <td>{{$d->total_price}} <b>CHf</b></td> --}}
                            </tr>
                        @endforeach
                    </table>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>