<table class='vaucherTable'>
    <tr style='font-weight:bold;color:#013a89' class='tableHeader'>
        <th>Buchung</th>
        <th>Auftrag</th>
        <th>Gutschein-Empfänger</th>
        <th>Gewählte Einheit</th>
        <th>Total Betrag</th>
    </tr>
    <?php $i=0; ?>
    <?php $__currentLoopData = $request->prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class='vaucherItem'>
            <td><?php echo e($request->user['first_name']); ?> <?php echo e($request->user['last_name']); ?></td>
            <td>Gutschein-Nr. <?php echo e(\Carbon\Carbon::createFromTimeStamp(time())->format('y')); ?>-<?php echo e($max); ?>-S</td>
            <td><?php echo e($request->vaucher_for); ?></td>
            <td><?php echo e($p['priceValue']); ?> 
                <?php if($unit=='Person' && $p['priceValue']>1): ?>
                    Personen   
                <?php elseif($unit=='Pauschale' && $p['priceValue']>1): ?>
                    Pauschalen
                <?php else: ?>
                    <?php echo e($unit); ?>

                <?php endif; ?>
            </td>
            <td><span style='float:left'><?php echo e($currency==0?"CHF":"EUR"); ?></span> <span style='float:right'><?php echo e($current_total[$i]); ?>.00</span></td>
        </tr>
        <?php
            $i++;
        ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr class='vaucheritem'>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo e($a->totalItems); ?>x <?php echo e($a->title); ?></td>
            <td><span style='float:left'><?php echo e($currency==0?"CHF":"EUR"); ?></span><span style='float:right'><?php echo e($a->current_total); ?>.00</span></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <tr class='emptyRow'>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr class='lastRow'>
            <td><b style='color:#013a89'>Total Rechnungsbetrag</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span style='float:left'><b style='color:#013a89'><?php echo e($currency==0?"CHF":"EUR"); ?></b></span><span style='float:right'><b style='color:#013a89'><?php echo e($total_price); ?>.00</b></span></td>
        </tr>
</table>