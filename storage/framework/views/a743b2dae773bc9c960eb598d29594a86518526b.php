<?php echo $__env->make('../includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('../includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__currentLoopData = $region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <b style='text-align:center'>Edit region <?php echo e($r->title); ?></b>
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    
                                    <form action="/admin/submitEditRegion/" method='POST' enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                    <?php echo Form::label('title'); ?>

                                    <?php echo Form::text('title',$r->title,['class'=>'form-control','placeholder'=>'Title']); ?>

                                    <?php echo e(Form::hidden('uid',$r->uid)); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo Form::label('Description'); ?>

                                    <?php echo Form::textarea('description',$r->description,['class'=>'form-control','id'=>'textarea1','placeholder'=>'Region description','rows'=>5]); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <?php echo Form::label('Parent'); ?>

                                    
                                    <select name="parent" id="" class='form-control'>
                                        <option value='0'>No Parent</option>
                                        <?php $__currentLoopData = $data['region']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($k); ?>" <?php if($k==$r->parent): ?> selected <?php endif; ?>><?php echo e($v); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </select>
                                    
                                </div>
                            </div>
                           
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onclick="regAddNewPhoto()">Change Photo</button>
                                            
                                    <div id="multipleUploadInput" >
                                        <input type="file" id="regionPhotos" style="display:none;" multiple="multiple" />
                                    </div>
                                
                                    <div class="chooseimagesHolder" style="padding-top:5px;width:100%;">
                                            <div class="firstImageHolder">
                                            <img src="<?php echo e(url('assets/'.$r->image)); ?>" id="regionImage" >
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Region Logo')); ?>

                            </div>
                            
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <img src="<?php echo e(url('assets/'.$r->image_region)); ?>" title="meinweekend" alt="meinweekend">
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('New Logo')); ?>

                                <?php echo e(Form::file('logo')); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <?php echo Form::label('Seo'); ?>

                                    <?php echo Form::textarea('seo',$r->seo,['class'=>'form-control','id'=>'textarea2','placeholder'=>'SEO','rows'=>5]); ?>

                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::submit('Submit region edit',['class'=>"btn btn-info btn-fill pull-right"])); ?>

                        <div class="clearfix"></div>
                    
                    <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

    
   
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script>
  CKEDITOR.replace('textarea1',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
    CKEDITOR.replace('textarea2',function(){
        enterMode: CKEDITOR.ENTER_BR;
    });
  
</script>