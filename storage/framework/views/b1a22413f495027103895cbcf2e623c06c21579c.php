<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveBookings','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <h2>Backend Users</h2>
            <div class="container-fluid">
                <div class='row'>
                    <table class='table'>
                       <tr><th class='col-md-5'>Username</th><th>Admin</th><th>Last Login</th><th>Edit</th><th>Delete</th></tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($d->username); ?></td>
                                <td><?php echo e($d->admin); ?></td>
                                <?php if($d->lastlogin==0): ?>
                                    <td>never</td>
                                <?php else: ?>
                                    <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->lastlogin)->format('d.m.Y @h:m:s')); ?></td>
                                <?php endif; ?>
                                <td><a href="/admin/editBeUser/<?php echo e($d->uid); ?>"><button class='btn btn-primary'>Edit</button></a></td>
                                <?php if($d->deleted): ?>
                                    <td><button onclick="userAction('<?php echo e($d->uid); ?>','unDelete')" class='btn btn-success'>UnDelete</button></td>
                                <?php else: ?>
                                    <td><button onclick="userAction('<?php echo e($d->uid); ?>','delete')" class='btn btn-warning'>Delete</button></td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
