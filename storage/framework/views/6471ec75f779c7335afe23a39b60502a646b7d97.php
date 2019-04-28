<div id=":jt" class="a3s aXjCH m1632b897d590af93"><div class="adM">


</div><div><div class="adM">
</div><p>
	<?php echo e($request->user['gender']=="Herr"?"Lieber":"Liebe"); ?> <?php echo e($request->user['gender']); ?> <?php echo e($request->user['last_name']); ?>

 
<?php if($request->send_type=='Postversand'): ?>
<p>Herzlichen Dank für Ihre Gutscheinbestellung.</p>

<p>Der folgende Erlebnisgutschein wird Ihnen innert 24 Stunden per A-Post zugeschickt:</p>
<br>
<p style='color: rgb(0,57,146);
	font-size: 16px;
	font-weight: 400;
	line-height: 24px;
	margin: 5px 0px;
	text-transform: uppercase;'><?php echo e($offer[0]->title); ?></p>

<table>
	<tr>
		<th width="200px"></th>
		<th></th>
	</tr>
	<tr>
		<td>Ausgestellt auf: </td>
		<td><?php echo e($request->vaucher_for); ?></td>
	</tr>
	<tr>
		<td>Text auf Gutschein:</td>
		<td><?php echo e($request->vaucher_text); ?></td>
	</tr>
	<tr>
		<td>Dauer:</td>
	<td><?php echo e($offer[0]->day>1?"Tage":"Tag"); ?>, <?php echo e($offer[0]->night>1?"Nächte":"Nacht"); ?></td>
	</tr>
</table>
<br>
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
<table>
	<tr>
		<th width="200px"></th>
		<th></th>
	</tr>
	<tr>
		<td>Zahlungsart:</td>
		<td><?php echo e($request->payment_type); ?></td>
	</tr>

	<tr>
		<td>Versand:</td>
		<td>Postversand</td>
	</tr>
</table>
<br>
Wir hoffen, Ihnen damit dienen zu können und stehen für Fragen gerne zur Verfügung.
<?php elseif($request->send_type=='print@home'): ?>
	<br><br>
	Herzlichen Dank für Ihre Gutscheinbestellung.<br>
	<br>

	Gerne senden wir Ihnen den Erlebnisgutschein "<?php echo e($offer[0]->title); ?>" zusammen mit der Rechnung in der Beilage. Der Gutschein ist auf A4 formatiert und zum selber Ausdrucken.<br>
	<br>
	Bitte beachten Sie, die Preisgarantie beträgt 1 Jahr ab Ausstellungsdatum. Der Gutschein-Wert kann während 5 Jahren eingelöst werden.<br>
	<br>
	Wir wünschen Ihnen eine wunderschöne Überraschung.
	<br>
<?php endif; ?>
<br>
Beste Grüsse<br>
<br><br>
Ihr Service-Team<br>
Swiss Insider GmbH<br>
</p>
<table cellspacing="0" cellpadding="0" border="0">
<tbody><tr><td style="padding:0">Telefon&nbsp;</td><td style="padding:0">+41 (0)43 288 06 26</td></tr>
<tr><td style="padding:0">E-Mail</td><td style="padding:0"><a href="mailto:info@meinweekend.ch" target="_blank">info@meinweekend.ch</a></td></tr>
<tr><td style="padding:0">URL</td><td style="padding:0"><a href="https://www.meinweekend.ch" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=en&amp;q=https://www.meinweekend.ch&amp;source=gmail&amp;ust=1525940719709000&amp;usg=AFQjCNF01RJBitOsXiFrXMD-R8L-9wxyJA">www.meinweekend.ch</a></td></tr>
</tbody></table><div class="yj6qo"></div><div class="adL">
</div></div><div class="adL">
</div></div>

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