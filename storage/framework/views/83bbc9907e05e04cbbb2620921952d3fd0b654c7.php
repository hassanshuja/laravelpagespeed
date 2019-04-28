<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveAddNewsletters','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content">    
            <div class="container-fluid" style='margin-left:10px'>
                <h2>Add Newsletter</h2>
                
                <form action="/admin/addNewsLetter/" method="POST" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>

                <div class='row'>
                    <div class='col-md-5'>
                        <?php echo e(Form::label('Title')); ?>

                        <?php echo e(Form::text('newsletter_title','',['class'=>'form-control','placeholder'=>'title'])); ?>

                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Image for package 1')); ?>

                        <?php echo e(Form::file('image_1',['class'=>'form-control'])); ?>

                     
                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Image for package 2')); ?>

                        <?php echo e(Form::file('image_2',['class'=>'form-control'])); ?>

                    </div>
                </div>
                <br> <br>
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 Title')); ?>

                        <?php echo e(Form::text('offer_1_title','',['class'=>'form-control','placeholder'=>'package 1 title'])); ?>

                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 2 Title')); ?>

                        <?php echo e(Form::text('offer_2_title','',['class'=>'form-control','placeholder'=>'package 2 title'])); ?>

                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 Total Price')); ?>

                        <?php echo e(Form::text('offer_1_price','',['class'=>'form-control','placeholder'=>'package 1 total price'])); ?>

                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 2 Total Price')); ?>

                        <?php echo e(Form::text('offer_2_price','',['class'=>'form-control','placeholder'=>'package 2 total price'])); ?>

                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 currency')); ?>

                        <select name="offer_1_currency" id="" class='form-control'>
                            <option value="CHF">CHF</option>
                            <option value="EURO">EURO</option>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 2 currency')); ?>

                        <select name="offer_2_currency" id="" class='form-control'>
                            <option value="CHF">CHF</option>
                            <option value="EURO">EURO</option>
                        </select>
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 Person Type')); ?>

                        <?php echo e(Form::text('offer_1_person_type','',['class'=>'form-control','placeholder'=>'package 1 person type'])); ?>

                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 2 Person Type')); ?>

                        <?php echo e(Form::text('offer_2_person_type','',['class'=>'form-control','placeholder'=>'package 2 person type'])); ?>

                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 type')); ?>

                        <select name="offer_1_type" id=""  class='form-control'>
                            <option value="NEU">NEU</option>
                            <option value="SPECIAL OFFER">SPECIAL OFFER</option>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 type')); ?>

                        <select name="offer_2_type" id="" class='form-control'>
                            <option value="NEU">NEU</option>
                            <option value="SPECIAL OFFER">SPECIAL OFFER</option>
                        </select>
                    </div>
                    
                </div>    
                    
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 Text')); ?>

                        <?php echo e(Form::textarea('offer_1_text','',['class'=>'form-control','placeholder'=>'package 1 text','id'=>'textarea1'])); ?>

                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 2 Text')); ?>

                        <?php echo e(Form::textarea('offer_2_text','',['class'=>'form-control','placeholder'=>'package 2 text','id'=>'textarea2'])); ?>

                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 1 Included')); ?>

                        <?php echo e(Form::textarea('offer_1_included','',['class'=>'form-control','placeholder'=>'package 1 included','id'=>'textarea3'])); ?>

                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Package 2 Included')); ?>

                        <?php echo e(Form::textarea('offer_2_included','',['class'=>'form-control','placeholder'=>'package 2 included','id'=>'textarea4'])); ?>

                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Offer Linked With')); ?>

                        <select name="offer_1" id="" class='form-control'>
                            <option value="0" selected></option>
                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($o->uid); ?>"><?php echo e($o->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class='col-md-6'>
                        <?php echo e(Form::label('Offer Linked With')); ?>

                        <select name="offer_2" id="" class='form-control'>
                            <option value="0" selected></option>
                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($o->uid); ?>"><?php echo e($o->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>    
                <div class='row'>
                    <div class='col-md-2'>
                        <?php echo e(Form::submit('Submit',['class'=>'form-control btn btn-primary'])); ?>

                    </div>
                </div>
                <?php echo e(Form::close()); ?>

            
            </div>
        </div>
    </div>
</div>

<script>
    
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



</script>