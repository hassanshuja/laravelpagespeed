<head>
    <script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
</head>
<div class="additional-options-{{$data}}"id="additional-options-{{$data}}">
  <div class='row'>
    <div class="col-md-2">
        {{ Form::checkbox("additionals[$data][hidden]", 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
        {{ Form::label('hidden', 'Hide', array('class' => 'form-check-label',)) }}
    </div>
  </div>
 
  <div class="row">
      
    <div class="col-md-5">
      <div class="form-group">
        {{Form::label('title')}}
        {!!Form::text("additionals[$data][title]",'',['class'=>'form-control','placeholder'=>'Title'])!!}
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        {{Form::label('subtitle')}}
        {!!Form::text("additionals[$data][subtitle]",'',['class'=>'form-control','placeholder'=>'Subtitle'])!!}
      </div>
    </div>
   
  </div>
  <div class="row">
      <div class="col-md-12">
          {{ Form::checkbox("additionals[$data][hideinsingleview]", 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
          {{ Form::label('hideinsingleview', 'Hide in Single View', array('class' => 'form-check-label',)) }}
      </div>
  </div>
  <div class='row'>
    <div class='col-md-12'><h3><b>Prices</b></h3></div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        {{Form::label('Price')}}
        {!!Form::text("additionals[$data][price]",'',['class'=>'form-control','Price'])!!}
      </div>
    </div>
    <div class="col-md-1">
      <div class="form-group">
        {{Form::label('Currency')}}
        {{Form::select("additionals[$data][currency]",['0' => 'CHF','1' => 'Euro'],'Please Select',['class'=>'form-control'])}}
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2">
      <div class="form-group">
        {{Form::label('Min people')}}
        {!!Form::number("additionals[$data][min_persons]",'',['class'=>'form-control','Price'])!!}
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        {{Form::label('Max people')}}
        {!!Form::number("additionals[$data][max_persons]",'',['class'=>'form-control','Price'])!!}
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
      {{ Form::checkbox("additionals[$data][hideinvaucher]", 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
      {{ Form::label('hidden', 'Hide in vaucher', array('class' => 'form-check-label',)) }}
    </div>
    <div class="col-md-6">
      {{ Form::checkbox("additionals[$data][isadditionalnight]", 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
      {{ Form::label('isadditionalnight', 'Is additional night', array('class' => 'form-check-label',)) }}
    </div>
  </div>
  
  <br/>
    <div class="row">
      <div class="col-md-3">
          <button type="button"id="buttonii" class="btn btn-primary btn-block" onclick="createAdditional()">Add another additional</button>
      </div>
      <div class="col-md-3">
        <button type="button"id="buttonii" class="btn btn-danger btn-block" onclick="removeAdditional({{$data}})">Delete additional</button>
      </div>
    </div>
 
</div>

