<h3>IHRE RESERVATIONEN</h3>
<table class="table">   
    @php
    $prCount=1;
    @endphp
    <tbody>

    @foreach($data as $p)
        <tr>
            <td width='300px'>{{$p->o_title}}</td>
            <td colspan='2'>{{$p->o_subtitle}}</td>
            @if($currency=='CHF')
                <td width='100'><span style='color:#013a89;font-weight:bold;'>CHF {{$p->adult_price}} </span></td>
                <td width='100'> <span style="color:gray">EUR {{floor($p->adult_price/$exchange)}}.00*</span></td>
            @else
                <td width='100'><span style='color:#013a89;font-weight:bold;'>EUR {{$p->adult_price}} </span></td>
                <td width='100'><span style="color:gray">CHF {{floor($p->adult_price*$exchange)}}.00*</span></td>
            @endif
            <td width="15%">
            <select class="custom-select" onchange="selectPrice(event,{{$p->uid}},{{$p->adult_price}})" id="price_{{$p->uid}}">
                <option value="0" selected></option>
                @for($i=$offer[0]->min_persons;$i<=$offer[0]->max_persons;$i++)
                    @if($offer[0]->person_type=='Person' && $i>1)
                        <option value="{{$i}}">{{$i}} Personen</option>
                    @elseif($offer[0]->person_type=='Pauschale' && $i>1)
                        <option value="{{$i}}">{{$i}} Pauschalen</option>
                    @else
                        <option value="{{$i}}">{{$i}} {{$offer[0]->person_type}}</option>
                    @endif
                @endfor
            </select>
            </td>
        </tr>
        @php
            $prCount++;
        @endphp
        @endforeach
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><span style='color:gray ;margin-top:-10px; margin-right:15px'>Richwert*</span></td>
        </tr>
    </tbody>
</table>

@if(count($additionals)>0)
<h6 style='color:navy'>Optionen</h6>
<table class="table">   
<tbody>
@foreach($additionals as $a)
    <tr>
        <td width='300'>{{$a->title}}</td>
        <td colspan="2">{{$a->subtitle}}</td>
        @if($currency=='CHF')
            <td width='100'><b style="color:#013a89">{{$currency}}  {{$a->price}}</b></td>
            <td width='100'><span style="color:gray">EUR {{floor($a->price/$exchange)}}.00*</span></td>
        @else
            <td width='100'>{{$currency}} <b style="color:#013a89">{{$a->price}}</b> </td>
            <td width='100'><span style="color:gray">CHF {{floor($a->price*$exchange)}}.00*</span></td>                
        @endif
        <td width="15%">
            <select class="custom-select" onchange="selectAditional(event,{{$a->uid}},{{$a->price}})" id="price_{{$a->uid}}">
                <option value="0" selected></option>
                @for($i=$a->min_persons;$i<=$a->max_persons;$i++)
                    <option value="{{$i}}">{{$i}}x</option>
                @endfor
            </select>
        </td>
    </tr>
    @php
        $prCount++;
    @endphp
@endforeach
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td><span style='color:gray; margin-top:-10px; margin-right:15px'>Richwert*</span></td>
</tr>
</tbody>

</table>

@endif