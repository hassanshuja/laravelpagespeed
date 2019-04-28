<?php


Route::get('admin/','Controller@getLoginPage')->name('admin');

Route::group(['middleware'=>'admin'],function(){

    // Route::get('admin/be/{booking_id}/', "updateController@sendBookingMail");
    Route::get('admin/previewLayout/', "mainController@previewLayout");
    Route::get('admin/regions/', "mainController@adminRegions");
    Route::get('admin/categories/', 'mainController@adminCategories');
    Route::get('admin/offers/',"mainController@adminOffers");
    Route::get('admin/touroperators/','mainController@adminTourOperator');
    Route::get('admin/vouchers/','mainController@adminVouchers');
    Route::get('admin/cr_be_users/','mainController@be_users');
    Route::get('admin/editVoucherReservation/{vid}/','mainController@editVoucher');
    //conver an inserted date and insert it into the new columns
    Route::get('fixDates/{offer}/','Controller@fixDates');
    Route::get('fixDatess/','Controller@fixdatess');
    Route::get('admin/listLinks/','mainController@listLinks');



    Route::get('admin/listOffers/{search?}/','mainController@listOffersForEdit');
    Route::get('admin/listRegions/','mainController@listRegionsForEdit');
    Route::get('admin/listCategories/','mainController@listCategoriesForEdit');
    Route::get('admin/listTourOperators/{search?}/','mainController@listTourOperatorsForEdit');
    Route::get('admin/listVouchers/','mainController@listVouchersForEdit');
    Route::get('admin/listBookings/','mainController@listBookings');
    Route::get('admin/listAllVauchers/','mainController@listVauchers');
    Route::get('admin/be_users/','mainController@listBeUsers');
    Route::get('admin/listAllRedirects/','mainController@listRedirects');

    //main insertions
    Route::post('admin/addRegion/','updateController@addRegion');
    Route::post('admin/addOffer/','updateController@addOffer');
    Route::post('admin/addCategory/',['as'=>'addCategory','uses'=>'updateController@addCategory']);
    Route::post('admin/addTourOperator/','updateController@addTourOperator');
    Route::post('admin/addVoucher/','updateController@addVoucher');
    Route::post('admin/addBeUser/','updateController@addBeUser');

    // get forms to show on admin/ pages////////////////////////////////////////////////

    Route::get('admin/getPricesForm/{number}/','mainController@getPricesForm');
    Route::get('admin/getAdditionalsForm/{number}/','mainController@getAdditionalsForm');
    Route::get('admin/getOptionsForm/','mainController@getOptionsForm');
    Route::get('admin/getEditOptionsForm/{oid}/','mainController@getEditOptionsForm');
    Route::get('admin/getEditPriceForm/{price_id}/','mainController@getEditPricesForm');
    Route::get('admin/getEditAdditionalsForm/{additional_id}/','mainController@getEditAdditionalsForm');

    //Edit Forms
    Route::get('admin/editOfferForm/{offer_id}/','mainController@editOfferForm');
    Route::get('admin/editRegionForm/{region_id}/','mainController@editRegionForm');
    Route::get('admin/editCategoryForm/{category_id}/','mainController@editCategoryForm');
    Route::get('admin/editTourOperatorForm/{tid}/','mainController@editTourOperatorForm');
    Route::get('admin/editVoucher/{vid}/','mainController@editVoucherForm');

    Route::get('admin/editBeUser/{uid}/','mainController@editBeUser');

    Route::get('admin/editUser/{uid}/','mainController@editUser');

    //hide unhide, delete undelete
    Route::get('admin/offer/{offer_id}/{action}/','updateController@offerActions');
    Route::get('admin/image/{image_id}/{action}/','updateController@imageActions');
    Route::get('admin/price/{price_id}/{action}/','updateController@priceActions');
    Route::get('admin/additional/{additional_id}/{action}/','updateController@additionalActions');
    Route::get('admin/region/{region_id}/{action}/','updateController@regionActions');
    Route::get('admin/category/{category_id}/{action}/','updateController@categoryActions');
    Route::get('admin/touroperator/{tid}/{action}/','updateController@tourOperatorActions');
    Route::get('admin/voucher/{vid}/{action}/','updateController@voucherActions');
    Route::get('admin/deleteRegionImage/{region_id}/','updateController@deleteRegionImage');
    Route::get('admin/be_user/{action}/{user_id}/','updateController@be_userActions');
    // Submit edit
    Route::post('admin/submitEditPrice/','updateController@submitEditPrice');
    Route::post('admin/submitEditAdditional/','updateController@submitEditAdditional');
    Route::post('admin/submitEditOffer/','updateController@submitEditOffer');
    Route::post('admin/submitEditRegion/','updateController@submitEditRegion');
    Route::post('admin/submitEditCategory/','updateController@submitEditCategory');
    Route::post('admin/submitEditTourOperator/','updateController@submitEditTourOperator');
    Route::post('admin/submitEditVoucher/','updateController@submitEditVoucher');
    Route::post('admin/submitEditSeason/','updateController@submitEditSeason');
    Route::post('admin/submitEditCurrency/','updateController@submitCurrency');
    Route::post('admin/submitEditBooking/','updateController@submitEditBooking');
    Route::post('admin/submitEditUser/','updateController@submitEditUser');
    Route::post('admin/submitEditBeUser/','updateController@submitEditBeUser');
    Route::post('admin/submitEditOption/','updateController@submitEditOption');
    //swap ranks
    Route::get('admin/swapOfferRank/{offer1}/{offer2}/','updateController@swapOfferRank');
    Route::get('admin/swapCategoryRank/{cat1}/{cat2}/','updateController@swapCategoryRank');
    Route::get('admin/swapPriceRank/{price1}/{price2}/','updateController@swapPriceRank');
    Route::get('admin/swapAditionalRank/{add1}/{add2}/','updateController@swapAditionalRank');
    Route::get('admin/swapOfferRankDrop/{offer1}/{offer2}/','updateController@swapOfferRankDrop');
    Route::get('admin/swapCategoryRankDrop/{cat1}/{cat2}/','updateController@swapCategoryRankDrop');
    Route::get('admin/swapPriceRankDrop/{price1}/{price2}/','updateController@swapPriceRankDrop');
    Route::get('admin/swapAditionalRankDrop/{add1}/{add2}/','updateController@swapAditionalRankDrop');
    Route::get('admin/swapImageRank/{image1}/{image2}/','updateController@swapImageRank');
    Route::get('admin/swapImageRankDrop/{image1}/{image2}/','updateController@swapImageRankDrop');
    Route::get('admin/searchRelatedOffers/{keyword}/','mainController@searchRo');
    Route::get('admin/getOfferNameById/{uid}/','mainController@getOfferNameById');
    Route::get('admin/editBooking/{uid}/','mainController@editBooking');
    Route::get('admin/pdf/{uid}/{save?}/','updateController@pdf');
    Route::get('admin/deleteTempImage/{img}/','updateController@deleteTmp');
    Route::get('/admin/deactivateNewsletter/','updateController@deactivateNewsletter');
    //newsletter

    Route::get('admin/listNewsLetters/','mainController@listNewsLetters');
    Route::get('admin/editNewsLetter/{id}/','mainController@editNewsLetter');
    Route::get('admin/addNewsLetterForm/','mainController@addNewsLetterForm');
    Route::get('admin/previewNewsLetter/{id}/','mainController@previewNewsLetter');
    Route::post('admin/addNewsLetter/',['as'=>'addNewsLetter','uses'=>'updateController@addNewsLetter']);
    Route::post('admin/submitEditNewsLetter/',['as'=>'editNewsLetter','uses'=>'updateController@submitEditNewsLetter']);
    Route::get('admin/deleteNewsletter/{id}/','updateController@deleteNewsletter');
    Route::get('admin/sendNewsLetterMail/{id}/','updateController@sendNewsLetterMail');
    Route::get('admin/changeSeason/','mainController@changeSeason');

    Route::get('admin/editCurrencies/','mainController@currencies');

    Route::get('admin/logout/','Controller@Logout');

    Route::post('admin/submitVoucherReservationEdit/','updateController@submitVoucherReservationEdit');
    Route::get('admin/generateVoucherPdf/{vid}/{save?}/','updateController@generateVoucherPdf');
    Route::get('admin/generateVoucherInvoice/{vid}/{save?}/','updateController@generateVoucherInvoice');
    Route::get('admin/offerVaucherPDF/{vid}/','mainController@offerVaucherPdf');
    Route::get('admin/offerVaucherInvoice/{vid}/{save?}/','mainController@offerVaucherInvoice');
    Route::get('admin/generateOfferVaucherPDF/{vid}/{save?}/','mainController@generateOfferVaucherPdf');
    Route::get('admin/generateOfferVaucherInvoice/{vid}/{save?}/','mainController@offerVaucherInvoice');
    Route::post('admin/tempOptions/','updateController@tempOptions');
    Route::post('admin/saveImageDescription/','updateController@saveImageDescription');
    Route::get('admin/makeCurrentNewsLetter/{id}/','updateController@makeCurrentNewsLetter');
});
