<?php echo $__env->make('../includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('../includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body>
	<div class="wrapper">
		<div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-12'>
            <center><h1>Edit Price </h1></center><br/><br/>
            <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-12 price-options-<?php echo e($p->uid); ?>" id="price-options-<?php echo e($p->uid); ?>">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form action="/admin/submitEditPrice/" method="POST">
                                <?php echo e(csrf_field()); ?>

                            <?php echo e(Form::hidden("prices[closed]",0)); ?>

                            <?php echo e(Form::checkbox("prices[closed]", 1, $p->closed, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                            <?php echo e(Form::label('hidden', 'Season/Package Closed', array('class' => 'form-check-label',))); ?>

                            <?php echo e(Form::hidden('uid',$p->uid)); ?>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php echo e(Form::label('Price Title')); ?>

                                <?php echo e(Form::text("prices[title]", $p->title, ['class' => 'form-control','placeholder'=>'Price title'])); ?>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <?php echo e(Form::label('Start Date')); ?>

                                <?php echo e(Form::date("prices[startdate]",\Carbon\Carbon::createFromTimeStamp($p->startdate),['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                
                                <?php echo e(Form::label('End Date')); ?>

                                <?php echo e(Form::date("prices[enddate]",\Carbon\Carbon::createFromTimeStamp($p->enddate),['class'=>'form-control'])); ?>

                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class='col-md-3'> 
                            <?php echo e(Form::label('Days Available')); ?>

                            <?php echo e(Form::hidden("prices[monday]",0)); ?>

                            <?php echo e(Form::hidden("prices[thusday]",0)); ?>

                            <?php echo e(Form::hidden("prices[wednesday]",0)); ?>

                            <?php echo e(Form::hidden("prices[thursday]",0)); ?>

                            <?php echo e(Form::hidden("prices[friday]",0)); ?>

                            <?php echo e(Form::hidden("prices[saturday]",0)); ?>

                            <?php echo e(Form::hidden("prices[sunday]",0)); ?>

                            <div class="day">
                                <?php echo Form::checkbox("prices[monday]", 1, $p->monday, ['class' => 'form-check-input','id'=>'credit-check']); ?>

                                <?php echo e(Form::label('Monday', 'Monday', array('class' => 'form-check-label',))); ?>

                            </div>
                            <div class="day">
                                <?php echo e(Form::checkbox("prices[thusday]", 1,$p->thusday, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                                <?php echo e(Form::label('Tuesday', 'Tuesday', array('class' => 'form-check-label',))); ?>

                            </div>
                            <div class="day">
                                <?php echo e(Form::checkbox("prices[wednesday]", 1,$p->wednesday, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                                <?php echo e(Form::label('Wednesday', 'Wednesday', array('class' => 'form-check-label',))); ?>

                            </div>
                            <div class="day">
                                <?php echo e(Form::checkbox("prices[thursday]",1, $p->thursday, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                                <?php echo e(Form::label('Thursday', 'Thursday', array('class' => 'form-check-label',))); ?>

                            </div>
                            <div class="day">
                                <?php echo e(Form::checkbox("prices[friday]", 1,$p->friday, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                                <?php echo e(Form::label('Friday', 'Friday', array('class' => 'form-check-label',))); ?>

                            </div>
                            <div class="day">
                                <?php echo e(Form::checkbox("prices[saturday]",1, $p->saturday, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                                <?php echo e(Form::label('Saturday', 'Saturday', array('class' => 'form-check-label',))); ?>

                            </div>
                            <div class="day">
                                <?php echo e(Form::checkbox("prices[sunday]", 1,$p->sunday, ['class' => 'form-check-input','id'=>'credit-check'])); ?>

                                <?php echo e(Form::label('Sunday', 'Sunday', array('class' => 'form-check-label',))); ?>

                            </div>
                        
                        </div>
                        
                    </div>   
                    <hr>
                    <div class='row'>
                        <div class='col-md-3'>
                            <?php echo e(Form::label('Date list')); ?>

                            <?php echo e(Form::date('','',['class'=>'form-control datelist_selector','id'=>'o_1'])); ?>

                            <?php echo e(Form::hidden('prices[datelist]','')); ?>

                            <?php echo e(Form::hidden('prices[datelist_closed]','')); ?>

                            <?php echo e(Form::textarea("prices[datelist]",$p->datelist,['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>'datelist_textarea_o_1'])); ?> 
                        </div>
                        <div class='col-md-3'>
                            <?php echo e(Form::label('Date list Closed')); ?>

                            <?php echo e(Form::date('','',['class'=>'form-control datelist_closed_selector','id'=>'c_1'])); ?>

                            <?php echo e(Form::textarea("prices[datelist_closed]",$p->datelist_closed,['class'=>'form-control','rows'=>'8','style'=>'resize:none','id'=>'datelist_closed_textarea_c_1'])); ?> 
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo Form::label('Adult price'); ?>

                                <?php echo Form::number("prices[adult_price]",$p->adult_price,['class'=>'form-control','placeholder'=>'Adult price','required'=>'required']); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo Form::label('Kids price'); ?>

                                <?php echo Form::number("prices[kids_price]",$p->kids_price,['class'=>'form-control','placeholder'=>'Kids price']); ?>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <?php echo e(Form::label('Currency')); ?>

                                <select name="prices[currency]" id="" class='form-control'>
                                    <option value="0" <?php if($p->currency==0): ?> selected <?php endif; ?>>CHF</option>
                                    <option value="1" <?php if($p->currency==1): ?> selected <?php endif; ?>>EURO</option>
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
                            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pOpt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($pOpt->uid); ?>" <?php if($pOpt->uid==$p->selected_option): ?> selected <?php endif; ?>><?php echo e($pOpt->title); ?> <?php if($pOpt->subtitle): ?> - <?php echo e($pOpt->subtitle); ?><?php endif; ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                
                        
                    </div>
                    <?php echo e(Form::submit('Save Price',['class'=>'btn btn-primary','style'=>'position:fixed; right:30px;top:30px'])); ?>

                    <a href="javascript:history.back()"><button style='position:fixed; left:400px;top:30px' type='button' class='btn btn-success'><-Back</button></a>
                    <?php echo e(Form::close()); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
 