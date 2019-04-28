@include('../includes/header')
@include('../includes/sidemenu')
@foreach($region as $r)
<style>
    .rImage {
        margin-left: 25px;
    }
    </style>
<div class="main-panel">
        <div class="content" style='margin-left:20px;'>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                       
       
                            <div class='col-md-10'>
                                <b style='text-align:center'>Edit region {{$r->title}}</b>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{-- {!! Form::open(['action' => 'updateController@submitEditRegion','method'=>'POST','id'=>"regionForm", 'files' =>true]) !!} --}}
                                    <form action="/admin/submitEditRegion/" method='POST' enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    {!!Form::label('title')!!}
                                    {!!Form::text('title',$r->title,['class'=>'form-control','placeholder'=>'Title'])!!}
                                    {{Form::hidden('uid',$r->uid)}}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!!Form::label('Description')!!}
                                    {!!Form::textarea('description',$r->description,['class'=>'form-control','id'=>'textarea1','placeholder'=>'Region description','rows'=>5])!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!!Form::label('Parent')!!}
                                    {{-- {!!Form::select('parent',$parent+=$data['region'],'Please Select',['class'=>'form-control'])!!} --}}
                                    <select name="parent" id="" class='form-control'>
                                        <option value='0'>No Parent</option>
                                        @foreach($data['region'] as $k=>$v)
                                            <option value="{{$k}}" @if($k==$r->parent) selected @endif>{{$v}}</option>
                                        @endforeach

                                    </select>
                                    
                                </div>
                            </div>
                           
                        </div>
                        {{-- <div class='row'>
                            @if($r->image!='')
                                <img src='/assets/{{$r->image}}' width='100px' height='auto' class="rImage">
                                <button class='btn btn-danger' type='button' onclick='deleteRegionImage({{$r->uid}})'>Delete Image</button>
                            @endif
                        </div> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onclick="regAddNewPhoto()">Change Photo</button>
                                            
                                    <div id="multipleUploadInput" >
                                        <input type="file" id="regionPhotos" style="display:none;" multiple="multiple" />
                                    </div>
                                
                                    <div class="chooseimagesHolder" style="padding-top:5px;width:100%;">
                                            <div class="firstImageHolder">
                                            <img src="{{url('assets/'.$r->image)}}" id="regionImage" >
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                {{Form::label('Region Logo')}}
                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src="{{url('assets/'.$r->image_region)}}" title="meinweekend" alt="meinweekend">
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                {{Form::label('New Logo')}}
                                {{Form::file('logo')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {!!Form::label('Seo')!!}
                                    {!!Form::textarea('seo',$r->seo,['class'=>'form-control','id'=>'textarea2','placeholder'=>'SEO','rows'=>5])!!}
                                </div>
                            </div>
                        </div>
                        {{Form::submit('Submit region edit',['class'=>"btn btn-info btn-fill pull-right"])}}
                        <div class="clearfix"></div>
                    
                    {!! Form::close() !!}
            </div>
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