<!doctype html>
<html lang="en">

    @include("includes/header")
    <style media="screen">
        #price-options{
            transition: all 1s;
        }
    </style>
<body>
        <div id="imageModal" class="modal">

                <!-- The Close Button -->
                <span class="close" onclick="closeImgModal()" >&times;</span>
              
                <!-- Modal Content (The Image) -->
                <img class="modal-content">
              
                <!-- Modal Caption (Image Text) -->
                <div id="caption"></div>
              </div>
		<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
			  
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Add Options</h4>
					</div>
					<div id="optionHolder" class="modal-body">
					  <p>Some text in the modal.</p>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal" onClick="submitOption()">Submit</button>
					</div>
				  </div>
			  
				</div>
              </div>
              <div id="editOption" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Add Options</h4>
                        </div>
                        <div id="editOptionHolder" class="modal-body">
                          <p>Some text in the modal.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal" onClick="submitEditOption()">Submit</button>
                        </div>
                      </div>
                  
                    </div>
                  </div>
    {{-- {{Form::open(['action' => 'updateController@submitEditOffer', 'files' =>true]) }} --}}
    <form action="/admin/submitEditOffer/" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
	<div class="wrapper">
	    @include("includes/sidemenu")
		<div class="main-panel">
            <div class="content">
                <div class="container-fluid myContainer">
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="card tabbsSteps">
                                @foreach($offer as $d)
                                    <div class="header">
                                        <h4>Edit Offer: <b>{{$d->title}}</b></h4>
                                    </div>
                                    <input type="hidden" id="eOfferUid" value="{{$d->uid}}"/>
                                    <ul class="nav nav-tabs">
                                        {{-- @php
                                        $imgT=0;
                                        $tabInactive="";
                                        $tabSwich=0;
                                        $tabActive="active show";
                                        if(isset($_GET['tabChange']))
                                        {
                                            if($_GET['tabChange']==1)
                                            {
                                                $tabSwich=1;
                                                $tabActive="";
                                                $tabInactive="active show";
                                                $imgT=1;

                                            }

                                            //echo "image tab".$_GET['imagesCH'];
                                        }
                                        @endphp --}}
                                        <li class="active show"><a data-toggle="tab" href="#home" class="btn btn-info home tabMenu" tabData='home' role="button" onClick="saveTab('home')">General</a></li>
                                        <li><a data-toggle="tab"  href="#menu1" class="btn btn-info menu1 tabMenu" tabData='menu1' role="button" onClick="saveTab('menu1')">Related Offers</a></li>
                                        <li><a data-toggle="tab" id="myCheck1" href="#menu2" class="btn btn-info menu2 tabMenu" tabData='menu2' role="button" onClick="saveTab('menu2')">Images</a></li>
                                        <li><a data-toggle="tab" href="#menu3" class="btn btn-info menu3 tabMenu" role="button" tabData='menu3' onClick="saveTab('menu3')">Categories & Regions</a></li>
                                        <li><a data-toggle="tab" href="#menu4" class="btn btn-info menu4 tabMenu" role="button" tabData='menu4' onClick="saveTab('menu4')">Terms of payment</a></li>
                                        <li><a data-toggle="tab" href="#menu5" class="btn btn-info menu5 tabMenu" role="button" tabData='menu5' onClick="saveTab('menu5')">Package</a></li>
                                        <li><a data-toggle="tab" href="#menu6" class="btn btn-info menu6 tabMenu" role="button" tabData='menu6' onClick="saveTab('menu6')">Expanded Options</a></li>
                                    </ul>
                                    <div class="tab-content">
					 <input id='tab-name' type="hidden" name='entered_tab' value="">
                                        <div id="home" class="tab-pane fade in">
                                            <div class="container-fluid">
                                               <div class="row">
                                                    <div class="col-md-12">
                                                            <h3>General</h3>
                                                        <div class="form-group">
                                                            {{Form::label('Title')}}
                                                            {{Form::text('title',$d->title,['class'=>'form-control home','placeholder'=>'Title'])}}
                                                            {{Form::hidden('uid',$d->uid)}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Title Tag')}}
                                                            {{Form::text('title_tag',$d->title_tag,['class'=>'form-control home','placeholder'=>'Title Tag'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Tour Operator')}}
                                                            
                                                            <select name="touroperator" id="" class='form-control home'>
                                                                <option value="0" selected>No touroperator</option>
                                                                @foreach($data['tourOperators'] as $k=>$v)
                                                                    <option value="{{$k}}" @if($k==$d->touroperator) selected @endif>{{$v}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Address')}}
                                                            {{Form::text('address',$d->address,['class'=>'form-control home','placeholder'=>'Address'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('List status')}}
                                                            {{Form::textarea('list_status',$d->list_status,['class'=>'form-control home','id'=>'textarea1','data-provide'=>'markdown','placeholder'=>'List status','rows'=>5])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('List subtitle')}}
                                                            {{Form::textarea('list_subtitle',$d->list_subtitle,['class'=>'form-control home','id'=>'textarea2','data-provide'=>'markdown','placeholder'=>'List subtitle','style'=>'resize:none;','rows'=>5])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Subtitle')}}
                                                            {{Form::textarea('subtitle',$d->subtitle,['class'=>'form-control home','id'=>'textarea3','data-provide'=>'markdown','placeholder'=>'Subtitle','style'=>'resize:none;','rows'=>4])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Meta description')}}
                                                            {{Form::textarea('meta_description',$d->meta_description,['class'=>'form-control home','id'=>'textarea4','data-provide'=>'markdown','placeholder'=>'Meta description','style'=>'resize:none;','rows'=>3])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Body Text')}}
                                                            {{Form::textarea('bodytext',$d->bodytext,['class'=>'form-control home','id'=>'textarea5','data-provide'=>'markdown','placeholder'=>'Body Text','style'=>'resize:none;','rows'=>4])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Additional Information')}}
                                                            {{Form::textarea('informacion',$d->informacion,['class'=>'form-control home','id'=>'textarea6','data-provide'=>'markdown','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Additional Information (Booking Confirmation)')}}
                                                            {{Form::textarea('informacion_confirmation',$d->informacion_confirmation,['class'=>'form-control home','id'=>'textarea7','data-provide'=>'markdown','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Included')}}
                                                            {{Form::textarea('included',$d->included,['class'=>'form-control home','id'=>'textarea8','data-provide'=>'markdown','placeholder'=>'Included','rows'=>5])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            <div class="container-fluid">
                                                <div class='row'>
                                                    <div class='col-md-8'>
                                                        <hr>
							
                                                        <h3>Related Offers</h3>
                                                        <label for="">Search For related offers</label>
                                                        <input type="text"   placeholder="Search For Related Offers" autocomplete="off" name="" onkeyup='search_ro(event)' id="search_related_categories" class='form-control'/>
                                                        <ul class='list-group' id='dropdown-list'></ul>
                                                        {{Form::label('Selected related items')}}
                                                        {{Form::hidden('related[]','')}}
                                                        <ul id='seleted-offers' class='list-group'>
                                                            @foreach($related as $r)
                                                                <li id='listItem{{$r->uid}}' class='list-group-item'>
                                                                    <input name='related[]' checked='true' type='checkbox' value='{{$r->uid}}' class=""/>{{$r->title}}
                                                                    <button type='button' class='btn btn-danger btn-xs right' onclick='removeItemFromList({{$r->uid}})'>Remove</button>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="menu2" class="tab-pane fade">
                                            <div class="container-fluid">
                                                    <div class="row">
                                                            <div class="col-md-4">
                                                                <h3>Images ({{count($images)}})</h3>
                                                                <div class="form-group">
                                                                    {{Form::label('Image')}}
                                                                    <ul class='list-group list-group-flush col-md-12'>
                                                                    <table class='table'>
                                                                        @foreach($images as $i)
                                                                        
                                                                            <tr id='image_{{$i->uid}}'>
                                                                                <td>
                                                                                    <img src='/assets/img/{{$i->image}}' width='100' height="auto" id="imageZ_{{$i->uid}}" onclick="showModalImage({{$i->uid}})"/><br/>
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" style='width:400px' id='image_desc_{{$i->uid}}' placeholder='description' value='{{$i->title}}'/>
                                                                                </td>
                                                                                <td>
                                                                                    <button type='button' onclick='saveDescription({{$i->uid}})'>Save</button>
                                                                                </td>
                                                                                <td>
                                                                                    @if(count($images)>1)
                                                                                        @if($loop->first)
                                                                                            <button disabled="disabled">▲</button>
                                                                                            <button type='button' onclick="imageRankDown({{$i->uid}},{{$images[$loop->index+1]->uid}}))">▼</button>
                                                                                        @elseif($loop->last)
                                                                                        <button type='button' onclick="imageRankUp({{$i->uid}},{{$images[$loop->index-1]->uid}})">▲</button>
                                                                                            <button type='button' disabled="disabled">▼</button>
                                                                                        @else
                                                                                            <button type='button' onclick="imageRankUp({{$i->uid}},{{$images[$loop->index-1]->uid}})">▲</button>
                                                                                            <button type='button' onclick="imageRankDown({{$i->uid}},{{$images[$loop->index+1]->uid}})">▼</button>
                                                                                        @endif
                                                                                    @endif
                                                                                
                
                                                                                </td>  
                                                                                <td>  
                                                                                    <button type="button" class='btn-xs btn cutButton' onClick="cutItemImg({{$i->uid}})">Cut</button>
                                                                                    <button type="button" class='btn-xs btn shiftButton' onClick="pasteItemImg({{$i->uid}})">Shift Down</button>
                                                                                    <button type="button" class='btn-xs btn cancelButton' id="itemCancelP_{{$i->uid}}" onClick="cancelMoveItemImg({{$i->uid}})">Cancel</button>
                                                                                </td>  
                                                                                <td>
                                                                                    @if($i->hidden==0)
                                                                                        <button type='button' class='btn btn-warning' onclick='imageAction({{$i->uid}},"Hide")'>Hide</button>
                                                                                    @else 
                                                                                        <button type='button' class='btn btn-primary' onclick='imageAction({{$i->uid}},"unHide")'>Un Hide</button>

                                                                                    @endif
                                                                                    <td>
                                                                                        <button type='button' class='btn btn-danger' onClick="imageAction({{$i->uid}},'delete')">Delete</button>
                                                                                    </td>
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </table>
                                                                
                                                                    <button type="button" class="btn btn-primary btn-block" onclick="addNewPhoto()">Add Photos</button>
                                                                                        {{-- {!!Form::label('Image')!!} --}}
                                                                                        {{-- {{Form::file('picture[]',['style'=>'display:block','multiple'=>'multiple','id'=>'offerPhotos'])}} --}}
                                                                                        <div id="multipleUploadInput" >
                                                                                            <input type="file" id="offerPhotos" style="display:none;" multiple="multiple" />
                                                                                        </div>
                                                                                    <table id="imageTableOffer" class='table'>
                                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        <div id="menu3" class="tab-pane fade">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <h3>Categories & Regions</h3>
							{{Form::label('Categories')}}
                                                        <div class="form-group">
                                                            {{-- {{Form::select('categories',$category+=$data['category'],null,['class'=>'form-control'],[],count($category))}} --}}
                                                            <select name='categories[]' class='form-control menu3' id='category-multiselect' multiple='true'>
                                                                @foreach($data['categories'] as $dd)
                                                                    <optgroup label="{{$dd->title}}">
                                                                        @foreach($dd->subCategories as $sc)
                                                                            <optgroup label="{{$sc->title}}">
                                                                                @foreach($selected_categories as $t)
                                                                                    @if($t['parent']==$sc->uid)
                                                                                        <option value="{{$t['uid']}}" @if($t['selected']==1)selected @endif>{{$t['title']}}</option>
                                                                                    @endif
                                                                                @endforeach
                                                                            </optgroup>
                                                                        @endforeach
                                                                    </optgroup>
                                                                @endforeach
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
							{{Form::label('Region')}}
                                                        <div class="form-group">
                                                            <select name='regions[]' class='form-control menu3' id='region-multiselect' multiple='multiple'>
                                                                @foreach($selected_regions as $r)
                                                                    @if($r['selected']==1)
                                                                        <option value="{{$r['uid']}}" selected='true' class='active'>{{$r['title']}}</option>
                                                                    @else
                                                                        <option value={{$r['uid']}}>{{$r['title']}}</option>
                                                                    @endif
                                                                
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="menu4" class="tab-pane fade">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Terms of payment</h3>
                                                        <div class="form-check">
                                                            {{Form::hidden('creditcard_required',0)}}
                                                            {{ Form::checkbox('creditcard_required',1 , $d->creditcard_required, ['class menu4' => 'form-check-input','id'=>'credit-check']) }}
                                                            {{ Form::label('creditcard_required', 'Credit Card required', array('class' => 'form-check-label',)) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Terms of payment')}}
                                                            {{Form::textarea('terms',$d->terms,['class'=>'form-control menu4','id'=>'textarea9','placeholder'=>'Terms of payment','rows'=>5,'style'=>'resize:none'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {{Form::label('Terms of cancellation')}}
                                                            {{Form::textarea('cancellationterms',$d->cancellationterms,['class'=>'form-control menu4','id'=>'textarea10','placeholder'=>'Terms of cancellation','rows'=>5,'style'=>'resize:none'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="menu5" class="tab-pane fade">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Package</h3>
                                                        <div class="form-group">
                                                            {{Form::label("Unit By Price (default 'per person')")}}
                                                            {{Form::text('price_unit_text',$d->price_unit_text,['class'=>'form-control menu5','placeholder'=>'Unit Price'])}}
                                                        </div>
                                                        <div class="form-group">
                                                            {{Form::label("Unit per service")}}
                                                            {{Form::text('included_unit_text',$d->included_unit_text,['class'=>'form-control menu5','placeholder'=>'Unit Price'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{Form::label('Min people')}}
                                                            {{Form::number('min_persons',$d->min_persons,['class'=>'form-control menu5','placeholder'=>'Min people'])}}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {{Form::label('Max people')}}
                                                            {{Form::number('max_persons',$d->max_persons,['class'=>'form-control menu5','placeholder'=>'Max people'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                                @foreach($person_type as $p)
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                {{ Form::radio('person_type', $p['index'], $p['selected'], ['class' => 'form-check-input menu5']) }}
                                                                {{ Form::label('', $p['name'], array('class' => 'form-check-label',)) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class="form-group">
                                                            {{Form::label("Person type text (if you have choosen 'Without Name' on checkboxes)")}}
                                                            {{Form::text('person_type_text',$d->person_type_text,['class'=>'form-control menu5','placeholder'=>'Unit Price'])}}
                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {{Form::label('days')}}
                                                        {{Form::number('day',$d->day,['class'=>'form-control menu5','placeholder'=>'Days'])}}
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        {{Form::label('nights')}}
                                                        {{Form::number('night',$d->night,['class'=>'form-control menu5','placeholder'=>'Nights'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        {{Form::label('Price information')}}
                                                        {{Form::textarea('priceinfo',$d->priceinfo,['class'=>'form-control menu5','id'=>'textarea11','placeholder'=>'Price information','rows'=>3,'style'=>'resize:none'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        {{Form::hidden('hasgroupoffer',0)}}
                                                        {{ Form::checkbox('hasgroupoffer', 1,$d->hasgroupoffer, ['class' => 'form-check-input menu5','id'=>'credit-check']) }}
                                                        {{ Form::label('hasgroupoffer', 'Group requests', array('class' => 'form-check-label',)) }}
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="formgroup">
                                                        {{Form::label('group offer title')}}
                                                        {{Form::text('groupoffertitle',$d->groupoffertitle,['class'=>'form-control','placeholder menu5'=>'Group offer title'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div id='prices'></div>
                                                    <h3>Options: ({{count($options)}})</h3>
                                                    <table class='table'>
                                                        <tr><th>Option Title</th><th>Option Subtitle</th><th>Edit</th></tr>
                                                        @foreach($options as $opt)
                                                            <tr id="o_{{$opt->uid}}">    
                                                                <td>{{$opt->title}}</td>
                                                                <td>{{$opt->subtitle}}</td>
                                                                <td>
                                                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editOption" onclick="editOption({{$opt->uid}})">Edit Option</button>
                                                                </td>
                                                            </tr>    
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" onclick="createOption()">+ Add Option</button>                                </div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-md-12'>
                                                    <div id='prices'></div>
                                                <h3>Prices: ({{count($prices)}})</h3>
                                                <table class='table'>
                                                    <tr><th>Price title</th><th>Option</th><th>Subtitle</th><th>adult price</th><th>Hidden</th><th>*</th><th>*</th><th>*</th></tr>
                                                    @foreach($prices as $p)
                                                        <tr id={{$p->uid}}>    
                                                            <td>{{$p->title}}</td>
                                                            <td>{{$p->otitle}}</td>
                                                            <td>@if($p->subtitle){{$p->subtitle}}@endif</td>
                                                            <td>{{$p->adult_price}}</td>
                                                            <td>{{$p->hidden}}</td>
                                                            <td>
                                                                @if($loop->index==0)
                                                                    <button class='btn-xs btn disabled' id="{{$p->uid}}" >▲</button>
                                                                @else
                                                                    <button class='btn-xs btn' type='button' id="{{$p->uid}}" onclick='priceRankUp({{$d->uid}},{{$prices[$loop->index-1]->uid}})'>▲</button>
                                                                @endif
                                                                @if($loop->last)
                                                                    <button class='btn-xs btn disabled' id="{{$p->uid}}">▼</button>
                                                                @else
                                                                    <button class='btn-xs btn'  type='button' id="{{$p->uid}}" onclick='priceRankDown({{$p->uid}},{{$prices[$loop->index+1]->uid}})'>▼</button>
                                                                @endif
                                                            </td>
                                                            <td><a href="/admin/getEditPriceForm/{{$p->uid}}">Edit</a></td>
                                                            @if($p->hidden==1)
                                                                <td><button type='button' class='btn btn-primary' onclick="priceAction({{$p->uid}},'unHide')">Un Hide</button></td>
                                                            @elseif($p->hidden==0)
                                                                <td><button type='button' class='btn btn-warning' onclick="priceAction({{$p->uid}},'hide')">Hide</button></td>
                                                            @endif
                                                            @if($p->deleted==1)
                                                                <td><button type='button' class='btn btn-success' onclick="priceAction({{$p->uid}},'unDelete')">Un-Delete</button></td>
                                                            @elseif($p->deleted==0)
                                                                <td><button type='button' class='btn btn-danger' onclick="priceAction({{$p->uid}},'delete')">Delete</button></td>
                                                            @endif
                                                                <td>
                                                                        <button type="button" class='btn-xs btn cutButton' onClick="cutItemPri({{$p->uid}})">Cut</button>
                                                                        <button type="button" class='btn-xs btn pasteButton' onClick="pasteItemPri({{$p->uid}})">Shift Down</button>
                                                                        <button type="button" class='btn-xs btn cancelButton' id="itemCancelP_{{$p->uid}}" onClick="cancelMoveItemPri({{$p->uid}})">Cancel</button>
                                                                </td>
                                                        </tr>    
                                                    @endforeach
                                                </table>
                                            </div>
                                        </div>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-primary btn-block" onclick="addDiv()">+ Add price</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-12">
                                        <div class="price-options" id="price-options">
                            
                                        </div>
                                        <div class="adiv-price-options" id="another-price-options">
                                
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-12">
                                                        <div id='additionals'></div>
                                                        <h3>Additionals: ({{count($additionals)}})</h3>
                                        <table class='table'>
                                            <tr><th>title</th><th>Price</th><th>*</th><th>*</th><th>*</th></tr>
                                            @foreach($additionals as $a)
                                                <tr id='{{$a->uid}}'>    
                                                    <td>{{$a->title}}</td>
                                                    <td>{{$a->price}}</td>
                                                   
                                                    <td>
                                                        @if($loop->index==0)
                                                            <button class='btn-xs btn disabled' id="{{$a->uid}}">▲</button>
                                                        @else
                                                            <button class='btn-xs btn' type='button' id="{{$a->uid}}" onclick='additionalRankUp({{$a->uid}},{{$additionals[$loop->index-1]->uid}})'>▲</button>
                                                        @endif
                                                        @if($loop->last)
                                                            <button class='btn-xs btn disabled' id="{{$a->uid}}">▼</button>
                                                        @else
                                                            <button class='btn-xs btn'  type='button' id="{{$a->uid}}" onclick='additionalRankDown({{$a->uid}},{{$additionals[$loop->index+1]->uid}})'>▼</button>
                                                        @endif
                                                    </td>   
                                                    <td><a href="/admin/getEditAdditionalsForm/{{$a->uid}}">Edit</a></td>
                                                    @if($a->hidden==1)
                                                        <td><button type='button' class='btn btn-primary' onclick="additionalAction({{$a->uid}},'unHide')">UnHide</button></td>
                                                    @elseif($a->hidden==0)
                                                        <td><button type='button' class='btn btn-warning' onclick="additionalAction({{$a->uid}},'hide')">Hide</button></td>
                                                    @endif
                                                    @if($a->deleted==1)
                                                        <td><button type='button' class='btn btn-success' onclick="additionalAction({{$a->uid}},'unDelete')">UnDelete</button></td>
                                                    @else
                                                        <td><button type='button' class='btn btn-danger' onclick="additionalAction({{$a->uid}},'delete')">Delete</button></td>
                                                    @endif
                                                    <td>
                                                            <button type="button" class='btn-xs btn cutButton' onClick="cutItemAddi({{$a->uid}})">Cut</button>
                                                            <button type="button" class='btn-xs btn pasteButton' onClick="pasteItemAddi({{$a->uid}})">Shift Down</button>
                                                            <button type="button" class='btn-xs btn cancelButton' id="itemCancelP_{{$a->uid}}" onClick="cancelMoveItemAddi({{$a->uid}})">Cancel</button>
                                                    </td>
                                                </tr>   
                                            @endforeach
                                            </table>
                                             </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-primary btn-block" onclick="createAdditional()">+ Add additional</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        {{Form::label('Start Date')}}
                                                        {{Form::date('starttime',\Carbon\Carbon::createFromTimeStamp($d->starttime),['class'=>'form-control'])}}
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        {{Form::label('End Date')}}
                                                        {{Form::date('endtime',\Carbon\Carbon::createFromTimeStamp($d->endtime),['class'=>'form-control'])}}
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        <div id="menu6" class="tab-pane fade">
                                            <div class="container-fluid">
                                                    <div class="row">
                                                            <div class="col-md-12">
                                                                    <a id='about'></a>
                                                                <h3>Expanded Options</h3>
                                                        
                                                                <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            {{Form::hidden('hasspeciallistsettings',0)}}
                                                                            {{ Form::checkbox('hasspeciallistsettings', 1, $d->hasspeciallistsettings, ['class' => 'form-check-input menu6']) }}
                                                                            {{ Form::label('special-list', 'Use special list settings', array('class' => 'form-check-label',)) }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            {{Form::label('Special list type')}}
                                                                            {{ Form::text('special_list_person_type_text', $d->special_list_person_type_text, ['class' => 'form-control menu6']) }}
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            {{Form::label('Adult Price')}}
                                                                            {{ Form::text('special_list_price', $d->special_list_price, ['class' => 'form-control menu6']) }}
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            {{Form::label('Min Persons')}}
                                                                            {{ Form::text('special_list_min_persons', $d->special_list_min_persons, ['class' => 'form-control menu6']) }}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    @foreach($person_type2 as $p2)
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    {{ Form::radio('special_list_person_type', $p2['index'], $p2['selected'], ['class' => 'form-check-input menu6']) }}
                                                                                    {{ Form::label('', $p2['name'], array('class' => 'form-check-label',)) }}
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            {{Form::label('Vaucher text')}}
                                                                            {{Form::textarea('vauchertext',$d->vauchertext,['class'=>'form-control menu6','id'=>'textarea12','placeholder'=>'Vaucher text','style'=>'resize:none;','rows'=>3])}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    @if(isset($_GET['activeTab']))
                                        <script>
                                            $('#{{$_GET["activeTab"]}}').addClass('active show');
                                            $('.{{$_GET["activeTab"]}}').addClass('active show');
                                        </script>
                                    @else
                                        <script>
                                            $('#home').addClass('active show');
                                            $('.home').addClass('active show');
                                        </script>
                                    @endif
                                    </div>
                                    </div>
                                    <div class="container-fluid">
                                <script type="text/javascript">
                                    var inc=1;
                                    function showElements(){
                                        var x = document.getElementById('price-options');
                                        x.style.display='block';
                                    }
                        
                                    function addDiv() {
                                        var itm = $("#price-options");
                                        var oId="{{$d->uid}}";
                                        var pr=$('div#another-price-options');

                                        $.ajax({
                                            method:'GET',
                                            dataType : 'html',
                                            url:'/admin/getPricesForm/'+oId,
                                            success:function(data){
                                                pr.append(data);
                                                inc++;
                                            }
                                        });
                                    }
                                    function removeDiv(id) {
                                        var name='price-options-'+id;
                                        var elem = document.getElementById(name);
                                        console.log(elem);
                                        elem.parentNode.removeChild(elem);
                                        inc--;
                                    }
                                </script>
                                <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12">
                                <div class="additional-options"id="additional-options">
                    
                                </div>
                                <br/><br/>
                                <script type="text/javascript">
                                    var inc=1;
                                    function createAdditional() {
                                        var itm = $("#additional-options");
                        
                                        var pr=$('div#additional-options');
                                        $.ajax({
                                            method:'GET',
                                            dataType : 'html',
                                            url:'/admin/getAdditionalsForm/'+inc,
                                            success:function(data){
                                                pr.append(data);
                                                inc++;
                                            }
                                        });
                                    }
                                    function removeAdditional(id) {
                                        var name='additional-options-'+id;
                                        var elem = document.getElementById(name);
                                        console.log(elem);
                                        elem.parentNode.removeChild(elem);
                                        inc--;
                                    }
                                </script>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            {{Form::submit('Submit Changes',['class'=>"btn btn-info btn-fill pull-right"])}}
                        </div>
                        <a href="javascript:history.back()"><button style='position:fixed; left:300px;top:10px' type='button' class='btn btn-success'><-Back</button></a>
                        @endforeach            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{Form::close()}}
    </div>
</div>



</body>
<script>
function saveDescription(id){
    var msg=$('#image_desc_'+id).val();
    var crf=$('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/admin/saveImageDescription/',
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': crf
          },
        data:{"id":id,"msg":msg}
    }).done(function(data){
        console.log(data);
    }).fail(function(data){
        console.log(data);
    });

}


</script>
<!--   Core JS Files   -->
<script src="/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/js/bootstrap-multiselect.js" type="text/javascript"></script>
<link href="/css/bootstrap-multiselect.css" rel="stylesheet" />
{{-- <script src="/js/bootstrap-multiselect.js" type="text/javascript"></script>
<link href="/css/bootstrap-multiselect.css" rel="stylesheet" /> --}}
<!--  Charts Plugin -->
<script src="/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/js/bootstrap-notify.js"></script>


<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="/js/demo.js"></script>
<script>

$(".tabMenu").on('click', function(event){

	$('#tab-name').val($(this).attr('tabData'));
})
 //document.getElementById("myCheck1").click()
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
    CKEDITOR.replace('textarea5',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    
    CKEDITOR.replace('textarea6',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
	CKEDITOR.replace('textarea7',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea8',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea9',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea10',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea11',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea12',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
   

//     var modal = document.getElementById('imageModal');

// // Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = modal.getElementById('myImg');
// var modalImg = modal.getElementById("img01");
// var captionText = modal.getElementById("caption");
// img.onclick = function(){
//     modal.style.display = "block";
//     modalImg.src = this.src;
//     captionText.innerHTML = this.alt;
// }

// Get the <span> element that closes the modal
// var span = document.getElementsByClassName("close")[0];

// // When the user clicks on <span> (x), close the modal
// span.onclick = function() { 
//   modal.style.display = "none";
// }
</script>
</html>

<style>

        .multiselect-container.dropdown-menu {
            min-width: 325px !important;
        }
        .related-offer-pointer{
            cursor:pointer;
        }
        .related-offer-pointer:hover{
            background: lightblue;
        }
        .right{
            float:right;
        }
        #seleted-offers{
            border:1px solid lightgray; 
            min-height:50px;
            border-radius: 2px;
        }
        #category-multiselect{
            height:500ox;
        }
        #region-multiselect{
            height:500px;
        }
        /* .shiftButton{
            display:none;
        } */
        /* .pasteButton {
            display: none;
        } */
        /* .cancelButton {
            display: none;
        } */
        .cutButton {
            display: inline-block;
        }
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000000000; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
       
    </style>