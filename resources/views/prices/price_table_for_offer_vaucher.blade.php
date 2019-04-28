<table class='vaucherTable'>
    <tr style='font-weight:bold;color:#013a89' class='tableHeader'>
        <th>Buchung</th>
        <th>Auftrag</th>
        <th>Gutschein-Empfänger</th>
        <th>Gewählte Einheit</th>
        <th>Total Betrag</th>
    </tr>
    @php $i=0; @endphp
    @foreach($request->prices as $p)
        <tr class='vaucherItem'>
            <td>{{$request->user['first_name']}} {{$request->user['last_name']}}</td>
            <td>Gutschein-Nr. {{\Carbon\Carbon::createFromTimeStamp(time())->format('y')}}-{{$max}}-S</td>
            <td>{{$request->vaucher_for}}</td>
            <td>{{$p['priceValue']}} 
                @if($unit=='Person' && $p['priceValue']>1)
                    Personen   
                @elseif($unit=='Pauschale' && $p['priceValue']>1)
                    Pauschalen
                @else
                    {{$unit}}
                @endif
            </td>
            <td><span style='float:left'>{{$currency==0?"CHF":"EUR"}}</span> <span style='float:right'>{{$current_total[$i]}}.00</span></td>
        </tr>
        @php
            $i++;
        @endphp
    @endforeach
    @foreach($additionals as $a)
        <tr class='vaucheritem'>
            <td></td>
            <td></td>
            <td></td>
            <td>{{$a->totalItems}}x {{$a->title}}</td>
            <td><span style='float:left'>{{$currency==0?"CHF":"EUR"}}</span><span style='float:right'>{{$a->current_total}}.00</span></td>
        </tr>
    @endforeach
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
            <td><span style='float:left'><b style='color:#013a89'>{{$currency==0?"CHF":"EUR"}}</b></span><span style='float:right'><b style='color:#013a89'>{{$total_price}}.00</b></span></td>
        </tr>
</table>