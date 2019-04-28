<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveListVouchers','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Vauchers</h2>
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-5'>
                        <?php echo e(Form::open(['action'=>'mainController@listVauchers','method'=>'GET'])); ?>

                        <?php echo e(Form::label('Search For Username')); ?>

                        <?php echo e(Form::text('search','',['class'=>'form-control','placeholder'=>'Search For User Name or "Vaucher For"'])); ?>

                    </div>
                    <div class='col-md-4'>
                        <?php echo e(Form::submit('Search',['class'=>'btn btn-primary','style'=>'margin-top:24px'])); ?>

                        <?php echo e(Form::close()); ?>

                        <?php if(isset($_GET['search'])): ?>
                            <a href="/admin/listAllVauchers">Clear Search</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class='row'>
                    <table class='table'>
                       <tr><th>Offer</th><th class='col-md-3'>User Name</th><th>Date Created</th><th>Valid From</th><th>Total Price</th><th></th></tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(str_limit($d->title,30,"...")); ?></td>
                                <td><?php echo e(str_limit($d->name,30,"...")); ?></td>
                                <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->crdate)->format('d.m.Y')); ?></td>
                                <td><?php echo e($d->valid_from); ?></td>
                                <td><?php echo e($d->total_price); ?> <b><?php echo e($d->total_currency==0?"CHF":"EUR"); ?></b></td>
                                <td><a href="/admin/editVoucherReservation/<?php echo e($d->uid); ?>"><button class='btn btn-primary'>Edit</button></a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>