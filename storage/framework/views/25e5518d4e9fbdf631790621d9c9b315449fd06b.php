<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveBookings','active'); ?>
<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <?php echo e(Form::open(['method'=>'GET','action'=>'mainController@listBookings'])); ?>

            <div class="container-fluid">
            <div class='row'>
                <div class='col-md-5'>
                    <?php echo e(Form::label('Search by user name')); ?>

                    <?php echo e(Form::text('user_name','',['class'=>'form-control','placeholder'=>'Search Reservations By username'])); ?>

                </div>
                <div class='col-md-2'>
                    <?php echo e(Form::button('Search',['class'=>'btn btn-primary','style'=>'margin-top:25px'])); ?>

                    <?php echo e(Form::close()); ?>

                </div>   
                <div class='col-md-3'>
                     <?php echo e(Form::open(['method'=>'GET','action'=>'mainController@listBookings'])); ?>

                     <?php echo e(Form::label('Search by confirmation ID')); ?>

                     <?php echo e(Form::text('confirmation_id','',['class'=>'form-control','placeholder'=>'Search Reservations by confirmation_id'])); ?>

                </div>
                <div class='col-md-2'>
                    <?php echo e(Form::button('Search',['class'=>'btn btn-primary','style'=>'margin-top:25px'])); ?>                    
                </div>
            </div>
        </div>
        <?php echo e(Form::close()); ?>

            
            <h2>Bookings</h2>
            <div class="container-fluid">
                <div class='row'>
                <div class='col-md-12'>
                    <table class='table'>
                       <tr><th>Offer Title</th><th>Order Date</th><th>Total Price</th><th>Created at:</th><th>Edit</th></tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e(str_limit($d->name,50,"...")); ?>, <b><?php echo e($d->confirmation_id); ?></b></td>
                                <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->booking_date)->format('d.m.Y')); ?></td>
                                <td><?php echo e($d->price_total); ?><?php echo $d->currency==0?"<b> CHf</b>":"<b>&euro;</b>"; ?></td>
                                <td><b> <?php echo e(\Carbon\Carbon::createFromTimeStamp($d->created_on)->format('d.m.Y @H:i')); ?> </b></td>
                               
                                <td><a href="/admin/editBooking/<?php echo e($d->uid); ?>"><button class='btn btn-primary'>Edit</button></a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                    <?php echo e($data->links()); ?>

                </div>
                </div>
            </div>
        </div>
    </div>
</div>