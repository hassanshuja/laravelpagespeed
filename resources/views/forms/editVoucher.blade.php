@include('../includes/header')
@include('../includes/sidemenu')

@foreach($data as $d)
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid" >
                <h4>Edit Vaucher Reservation for <b>{{$d->name}}</b></h4>
               
                    <form action="/admin/submitVoucherReservationEdit/" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="row">
                        <div class='col-md-1'>
                            {{Form::label('Hide')}}
                            {{Form::checkbox('hidden','',$d->hidden,['class'=>'form-control'])}}
                            {{Form::hidden('uid',$d->v_uid)}}
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-5'>
                        <a href="/admin/editUser/{{$d->customer_id}}?source={{$d->v_uid}}/">Edit User <b>{{$d->name}}</b></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-5'>
                            {{Form::label('Valid_From')}}
                            {{Form::text('valid_from',$d->valid_from,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <hr>
                    @if($d->offer>0)
                        @if($d->cdate>1527601860)
                            <div class='row'>
                                <div class='col-md-12'>
                                    <a href="/admin/generateOfferVaucherPDF/{{$d->v_uid}}">Vaucher PDF</a>
                                </div>
                            </div>
                            <hr>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <a href="/admin/generateOfferVaucherInvoice/{{$d->v_uid}}">Vaucher Invoice</a>
                                </div>
                            </div>
                        @else
                            <div class='row'>
                                <p>This voucher was created before a 30.05.2018 so we dont have the data to generate the PDF</p>
                            </div>
                        @endif
                    @else
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href="/admin/generateVoucherPdf/{{$d->v_uid}}">Vaucher PDF</a>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href="/admin/generateVoucherInvoice/{{$d->v_uid}}">Vaucher Invoice</a>
                            </div>
                        </div>
                    @endif
                   
                    <hr>
                    <div class='row'>
                        <div class='col-md-2'>
                            {{Form::label('Vaucher Type')}}
                            {{Form::text('vaucher_type',$d->vaucher_type,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            {{Form::label('Vaucher For')}}
                            {{Form::text('vaucher_for',$d->vaucher_for,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            {{Form::label('Vaucher Text')}}
                            {{Form::textarea('vaucher_text',$d->vaucher_text,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            {{Form::label('Customer')}}
                            {{Form::text('customer_id',$d->customer_id,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            {{Form::label('Total Price')}}
                            {{Form::text('total_price',$d->total_price,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-1'>
                            {{Form::label('Currency')}}
                            {{Form::text('total_currency',$d->total_currency,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            {{Form::label('Notes')}}
                            {{Form::textarea('note',$d->note,['class'=>'form-control','rows'=>3])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-2 form-group'>
                            {{Form::label('Extend for 1 Year')}}
                            {{Form::checkbox('valid_extended','',$d->valid_extended,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-2 form-group'>
                            {{Form::label('Extend for 2nd Year')}}
                            {{Form::checkbox('valid_extended2','',$d->valid_extended2,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            {{Form::label('Additional payment')}}
                            {{Form::text('additional_payment',$d->additional_payment,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            {{Form::label('Additional payment currency')}}
                            {{Form::text('additional_currency',$d->additional_currency,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            {{Form::label('Additional payment: payed')}}
                            {{Form::text('additional_payed',$d->additional_payed,['class'=>'form-control'])}}
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            {{Form::label('Offer')}}
                            <select name="offer" id="" class='form-control'>
                                <option value="0" selected>No offer</option>
                                @foreach($offer as $o)
                                    <option value="{{$o->uid}}" @if($d->offer==$o->uid) selected @endif>{{$o->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class='row'>
                        {{Form::submit('Submit',['class'=>'btn btn-primary','style'=>'top:100px;right:30px;position:fixed'])}}
                    </div>
                    {{Form::close()}}
                
            </div>
        </div>
    </div>
@endforeach
<script>
    CKEDITOR.replace('textarea1',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea2',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
  
</script>