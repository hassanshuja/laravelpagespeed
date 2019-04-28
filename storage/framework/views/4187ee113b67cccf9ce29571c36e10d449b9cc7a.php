<?php $__currentLoopData = $userData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p>Neue Gutscheinbestellung:</p>
<p style='color:rgb(0,57,146); font-size:16px; font-weight:400; text-transform: uppercase;'>Rechnungs/Versandadresse</p>
<table width="700" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <th width="200px"></th>
            <th></th>
        </tr>
        <tr>
            <td width="200">Anrede:</td>
            <td><?php echo e($u->gender==0?"Herr":"Frau"); ?></td>
        </tr>
        <tr>
            <td>Vorname / Nachname:</td>
            <td><?php echo e($u->name); ?></td>
        </tr>
        <tr>
            <td>Firma:</td>
            <td><?php echo e($u->company); ?></td>
        </tr>
        <tr>
            <td>Adresse:</td>
            <td><?php echo e($u->address); ?></td>
        </tr>
        <tr>
            <td>PLZ/Ort:</td>
            <td><?php echo e($u->zip); ?>/<?php echo e($u->city); ?></td>
        </tr>
        <tr>
            <td>Telefon:</td>
            <td><?php echo e($u->telephone); ?></td>
        </tr>
        <tr>
            <td>E-Mail:</td>
            <td><a href="mailto:<?php echo e($u->email); ?>" target="_blank"><?php echo e($u->email); ?></a></td>
        </tr>
    </tbody>
</table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<br>
<p style='color:rgb(0,57,146); font-size:16px; font-weight:400; text-transform: uppercase;'>Informationen zur Gutscheinbestellung</p>
<table width="700" cellspacing="0" cellpadding="0" border="0">
        <tr>
            <th width="200px"> </th>
            <th></th>
        </tr>
    <tbody>
        
        <tr>
            <td width="200" valign="top">Wünsche des Kunden:</td>
            <td><?php echo e($request->message); ?></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Zahlungsart:</td>
            <td>
                <?php echo e($request->payment_type); ?>

            </td>
        </tr>
        <tr>
            <td>Versand:</td>
            <td>
                <?php echo e($request->send_type); ?>

            </td>
        </tr>
    </tbody>
</table>

<br>
<?php $__currentLoopData = $offer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p style='color:rgb(0,57,146); font-size:16px; font-weight:400; text-transform: uppercase;'><?php echo e($o->title); ?></p>
<table width="700" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td width="200">Ausgestellt auf:</td>
            <td><?php echo e($request->vaucher_for); ?></td>
        </tr>
        <tr>
            <td valign="top">Text auf Gutschein:</td>
            <td valign="top"><?php echo e($request->vaucher_text); ?></td>
        </tr>
        <tr>
            <td valign="top">Dauer:
                <br>
                <br>
            </td>
            <td valign="top">
                <?php echo e($o->day); ?> <?php echo e($o->day>1?"Tage":"Tag"); ?>, <?php echo e($o->night); ?> <?php echo e($o->night>1?"Nächte":"Nacht"); ?>

            </td>
        </tr>
    </tbody>
</table>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<table>
    <tr class="">
        <td width="300px" style='border-bottom:1px solid rgb(123,172,209)'><b style='color:rgb(123,172,209)'>Gutscheinerlebnis</b></th>
        <td width="150px" style='border-bottom:1px solid rgb(123,172,209)'><b style='color:rgb(123,172,209)'>Preis</b></th>
        <td width="150px" style='border-bottom:1px solid rgb(123,172,209)'><b style='color:rgb(123,172,209)'>Anzahl</b></th>
        <td width="100px" style='border-bottom:1px solid rgb(123,172,209)'> <b style='color:rgb(123,172,209)'>Total</b></th>
    </tr>
    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($p->o_title); ?><br><?php echo e($p->o_subtitle); ?></td>
            <td><?php echo e($p->currency==0?"CHF":"EURO"); ?>&nbsp;<?php echo e($p->adult_price); ?></td>
            <td><?php echo e($p->priceValue); ?>&nbsp;
                <?php if($person_type=='Person'): ?>
                    <?php echo e($p->priceValue>1?"Personen":"Person"); ?>

                <?php elseif($person_type=='Pauschale'): ?>
                    <?php echo e($p->priceValue>1?"Pauschale":"Pauschalen"); ?>

                <?php else: ?>
                    <?php echo e($person_type); ?>

                <?php endif; ?>
            </td>   
            <td><span style='float:left'><?php echo e($currency); ?></span><span style='float:right'><?php echo e(floor($p->adult_price*$p->priceValue)); ?>.00</span></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $additionals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($a->title); ?></td>
            <td><?php echo e($currency); ?>&nbsp;<?php echo e($a->price); ?></td>
            <td><?php echo e($a->total_items); ?>x</td>
            <td><span style='float:left'><?php echo e($currency); ?></span><span style='float:right'><?php echo e(floor($a->current_total)); ?>.00</td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($loop->first): ?>
            <tr class="m_8405220658581212700total-amount">
                <td style='border-top:1px solid rgb(123,172,209)'>&nbsp;</td>
                <td style='border-top:1px solid rgb(123,172,209)'>&nbsp;</td>
                <td valign="top" style='border-top:1px solid rgb(123,172,209)'>Gesamtbetrag:</td>
                <td valign="top" style='border-top:1px solid rgb(123,172,209)'>
                    <span class="m_8405220658581212700price-total" ><span style='float:left'><?php echo e($p->pc==0 ? "CHF":"EURO"); ?></span><span style='float:right'>&nbsp;<?php echo e($grand_total); ?>.00</span></span> <br>
                    <br>
                    <?php if($currency=='CHF'): ?>
                        <span class="m_8405220658581212700price-total-converted"><span style='float:left'>EURO</span><span style='float:right'><?php echo e(floor($grand_total/$exchange)); ?>.00 </span><br> *Richtwert</span>
                    <?php else: ?>
                        <span class="m_8405220658581212700price-total-converted"><span style='float:left'>CHF</span><span style='float:right'><?php echo e(floor($grand_total*$exchange)); ?>.00 </span><br> *Richtwert</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</table>
<br>
<p>Beste Grüsse
    <br>
    <br> Ihr Service-Team
    <br> Swiss Insider GmbH
    <br>
</p>
<table cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td style="padding:0">Telefon&nbsp;</td>
            <td style="padding:0">+41 (0)43 288 06 26</td>
        </tr>
        <tr>
            <td style="padding:0">E-Mail</td>
            <td style="padding:0"><a href="mailto:info@meinweekend.ch" target="_blank">info@meinweekend.ch</a></td>
        </tr>
        <tr>
            <td style="padding:0">URL</td>
            <td style="padding:0"><a href="https://www.meinweekend.ch" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.meinweekend.ch&amp;source=gmail&amp;ust=1525769900218000&amp;usg=AFQjCNF22gvdFDtLjNLD6NPeg1X-Xd1Cxg">www.meinweekend.ch</a></td>
        </tr>
    </tbody>
</table>

<style>
    	.blueText{
            color: rgb(0,57,146);
            font-size: 16px;
            font-weight: 400;
            line-height: 24px;
            margin: 5px 0px;
            text-transform: uppercase;
        }
</style>