@include('includes/header')
@include('includes/sidemenu')
@section('ActiveAddNewsletters','active')
<div class="wrapper">
    <div class="main-panel">
        <div class="content">    
            <div class="container-fluid" style='margin-left:10px'>
                <h2>Add Newsletter</h2>
                {{-- {{Form::open(['route'=>'addNewsLetter','method'=>'POST','files'=>true])}} --}}
                <form action="/admin/addNewsLetter/" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                <div class='row'>
                    <div class='col-md-5'>
                        {{Form::label('Title')}}
                        {{Form::text('newsletter_title','',['class'=>'form-control','placeholder'=>'title'])}}
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Image for package 1')}}
                        {{Form::file('image_1',['class'=>'form-control'])}}
                     
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Image for package 2')}}
                        {{Form::file('image_2',['class'=>'form-control'])}}
                    </div>
                </div>
                <br> <br>
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 Title')}}
                        {{Form::text('offer_1_title','',['class'=>'form-control','placeholder'=>'package 1 title'])}}
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 2 Title')}}
                        {{Form::text('offer_2_title','',['class'=>'form-control','placeholder'=>'package 2 title'])}}
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 Total Price')}}
                        {{Form::text('offer_1_price','',['class'=>'form-control','placeholder'=>'package 1 total price'])}}
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 2 Total Price')}}
                        {{Form::text('offer_2_price','',['class'=>'form-control','placeholder'=>'package 2 total price'])}}
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 currency')}}
                        <select name="offer_1_currency" id="" class='form-control'>
                            <option value="CHF">CHF</option>
                            <option value="EURO">EURO</option>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 2 currency')}}
                        <select name="offer_2_currency" id="" class='form-control'>
                            <option value="CHF">CHF</option>
                            <option value="EURO">EURO</option>
                        </select>
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 Person Type')}}
                        {{Form::text('offer_1_person_type','',['class'=>'form-control','placeholder'=>'package 1 person type'])}}
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 2 Person Type')}}
                        {{Form::text('offer_2_person_type','',['class'=>'form-control','placeholder'=>'package 2 person type'])}}
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 type')}}
                        <select name="offer_1_type" id=""  class='form-control'>
                            <option value="NEU">NEU</option>
                            <option value="SPECIAL OFFER">SPECIAL OFFER</option>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 type')}}
                        <select name="offer_2_type" id="" class='form-control'>
                            <option value="NEU">NEU</option>
                            <option value="SPECIAL OFFER">SPECIAL OFFER</option>
                        </select>
                    </div>
                    
                </div>    
                    
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 Text')}}
                        {{Form::textarea('offer_1_text','',['class'=>'form-control','placeholder'=>'package 1 text','id'=>'textarea1'])}}
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 2 Text')}}
                        {{Form::textarea('offer_2_text','',['class'=>'form-control','placeholder'=>'package 2 text','id'=>'textarea2'])}}
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Package 1 Included')}}
                        {{Form::textarea('offer_1_included','',['class'=>'form-control','placeholder'=>'package 1 included','id'=>'textarea3'])}}
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Package 2 Included')}}
                        {{Form::textarea('offer_2_included','',['class'=>'form-control','placeholder'=>'package 2 included','id'=>'textarea4'])}}
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        {{Form::label('Offer Linked With')}}
                        <select name="offer_1" id="" class='form-control'>
                            <option value="0" selected></option>
                            @foreach($offers as $o)
                                <option value="{{$o->uid}}">{{$o->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-6'>
                        {{Form::label('Offer Linked With')}}
                        <select name="offer_2" id="" class='form-control'>
                            <option value="0" selected></option>
                            @foreach($offers as $o)
                                <option value="{{$o->uid}}">{{$o->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-2'>
                        {{Form::submit('Submit',['class'=>'form-control btn btn-primary'])}}
                    </div>
                </div>
                {{Form::close()}}
            
            </div>
        </div>
    </div>
</div>

<script>
    
	CKEDITOR.replace('textarea1',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
	CKEDITOR.replace('textarea2',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
	CKEDITOR.replace('textarea3',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
	CKEDITOR.replace('textarea4',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });



</script>