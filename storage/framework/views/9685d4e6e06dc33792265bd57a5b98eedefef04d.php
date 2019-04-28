<table class="bill-orderlist" style="width: 100%;" cellpadding="2" cellspacing="2">
    <tbody>
        <tr style='font-weight:bold' class='table-head'>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="30%" class='th-item'>Ihre Buchung</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="21%" class='th-item'>Buchungstermin</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="11%" class='th-item'>Anzahl</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="15%" class='th-item'>Preis pro Package</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="10%" class='th-item'>Total Betrag</td>
        </tr>
       
        <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($p->o_title); ?> <br> <?php echo e($p->o_subtitle); ?></td>
            <td><?php echo e(\Carbon\Carbon::createFromTimeStamp($date)->format('d.m.Y')); ?> <?php if($day>0): ?>- <?php echo e(\Carbon\Carbon::createFromTimeStamp($date+($day*86400))->format('d.m.Y')); ?> <?php endif; ?></td>
            <td><?php echo e($p->total_units); ?>&nbsp;
                <?php if($person_type=='Person'): ?>
                    <?php echo e($p->total_units>1?"Personen":"Person"); ?>

                <?php else: ?>
                    <?php echo e($person_type); ?>

                <?php endif; ?>
            </td>
            <td><?php echo e($currency==0?'CHF':"EUR"); ?>&nbsp;<?php echo e($p->adult_price); ?></td>
            <td><?php echo e($currency==0?'CHF':"EUR"); ?>&nbsp;<?php echo e($p->total_price); ?>.00</td>
        </tr>
    
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>    
                <td><?php echo e($a->title); ?></td>
                <td></td>
                <td><?php echo e($a->total_units); ?>x</td>
                <td><?php echo e($currency==0?'CHF':'EUR'); ?>&nbsp;<?php echo e($a->price); ?></td>
                <td><?php echo e($currency==0?'CHF':'EUR'); ?>&nbsp;<?php echo e($a->total_price); ?>.00</td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </tbody>
    <tfoot>
        <tr>
            <td  style='border-top:1px solid #093bcc; color:#013a89;'><b>Total Rechnungsbetrag inkl. MWST</b></td>
            <td colspan='3' style='border-top:1px solid #093bcc; color:#013a89;'></td>
            <td style='border-top:1px solid #093bcc; color:#013a89;'><b><?php echo e($currency==0?'CHF':"EUR"); ?>&nbsp;<?php echo e($grand_total); ?>.00</b>
        </tr>
    </tfoot>
</table>