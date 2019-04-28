<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <p><b><?php echo e($d->ptitle); ?> </b></p>
    <p><?php echo e($d->totalItems); ?> <?php echo e($d->otitle); ?> <?php if(strlen($d->o_subtitle)>0): ?>(<?php echo e($d->o_subtitle); ?>)<?php endif; ?></p>
    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(count($additionals)>0): ?>
    <b class='hiddenForInvoice'>Zusätzliche Leistungen</b><br>
<?php endif; ?>
<?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php echo e($a->totalItems); ?>x <?php echo e($a->title); ?>

    <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php echo $info; ?>

<br><br>
<span class='hiddenForInvoice'><?php echo $offer[0]->vauchertext; ?></span>