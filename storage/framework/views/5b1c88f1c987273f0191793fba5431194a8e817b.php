<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveListVouchers','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Redirects</h2>
            <div class="container-fluid">
                <div class='row'>
                    <table class='table'>
                       <tr><th>id</th><th class='col-md-3'>Redirect From</th><th>Redirect To</th><th>Date Created</th></tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(str_limit($d->uid,30,"...")); ?></td>
                                <td><?php echo e($d->url); ?></td>
                                <td><?php echo e($d->destination); ?></td>
                                <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->crdate)->format('d.m.Y')); ?></td>
                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php echo e($data->links()); ?>

                </div>
            </div>
        </div>
    </div>
</div>