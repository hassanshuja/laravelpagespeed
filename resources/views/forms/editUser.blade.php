@include('includes/header')
@include('includes/sidemenu')
@section('ActiveBookings','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            @foreach($data as $d)
                <div class="container-fluid">
                    <h4>Edit User <b>{{$d->name}}</b></h4>
                    
                        <hr>
                        <h4>General</h4>
                        {{-- {{Form::open(['action'=>'updateController@submitEditUser','method'=>'POST'])}} --}}
                        <form action="/admin/submitEditUser/" method="POST">
                        {{ csrf_field() }}
                        @if(isset($_GET['source']))
                           {{Form::hidden('source',$_GET['source'])}}
                        @endif
                        <div class='row'>
                            <div class='col-md-5'>
                                {{Form::label('Username')}}
                                {{Form::text('username',$d->username,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-5'>
                                {{Form::label('Password')}}
                                {{Form::text('password','',['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-5'>
                                {{Form::label('Last Login')}}
                                {{Form::text('',\Carbon\Carbon::createFromTimeStamp($d->lastlogin)->format('d.m.Y'),['class'=>'form-control','disabled'=>'disabled'])}}
                            </div>
                        </div>
                        <hr>
                        <h4>Personal Data</h4>
                        <div class='row'>
                            <div class='col-md-3'>
                                <select name="gender" id="" class='form-control'>
                                <option value="0" @if($d->gender==0) selected @endif>Male</option>
                                <option value="1" @if($d->gender==1) selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-5'>
                                {{Form::label('Company')}}
                                {{Form::text('company',$d->company,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-5'>
                                {{Form::label('Title')}}
                                {{Form::text('title',$d->title,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-8'>
                                {{Form::label('Name')}}
                                {{Form::text('name',$d->name,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                {{Form::label('First Name')}}
                                {{Form::text('first_name',$d->name,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('Middle Name')}}
                                {{Form::text('middle_name',$d->middle_name,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('Last Name')}}
                                {{Form::text('last_name',$d->last_name,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-8'>
                                {{Form::label('Address')}}
                                {{Form::textarea('address',$d->address,['class'=>'form-control','rows'=>2])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-2'>
                                {{Form::label('Zip Code')}}
                                {{Form::text('zip',$d->zip,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('City')}}
                                {{Form::text('city',$d->city,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('Country')}}
                                {{Form::text('country',$d->country,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-3'>
                                {{Form::label('Phone')}}
                                {{Form::text('telephone',$d->telephone,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-3'>
                                {{Form::label('Fax')}}
                                {{Form::text('fax',$d->fax,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('email')}}
                                {{Form::text('email',$d->email,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                {{Form::label('www')}}
                                {{Form::text('www',$d->www,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <hr>
                        <h4>Customer</h4>
                        <div class='row'>
                            <div class='col-md-4'>
                                {{Form::label('Mobile')}}
                                {{Form::text('mobile',$d->mobile,['class'=>'form-control'])}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('Business Phone')}}
                                {{Form::text('business_phone',$d->business_phone,['class'=>'form-control'])}}
                            </div>
                        </div>
                        <h4>Direct Mail</h4>
                        <div class='row'>
                            <div class='col-md-4'>
                                {{Form::label('Activate Newsletter')}}
                                {{Form::checkbox('module_sys_dmail_newsletter',1,$d->module_sys_dmail_newsletter,['class'=>'form-control'])}}
                                {{Form::hidden('uid',$d->uid)}}
                                {{Form::hidden('bookingId',$d->bookingId)}}
                            </div>
                            <div class='col-md-4'>
                                {{Form::label('Recieve e-mails as HTML? ')}}
                                {{Form::checkbox('module_sys_dmail_category',1,$d->module_sys_dmail_category,['class'=>'form-control'])}}
                            </div>
                        </div>
                        {{Form::submit('Submit edit user',['class'=>'btn btn-primary'])}}
                        {{Form::close()}}
                   
                </div>
            @endforeach
        </div>
    </div>
</div>