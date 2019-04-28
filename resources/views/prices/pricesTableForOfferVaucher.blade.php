<h3>IHRE RESERVATIONEN</h3>
@php $prCount=1; @endphp
@foreach($data as $k=>$v)
    <span class='price-title'>{{$k}}</span>
    <table class='table'>
        @foreach($v as $p)
            <tr>
                <td style='line-height:1; width: 300px;'>{{$p->o_title}} <br> {{$p->o_subtitle}}</td>

                @if($currency=='CHF')
                    <td style="padding-top: 1px;"><span style='color:#013a89;font-weight:bold;'>CHF {{$p->adult_price}} </span><span style="color:gray">EUR {{floor($p->adult_price/$exchange)}}*</span></td>
                @else
                    <td style='padding-top:10px'><span style='color:#013a89;font-weight:bold;'>EUR {{$p->adult_price}} </span><span style="color:gray">CHF {{floor($p->adult_price*$exchange)}}*</span></td>
                @endif
                <td>
                    <select style='width:100px' class="custom-select" onchange="selectPrice(event,{{$p->uid}},{{$p->adult_price}})" id="price_{{$p->uid}}">
                        <option value="0" selected>&nbsp;</option>
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
        @endforeach
        @php
            $prCount++;
        @endphp
    </table>
@endforeach
<span style='float:right;color:gray ;margin-top:-20px; margin-right:150px; padding-bottom:50px'>Richwert*</span>
@if(count($additionals)>0)
    <h6 style='color:navy'>Optionen</h6>
    <table class="table">
        <tbody>
        @foreach($additionals as $a)
            <tr>
                <td width='300'>{{$a->title}}</td>
                @if($currency=='CHF')
                    <td ><b style="color:#013a89">{{$currency}} {{$a->price}}</b> <span style="color:gray">EUR: {{floor($a->price/$exchange)}}*</span></td>
                @else
                    <td ><b style="color:#013a89">{{$currency}} {{$a->price}}</b> <span  style="color:gray">CHF: {{floor($a->price*$exchange)}}*</span></td>
                @endif
                <td>
                    <select style='width:100px' class="custom-select" onchange="selectAditional(event,{{$a->uid}},{{$a->price}})" id="price_{{$a->uid}}">
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
            <td></td><td><span style='float:right;color:gray; margin-top:-10px; margin-right:15px'>Richwert*</span></td>
        </tr>
        </tbody>

    </table>

@endif