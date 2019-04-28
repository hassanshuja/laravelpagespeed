<h3>IHRE RESERVATIONEN</h3>
<?php $prCount=1; ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <span class='price-title'><?php echo e($k); ?></span>
    <table class='table'>
        <?php $__currentLoopData = $v; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style='line-height:1; width: 300px;'><?php echo e($p->o_title); ?> <br> <?php echo e($p->o_subtitle); ?></td>

                <?php if($currency=='CHF'): ?>
                    <td style="padding-top: 1px;"><span style='color:#013a89;font-weight:bold;'>CHF <?php echo e($p->adult_price); ?> </span><span style="color:gray">EUR <?php echo e(floor($p->adult_price/$exchange)); ?>*</span></td>
                <?php else: ?>
                    <td style='padding-top:10px'><span style='color:#013a89;font-weight:bold;'>EUR <?php echo e($p->adult_price); ?> </span><span style="color:gray">CHF <?php echo e(floor($p->adult_price*$exchange)); ?>*</span></td>
                <?php endif; ?>
                <td>
                    <select style='width:100px' class="custom-select" onchange="selectPrice(event,<?php echo e($p->uid); ?>,<?php echo e($p->adult_price); ?>)" id="price_<?php echo e($p->uid); ?>">
                        <option value="0" selected>&nbsp;</option>
                        <?php for($i=$offer[0]->min_persons;$i<=$offer[0]->max_persons;$i++): ?>
                            <?php if($offer[0]->person_type=='Person' && $i>1): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Personen</option>
                            <?php elseif($offer[0]->person_type=='Pauschale' && $i>1): ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Pauschalen</option>
                            <?php else: ?>
                                <option value="<?php echo e($i); ?>"><?php echo e($i); ?> <?php echo e($offer[0]->person_type); ?></option>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php
            $prCount++;
        ?>
    </table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<span style='float:right;color:gray ;margin-top:-20px; margin-right:150px; padding-bottom:50px'>Richwert*</span>
<?php if(count($additionals)>0): ?>
    <h6 style='color:navy'>Optionen</h6>
    <table class="table">
        <tbody>
        <?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td width='300'><?php echo e($a->title); ?></td>
                <?php if($currency=='CHF'): ?>
                    <td ><b style="color:#013a89"><?php echo e($currency); ?> <?php echo e($a->price); ?></b> <span style="color:gray">EUR: <?php echo e(floor($a->price/$exchange)); ?>*</span></td>
                <?php else: ?>
                    <td ><b style="color:#013a89"><?php echo e($currency); ?> <?php echo e($a->price); ?></b> <span  style="color:gray">CHF: <?php echo e(floor($a->price*$exchange)); ?>*</span></td>
                <?php endif; ?>
                <td>
                    <select style='width:100px' class="custom-select" onchange="selectAditional(event,<?php echo e($a->uid); ?>,<?php echo e($a->price); ?>)" id="price_<?php echo e($a->uid); ?>">
                        <option value="0" selected></option>
                        <?php for($i=$a->min_persons;$i<=$a->max_persons;$i++): ?>
                            <option value="<?php echo e($i); ?>"><?php echo e($i); ?>x</option>
                        <?php endfor; ?>
                    </select>
                </td>
            </tr>
            <?php
                $prCount++;
            ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td><td><span style='float:right;color:gray; margin-top:-10px; margin-right:15px'>Richwert*</span></td>
        </tr>
        </tbody>

    </table>

<?php endif; ?>