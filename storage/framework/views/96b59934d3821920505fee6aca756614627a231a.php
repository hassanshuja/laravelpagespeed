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
      <?php if(Session::get('user')->admin==1): ?>
        <li class="<?php echo $__env->yieldContent('ActiveOffer'); ?>">
          <a href="/admin/offers">
              
              <div class='menuItem' style='background-color:white'></div>
              <p>Create offers</p>
          </a>
        </li>
      <?php endif; ?>
      <li class="<?php echo $__env->yieldContent('ActiveRegion'); ?>">
        <a href="/admin/regions">
            
            <div class='menuItem' style='background-color:red'></div>
            <p>Create Regions</p>
        </a>
      </li>
      <li  class="<?php echo $__env->yieldContent('ActiveCategory'); ?>">
        <a href="/admin/categories">
            
            <div class='menuItem' style='background-color:blue'></div>
            <p>Create Categories</p>
        </a>
      </li>
      <li  class="<?php echo $__env->yieldContent('ActiveTourOperator'); ?>">
        <a href="/admin/touroperators">
            
            <div class='menuItem' style='background-color:green'></div>
            <p>Create Tour Operator</p>
        </a>
      </li>
      <li  class="<?php echo $__env->yieldContent('ActiveVoucher'); ?>">
        <a href="/admin/vouchers">
            
            <div class='menuItem' style='background-color:yellow'></div>
            <p>Create Voucher Tmpl</p>
        </a>
      </li>
      <li class="<?php echo $__env->yieldContent('ActiveAddNewsletters'); ?>">
          <a href="/admin/addNewsLetterForm">
            
            <div class='menuItem' style='background-color:orange'></div>
            <p>Create Newsletter</p>
          </a>
        </li> 
      <li class="<?php echo $__env->yieldContent('ActiveListOffers'); ?>">
        <a href="/admin/listOffers">
          
          <div class='menuItem' style='background-color:white'></div>
          <p>List Offers</p>
        </a>
      </li>
      <li class="<?php echo $__env->yieldContent('ActiveListRegions'); ?>">
        <a href="/admin/listRegions">
          
          <div class='menuItem' style='background-color:red'></div>
          <p>List Regions</p>
        </a>
      </li>
      <li class="<?php echo $__env->yieldContent('ActiveListCategories'); ?>">
        <a href="/admin/listCategories">
          
          <div class='menuItem' style='background-color:blue'></div>
          <p>List Categories</p>
        </a>
      </li>
      <li class="<?php echo $__env->yieldContent('ActiveListTourOperators'); ?>">
        <a href="/admin/listTourOperators">
          
          <div class='menuItem' style='background-color:green'></div>
          <p>List Tour Operators</p>
        </a>
      </li>
      <li class="<?php echo $__env->yieldContent('ActiveListVouchers'); ?>">
        <a href="/admin/listVouchers">
          
          <div class='menuItem' style='background-color:yellow'></div>
          <p>List Vaucher Templates</p>
        </a>
      </li> 
      <li class="<?php echo $__env->yieldContent('ActiveCreateNewsletters'); ?>">
        <a href="/admin/listNewsLetters">
          
          <div class='menuItem' style='background-color:orange'></div>
          <p>List Newsletters</p>
        </a>
      </li>
       
      <?php if(Session::get('user')->admin==1): ?>
        <li class="<?php echo $__env->yieldContent('ActiveBookings'); ?>">
          <a href="/admin/listBookings">
            
            <div class='menuItem' style='background-color:brown'></div>
            <p>All Bookings</p>
          </a>
        </li>
        <li class="<?php echo $__env->yieldContent('ActiveVauchers'); ?>">
          <a href="/admin/listAllVauchers">
            
            <div class='menuItem' style='background-color:black'></div>
            <p>All Vauchers</p>
          </a>
        </li> 
        <li class="<?php echo $__env->yieldContent('ActiveCurrencies'); ?>">
          <a href="/admin/editCurrencies">
            <i class="pe-7s-menu"></i>
            <p>&euro; Edit Currencies</p>
          </a>
        </li> 
        <?php if(Session::get('user')->admin==1): ?>
          <li class="<?php echo $__env->yieldContent('Active_BU'); ?>">
            <a href="/admin/be_users">
              <i class="pe-7s-menu"></i>
              <p>Manage Backend Users </p>
            </a>
          </li>
        <?php endif; ?>
        <li class="<?php echo $__env->yieldContent('Active_cr_BU'); ?>">
          <a href="/admin/cr_be_users">
            <i class="pe-7s-menu"></i>
            <p>Create Backend Users </p>
          </a>
        </li>
        <li class="<?php echo $__env->yieldContent('Active_cr_BU'); ?>">
          <a href="/admin/listAllRedirects">
            <i class="pe-7s-menu"></i>
            <p>Manage Redirects</p>
          </a>
        </li>
        <li class="<?php echo $__env->yieldContent('Active_cr_BU'); ?>">
          <a href="/admin/previewLayout">
            <i class="pe-7s-menu"></i>
            <p>Preview Layout</p>
          </a>
        </li>
        <li class="<?php echo $__env->yieldContent('ActiveSeasonChange'); ?>">
          <a href="/admin/changeSeason">
            <i class="pe-7s-menu"></i>
            
            <p>Change Season</p>
          </a>
        </li> 
     <?php endif; ?>    
    </ul>
  </div>
</div>
