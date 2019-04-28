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
     
        @foreach($data as $p)
            <tr>
                <td>{{$p->o_title}}</td>
                <td>{{$p->o_subtitle}}</td>
                <td>{{$p->currency==0?"CHF":"EUR"}}<span> {{$p->adult_price}}</span></td>
                <td>{{$p->total_units}}
                    @if($person_type=='Person')
                        {{$p->total_units>1?"Personen":"Person"}}
                    @elseif($person_type=='Pauschale')
                        {{$p->total_units>1?"Pauschale":"Pauschalen"}}
                    @else
                        {{$person_type}}
                    @endif
                </td>
                <td>{{$p->currency==0?"CHF":"EUR"}}<span style='float:right'> {{$p->total_price}}.00 </span></td>
            </tr>
        @endforeach
        @foreach($additionals as $a)
            <tr>
                <td>{{$a->title}}</td>
                <td>{{$a->subtitle}}</td>
                <td>{{$currency==0?"CHF":"EURO"}}<span> {{$a->price}}</span></td>
                <td>{{$a->total_units}}x </td>
                <td>{{$currency==0?"CHF":"EURO"}}<span style='float:right'> {{$a->total_price}}.00</span></td>

            </tr>
        @endforeach
       
            <tr>
                <td style="border-bottom:none;"></td>
                <td style="border-bottom:none;"></td>
                <td style="border-bottom:none;"></td>
                <td style="border-bottom:none;"><b>Gesamtbetrag:</b></td>
                <td style="border-bottom:none;color:#0068b5"><b>{{$currency==0?"CHF":"EUR"}} <span style='float:right'>{{$grand_total}}.00</span> </b></td>
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
                @if($currency==1)
                    {{$currency==0?"EUR":"CHF"}} <span style='float:right'>{{round($grand_total*$exchange,0)}}.00*</span>
                @else
                    {{$currency==0?"EUR":"CHF"}} <span style='float:right'>{{round($grand_total/$exchange,0)}}.00*</span>
                @endif  
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