<h3>IHRE RESERVATIONEN</h3>
<table class="table">   
    <?php
    $prCount=1;
    ?>
    <tbody>

    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td width='300px'><?php echo e($p->o_title); ?></td>
            <td colspan='2'><?php echo e($p->o_subtitle); ?></td>
            <?php if($currency=='CHF'): ?>
                <td width='100'><span style='color:#013a89;font-weight:bold;'>CHF <?php echo e($p->adult_price); ?> </span></td>
                <td width='100'> <span style="color:gray">EUR <?php echo e(floor($p->adult_price/$exchange)); ?>.00*</span></td>
            <?php else: ?>
                <td width='100'><span style='color:#013a89;font-weight:bold;'>EUR <?php echo e($p->adult_price); ?> </span></td>
                <td width='100'><span style="color:gray">CHF <?php echo e(floor($p->adult_price*$exchange)); ?>.00*</span></td>
            <?php endif; ?>
            <td width="15%">
            <select class="custom-select" onchange="selectPrice(event,<?php echo e($p->uid); ?>,<?php echo e($p->adult_price); ?>)" id="price_<?php echo e($p->uid); ?>">
                <option value="0" selected></option>
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
        <?php
            $prCount++;
        ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span style='color:gray ;margin-top:-10px; margin-right:15px'>Richwert*</span></td>
        </tr>
    </tbody>
</table>

<?php if(count($additionals)>0): ?>
<h6 style='color:navy'>Optionen</h6>
<table class="table">   
<tbody>
<?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td width='300'><?php echo e($a->title); ?></td>
        <td colspan="2"><?php echo e($a->subtitle); ?></td>
        <?php if($currency=='CHF'): ?>
            <td width='100'><b style="color:#013a89"><?php echo e($currency); ?>  <?php echo e($a->price); ?></b></td>
            <td width='100'><span style="color:gray">EUR <?php echo e(floor($a->price/$exchange)); ?>.00*</span></td>
        <?php else: ?>
            <td width='100'><?php echo e($currency); ?> <b style="color:#013a89"><?php echo e($a->price); ?></b> </td>
            <td width='100'><span style="color:gray">CHF <?php echo e(floor($a->price*$exchange)); ?>.00*</span></td>                
        <?php endif; ?>
        <td width="15%">
            <select class="custom-select" onchange="selectAditional(event,<?php echo e($a->uid); ?>,<?php echo e($a->price); ?>)" id="price_<?php echo e($a->uid); ?>">
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
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><span style='color:gray; margin-top:-10px; margin-right:15px'>Richwert*</span></td>
</tr>
</tbody>

</table>

<?php endif; ?>