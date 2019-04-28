<table class="table">
    <thead>
        <tr>
        <th scope="col" width='29%'>Angebot</th>
        <th scope="col" width='18%'></th>
        <th scope="col" width='18%'>Preis</th>
        <th scope="col" width='20%'>Anzahl</th>
        <th scope="col" width='15%'>Total</th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
     
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($p->o_title); ?></td>
                <td><?php echo e($p->o_subtitle); ?></td>
                <td><?php echo e($p->currency==0?"CHF":"EUR"); ?><span> <?php echo e($p->adult_price); ?></span></td>
                <td><?php echo e($p->total_units); ?>

                    <?php if($person_type=='Person'): ?>
                        <?php echo e($p->total_units>1?"Personen":"Person"); ?>

                    <?php elseif($person_type=='Pauschale'): ?>
                        <?php echo e($p->total_units>1?"Pauschale":"Pauschalen"); ?>

                    <?php else: ?>
                        <?php echo e($person_type); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($p->currency==0?"CHF":"EUR"); ?><span style='float:right'> <?php echo e($p->total_price); ?>.00 </span></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($a->title); ?></td>
                <td><?php echo e($a->subtitle); ?></td>
                <td><?php echo e($currency==0?"CHF":"EURO"); ?><span> <?php echo e($a->price); ?></span></td>
                <td><?php echo e($a->total_units); ?>x </td>
                <td><?php echo e($currency==0?"CHF":"EURO"); ?><span style='float:right'> <?php echo e($a->total_price); ?>.00</span></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
            <tr>
                <td style="border-bottom:none;"></td>
                <td style="border-bottom:none;"></td>
                <td style="border-bottom:none;"></td>
                <td style="border-bottom:none;"><b>Gesamtbetrag:</b></td>
                <td style="border-bottom:none;color:#0068b5"><b><?php echo e($currency==0?"CHF":"EUR"); ?> <span style='float:right'><?php echo e($grand_total); ?>.00</span> </b></td>
            </tr>
            <tr>
                <td style="border:none;" colspan="6">&nbsp;</td>
            </tr>
            <tr class="noBorder">
                <td></td>
                <td></td>
                <td></td>
                <td>
                    
                </td>
                
                <td style="font-size:12px;">
                <?php if($currency==1): ?>
                    <?php echo e($currency==0?"EUR":"CHF"); ?> <span style='float:right'><?php echo e(round($grand_total*$exchange,0)); ?>.00*</span>
                <?php else: ?>
                    <?php echo e($currency==0?"EUR":"CHF"); ?> <span style='float:right'><?php echo e(round($grand_total/$exchange,0)); ?>.00*</span>
                <?php endif; ?>  
            </td>
            </tr>
            <tr>
                <td style="border:none;" colspan="4"></td>
            </tr>
           
            <tr>
                <td style='border:none' colspan="4"></td>
                <td style="border:none;color:gray;text-size:12px">*Richwert</td>
                
            </tr>
    </tbody>
</table>