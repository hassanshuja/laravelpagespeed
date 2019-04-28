<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveBookings','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="container-fluid">
                    <h4>Edit User <b><?php echo e($d->name); ?></b></h4>
                    
                        <hr>
                        <h4>General</h4>
                        
                        <form action="/admin/submitEditUser/" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php if(isset($_GET['source'])): ?>
                           <?php echo e(Form::hidden('source',$_GET['source'])); ?>

                        <?php endif; ?>
                        <div class='row'>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Username')); ?>

                                <?php echo e(Form::text('username',$d->username,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Password')); ?>

                                <?php echo e(Form::text('password','',['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Last Login')); ?>

                                <?php echo e(Form::text('',\Carbon\Carbon::createFromTimeStamp($d->lastlogin)->format('d.m.Y'),['class'=>'form-control','disabled'=>'disabled'])); ?>

                            </div>
                        </div>
                        <hr>
                        <h4>Personal Data</h4>
                        <div class='row'>
                            <div class='col-md-3'>
                                <select name="gender" id="" class='form-control'>
                                <option value="0" <?php if($d->gender==0): ?> selected <?php endif; ?>>Male</option>
                                <option value="1" <?php if($d->gender==1): ?> selected <?php endif; ?>>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Company')); ?>

                                <?php echo e(Form::text('company',$d->company,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-5'>
                                <?php echo e(Form::label('Title')); ?>

                                <?php echo e(Form::text('title',$d->title,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-8'>
                                <?php echo e(Form::label('Name')); ?>

                                <?php echo e(Form::text('name',$d->name,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('First Name')); ?>

                                <?php echo e(Form::text('first_name',$d->name,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Middle Name')); ?>

                                <?php echo e(Form::text('middle_name',$d->middle_name,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Last Name')); ?>

                                <?php echo e(Form::text('last_name',$d->last_name,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-8'>
                                <?php echo e(Form::label('Address')); ?>

                                <?php echo e(Form::textarea('address',$d->address,['class'=>'form-control','rows'=>2])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-2'>
                                <?php echo e(Form::label('Zip Code')); ?>

                                <?php echo e(Form::text('zip',$d->zip,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('City')); ?>

                                <?php echo e(Form::text('city',$d->city,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Country')); ?>

                                <?php echo e(Form::text('country',$d->country,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-3'>
                                <?php echo e(Form::label('Phone')); ?>

                                <?php echo e(Form::text('telephone',$d->telephone,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-3'>
                                <?php echo e(Form::label('Fax')); ?>

                                <?php echo e(Form::text('fax',$d->fax,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('email')); ?>

                                <?php echo e(Form::text('email',$d->email,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('www')); ?>

                                <?php echo e(Form::text('www',$d->www,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <hr>
                        <h4>Customer</h4>
                        <div class='row'>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Mobile')); ?>

                                <?php echo e(Form::text('mobile',$d->mobile,['class'=>'form-control'])); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Business Phone')); ?>

                                <?php echo e(Form::text('business_phone',$d->business_phone,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <h4>Direct Mail</h4>
                        <div class='row'>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Activate Newsletter')); ?>

                                <?php echo e(Form::checkbox('module_sys_dmail_newsletter',1,$d->module_sys_dmail_newsletter,['class'=>'form-control'])); ?>

                                <?php echo e(Form::hidden('uid',$d->uid)); ?>

                                <?php echo e(Form::hidden('bookingId',$d->bookingId)); ?>

                            </div>
                            <div class='col-md-4'>
                                <?php echo e(Form::label('Recieve e-mails as HTML? ')); ?>

                                <?php echo e(Form::checkbox('module_sys_dmail_category',1,$d->module_sys_dmail_category,['class'=>'form-control'])); ?>

                            </div>
                        </div>
                        <?php echo e(Form::submit('Submit edit user',['class'=>'btn btn-primary'])); ?>

                        <?php echo e(Form::close()); ?>

                   
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>