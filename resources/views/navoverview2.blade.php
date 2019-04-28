{{-- {{dd($filteredNav)}} --}}
<div class="row overviewHold justify-content-center">
    <div class="col-2 nopadding allWeekend">
        @if(isset($filteredNav['gjyshiStatik']) && $filteredNav['gjyshiStatik']==1)
        <div class="wrapEr active">
            <a  href="/erlebnis/weekend/">
                <h2>WEEKEND</h2>
            </a>
        </div>
        @else
        <div class="wrapEr">
            <a  href="/erlebnis/weekend/">
                <h2>WEEKEND</h2>
            </a>
        </div>
        @endif
    </div>
    <div  class="col-2 nopadding allTagesausflug">
        @if(isset($filteredNav['gjyshiStatik']) && $filteredNav['gjyshiStatik']==2)
        <div class="wrapEr active">
            <a  href="/erlebnis/tagesausflug/">
                <h2>Tagesausflug</h2>
            </a>
        </div> 
        @else
        <div class="wrapEr">
            <a  href="/erlebnis/tagesausflug/">
                <h2>Tagesausflug</h2>
            </a>
        </div> 
        @endif
    </div>
    <div class="col-2 nopadding allGruppenausfluge">
        @if(isset($filteredNav['gjyshiStatik']) && $filteredNav['gjyshiStatik']==3)
        <div class="wrapEr active">
            <a  href="/erlebnis/gruppenausfluege/">
                <h2>Gruppenausflüge</h2>
            </a>
        </div>
        @else
        <div class="wrapEr">
            <a  href="/erlebnis/gruppenausfluege/">
                <h2>Gruppenausflüge</h2>
            </a>
        </div>
        @endif
    </div>
</div>