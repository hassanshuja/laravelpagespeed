@foreach($userData as $u)
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
            <td>{{$u->gender==0?"Herr":"Frau"}}</td>
        </tr>
        <tr>
            <td>Vorname / Nachname:</td>
            <td>{{$u->name}}</td>
        </tr>
        <tr>
            <td>Firma:</td>
            <td>{{$u->company}}</td>
        </tr>
        <tr>
            <td>Adresse:</td>
            <td>{{$u->address}}</td>
        </tr>
        <tr>
            <td>PLZ/Ort:</td>
            <td>{{$u->zip}}/{{$u->city}}</td>
        </tr>
        <tr>
            <td>Telefon:</td>
            <td>{{$u->telephone}}</td>
        </tr>
        <tr>
            <td>E-Mail:</td>
            <td><a href="mailto:{{$u->email}}" target="_blank">{{$u->email}}</a></td>
        </tr>
    </tbody>
</table>
@endforeach
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
            <td>{{$request->message}}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td>Zahlungsart:</td>
            <td>
                {{$request->payment_type}}
            </td>
        </tr>
        <tr>
            <td>Versand:</td>
            <td>
                {{$request->send_type}}
            </td>
        </tr>
    </tbody>
</table>

<br>
@foreach($offer as $o)
<p style='color:rgb(0,57,146); font-size:16px; font-weight:400; text-transform: uppercase;'>{{$o->title}}</p>
<table width="700" cellspacing="0" cellpadding="0" border="0">
    <tbody>
        <tr>
            <td width="200">Ausgestellt auf:</td>
            <td>{{$request->vaucher_for}}</td>
        </tr>
        <tr>
            <td valign="top">Text auf Gutschein:</td>
            <td valign="top">{{$request->vaucher_text}}</td>
        </tr>
        <tr>
            <td valign="top">Dauer:
                <br>
                <br>
            </td>
            <td valign="top">
                {{$o->day}} {{$o->day>1?"Tage":"Tag"}}, {{$o->night}} {{$o->night>1?"Nächte":"Nacht"}}
            </td>
        </tr>
    </tbody>
</table>
@endforeach
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