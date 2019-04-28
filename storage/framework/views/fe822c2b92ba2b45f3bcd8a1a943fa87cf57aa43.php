

<?php if( (isset($blue) || isset($data['nooffer'])) && isset($filteredNav['gjyshi']) && $filteredNav['gjyshi']>0  && ($filteredNav['gjyshiStatik']==1 || $filteredNav['gjyshiStatik']==2 || $filteredNav['gjyshiStatik']==3)): ?>
<div class="row navOver4D">
  
    <?php $__currentLoopData = $data['categoryData']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($cd->parent2==$filteredNav['selected']): ?>
            <div class="subCatWarp <?php echo e($filteredNav['selectedChild']==$cd->uid ? 'subActive':''); ?>">
                
                <?php if($filteredNav['gjyshiStatik']==1): ?>
                    <a  href="<?php echo e(url('weekend/'.$cd->value_alias)); ?>/" class="thumbnail" title="<?php echo e($cd->title); ?>">
                    <?php echo e($cd->title); ?>

                    </a>
                <?php elseif($filteredNav['gjyshiStatik']==2): ?>
                    <a  href="<?php echo e(url('tagesausflug/'.$cd->value_alias)); ?>/" class="thumbnail" title="<?php echo e($cd->title); ?>">
                    <?php echo e($cd->title); ?>

                    </a>
                <?php else: ?>
                    <a  href="<?php echo e(url('gruppenausfluege/'.$cd->value_alias)); ?>/" class="thumbnail" title="<?php echo e($cd->title); ?>">
                    <?php echo e($cd->title); ?>

                    </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php endif; ?>
<?php if( isset($blue)): ?>
<div class="row navOver4H">
<?php else: ?>
<div class="row navOver4H">
<?php endif; ?>

    <?php if(!isset($category_link) || (isset($category_link) && $category_link =='')): ?>
        <?php
            $category_link="/";
        ?>
    <?php else: ?>
        <?php
            $category_link='/'.$category_link.'/';
        ?>
    <?php endif; ?>
        <?php
        //we need $maincat to build the link
            $mainCat='erlebnis-schweiz';
            if(isset($filteredNav['gjyshiStatik'])){
                if($filteredNav['gjyshiStatik']==1){
                    $mainCat='weekend';
                }else if($filteredNav['gjyshiStatik']==2){
                    $mainCat='tagesausflug';
                }else if($filteredNav['gjyshiStatik']==3){
                    $mainCat='gruppenausfluege';   
                }
            }
            
        ?>
    
    <p class="regionenAlle">REGIONEN:</p>
    <a  href="<?php echo e(url('/'.$mainCat.$category_link)); ?>/">
        <p class="allRegionOpt">Alle Region</p>
    </a> 
    <?php $__currentLoopData = $data['regions']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="masterRegionHoler">
        
        <a  href="<?php echo e(url('/'.$mainCat.$category_link.'region/'.$r->value_alias)); ?>/" title="<?php echo e($r->title); ?>">
            <?php echo e($r->title); ?>

        </a>
        <ul class="align-self-center">
        <?php $__currentLoopData = $r->subRegions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="subCats"><a  href="<?php echo e(url('/'.$mainCat.$category_link.'region/'.$sr->value_alias)); ?>/" title="<?php echo e($sr->title); ?>">
            
                <?php echo e($sr->title); ?>

            
        </a></li>
        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>