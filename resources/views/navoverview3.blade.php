{{-- {{dd($filteredNav)}} --}}
{{-- {{dd($data['categories'])}} --}}
@if(isset($filteredNav['gjyshiStatik']))
<div class="row navOver3 justify-content-center" style="line-height: 60px;">
    <div class="col-12">
        @foreach($data['categories'] as $ct)
            @foreach($ct->subCategories as $sct)
                @if($sct->parent==$filteredNav['gjyshiStatik'])
                    <div class="subMainCatWarp nopadding align-self-center {{$filteredNav['gjyshi']==$sct->uid ? 'subActive':''}}">
                        @if($filteredNav['gjyshiStatik']==1)
                            <a  href="{{url('weekend/'.$sct->title_urls)}}/" class="thumbnail" title="{{$sct->title}}">
                                <span class="subMainCatWarp-test-6">{{$sct->title}}</span>
                            </a>
                        @elseif($filteredNav['gjyshiStatik']==2)
                            <a  href="{{url('tagesausflug/'.$sct->title_urls)}}/" class="thumbnail" title="{{$sct->title}}">
                               <span class="subMainCatWarp-test-6">{{$sct->title}}</span>
                            </a>
                        @else
                        <a  href="{{url('gruppenausfluege/'.$sct->title_urls)}}/" class="thumbnail" title="{{$sct->title}}">
                                <span class="subMainCatWarp-test-6">{{$sct->title}}</span>
                            </a>
                        @endif
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
</div>
@endif