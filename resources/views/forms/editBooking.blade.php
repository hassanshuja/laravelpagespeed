
<!doctype html>
<html lang="en">
@include('includes/header')
@section('ActiveCurrencies','active')
<div class="wrapper">
    @include("includes/sidemenu")
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid myContainer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            @foreach($data as $d)
                            <div class="header">
                                <h4 class="title">Editing Booking <b>{{$d->confirmation_id}}, {{$user[0]->name}}</b></h4>
                            </div>
                                <h3>General</h3>
                                <form action="/admin/submitEditBooking/" method="POST">
                                    {{ csrf_field() }}
                                <div class='row'>
                                    <div class='col-md-1'>    
                                        {{Form::label('Hide')}}
                                        {{Form::checkbox('hide','',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-5'>    
                                        {{Form::label('Status')}}
                                        <select name="" id="" class='form-control'>
                                            <option value="Deleted">Deleted</option>
                                            <option value="Neu">Neu</option>
                                            <option value="In Bearbeitung" selected>In Bearbeitung</option>
                                            <option value="Reserviert">Reserviert</option>
                                            <option value="Bestatigt">Bestatigt</option>
                                            <option value="Bezahlt">Bezahlt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-8'>    
                                        {{Form::label('User')}}
                                        {{Form::text('user',$user[0]->name,['class'=>'form-control'])}}
                                        <a href="/admin/editUser/{{$user[0]->uid}}"><button type='button' class='btn btn-primary'>Edit</button></a>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>    
                                        {{Form::label('Note')}}
                                        {{Form::text('note',$d->note,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class='row'>
                                    <p><h3>Buchung</h3></p>
                                    <div class='col-md-8'>    
                                        {{Form::label('Offer')}}
                                        {{Form::text('offer_title',$d->offer_title,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-8'> 
                                        {{Form::label('Booking Date')}}   
                                        {{Form::date('booking_date',\Carbon\Carbon::createFromTimeStamp($d->booking_date),['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-5'> 
                                        {{Form::label('Total')}}   
                                        {{Form::number('price_total',$d->price_total,['class'=>'form-control'])}}
                                    </div>
                                    <div class='col-md-4'> 
                                        {{Form::label('Total')}}   
                                        <select name="currency" id="" class='form-control'>
                                            @if($d->currency==0)
                                                <option value="0" selected>CHF</option>
                                                <option value="1" >Euro</option>
                                            @else
                                                <option value="0" >CHF</option>
                                                <option value="1" selected >Euro</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <h5>Credit Card Info</h5>
                                {{-- Credit card info --}}
                                
                                <div class='row'>
                                    <div class='col-md-5'> 
                                        {{Form::label('Card type')}}   
                                        <select name="reservationgarantee_cardtype" id="" class='form-control'>
                                            <option value="" selected></option>
                                            <option @if($d->reservationgarantee_cardtype=='visa') selected @endif value="visa">Visa</option>
                                            <option @if($d->reservationgarantee_cardtype=='Mastercard') selected @endif value="Mastercard">Mastercard</option>
                                            <option @if($d->reservationgarantee_cardtype=='Amex') selected @endif value="Amex">American Express</option>

                                        </select>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-5">
                                        {{Form::label('Card Number')}}
                                        {{Form::text('reservationgarantee_cardno',$d->reservationgarantee_cardno,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                {{Form::hidden('uid',$d->uid)}}
                                <div class="row">
                                    <div class="col-md-5">
                                        {{Form::label('Month')}}
                                        {{Form::text('reservationgarantee_exp_month',$d->reservationgarantee_exp_month,['class'=>'form-control'])}} 
                                    </div>
                                    <div class="col-md-5">
                                        {{Form::label('Year')}}
                                        {{Form::text('reservationgarantee_exp_year',$d->reservationgarantee_exp_year,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        {{Form::label('Name on Card')}}
                                        {{Form::text('reservationgarantee_name',$d->reservationgarantee_name,['class'=>'form-control'])}} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        {{Form::label('No Credit Card Available')}}
                                        {{Form::checkbox('reservationgarantee_nocard','',$d->reservationgarantee_nocard,['class'=>'form-control'])}} 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        {{Form::label('Coupon Code')}}
                                        {{Form::text('vaucher_code',$d->vaucher_code,['class'=>'form-control'])}} 
                                    </div>
                                    <div class="col-md-6">
                                        {{Form::label('Marketing-Code ')}}
                                        {{Form::text('marketing_code',$d->marketing_code,['class'=>'form-control'])}} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        {{Form::label('Coupon Code')}}
                                        {{Form::number('totalammount','',['class'=>'form-control'])}} 
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <h3>Buchungsbestätigung</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        {{Form::label('Create Confirmation')}}
                                        <br>
                                        <a href="/admin/pdf/{{$d->uid}}">Reservations-Bestätigung (PDF)</a>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        {{Form::label('Confirmation ID')}}
                                        {{Form::text('confirmation_id',$d->confirmation_id,['class'=>'form-control'])}} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{Form::label('Introduction')}}
                                        {{Form::text('confirmation_intro',$d->confirmation_intro,['class'=>'form-control','id'=>'textarea2'])}} 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        {{Form::label('Price Table')}}
                                        {{Form::textarea('confirmation_table',$d->confirmation_table,['class'=>'form-control','id'=>'textarea3'])}} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{Form::label('Services')}}
                                        {{Form::textarea('confirmation_services',$d->confirmation_services,['class'=>'form-control','id'=>'textarea4'])}} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{Form::label('Zahlungs-/Annullationsbedingungen ')}}
                                        {{Form::textarea('confirmation_conditions',$d->confirmation_conditions,['class'=>'form-control','id'=>'textarea5'])}} 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        {{Form::label('Schlusswort')}}
                                        {{Form::textarea('confirmation_wishes',$d->confirmation_wishes,['class'=>'form-control','id'=>'textarea6'])}} 
                                    </div>
                                </div>

                                {{Form::submit('Submit Booking Edit',['class'=>'btn btn-primary'])}}
                                {{Form::close()}}
                         
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
 
    CKEDITOR.replace('textarea2',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea3',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea4',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea5',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea6',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
</script>