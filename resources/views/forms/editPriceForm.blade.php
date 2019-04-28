@include('../includes/header')
@include('../includes/sidemenu')
<body>
	<div class="wrapper">
		<div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-12'>
            <center><h1>Edit Price </h1></center><br/><br/>
            @foreach($prices as $p)
            <div class="col-md-12 price-options-{{$p->uid}}" id="price-options-{{$p->uid}}">
                    <div class="row">
                        <div class="col-md-12">
                            {{-- {!!Form::open(['action'=>'updateController@submitEditPrice','class'=>'form-control'])!!} --}}
                            <form action="/admin/submitEditPrice/" method="POST">
                                {{ csrf_field() }}
                            {{Form::hidden("prices[closed]",0)}}
                            {{ Form::checkbox("prices[closed]", 1, $p->closed, ['class' => 'form-check-input','id'=>'credit-check']) }}
                            {{ Form::label('hidden', 'Season/Package Closed', array('class' => 'form-check-label',)) }}
                            {{Form::hidden('uid',$p->uid)}}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{Form::label('Price Title')}}
                                {{Form::text("prices[title]", $p->title, ['class' => 'form-control','placeholder'=>'Price title']) }}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- {!!Form::label('Unit Price')!!} --}}
                                {{Form::label('Start Date')}}
                                {{Form::date("prices[startdate]",\Carbon\Carbon::createFromTimeStamp($p->startdate),['class'=>'form-control'])}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- {!!Form::label('Unit Price')!!} --}}
                                {{Form::label('End Date')}}
                                {{Form::date("prices[enddate]",\Carbon\Carbon::createFromTimeStamp($p->enddate),['class'=>'form-control'])}}
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class='col-md-3'> 
                            {{Form::label('Days Available')}}
                            {{Form::hidden("prices[monday]",0)}}
                            {{Form::hidden("prices[thusday]",0)}}
                            {{Form::hidden("prices[wednesday]",0)}}
                            {{Form::hidden("prices[thursday]",0)}}
                            {{Form::hidden("prices[friday]",0)}}
                            {{Form::hidden("prices[saturday]",0)}}
                            {{Form::hidden("prices[sunday]",0)}}
                            <div class="day">
                                {!! Form::checkbox("prices[monday]", 1, $p->monday, ['class' => 'form-check-input','id'=>'credit-check']) !!}
                                {{ Form::label('Monday', 'Monday', array('class' => 'form-check-label',)) }}
                            </div>
                            <div class="day">
                                {{ Form::checkbox("prices[thusday]", 1,$p->thusday, ['class' => 'form-check-input','id'=>'credit-check']) }}
                                {{ Form::label('Tuesday', 'Tuesday', array('class' => 'form-check-label',)) }}
                            </div>
                            <div class="day">
                                {{ Form::checkbox("prices[wednesday]", 1,$p->wednesday, ['class' => 'form-check-input','id'=>'credit-check']) }}
                                {{ Form::label('Wednesday', 'Wednesday', array('class' => 'form-check-label',)) }}
                            </div>
                            <div class="day">
                                {{ Form::checkbox("prices[thursday]",1, $p->thursday, ['class' => 'form-check-input','id'=>'credit-check']) }}
                                {{ Form::label('Thursday', 'Thursday', array('class' => 'form-check-label',)) }}
                            </div>
                            <div class="day">
                                {{ Form::checkbox("prices[friday]", 1,$p->friday, ['class' => 'form-check-input','id'=>'credit-check']) }}
                                {{ Form::label('Friday', 'Friday', array('class' => 'form-check-label',)) }}
                            </div>
                            <div class="day">
                                {{ Form::checkbox("prices[saturday]",1, $p->saturday, ['class' => 'form-check-input','id'=>'credit-check']) }}
                                {{ Form::label('Saturday', 'Saturday', array('class' => 'form-check-label',)) }}
                            </div>
                            <div class="day">
                                {{ Form::checkbox("prices[sunday]", 1,$p->sunday, ['class' => 'form-check-input','id'=>'credit-check']) }}
                                {{ Form::label('Sunday', 'Sunday', array('class' => 'form-check-label',)) }}
                            </div>
                        
                        </div>
                        {{--
                        <div class='col-md-3'> 
                            {{Form::label('Celebration Days')}}
                            {{Form::date('','',['class'=>'form-control datelist_celebration_selector','id'=>'c_0'])}}
                            {{Form::textarea("prices[datelist_celebration_day]",$p->datelist_closed,['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>'datelist_celebration_textarea_c_0'])}}
                        </div>
                        --}}
                    </div>   
                    <hr>
                    <div class='row'>
                        <div class='col-md-3'>
                            {{Form::label('Date list')}}
                            {{Form::date('','',['class'=>'form-control datelist_selector','id'=>'o_1'])}}
                            {{Form::hidden('prices[datelist]','')}}
                            {{Form::hidden('prices[datelist_closed]','')}}
                            {{Form::textarea("prices[datelist]",$p->datelist,['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>'datelist_textarea_o_1'])}} 
                        </div>
                        <div class='col-md-3'>
                            {{Form::label('Date list Closed')}}
                            {{Form::date('','',['class'=>'form-control datelist_closed_selector','id'=>'c_1'])}}
                            {{Form::textarea("prices[datelist_closed]",$p->datelist_closed,['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>'datelist_closed_textarea_c_1'])}} 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('Adult price')!!}
                                {!!Form::number("prices[adult_price]",$p->adult_price,['class'=>'form-control','placeholder'=>'Adult price','required'=>'required'])!!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!!Form::label('Kids price')!!}
                                {!!Form::number("prices[kids_price]",$p->kids_price,['class'=>'form-control','placeholder'=>'Kids price'])!!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {{Form::label('Currency')}}
                                <select name="prices[currency]" id="" class='form-control'>
                                    <option value="0" @if($p->currency==0) selected @endif>CHF</option>
                                    <option value="1" @if($p->currency==1) selected @endif>EURO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr>
                   
                   
                    <h3>Options</h3>
                    <br/>
                    <div class="row options-row" id="options-row">
                        
                        <select class="form-control" name="prices[selected_option]">
                                <option value="0" >Choose Option</option>
                            @foreach($options as $pOpt)
                                <option value="{{$pOpt->uid}}" @if($pOpt->uid==$p->selected_option) selected @endif>{{$pOpt->title}} @if($pOpt->subtitle) - {{$pOpt->subtitle}}@endif</option>
                            @endforeach
                        </select>
                
                        
                    </div>
                    {{Form::submit('Save Price',['class'=>'btn btn-primary','style'=>'position:fixed; right:30px;top:30px'])}}
                    <a href="javascript:history.back()"><button style='position:fixed; left:400px;top:30px' type='button' class='btn btn-success'><-Back</button></a>
                    {{Form::close()}}
                    @endforeach
                    </div></div></div></div></div>
                   
                </div>
            </body>
    <style>

        .day{
            display: block;
            margin-left:50px;
        }

        #options-row{
            width:350px;
        }

        #datelist_textarea_o_1{
            height:200px;
        }
        #datelist_closed_textarea_c_1{
            height:200px;
        }
        #datelist_celebration_textarea_c_0{
            height:150px;
        }

    </style>
 