

<?php if(isset($filteredNav['gjyshiStatik'])): ?>
<div class="row navOver3 justify-content-center" style="line-height: 60px;">
    <div class="col-12">
        <?php $__currentLoopData = $data['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $ct->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($sct->parent==$filteredNav['gjyshiStatik']): ?>
                    <div class="subMainCatWarp nopadding align-self-center <?php echo e($filteredNav['gjyshi']==$sct->uid ? 'subActive':''); ?>">
                        <?php if($filteredNav['gjyshiStatik']==1): ?>
                            <a  href="<?php echo e(url('weekend/'.$sct->title_urls)); ?>/" class="thumbnail" title="<?php echo e($sct->title); ?>">
                                <span class="subMainCatWarp-test-6"><?php echo e($sct->title); ?></span>
                            </a>
                        <?php elseif($filteredNav['gjyshiStatik']==2): ?>
                            <a  href="<?php echo e(url('tagesausflug/'.$sct->title_urls)); ?>/" class="thumbnail" title="<?php echo e($sct->title); ?>">
                               <span class="subMainCatWarp-test-6"><?php echo e($sct->title); ?></span>
                            </a>
                        <?php else: ?>
                        <a  href="<?php echo e(url('gruppenausfluege/'.$sct->title_urls)); ?>/" class="thumbnail" title="<?php echo e($sct->title); ?>">
                                <span class="subMainCatWarp-test-6"><?php echo e($sct->title); ?></span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>