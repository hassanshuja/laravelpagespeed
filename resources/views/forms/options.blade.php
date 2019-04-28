<head>
    <script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
</head>
<div class="row options-row" id="options-row">
  <div class="row">
    <div class="col-md-5">
      <div class="form-group">
        {!!Form::text("title",'',['id'=>'optionTitle','class'=>'form-control','placeholder'=>'Options Title'])!!}
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
        {!!Form::text("subtitle",'',['id'=>'optionSubtitle','class'=>'form-control','placeholder'=>'Options Subtitle'])!!}
      </div>
    </div>
    <div class="col-md-2">
      {{ Form::checkbox("hidden", 1, null, ['class' => 'form-check-input','id'=>'credit-check']) }}
      {{ Form::label('hidden', 'Hide', array('class' => 'form-check-label',)) }}
    </div>
  </div>
</div>
