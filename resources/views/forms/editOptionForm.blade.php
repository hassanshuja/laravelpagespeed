<head>
        <script src="//cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
    </head>
    @foreach($data as $d)
    <div class="row options-row" id="options-row">
      <div class="row">
        <div class="col-md-5">
          <div class="form-group">
            {!!Form::text("title",$d->title,['id'=>'eoptionTitle','class'=>'form-control','placeholder'=>'Options Title'])!!}
            {{Form::hidden('uid',$d->uid,['id'=>'eoptionId'])}}
          </div>
        </div>
        <div class="col-md-5">
          <div class="form-group">
            {!!Form::text("subtitle",$d->subtitle,['id'=>'eoptionSubtitle','class'=>'form-control','placeholder'=>'Options Subtitle'])!!}
          </div>
        </div>
      </div>
    </div>
    @endforeach
    