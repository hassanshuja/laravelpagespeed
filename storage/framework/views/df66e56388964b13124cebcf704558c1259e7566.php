<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveBookings','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content" style='margin-left:30px'>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <h2>Edit user <b><?php echo e($d->username); ?></b></h2>
            
            <form action="/admin/submitEditBeUser/" method="POST">
                <?php echo e(csrf_field()); ?>

            <div class="container-fluid">
                <div class='row'>
                    <div class='col-12'>
                        <div class='form-group'>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Username')); ?>

                                <?php echo e(Form::text('username',$d->username,['class'=>'form-control'])); ?>  
                                <?php echo e(Form::hidden('uid',$d->uid)); ?>                      
                            </div>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Password')); ?>

                                
                                <input type="password" name='password' class='form-control'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-5'>
                        <hr>
                        <h4>Permissions</h4>
                        <?php echo e(Form::label('Permission')); ?>

                        <?php echo e(Form::number('admin',$d->admin,['class'=>'form-control'])); ?>

                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-4'>
                        <p>1- Every Permission</p>
                        <p>2- Limited Permissions</p>
                    </div>
                </div>
            </div>
            <?php echo e(Form::submit('Submit edit',['class'=>'btn btn-primary'])); ?>

            <?php echo e(Form::close()); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>