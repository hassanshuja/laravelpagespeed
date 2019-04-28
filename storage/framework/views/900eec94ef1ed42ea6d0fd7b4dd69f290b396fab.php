<?php echo $__env->make('includes/header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('includes/sidemenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('ActiveCreateNewsletters','active'); ?>

<div class="wrapper">
    <div class="main-panel">
        <div class="content">
         <h2>News Letters</h2>
            <div class="container-fluid">
                <div class='row'>
                    <div class='col-md-6'>&nbsp;</div>
                    <div class='col-md-2'>
                        <?php if($fe_users['total_active']>0): ?>
                            <button type='button' class='btn btn-danger' onClick='deactivate()'>Deactivate Newsletter</button>
                        <?php endif; ?>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-md-12'>
                        <table class='table'>
                        <tr><th>Title</th><th>Created at</th><th>Edit</th><th></th></tr>
                            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e(str_limit($d->newsletter_title,50,"...")); ?></td>
                                    <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($d->crdate)->format('d.m.Y')); ?></td>

                                    <td><a href="/admin/editNewsLetter/<?php echo e($d->uid); ?>"><button class='btn btn-primary'>Edit</button></a></td>
                                    <?php if($d->is_current==0): ?>
                                        <td><button type='button' class='btn btn-success' onClick='makeCurrentNewsLetter(<?php echo e($d->uid); ?>)'>Make Current</button></td>
                                    <?php else: ?>
                                        <td>Current Newsletter is being sent</td>
                                    <?php endif; ?>
                                    <td><button class='btn btn-danger' onclick="deleteNewsLetter(<?php echo e($d->uid); ?>)">Delete</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class='col-md-5'>
                <table class='table'>
                    <tr>
                        <td>Total Users Received Newsletters</td>
                        <td><?php echo e($fe_users['sent_newsletter']); ?></td>
                    </tr>
                    <tr>
                        <td>Total Users Not yet received</td>
                        <td><?php echo e($fe_users['not_sent']); ?></td>
                    </tr>
                    <tr>
                        <td>Unsubscribed Users</td>
                        <td><?php echo e($fe_users['unsubscribed']); ?></td>
                    </tr>
                    <tr>
                        <td>Total Users Clicked on Email</td>
                        <td><?php echo e($fe_users['total_user_clicked']); ?></td>
                    </tr>
                </table>

                </div>
        </div>
    </div>
</div>

<script>
    function deleteNewsLetter(id){
        $.ajax({
            'url':'/admin/deleteNewsletter/'+id,
            'method':'GET',
        }).done(function(data){
            window.location.reload();
        });
    }

    function makeCurrentNewsLetter(id){
        $.ajax({
            'url':'/admin/makeCurrentNewsLetter/'+id,
            'method':'GET'
        }).done(function (data){
            window.location.reload();
        });
    }

    function deactivate(){
        $.ajax({
            'url':'/admin/deactivateNewsletter/',
            'method':'GET'
        }).done(function(){
            window.location.reload();
        });
    }

</script>
