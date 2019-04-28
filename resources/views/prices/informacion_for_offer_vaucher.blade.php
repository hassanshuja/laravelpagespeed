@foreach($data as $d)
    <p><b>{{$d->ptitle}} </b></p>
    <p>{{$d->totalItems}} {{$d->otitle}} @if(strlen($d->o_subtitle)>0)({{$d->o_subtitle}})@endif</p>
    <br>
@endforeach

@if(count($additionals)>0)
    <b class='hiddenForInvoice'>Zusätzliche Leistungen</b><br>
@endif
@foreach($additionals as $a)
   {{$a->totalItems}}x {{$a->title}}
    <br>
@endforeach

{!!$info!!}
<br><br>
<span class='hiddenForInvoice'>{!!$offer[0]->vauchertext!!}</span>