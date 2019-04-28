<div id=":jt" class="a3s aXjCH m1632b897d590af93"><div class="adM">


</div><div><div class="adM">
</div><p>
	{{$request->user['gender']=="Herr"?"Lieber":"Liebe"}} {{$request->user['gender']}} {{$request->user['last_name']}}
 
@if($request->send_type=='Postversand')
<p>Herzlichen Dank für Ihre Gutscheinbestellung.</p>

<p>Der folgende Erlebnisgutschein wird Ihnen innert 24 Stunden per A-Post zugeschickt:</p>
<br>
<p style='color: rgb(0,57,146);
	font-size: 16px;
	font-weight: 400;
	line-height: 24px;
	margin: 5px 0px;
	text-transform: uppercase;'>{{$offer[0]->title}}</p>

<table>
	<tr>
		<th width="200px"></th>
		<th></th>
	</tr>
	<tr>
		<td>Ausgestellt auf: </td>
		<td>{{$request->vaucher_for}}</td>
	</tr>
	<tr>
		<td>Text auf Gutschein:</td>
		<td>{{$request->vaucher_text}}</td>
	</tr>
	<tr>
		<td>Dauer:</td>
	<td>{{$offer[0]->day>1?"Tage":"Tag"}}, {{$offer[0]->night>1?"Nächte":"Nacht"}}</td>
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
	@foreach($prices as $p)
		<tr>
			<td>{{$p->o_title}}<br>{{$p->o_subtitle}}</td>
			<td>{{$p->currency==0?"CHF":"EURO"}}&nbsp;{{$p->adult_price}}</td>
			<td>{{$p->priceValue}}&nbsp;
                @if($person_type=='Person')
                    {{$p->priceValue>1?"Personen":"Person"}}
                @elseif($person_type=='Pauschale')
                    {{$p->priceValue>1?"Pauschale":"Pauschalen"}}
                @else
                    {{$person_type}}
                @endif
            </td>
			<td><span style='float:left'>{{$currency}}</span><span style='float:right'>{{floor($p->adult_price*$p->priceValue)}}.00</span></td>
		</tr>
	@endforeach
	@foreach($additionals as $a)
		<tr>
			<td>{{$a->title}}</td>
			<td>{{$currency}}&nbsp;{{$a->price}}</td>
			<td>{{$a->total_items}}x</td>
			<td><span style='float:left'>{{$currency}}</span><span style='float:right'>{{floor($a->current_total)}}.00</td>
		</tr>
	@endforeach
	@foreach($prices as $p)
		@if($loop->first)
			<tr class="m_8405220658581212700total-amount">
				<td style='border-top:1px solid rgb(123,172,209)'>&nbsp;</td>
				<td style='border-top:1px solid rgb(123,172,209)'>&nbsp;</td>
				<td valign="top" style='border-top:1px solid rgb(123,172,209)'>Gesamtbetrag:</td>
				<td valign="top" style='border-top:1px solid rgb(123,172,209)'>
					<span class="m_8405220658581212700price-total" ><span style='float:left'>{{$p->pc==0 ? "CHF":"EURO"}}</span><span style='float:right'>&nbsp;{{$grand_total}}.00</span></span> <br>
					<br>
					@if($currency=='CHF')
						<span class="m_8405220658581212700price-total-converted"><span style='float:left'>EURO</span><span style='float:right'>{{floor($grand_total/$exchange)}}.00 </span><br> *Richtwert</span>
					@else
						<span class="m_8405220658581212700price-total-converted"><span style='float:left'>CHF</span><span style='float:right'>{{floor($grand_total*$exchange)}}.00 </span><br> *Richtwert</span>
					@endif
				</td>
			</tr>
		@endif
	@endforeach
</table>
<table>
	<tr>
		<th width="200px"></th>
		<th></th>
	</tr>
	<tr>
		<td>Zahlungsart:</td>
		<td>{{$request->payment_type}}</td>
	</tr>

	<tr>
		<td>Versand:</td>
		<td>Postversand</td>
	</tr>
</table>
<br>
Wir hoffen, Ihnen damit dienen zu können und stehen für Fragen gerne zur Verfügung.
@elseif($request->send_type=='print@home')
	<br><br>
	Herzlichen Dank für Ihre Gutscheinbestellung.<br>
	<br>

	Gerne senden wir Ihnen den Erlebnisgutschein "{{$offer[0]->title}}" zusammen mit der Rechnung in der Beilage. Der Gutschein ist auf A4 formatiert und zum selber Ausdrucken.<br>
	<br>
	Bitte beachten Sie, die Preisgarantie beträgt 1 Jahr ab Ausstellungsdatum. Der Gutschein-Wert kann während 5 Jahren eingelöst werden.<br>
	<br>
	Wir wünschen Ihnen eine wunderschöne Überraschung.
	<br>
@endif
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