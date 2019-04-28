@include('includes/header')
@include('includes/sidemenu')
@section('ActiveBookings','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content" style='margin-left:30px'>
            @foreach($data as $d)
                <h2>Edit user <b>{{$d->username}}</b></h2>
            {{-- {{Form::open(['action'=>'updateController@submitEditBeUser','method'=>'POST'])}} --}}
            <form action="/admin/submitEditBeUser/" method="POST">
                {{ csrf_field() }}
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-12'>
                        <div class='form-group'>
                            <div class='col-md-5'>
                                {{Form::label('Username')}}
                                {{Form::text('username',$d->username,['class'=>'form-control'])}}  
                                {{Form::hidden('uid',$d->uid)}}                      
                            </div>
                            <div class='col-md-5'>
                                {{Form::label('Password')}}
                                {{-- {{Form::password('password','',['class'=>'form-control'])}}                         --}}
                                <input type="password" name='password' class='form-control'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <hr>
                        <h4>Permissions</h4>
                        {{Form::label('Permission')}}
                        {{Form::number('admin',$d->admin,['class'=>'form-control'])}}
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        <p>1- Every Permission</p>
                        <p>2- Limited Permissions</p>
                    </div>
                </div>
            </div>
            {{Form::submit('Submit edit',['class'=>'btn btn-primary'])}}
            {{Form::close()}}
            @endforeach
        </div>
    </div>
</div>