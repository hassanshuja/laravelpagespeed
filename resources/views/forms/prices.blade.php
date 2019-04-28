<head>
    <script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
</head>
<div class="price-options-{{$data}}" id="price-options-{{$data}}" style='margin-left:30px'>
    
    <div class="row">
        <div class="col-md-12">
            {{ Form::checkbox("prices[$data][closed]", 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('closed', 'Season/Package Closed', array('class' => 'form-check-label',)) }}
        </div>
    </div>
     
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{Form::label('Price Title')}}
                {{Form::text("prices[$data][title]", null, ['class' => 'form-control','placeholder'=>'Price title']) }}
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                {{-- {!!Form::label('Unit Price')!!} --}}
                {{Form::label('Start Date')}}
                {{Form::date("prices[$data][startdate]",\Carbon\Carbon::now(),['class'=>'form-control'])}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{-- {!!Form::label('Unit Price')!!} --}}
                {{Form::label('Start Date')}}
                {{Form::date("prices[$data][enddate]",\Carbon\Carbon::now(),['class'=>'form-control'])}}
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-2">
            {!! Form::checkbox("prices[$data][monday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) !!}
            {{ Form::label('Monday', 'Monday', array('class' => 'form-check-label',)) }}
        </div>
        <div class="col-md-2">
            {{ Form::checkbox("prices[$data][thusday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('Tuesday', 'Tuesday', array('class' => 'form-check-label',)) }}
        </div>
        <div class="col-md-2">
            {{ Form::checkbox("prices[$data][wednesday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('Wednesday', 'Wednesday', array('class' => 'form-check-label',)) }}
        </div>
        <div class="col-md-2">
            {{ Form::checkbox("prices[$data][thursday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('Thursday', 'Thursday', array('class' => 'form-check-label',)) }}
        </div>
        <div class="col-md-2">
            {{ Form::checkbox("prices[$data][friday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('Friday', 'Friday', array('class' => 'form-check-label',)) }}
        </div>
        <div class="col-md-2">
            {{ Form::checkbox("prices[$data][saturday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('Saturday', 'Saturday', array('class' => 'form-check-label',)) }}
        </div>
        <div class="col-md-2">
            {{ Form::checkbox("prices[$data][sunday]", 1, false, ['class' => 'form-check-input','id'=>'credit-check']) }}
            {{ Form::label('Sunday', 'Sunday', array('class' => 'form-check-label',)) }}
        </div>
    </div>
    <div class='row'>
        <div class='col-md-4'>
            {{Form::label('Date list')}}
            {{Form::date('','',['class'=>'form-control datelist_selector','id'=>"o_$data",'type'=>'datepicker'])}}
            <br><br>
            {{Form::textarea("prices[$data][datelist]",'',['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>"datelist_textarea_o_$data"])}} 
        </div>
        <div class='col-md-4'>
            {{Form::label('Date list Closed')}}
            {{Form::date('','',['class'=>'form-control datelist_closed_selector','id'=>"c_$data",'type'=>'datepicker'])}}
            <br><br>
            {{Form::textarea("prices[$data][datelist_closed]",'',['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>"datelist_closed_textarea_c_$data"])}} 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                {!!Form::label('Adult price')!!}
                
                {!!Form::number("prices[$data][adult_price]",'',['class'=>'form-control','placeholder'=>'Adult price','required'=>'required'])!!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {!!Form::label('Kids price')!!}
                {!!Form::number("prices[$data][kids_price]",'',['class'=>'form-control','placeholder'=>'Kids price'])!!}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{Form::label('Currency')}}
                {{Form::select("prices[$data][currency]",['0'=>'CHF','1'=>'EURO'],'Please Select',['class'=>'form-control'])}}
                
            </div>
        </div>
    </div>
    
    <h4>Option for current price</h4>
    <div class="row options-row-{{$data}}" id="options-row-{{$data}}">
         
        <div class="col-md-3">
        <select class="form-control" name="prices[{{$data}}][selected_option]">
                <option value="0" selected>Choose Option</option>
            @foreach($options as $pOpt)
        <option value="{{$pOpt->uid}}">{{$pOpt->title}} @if($pOpt->subtitle) - {{$pOpt->subtitle}}@endif</option>
            @endforeach
        </select>
        </div>
    
    </div>
     <br/>
    <div class="row">
        <div class="col-md-3">
            <button type="button"id="buttonii" class="btn btn-primary btn-block" onclick="addDiv()">Add another price</button>
        </div>
        <div class="col-md-3">
            <button type="button"id="buttonii" class="btn btn-danger btn-block" onclick="removeDiv({{$data}})">Delete price</button>
        </div>
    </div>
</div>
</div>