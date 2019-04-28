<!doctype html>
<html lang="en">

    <?php echo $__env->make("includes/header", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
    
    <form action="/admin/submitEditOffer/" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

	<div class="wrapper">
	    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<div class="main-panel">
            <div class="content">
                <div class="container-fluid myContainer">
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="card tabbsSteps">
                                <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="header">
                                        <h4>Edit Offer: <b><?php echo e($d->title); ?></b></h4>
                                    </div>
                                    <input type="hidden" id="eOfferUid" value="<?php echo e($d->uid); ?>"/>
                                    <ul class="nav nav-tabs">
                                        
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
                                                            <?php echo e(Form::label('Title')); ?>

                                                            <?php echo e(Form::text('title',$d->title,['class'=>'form-control home','placeholder'=>'Title'])); ?>

                                                            <?php echo e(Form::hidden('uid',$d->uid)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Title Tag')); ?>

                                                            <?php echo e(Form::text('title_tag',$d->title_tag,['class'=>'form-control home','placeholder'=>'Title Tag'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Tour Operator')); ?>

                                                            
                                                            <select name="touroperator" id="" class='form-control home'>
                                                                <option value="0" selected>No touroperator</option>
                                                                <?php $__currentLoopData = $data['tourOperators']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option value="<?php echo e($k); ?>" <?php if($k==$d->touroperator): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Address')); ?>

                                                            <?php echo e(Form::text('address',$d->address,['class'=>'form-control home','placeholder'=>'Address'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('List status')); ?>

                                                            <?php echo e(Form::textarea('list_status',$d->list_status,['class'=>'form-control home','id'=>'textarea1','data-provide'=>'markdown','placeholder'=>'List status','rows'=>5])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('List subtitle')); ?>

                                                            <?php echo e(Form::textarea('list_subtitle',$d->list_subtitle,['class'=>'form-control home','id'=>'textarea2','data-provide'=>'markdown','placeholder'=>'List subtitle','style'=>'resize:none;','rows'=>5])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Subtitle')); ?>

                                                            <?php echo e(Form::textarea('subtitle',$d->subtitle,['class'=>'form-control home','id'=>'textarea3','data-provide'=>'markdown','placeholder'=>'Subtitle','style'=>'resize:none;','rows'=>4])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Meta description')); ?>

                                                            <?php echo e(Form::textarea('meta_description',$d->meta_description,['class'=>'form-control home','id'=>'textarea4','data-provide'=>'markdown','placeholder'=>'Meta description','style'=>'resize:none;','rows'=>3])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Body Text')); ?>

                                                            <?php echo e(Form::textarea('bodytext',$d->bodytext,['class'=>'form-control home','id'=>'textarea5','data-provide'=>'markdown','placeholder'=>'Body Text','style'=>'resize:none;','rows'=>4])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Additional Information')); ?>

                                                            <?php echo e(Form::textarea('informacion',$d->informacion,['class'=>'form-control home','id'=>'textarea6','data-provide'=>'markdown','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Additional Information (Booking Confirmation)')); ?>

                                                            <?php echo e(Form::textarea('informacion_confirmation',$d->informacion_confirmation,['class'=>'form-control home','id'=>'textarea7','data-provide'=>'markdown','placeholder'=>'Additional Information','style'=>'resize:none;','rows'=>3])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Included')); ?>

                                                            <?php echo e(Form::textarea('included',$d->included,['class'=>'form-control home','id'=>'textarea8','data-provide'=>'markdown','placeholder'=>'Included','rows'=>5])); ?>

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
                                                        <?php echo e(Form::label('Selected related items')); ?>

                                                        <?php echo e(Form::hidden('related[]','')); ?>

                                                        <ul id='seleted-offers' class='list-group'>
                                                            <?php $__currentLoopData = $related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li id='listItem<?php echo e($r->uid); ?>' class='list-group-item'>
                                                                    <input name='related[]' checked='true' type='checkbox' value='<?php echo e($r->uid); ?>' class=""/><?php echo e($r->title); ?>

                                                                    <button type='button' class='btn btn-danger btn-xs right' onclick='removeItemFromList(<?php echo e($r->uid); ?>)'>Remove</button>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="menu2" class="tab-pane fade">
                                            <div class="container-fluid">
                                                    <div class="row">
                                                            <div class="col-md-4">
                                                                <h3>Images (<?php echo e(count($images)); ?>)</h3>
                                                                <div class="form-group">
                                                                    <?php echo e(Form::label('Image')); ?>

                                                                    <ul class='list-group list-group-flush col-md-12'>
                                                                    <table class='table'>
                                                                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        
                                                                            <tr id='image_<?php echo e($i->uid); ?>'>
                                                                                <td>
                                                                                    <img src='/assets/img/<?php echo e($i->image); ?>' width='100' height="auto" id="imageZ_<?php echo e($i->uid); ?>" onclick="showModalImage(<?php echo e($i->uid); ?>)"/><br/>
                                                                                </td>
                                                                                
                                                                                <td>
                                                                                    <input type="text" style='width:400px' id='image_desc_<?php echo e($i->uid); ?>' placeholder='description' value='<?php echo e($i->title); ?>'/>
                                                                                </td>
                                                                                <td>
                                                                                    <button type='button' onclick='saveDescription(<?php echo e($i->uid); ?>)'>Save</button>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if(count($images)>1): ?>
                                                                                        <?php if($loop->first): ?>
                                                                                            <button disabled="disabled">▲</button>
                                                                                            <button type='button' onclick="imageRankDown(<?php echo e($i->uid); ?>,<?php echo e($images[$loop->index+1]->uid); ?>))">▼</button>
                                                                                        <?php elseif($loop->last): ?>
                                                                                        <button type='button' onclick="imageRankUp(<?php echo e($i->uid); ?>,<?php echo e($images[$loop->index-1]->uid); ?>)">▲</button>
                                                                                            <button type='button' disabled="disabled">▼</button>
                                                                                        <?php else: ?>
                                                                                            <button type='button' onclick="imageRankUp(<?php echo e($i->uid); ?>,<?php echo e($images[$loop->index-1]->uid); ?>)">▲</button>
                                                                                            <button type='button' onclick="imageRankDown(<?php echo e($i->uid); ?>,<?php echo e($images[$loop->index+1]->uid); ?>)">▼</button>
                                                                                        <?php endif; ?>
                                                                                    <?php endif; ?>
                                                                                
                
                                                                                </td>  
                                                                                <td>  
                                                                                    <button type="button" class='btn-xs btn cutButton' onClick="cutItemImg(<?php echo e($i->uid); ?>)">Cut</button>
                                                                                    <button type="button" class='btn-xs btn shiftButton' onClick="pasteItemImg(<?php echo e($i->uid); ?>)">Shift Down</button>
                                                                                    <button type="button" class='btn-xs btn cancelButton' id="itemCancelP_<?php echo e($i->uid); ?>" onClick="cancelMoveItemImg(<?php echo e($i->uid); ?>)">Cancel</button>
                                                                                </td>  
                                                                                <td>
                                                                                    <?php if($i->hidden==0): ?>
                                                                                        <button type='button' class='btn btn-warning' onclick='imageAction(<?php echo e($i->uid); ?>,"Hide")'>Hide</button>
                                                                                    <?php else: ?> 
                                                                                        <button type='button' class='btn btn-primary' onclick='imageAction(<?php echo e($i->uid); ?>,"unHide")'>Un Hide</button>

                                                                                    <?php endif; ?>
                                                                                    <td>
                                                                                        <button type='button' class='btn btn-danger' onClick="imageAction(<?php echo e($i->uid); ?>,'delete')">Delete</button>
                                                                                    </td>
                                                                                </td>
                                                                            </tr>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </table>
                                                                
                                                                    <button type="button" class="btn btn-primary btn-block" onclick="addNewPhoto()">Add Photos</button>
                                                                                        
                                                                                        
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
							<?php echo e(Form::label('Categories')); ?>

                                                        <div class="form-group">
                                                            
                                                            <select name='categories[]' class='form-control menu3' id='category-multiselect' multiple='true'>
                                                                <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <optgroup label="<?php echo e($dd->title); ?>">
                                                                        <?php $__currentLoopData = $dd->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <optgroup label="<?php echo e($sc->title); ?>">
                                                                                <?php $__currentLoopData = $selected_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <?php if($t['parent']==$sc->uid): ?>
                                                                                        <option value="<?php echo e($t['uid']); ?>" <?php if($t['selected']==1): ?>selected <?php endif; ?>><?php echo e($t['title']); ?></option>
                                                                                    <?php endif; ?>
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </optgroup>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </optgroup>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </select> 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-5">
							<?php echo e(Form::label('Region')); ?>

                                                        <div class="form-group">
                                                            <select name='regions[]' class='form-control menu3' id='region-multiselect' multiple='multiple'>
                                                                <?php $__currentLoopData = $selected_regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php if($r['selected']==1): ?>
                                                                        <option value="<?php echo e($r['uid']); ?>" selected='true' class='active'><?php echo e($r['title']); ?></option>
                                                                    <?php else: ?>
                                                                        <option value=<?php echo e($r['uid']); ?>><?php echo e($r['title']); ?></option>
                                                                    <?php endif; ?>
                                                                
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                            <?php echo e(Form::hidden('creditcard_required',0)); ?>

                                                            <?php echo e(Form::checkbox('creditcard_required',1 , $d->creditcard_required, ['class menu4' => 'form-check-input','id'=>'credit-check'])); ?>

                                                            <?php echo e(Form::label('creditcard_required', 'Credit Card required', array('class' => 'form-check-label',))); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Terms of payment')); ?>

                                                            <?php echo e(Form::textarea('terms',$d->terms,['class'=>'form-control menu4','id'=>'textarea9','placeholder'=>'Terms of payment','rows'=>5,'style'=>'resize:none'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Terms of cancellation')); ?>

                                                            <?php echo e(Form::textarea('cancellationterms',$d->cancellationterms,['class'=>'form-control menu4','id'=>'textarea10','placeholder'=>'Terms of cancellation','rows'=>5,'style'=>'resize:none'])); ?>

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
                                                            <?php echo e(Form::label("Unit By Price (default 'per person')")); ?>

                                                            <?php echo e(Form::text('price_unit_text',$d->price_unit_text,['class'=>'form-control menu5','placeholder'=>'Unit Price'])); ?>

                                                        </div>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label("Unit per service")); ?>

                                                            <?php echo e(Form::text('included_unit_text',$d->included_unit_text,['class'=>'form-control menu5','placeholder'=>'Unit Price'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Min people')); ?>

                                                            <?php echo e(Form::number('min_persons',$d->min_persons,['class'=>'form-control menu5','placeholder'=>'Min people'])); ?>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <?php echo e(Form::label('Max people')); ?>

                                                            <?php echo e(Form::number('max_persons',$d->max_persons,['class'=>'form-control menu5','placeholder'=>'Max people'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $__currentLoopData = $person_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <?php echo e(Form::radio('person_type', $p['index'], $p['selected'], ['class' => 'form-check-input menu5'])); ?>

                                                                <?php echo e(Form::label('', $p['name'], array('class' => 'form-check-label',))); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class="form-group">
                                                            <?php echo e(Form::label("Person type text (if you have choosen 'Without Name' on checkboxes)")); ?>

                                                            <?php echo e(Form::text('person_type_text',$d->person_type_text,['class'=>'form-control menu5','placeholder'=>'Unit Price'])); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('days')); ?>

                                                        <?php echo e(Form::number('day',$d->day,['class'=>'form-control menu5','placeholder'=>'Days'])); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('nights')); ?>

                                                        <?php echo e(Form::number('night',$d->night,['class'=>'form-control menu5','placeholder'=>'Nights'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('Price information')); ?>

                                                        <?php echo e(Form::textarea('priceinfo',$d->priceinfo,['class'=>'form-control menu5','id'=>'textarea11','placeholder'=>'Price information','rows'=>3,'style'=>'resize:none'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <?php echo e(Form::hidden('hasgroupoffer',0)); ?>

                                                        <?php echo e(Form::checkbox('hasgroupoffer', 1,$d->hasgroupoffer, ['class' => 'form-check-input menu5','id'=>'credit-check'])); ?>

                                                        <?php echo e(Form::label('hasgroupoffer', 'Group requests', array('class' => 'form-check-label',))); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="formgroup">
                                                        <?php echo e(Form::label('group offer title')); ?>

                                                        <?php echo e(Form::text('groupoffertitle',$d->groupoffertitle,['class'=>'form-control','placeholder menu5'=>'Group offer title'])); ?>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div id='prices'></div>
                                                    <h3>Options: (<?php echo e(count($options)); ?>)</h3>
                                                    <table class='table'>
                                                        <tr><th>Option Title</th><th>Option Subtitle</th><th>Edit</th></tr>
                                                        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr id="o_<?php echo e($opt->uid); ?>">    
                                                                <td><?php echo e($opt->title); ?></td>
                                                                <td><?php echo e($opt->subtitle); ?></td>
                                                                <td>
                                                                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#editOption" onclick="editOption(<?php echo e($opt->uid); ?>)">Edit Option</button>
                                                                </td>
                                                            </tr>    
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                <h3>Prices: (<?php echo e(count($prices)); ?>)</h3>
                                                <table class='table'>
                                                    <tr><th>Price title</th><th>Option</th><th>Subtitle</th><th>adult price</th><th>Hidden</th><th>*</th><th>*</th><th>*</th></tr>
                                                    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr id=<?php echo e($p->uid); ?>>    
                                                            <td><?php echo e($p->title); ?></td>
                                                            <td><?php echo e($p->otitle); ?></td>
                                                            <td><?php if($p->subtitle): ?><?php echo e($p->subtitle); ?><?php endif; ?></td>
                                                            <td><?php echo e($p->adult_price); ?></td>
                                                            <td><?php echo e($p->hidden); ?></td>
                                                            <td>
                                                                <?php if($loop->index==0): ?>
                                                                    <button class='btn-xs btn disabled' id="<?php echo e($p->uid); ?>" >▲</button>
                                                                <?php else: ?>
                                                                    <button class='btn-xs btn' type='button' id="<?php echo e($p->uid); ?>" onclick='priceRankUp(<?php echo e($d->uid); ?>,<?php echo e($prices[$loop->index-1]->uid); ?>)'>▲</button>
                                                                <?php endif; ?>
                                                                <?php if($loop->last): ?>
                                                                    <button class='btn-xs btn disabled' id="<?php echo e($p->uid); ?>">▼</button>
                                                                <?php else: ?>
                                                                    <button class='btn-xs btn'  type='button' id="<?php echo e($p->uid); ?>" onclick='priceRankDown(<?php echo e($p->uid); ?>,<?php echo e($prices[$loop->index+1]->uid); ?>)'>▼</button>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><a href="/admin/getEditPriceForm/<?php echo e($p->uid); ?>">Edit</a></td>
                                                            <?php if($p->hidden==1): ?>
                                                                <td><button type='button' class='btn btn-primary' onclick="priceAction(<?php echo e($p->uid); ?>,'unHide')">Un Hide</button></td>
                                                            <?php elseif($p->hidden==0): ?>
                                                                <td><button type='button' class='btn btn-warning' onclick="priceAction(<?php echo e($p->uid); ?>,'hide')">Hide</button></td>
                                                            <?php endif; ?>
                                                            <?php if($p->deleted==1): ?>
                                                                <td><button type='button' class='btn btn-success' onclick="priceAction(<?php echo e($p->uid); ?>,'unDelete')">Un-Delete</button></td>
                                                            <?php elseif($p->deleted==0): ?>
                                                                <td><button type='button' class='btn btn-danger' onclick="priceAction(<?php echo e($p->uid); ?>,'delete')">Delete</button></td>
                                                            <?php endif; ?>
                                                                <td>
                                                                        <button type="button" class='btn-xs btn cutButton' onClick="cutItemPri(<?php echo e($p->uid); ?>)">Cut</button>
                                                                        <button type="button" class='btn-xs btn pasteButton' onClick="pasteItemPri(<?php echo e($p->uid); ?>)">Shift Down</button>
                                                                        <button type="button" class='btn-xs btn cancelButton' id="itemCancelP_<?php echo e($p->uid); ?>" onClick="cancelMoveItemPri(<?php echo e($p->uid); ?>)">Cancel</button>
                                                                </td>
                                                        </tr>    
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <h3>Additionals: (<?php echo e(count($additionals)); ?>)</h3>
                                        <table class='table'>
                                            <tr><th>title</th><th>Price</th><th>*</th><th>*</th><th>*</th></tr>
                                            <?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr id='<?php echo e($a->uid); ?>'>    
                                                    <td><?php echo e($a->title); ?></td>
                                                    <td><?php echo e($a->price); ?></td>
                                                   
                                                    <td>
                                                        <?php if($loop->index==0): ?>
                                                            <button class='btn-xs btn disabled' id="<?php echo e($a->uid); ?>">▲</button>
                                                        <?php else: ?>
                                                            <button class='btn-xs btn' type='button' id="<?php echo e($a->uid); ?>" onclick='additionalRankUp(<?php echo e($a->uid); ?>,<?php echo e($additionals[$loop->index-1]->uid); ?>)'>▲</button>
                                                        <?php endif; ?>
                                                        <?php if($loop->last): ?>
                                                            <button class='btn-xs btn disabled' id="<?php echo e($a->uid); ?>">▼</button>
                                                        <?php else: ?>
                                                            <button class='btn-xs btn'  type='button' id="<?php echo e($a->uid); ?>" onclick='additionalRankDown(<?php echo e($a->uid); ?>,<?php echo e($additionals[$loop->index+1]->uid); ?>)'>▼</button>
                                                        <?php endif; ?>
                                                    </td>   
                                                    <td><a href="/admin/getEditAdditionalsForm/<?php echo e($a->uid); ?>">Edit</a></td>
                                                    <?php if($a->hidden==1): ?>
                                                        <td><button type='button' class='btn btn-primary' onclick="additionalAction(<?php echo e($a->uid); ?>,'unHide')">UnHide</button></td>
                                                    <?php elseif($a->hidden==0): ?>
                                                        <td><button type='button' class='btn btn-warning' onclick="additionalAction(<?php echo e($a->uid); ?>,'hide')">Hide</button></td>
                                                    <?php endif; ?>
                                                    <?php if($a->deleted==1): ?>
                                                        <td><button type='button' class='btn btn-success' onclick="additionalAction(<?php echo e($a->uid); ?>,'unDelete')">UnDelete</button></td>
                                                    <?php else: ?>
                                                        <td><button type='button' class='btn btn-danger' onclick="additionalAction(<?php echo e($a->uid); ?>,'delete')">Delete</button></td>
                                                    <?php endif; ?>
                                                    <td>
                                                            <button type="button" class='btn-xs btn cutButton' onClick="cutItemAddi(<?php echo e($a->uid); ?>)">Cut</button>
                                                            <button type="button" class='btn-xs btn pasteButton' onClick="pasteItemAddi(<?php echo e($a->uid); ?>)">Shift Down</button>
                                                            <button type="button" class='btn-xs btn cancelButton' id="itemCancelP_<?php echo e($a->uid); ?>" onClick="cancelMoveItemAddi(<?php echo e($a->uid); ?>)">Cancel</button>
                                                    </td>
                                                </tr>   
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                                        <?php echo e(Form::label('Start Date')); ?>

                                                        <?php echo e(Form::date('starttime',\Carbon\Carbon::createFromTimeStamp($d->starttime),['class'=>'form-control'])); ?>

                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <?php echo e(Form::label('End Date')); ?>

                                                        <?php echo e(Form::date('endtime',\Carbon\Carbon::createFromTimeStamp($d->endtime),['class'=>'form-control'])); ?>

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
                                                                            <?php echo e(Form::hidden('hasspeciallistsettings',0)); ?>

                                                                            <?php echo e(Form::checkbox('hasspeciallistsettings', 1, $d->hasspeciallistsettings, ['class' => 'form-check-input menu6'])); ?>

                                                                            <?php echo e(Form::label('special-list', 'Use special list settings', array('class' => 'form-check-label',))); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('Special list type')); ?>

                                                                            <?php echo e(Form::text('special_list_person_type_text', $d->special_list_person_type_text, ['class' => 'form-control menu6'])); ?>

                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('Adult Price')); ?>

                                                                            <?php echo e(Form::text('special_list_price', $d->special_list_price, ['class' => 'form-control menu6'])); ?>

                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('Min Persons')); ?>

                                                                            <?php echo e(Form::text('special_list_min_persons', $d->special_list_min_persons, ['class' => 'form-control menu6'])); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <?php $__currentLoopData = $person_type2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <?php echo e(Form::radio('special_list_person_type', $p2['index'], $p2['selected'], ['class' => 'form-check-input menu6'])); ?>

                                                                                    <?php echo e(Form::label('', $p2['name'], array('class' => 'form-check-label',))); ?>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <?php echo e(Form::label('Vaucher text')); ?>

                                                                            <?php echo e(Form::textarea('vauchertext',$d->vauchertext,['class'=>'form-control menu6','id'=>'textarea12','placeholder'=>'Vaucher text','style'=>'resize:none;','rows'=>3])); ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <?php if(isset($_GET['activeTab'])): ?>
                                        <script>
                                            $('#<?php echo e($_GET["activeTab"]); ?>').addClass('active show');
                                            $('.<?php echo e($_GET["activeTab"]); ?>').addClass('active show');
                                        </script>
                                    <?php else: ?>
                                        <script>
                                            $('#home').addClass('active show');
                                            $('.home').addClass('active show');
                                        </script>
                                    <?php endif; ?>
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
                                        var oId="<?php echo e($d->uid); ?>";
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
                            <?php echo e(Form::submit('Submit Changes',['class'=>"btn btn-info btn-fill pull-right"])); ?>

                        </div>
                        <a href="javascript:history.back()"><button style='position:fixed; left:300px;top:10px' type='button' class='btn btn-success'><-Back</button></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

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

@keyframes  zoom {
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
@media  only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
       
    </style>