@include('includes/header')
@include('includes/sidemenu')
@section('ActiveBookings','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Backend Users</h2>
            <div class="container-fluid">
                <div class='row'>
                    <table class='table'>
                       <tr><th class='col-md-5'>Username</th><th>Admin</th><th>Last Login</th><th>Edit</th><th>Delete</th></tr>
                        @foreach($data as $d)
                            <tr>
                                <td>{{$d->username}}</td>
                                <td>{{$d->admin}}</td>
                                @if($d->lastlogin==0)
                                    <td>never</td>
                                @else
                                    <td>{{\Carbon\Carbon::createFromTimeStamp($d->lastlogin)->format('d.m.Y @h:m:s')}}</td>
                                @endif
                                <td><a href="/admin/editBeUser/{{$d->uid}}"><button class='btn btn-primary'>Edit</button></a></td>
                                @if($d->deleted)
                                    <td><button onclick="userAction('{{$d->uid}}','unDelete')" class='btn btn-success'>UnDelete</button></td>
                                @else
                                    <td><button onclick="userAction('{{$d->uid}}','delete')" class='btn btn-warning'>Delete</button></td>
                                @endif
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
