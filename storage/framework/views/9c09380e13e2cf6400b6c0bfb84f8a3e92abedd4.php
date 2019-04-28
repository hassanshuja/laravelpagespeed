
<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveCurrencies','active'); ?>
<div class="wrapper">
    <?php echo $__env->make("includes/sidemenu", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid myContainer">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Manage Currencies</h4>
                            </div>
                            <div class="content">
                                <!-- <?php echo Form::open(['action'=>'updateController@submitCurrency','method'=>'POST']); ?> -->
                                <form action="/admin/submitCurrency/" method="POST">
                                <?php echo e(csrf_field()); ?>

                                <?php echo e(Form::label('Euro')); ?>

                                <?php echo e(Form::text('value',$data[0]->value,['class'=>'form-control'])); ?>

                                <br>
                                <?php echo e(Form::submit('Submit edit',['class'=>'btn btn-primary right'])); ?>

                                <?php echo e(Form::close()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
