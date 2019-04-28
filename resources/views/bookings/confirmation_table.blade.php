<table class="bill-orderlist" style="width: 100%;" cellpadding="2" cellspacing="2">
    <tbody>
        <tr style='font-weight:bold' class='table-head'>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="30%" class='th-item'>Ihre Buchung</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="21%" class='th-item'>Buchungstermin</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="11%" class='th-item'>Anzahl</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="15%" class='th-item'>Preis pro Package</td>
            <td style='border-bottom:1px solid #74acd2; color:#013a89;' width="10%" class='th-item'>Total Betrag</td>
        </tr>
       
        @foreach($prices as $p)
        <tr>
            <td>{{$p->o_title}} <br> {{$p->o_subtitle}}</td>
            <td>{{\Carbon\Carbon::createFromTimeStamp($date)->format('d.m.Y')}} @if($day>0)- {{\Carbon\Carbon::createFromTimeStamp($date+($day*86400))->format('d.m.Y')}} @endif</td>
            <td>{{$p->total_units}}&nbsp;
                @if($person_type=='Person')
                    {{$p->total_units>1?"Personen":"Person"}}
                @else
                    {{$person_type}}
                @endif
            </td>
            <td>{{$currency==0?'CHF':"EUR"}}&nbsp;{{$p->adult_price}}</td>
            <td>{{$currency==0?'CHF':"EUR"}}&nbsp;{{$p->total_price}}.00</td>
        </tr>
    
        @endforeach
        @foreach($additionals as $a)
            <tr>    
                <td>{{$a->title}}</td>
                <td></td>
                <td>{{$a->total_units}}x</td>
                <td>{{$currency==0?'CHF':'EUR'}}&nbsp;{{$a->price}}</td>
                <td>{{$currency==0?'CHF':'EUR'}}&nbsp;{{$a->total_price}}.00</td>
            </tr>
        @endforeach
       
    </tbody>
    <tfoot>
        <tr>
            <td  style='border-top:1px solid #093bcc; color:#013a89;'><b>Total Rechnungsbetrag inkl. MWST</b></td>
            <td colspan='3' style='border-top:1px solid #093bcc; color:#013a89;'></td>
            <td style='border-top:1px solid #093bcc; color:#013a89;'><b>{{$currency==0?'CHF':"EUR"}}&nbsp;{{$grand_total}}.00</b>
        </tr>
    </tfoot>
</table>