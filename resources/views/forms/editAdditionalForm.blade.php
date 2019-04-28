@include('includes/header')
@include('../includes/sidemenu')
<body>
    <div class="wrapper">
     
      <div class="main-panel">
          <div class="content">
              <div class="container-fluid">
                  <div class='row'>
                      <div class='col-md-12'>
          @foreach($additionals as $a)
          <div class="col-md-8 additional-options-{{$a->uid}}" id="additional-options-{{$a->uid}}" style='margin-left:50px'>
              <h4>Edit additional: <b>{{$a->title}}</b></h4>
                  <div class="row">
                    <div class="col-md-12"><b>Hide: </b></div>
                  </div>
                  <div class='row'>
                    <div class="col-md-2">
                        {{-- {{Form::open(['action'=>'updateController@submitEditAdditional'])}} --}}
                        <form action="/admin/submitEditAdditional/" method="POST">
                          {{ csrf_field() }}
                        {{Form::hidden('additionals[hidden]',0)}}
                        {{ Form::checkbox("additionals[hidden]", 1, $a->hidden, ['class' => 'form-check-input','id'=>'credit-check']) }}
                        {{ Form::label('hidden', 'Hide', array('class' => 'form-check-label',)) }}
                        {{Form::hidden('uid',$a->uid)}}
                    </div>
                  </div> 
                  <div class='row'>
                      <div class='col-md-12'><b>Title</b></div>
                  </div>
                  <div class="row">
                      
                    <div class="col-md-5">
                      <div class="form-group">
                        {!!Form::text("additionals[title]",$a->title,['class'=>'form-control','placeholder'=>'Title'])!!}
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        {!!Form::text("additionals[subtitle]",$a->subtitle,['class'=>'form-control','placeholder'=>'Subtitle'])!!}
                      </div>
                    </div>
                  
                  </div>
                  <div class="row">
                      <div class="col-md-12">
                          {{Form::hidden('additionals[hideinsingleview]',0)}}
                        
                          {{ Form::checkbox("additionals[hideinsingleview]", 1, $a->hideinsingleview, ['class' => 'form-check-input','id'=>'credit-check']) }}
                          {{ Form::label('hidden', 'Hide in Single View', array('class' => 'form-check-label',)) }}
                      </div>
                  </div>
                  <div class='row'>
                    <div class='col-md-12'><h3>Prices</h3></div>
                  </div>
                  <div class="row">
                  
                    <div class="col-md-6">
                      <div class="form-group">
                        {{Form::label('Price')}}
                        {!!Form::text("additionals[price]",$a->price,['class'=>'form-control','Price'])!!}
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        {{Form::label('Currency')}}
                        {{Form::select("additionals[currency]",['0' => 'CHF','1' => 'Euro'],'Please Select',['class'=>'form-control'])}}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        {{Form::label('Min people')}}
                        {!!Form::number("additionals[min_persons]",$a->min_persons,['class'=>'form-control','Price'])!!}
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        {{Form::label('Max people')}}
                        {!!Form::number("additionals[max_persons]",$a->max_persons,['class'=>'form-control','Price'])!!}
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class='col-md-12'>
                      <span><b>Specials</b></span>
                    </div>
                  </div>
                  <div class='row'> 
                    <div class="col-md-6">
                        {{Form::hidden('additionals[hideinvaucher]',0)}}
                      
                      {{ Form::checkbox("additionals[hideinvaucher]", 1, $a->hideinvaucher, ['class' => 'form-check-input','id'=>'credit-check']) }}
                      {{ Form::label('hidden', 'Hide in vaucher', array('class' => 'form-check-label',)) }}
                    </div>
                    <div class="col-md-6">
                        {{Form::hidden('additionals[isadditionalnight]',0)}}
                      
                      {{ Form::checkbox("additionals[isadditionalnight]", 1, $a->isadditionalnight, ['class' => 'form-check-input','id'=>'credit-check']) }}
                      {{ Form::label('hidden', 'Is additional night', array('class' => 'form-check-label',)) }}
                    </div>
                  </div>
                  <div class="row options-row-{{$a->uid}}" id="options-row-{{$a->uid}}">
                      <div class='row'>
                          {{Form::submit('Submit edit',['class'=>'btn','style'=>'float:right;background-color:green;color:white'])}}<br/><br/>
                          <a href="javascript:history.back()"><button style='position:fixed; left:400px;top:10px' type='button' class='btn btn-success'><-Back</button></a>
                      </div>
                    </div>
                </div>
                @endforeach