<div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">
  <div class="sidebar-wrapper">
    <div class='container-fluid'>
      <div class='row'>
        <div class='col-12'>
            <a href="/admin/logout" class=''>
              <button class='btn-block btn-warning logoutButton btn-lg' type='button'>Logout</button>
          </a>
        </div>
      </div>
      <div class='row'>
        <div class='col-12'>
          <div class="logo" >
            <a href="/admin/offers" class="simple-text">
                Admin Panel
            </a>
          </div>
        </div>
      </div>
    </div>
    <ul class="nav">
      @if(Session::get('user')->admin==1)
        <li class="@yield('ActiveOffer')">
          <a href="/admin/offers">
              {{-- <i class="pe-7s-menu"></i> --}}
              <div class='menuItem' style='background-color:white'></div>
              <p>Create offers</p>
          </a>
        </li>
      @endif
      <li class="@yield('ActiveRegion')">
        <a href="/admin/regions">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:red'></div>
            <p>Create Regions</p>
        </a>
      </li>
      <li  class="@yield('ActiveCategory')">
        <a href="/admin/categories">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:blue'></div>
            <p>Create Categories</p>
        </a>
      </li>
      <li  class="@yield('ActiveTourOperator')">
        <a href="/admin/touroperators">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:green'></div>
            <p>Create Tour Operator</p>
        </a>
      </li>
      <li  class="@yield('ActiveVoucher')">
        <a href="/admin/vouchers">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:yellow'></div>
            <p>Create Voucher Tmpl</p>
        </a>
      </li>
      <li class="@yield('ActiveAddNewsletters')">
          <a href="/admin/addNewsLetterForm">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:orange'></div>
            <p>Create Newsletter</p>
          </a>
        </li> 
      <li class="@yield('ActiveListOffers')">
        <a href="/admin/listOffers">
          {{-- <i class="pe-7s-menu"></i> --}}
          <div class='menuItem' style='background-color:white'></div>
          <p>List Offers</p>
        </a>
      </li>
      <li class="@yield('ActiveListRegions')">
        <a href="/admin/listRegions">
          {{-- <i class="pe-7s-menu"></i> --}}
          <div class='menuItem' style='background-color:red'></div>
          <p>List Regions</p>
        </a>
      </li>
      <li class="@yield('ActiveListCategories')">
        <a href="/admin/listCategories">
          {{-- <i class="pe-7s-menu"></i> --}}
          <div class='menuItem' style='background-color:blue'></div>
          <p>List Categories</p>
        </a>
      </li>
      <li class="@yield('ActiveListTourOperators')">
        <a href="/admin/listTourOperators">
          {{-- <i class="pe-7s-menu"></i> --}}
          <div class='menuItem' style='background-color:green'></div>
          <p>List Tour Operators</p>
        </a>
      </li>
      <li class="@yield('ActiveListVouchers')">
        <a href="/admin/listVouchers">
          {{-- <i class="pe-7s-menu"></i> --}}
          <div class='menuItem' style='background-color:yellow'></div>
          <p>List Vaucher Templates</p>
        </a>
      </li> 
      <li class="@yield('ActiveCreateNewsletters')">
        <a href="/admin/listNewsLetters">
          {{-- <i class="pe-7s-menu"></i> --}}
          <div class='menuItem' style='background-color:orange'></div>
          <p>List Newsletters</p>
        </a>
      </li>
       
      @if(Session::get('user')->admin==1)
        <li class="@yield('ActiveBookings')">
          <a href="/admin/listBookings">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:brown'></div>
            <p>All Bookings</p>
          </a>
        </li>
        <li class="@yield('ActiveVauchers')">
          <a href="/admin/listAllVauchers">
            {{-- <i class="pe-7s-menu"></i> --}}
            <div class='menuItem' style='background-color:black'></div>
            <p>All Vauchers</p>
          </a>
        </li> 
        <li class="@yield('ActiveCurrencies')">
          <a href="/admin/editCurrencies">
            <i class="pe-7s-menu"></i>
            <p>&euro; Edit Currencies</p>
          </a>
        </li> 
        @if(Session::get('user')->admin==1)
          <li class="@yield('Active_BU')">
            <a href="/admin/be_users">
              <i class="pe-7s-menu"></i>
              <p>Manage Backend Users </p>
            </a>
          </li>
        @endif
        <li class="@yield('Active_cr_BU')">
          <a href="/admin/cr_be_users">
            <i class="pe-7s-menu"></i>
            <p>Create Backend Users </p>
          </a>
        </li>
        <li class="@yield('Active_cr_BU')">
          <a href="/admin/listAllRedirects">
            <i class="pe-7s-menu"></i>
            <p>Manage Redirects</p>
          </a>
        </li>
        <li class="@yield('Active_cr_BU')">
          <a href="/admin/previewLayout">
            <i class="pe-7s-menu"></i>
            <p>Preview Layout</p>
          </a>
        </li>
        <li class="@yield('ActiveSeasonChange')">
          <a href="/admin/changeSeason">
            <i class="pe-7s-menu"></i>
            
            <p>Change Season</p>
          </a>
        </li> 
     @endif    
    </ul>
  </div>
</div>
