<div class="row dDownsHide">
    <form action="{{url('/')}}" method="GET" id="form_navoverview">
    {{-- {{dd($data['duration'])}} --}}
        <div class="col-12 nopadding dropDwn">
          <div class="dropDwnDWN btn-group">
            <button id="buttRotate" onclick="toggleDivWithFilter('dDownSearchToggle','buttRotate')" type="button" class="btn"><strong>Suche</strong></button>
          </div>
        </div>
        <div id="dDownSearchToggle" class="dDownsWarp">
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
            <div class="input-group">
              <select class="custom-select " id="offerType"  name="offerType">
                <option value="alle" selected>
                  Angebotstyp
                  
                </option>
                @foreach($data['categories'] as $d)
                  <optgroup label="{{$d->title}}">
                   @php
                       $mainCat='weekend';
                      if($d->uid==2){
                        $mainCat='tagesausflug';
                      }else if($d->uid==3){
                        $mainCat='gruppenausfluege';
                      }
                   @endphp
                    <option value="{{$mainCat}}">Alle {{$d->title}}</option>
                      @foreach($d->subCategories as $s)
                        <option value="{{$mainCat}}/{{$s->title_urls}}">{{$s->title}}</option>
                      @endforeach
                  </optgroup>
                @endforeach
              </select>                
            </div>                
          </div>
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
            <div class="input-group">
                <select class="custom-select" id="offerRegion" name="offerRegion">
                  <option value="" selected>Region</option>
                  @foreach($data['regions'] as $s)
                    <option value="{{$s->value_alias}}">{{$s->title}}</option>
                  @endforeach
              </select>
            </div>                
          </div>
          
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
            <div class="input-group">
              <select class="custom-select" id="offerDuration"  name="offerDuration">
                  <option value="" selected>Dauer</option>
                  @foreach($data['duration'] as $d=>$n)
                    <option value='{{$n}}'>{{$n}} Tag, {{$d}} Nacht</option>
                  @endforeach
              </select>
            </div>                
          </div>
          <div class="col-12 col-md-3 col-lg-3 dDownsHolder">
              <div class="dDownsHolderMIn input-group searchIn">
                  <input type="text" class="form-control" placeholder="Search for..." id="searchUser">
                  <i class="fas fa-search" id="masterSearch"></i>
              </div>    
          </div>

           <div class="col-12 col-md-3 col-lg-3 mobile-search">
              <input type="submit" value = "Search">  
          </div>
        </div>
    </form>
      </div>