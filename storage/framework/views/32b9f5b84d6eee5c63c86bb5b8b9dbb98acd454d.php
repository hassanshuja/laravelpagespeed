
<!doctype html>
<html lang="en">
<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveCurrencies','active'); ?>
<div class="wrapper">
    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid myContainer">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="header">
                                <h4 class="title">Editing Booking <b><?php echo e($d->confirmation_id); ?>, <?php echo e($user[0]->name); ?></b></h4>
                            </div>
                                <h3>General</h3>
                                <form action="/admin/submitEditBooking/" method="POST">
                                    <?php echo e(csrf_field()); ?>

                                <div class='row'>
                                    <div class='col-md-1'>    
                                        <?php echo e(Form::label('Hide')); ?>

                                        <?php echo e(Form::checkbox('hide','',null,['class'=>'form-control'])); ?>

                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-5'>    
                                        <?php echo e(Form::label('Status')); ?>

                                        <select name="" id="" class='form-control'>
                                            <option value="Deleted">Deleted</option>
                                            <option value="Neu">Neu</option>
                                            <option value="In Bearbeitung" selected>In Bearbeitung</option>
                                            <option value="Reserviert">Reserviert</option>
                                            <option value="Bestatigt">Bestatigt</option>
                                            <option value="Bezahlt">Bezahlt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-8'>    
                                        <?php echo e(Form::label('User')); ?>

                                        <?php echo e(Form::text('user',$user[0]->name,['class'=>'form-control'])); ?>

                                        <a href="/admin/editUser/<?php echo e($user[0]->uid); ?>"><button type='button' class='btn btn-primary'>Edit</button></a>
                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-12'>    
                                        <?php echo e(Form::label('Note')); ?>

                                        <?php echo e(Form::text('note',$d->note,['class'=>'form-control'])); ?>

                                    </div>
                                </div>
                                <div class='row'>
                                    <p><h3>Buchung</h3></p>
                                    <div class='col-md-8'>    
                                        <?php echo e(Form::label('Offer')); ?>

                                        <?php echo e(Form::text('offer_title',$d->offer_title,['class'=>'form-control'])); ?>

                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-8'> 
                                        <?php echo e(Form::label('Booking Date')); ?>   
                                        <?php echo e(Form::date('booking_date',\Carbon\Carbon::createFromTimeStamp($d->booking_date),['class'=>'form-control'])); ?>

                                    </div>
                                </div>
                                <div class='row'>
                                    <div class='col-md-5'> 
                                        <?php echo e(Form::label('Total')); ?>   
                                        <?php echo e(Form::number('price_total',$d->price_total,['class'=>'form-control'])); ?>

                                    </div>
                                    <div class='col-md-4'> 
                                        <?php echo e(Form::label('Total')); ?>   
                                        <select name="currency" id="" class='form-control'>
                                            <?php if($d->currency==0): ?>
                                                <option value="0" selected>CHF</option>
                                                <option value="1" >Euro</option>
                                            <?php else: ?>
                                                <option value="0" >CHF</option>
                                                <option value="1" selected >Euro</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <h5>Credit Card Info</h5>
                                
                                
                                <div class='row'>
                                    <div class='col-md-5'> 
                                        <?php echo e(Form::label('Card type')); ?>   
                                        <select name="reservationgarantee_cardtype" id="" class='form-control'>
                                            <option value="" selected></option>
                                            <option <?php if($d->reservationgarantee_cardtype=='visa'): ?> selected <?php endif; ?> value="visa">Visa</option>
                                            <option <?php if($d->reservationgarantee_cardtype=='Mastercard'): ?> selected <?php endif; ?> value="Mastercard">Mastercard</option>
                                            <option <?php if($d->reservationgarantee_cardtype=='Amex'): ?> selected <?php endif; ?> value="Amex">American Express</option>

                                        </select>
                                    </div>
                                </div>

                                
                                <div class="row">
                                    <div class="col-md-5">
                                        <?php echo e(Form::label('Card Number')); ?>

                                        <?php echo e(Form::text('reservationgarantee_cardno',$d->reservationgarantee_cardno,['class'=>'form-control'])); ?>

                                    </div>
                                </div>
                                <?php echo e(Form::hidden('uid',$d->uid)); ?>

                                <div class="row">
                                    <div class="col-md-5">
                                        <?php echo e(Form::label('Month')); ?>

                                        <?php echo e(Form::text('reservationgarantee_exp_month',$d->reservationgarantee_exp_month,['class'=>'form-control'])); ?> 
                                    </div>
                                    <div class="col-md-5">
                                        <?php echo e(Form::label('Year')); ?>

                                        <?php echo e(Form::text('reservationgarantee_exp_year',$d->reservationgarantee_exp_year,['class'=>'form-control'])); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <?php echo e(Form::label('Name on Card')); ?>

                                        <?php echo e(Form::text('reservationgarantee_name',$d->reservationgarantee_name,['class'=>'form-control'])); ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <?php echo e(Form::label('No Credit Card Available')); ?>

                                        <?php echo e(Form::checkbox('reservationgarantee_nocard','',$d->reservationgarantee_nocard,['class'=>'form-control'])); ?> 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('Coupon Code')); ?>

                                        <?php echo e(Form::text('vaucher_code',$d->vaucher_code,['class'=>'form-control'])); ?> 
                                    </div>
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('Marketing-Code ')); ?>

                                        <?php echo e(Form::text('marketing_code',$d->marketing_code,['class'=>'form-control'])); ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('Coupon Code')); ?>

                                        <?php echo e(Form::number('totalammount','',['class'=>'form-control'])); ?> 
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <h3>Buchungsbestätigung</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('Create Confirmation')); ?>

                                        <br>
                                        <a href="/admin/pdf/<?php echo e($d->uid); ?>">Reservations-Bestätigung (PDF)</a>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <?php echo e(Form::label('Confirmation ID')); ?>

                                        <?php echo e(Form::text('confirmation_id',$d->confirmation_id,['class'=>'form-control'])); ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo e(Form::label('Introduction')); ?>

                                        <?php echo e(Form::text('confirmation_intro',$d->confirmation_intro,['class'=>'form-control','id'=>'textarea2'])); ?> 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo e(Form::label('Price Table')); ?>

                                        <?php echo e(Form::textarea('confirmation_table',$d->confirmation_table,['class'=>'form-control','id'=>'textarea3'])); ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo e(Form::label('Services')); ?>

                                        <?php echo e(Form::textarea('confirmation_services',$d->confirmation_services,['class'=>'form-control','id'=>'textarea4'])); ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo e(Form::label('Zahlungs-/Annullationsbedingungen ')); ?>

                                        <?php echo e(Form::textarea('confirmation_conditions',$d->confirmation_conditions,['class'=>'form-control','id'=>'textarea5'])); ?> 
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo e(Form::label('Schlusswort')); ?>

                                        <?php echo e(Form::textarea('confirmation_wishes',$d->confirmation_wishes,['class'=>'form-control','id'=>'textarea6'])); ?> 
                                    </div>
                                </div>

                                <?php echo e(Form::submit('Submit Booking Edit',['class'=>'btn btn-primary'])); ?>

                                <?php echo e(Form::close()); ?>

                         
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
 
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
</script>