<?php echo $__env->make('../includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('../includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid" >
                <h4>Edit Vaucher Reservation for <b><?php echo e($d->name); ?></b></h4>
               
                    <form action="/admin/submitVoucherReservationEdit/" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class='col-md-1'>
                            <?php echo e(Form::label('Hide')); ?>

                            <?php echo e(Form::checkbox('hidden','',$d->hidden,['class'=>'form-control'])); ?>

                            <?php echo e(Form::hidden('uid',$d->v_uid)); ?>

                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-5'>
                        <a href="/admin/editUser/<?php echo e($d->customer_id); ?>?source=<?php echo e($d->v_uid); ?>/">Edit User <b><?php echo e($d->name); ?></b></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class='col-md-5'>
                            <?php echo e(Form::label('Valid_From')); ?>

                            <?php echo e(Form::text('valid_from',$d->valid_from,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <hr>
                    <?php if($d->offer>0): ?>
                        <?php if($d->cdate>1527601860): ?>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <a href="/admin/generateOfferVaucherPDF/<?php echo e($d->v_uid); ?>">Vaucher PDF</a>
                                </div>
                            </div>
                            <hr>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <a href="/admin/generateOfferVaucherInvoice/<?php echo e($d->v_uid); ?>">Vaucher Invoice</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class='row'>
                                <p>This voucher was created before a 30.05.2018 so we dont have the data to generate the PDF</p>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href="/admin/generateVoucherPdf/<?php echo e($d->v_uid); ?>">Vaucher PDF</a>
                            </div>
                        </div>
                        <hr>
                        <div class='row'>
                            <div class='col-md-12'>
                                <a href="/admin/generateVoucherInvoice/<?php echo e($d->v_uid); ?>">Vaucher Invoice</a>
                            </div>
                        </div>
                    <?php endif; ?>
                   
                    <hr>
                    <div class='row'>
                        <div class='col-md-2'>
                            <?php echo e(Form::label('Vaucher Type')); ?>

                            <?php echo e(Form::text('vaucher_type',$d->vaucher_type,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <?php echo e(Form::label('Vaucher For')); ?>

                            <?php echo e(Form::text('vaucher_for',$d->vaucher_for,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <?php echo e(Form::label('Vaucher Text')); ?>

                            <?php echo e(Form::textarea('vaucher_text',$d->vaucher_text,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            <?php echo e(Form::label('Customer')); ?>

                            <?php echo e(Form::text('customer_id',$d->customer_id,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-5'>
                            <?php echo e(Form::label('Total Price')); ?>

                            <?php echo e(Form::text('total_price',$d->total_price,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-1'>
                            <?php echo e(Form::label('Currency')); ?>

                            <?php echo e(Form::text('total_currency',$d->total_currency,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-8'>
                            <?php echo e(Form::label('Notes')); ?>

                            <?php echo e(Form::textarea('note',$d->note,['class'=>'form-control','rows'=>3])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-2 form-group'>
                            <?php echo e(Form::label('Extend for 1 Year')); ?>

                            <?php echo e(Form::checkbox('valid_extended','',$d->valid_extended,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-2 form-group'>
                            <?php echo e(Form::label('Extend for 2nd Year')); ?>

                            <?php echo e(Form::checkbox('valid_extended2','',$d->valid_extended2,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <?php echo e(Form::label('Additional payment')); ?>

                            <?php echo e(Form::text('additional_payment',$d->additional_payment,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <?php echo e(Form::label('Additional payment currency')); ?>

                            <?php echo e(Form::text('additional_currency',$d->additional_currency,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <?php echo e(Form::label('Additional payment: payed')); ?>

                            <?php echo e(Form::text('additional_payed',$d->additional_payed,['class'=>'form-control'])); ?>

                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            <?php echo e(Form::label('Offer')); ?>

                            <select name="offer" id="" class='form-control'>
                                <option value="0" selected>No offer</option>
                                <?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($o->uid); ?>" <?php if($d->offer==$o->uid): ?> selected <?php endif; ?>><?php echo e($o->title); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class='row'>
                        <?php echo e(Form::submit('Submit',['class'=>'btn btn-primary','style'=>'top:100px;right:30px;position:fixed'])); ?>

                    </div>
                    <?php echo e(Form::close()); ?>

                
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