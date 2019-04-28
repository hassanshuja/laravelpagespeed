<?php
use Spatie\Sitemap\SitemapGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('getFirst/','Controller@getFirst');
Route::get('testmap/','mainController@sitemapmake');
//Ayaz





Route::post('convertToTable/','Controller@convertToTable2');
Route::get('getRedirects/','Controller@getRedirects');
Route::get('getPricesForVaucher/{offerId}/{request?}/','mainController@getPricesForVaucher');
Route::get('cs/','updateController@confirmationServices');

Route::group(['middleware'=>'navigateMiddleware'],function(){


    
    //Chris New
    Route::get('/{category}/region/{region}/fuer/','mainController@redirect2');
    //Route::get('{parent}/{category}/region/{region}/fuer/','mainController@redirect2');
    Route::get('{parent}/{category}/region/{region}/fuer/','mainController@redirect47');
    // Route::get('/region/{region}/fuer','mainController@redirect40');
    
    Route::get('/','mainController@getHome')->name('home');
        


    Route::get('geschenkgutschein/','mainController@getGeschenkgutschein');
    Route::get('geschenkgutscheinTest/','mainController@getGeschenkgutscheinTest');
    Route::get('mainVaucherReservation/','mainController@startVaucherReservation');
    Route::get('geschenkgutscheinReservation/','mainController@geschenkgutscheinReservation');
    Route::post('submitVaucherStepFirst/','mainController@submitVaucherStepOne');
    Route::post('submitVaucherStepSecond/','mainController@submitVaucherStepTwo');
    Route::post('submitVaucherStepSecondTest/','mainController@submitVaucherStepTwoTest');
    Route::post('submitVaucherStepThird/','mainController@submitVaucherStepThree');
    Route::post('submitOfferVaucherTable/','mainController@saveUserContactOfferVaucher');
    Route::post('submitOfferVaucherTablePay/','mainController@saveUserContactOfferVaucherPay');
    Route::get('offer/{offerId}/{offer_title}/','mainController@getOfferPage');

    Route::get('ausflug/{offer_title}/','mainController@getOfferPageSEO');

    Route::get('reservation/{offerId}/','mainController@offerReservation');
    Route::get('/erlebnis/{parent?}/','mainController@getHome');


    Route::get('reservations/{uid}/','mainController@reserVationtoPdf');
    Route::get('voucherPdf/{uid}/','mainController@voucherInvoicePdf');
    Route::get('list-offers/region/{region_link?}/offer_type/{offer_type_link?}/duration/{duration_link?}/keyword/{keyword_link?}/','mainController@listOffers');
    Route::get('kontakt/', 'mainController@getContact');
    Route::get('ueber-uns/', 'mainController@getAbout');
    Route::get('booking02/','mainController@booking02');
    Route::get('booking03/','mainController@booking03');
    Route::get('booking04/','mainController@booking04');
    Route::get('offerVaucherPage/{offerId}/{callBack?}/','mainController@offerVaucherPage');

    Route::get('angebote/geschenkgutschein-geschenkidee/ideen/{vid}/',['as'=>'offerVaucher','uses'=>'mainController@offerVaucherPage']);


    Route::get('offerVaucherReservation/{vid}/',['as'=>'offerVaucher','uses'=>'mainController@offerVaucherReservationPage']);


    //for search
    Route::get('erlebnis-schweiz/','mainController@redirect5');
    Route::get('erlebnis-schweiz/region/{region}/','mainController@redirect56');

    Route::get('fuer/{fuer}/','mainController@redirect17');
    Route::get('geschenkideen/{search}/','mainController@redirect18');

    Route::get('region/{region}/','mainController@redirect19');

    Route::get('region/{region}/fuer/{fuer}/','mainController@redirect20');



    Route::get('region/{region}/fuer/{fuer}/geschenkideen/{search}/','mainController@redirect21');
    Route::get('region/{region}/geschenkideen/{search}/','mainController@redirect22');

    Route::get('fuer/{fuer}/geschenkideen/{search}/','mainController@redirect23');

    Route::get('{parent}/{category}/fuer/{fuer}/geschenkideen/{search}/','mainController@redirect24');

    Route::get('{parent}/{category}/geschenkideen/{search}/','mainController@redirect27');

    Route::get('{parent}/{category}/fuer/{fuer}/','mainController@redirect30');

    Route::get('{parent}/{category}/region/{region}/fuer/{fuer}/','mainController@redirect33');

    Route::get('{parent}/{category}/region/{region}/fuer/{day}/geschenkideen/{search}/','mainController@redirect4');

    Route::get('{parent}/{category}/region/{region}/','mainController@redirect47');


    //fix



    Route::get('{parent}/region/{region}/','mainController@redirect40');



    Route::get('{parent}/region/{region}/fuer/{day}/geschenkideen/{search}/','mainController@redirect42');

    Route::get('{parent}/region/{region}/fuer/{day}/','mainController@redirect48');

    Route::get('{parent}/region/{region}/geschenkideen/{search}/','mainController@redirect43');

    Route::get('{parent}/geschenkideen/{search}/','mainController@redirect44');

    Route::get('{parent}/fuer/{day}/','mainController@redirect45');
    Route::get('{parent}/fuer/{day}/geschenkideen/{search}/','mainController@redirect46');


    //when only category is set
    Route::get('weekend/{category?}/','mainController@redirect1');
    Route::get('tagesausflug/{category?}/','mainController@redirect9');
    Route::get('gruppenausfluege/{category?}/','mainController@redirect10');

    //when category and region are set
    Route::get('weekend/{category}/region/{region}/','mainController@redirect2');
    //Route::get('Tagesausflug/{category}/region/{region}/','mainController@redirect11');
    Route::get('gruppenausfluege/{category}/region/{region}/','mainController@redirect12');

    //when no category is set but only the region
    Route::get('weekend/region/{region}/','mainController@redirect6');
    Route::get('tagesausflug/region/{region}/','mainController@redirect7');
    // Route::get('Tagesausflug/region/{region}/','mainController@redirect7');
    Route::get('gruppenausfluege/region/{region}/','mainController@redirect8');
    // Route::get('Gruppenausfluege/region/{region}/','mainController@redirect8');

    Route::get('nooffer/{region}/{category?}/','mainController@getNoOffer');
    Route::get('newsletter/', 'mainController@getNewsLetter');
    Route::get('giftcard02/','mainController@getGiftCard02');
    Route::get('giftcard03/','mainController@getGiftCard03');
    Route::get('groupOffer/{oid}/{date}/','mainController@getGroupOffer');
    Route::get('impressum/','mainController@getImpressum');
    Route::get('datenschutz/','mainController@getDatenschutz');
    Route::get('gruppenanfrage/{oid}/{date}/','mainController@getGroupOffer');

    Route::get('agb/','mainController@getAgbPage');
    Route::get('agbPage/','mainController@getAgbPage');
    Route::get('testest/','Controller@testtest');
    Route::get('getFristOpenDate/{offer}/','Controller@getFirstOpenDate');
    Route::get('checkIfDateOpen/','Controller@checkIfDateOpen');
});

Route::get('pricesForDate/{date}/{offer}/','mainController@getPricesForDate');
Route::post('selectedPrices/','mainController@selectedPrices');
Route::post('update/previewPhoto/','updateController@previewPhoto');
Route::post('update/previewPhotoSingle/','updateController@previewPhotoSingle');
Route::get('checkDates/{offer}/','mainController@checkDates');
Route::get('voucherPage/{vaucher}/','mainController@voucherPage');
Route::get('generateXml/','mainController@generateXml');
Route::get('generateDynamicXml/','mainController@generateDynamicXml');

/********** Admin Auth *************/
include_once(dirname(__FILE__).'/admin_auth.php');

Route::post('submitOfferVaucher/','updateController@submitOfferVaucher');
Route::get('regoverview/','mainController@regoverview');

Route::post('update/adminSubmit/','Controller@Authenticate');
Route::post('submitBooking/','updateController@submitBooking');
Route::get('migrate/','mainController@migrate');
Route::post('submitVaucher/','updateController@submitVaucher');
Route::get('meinweekendejknaskjdnaksjdnakjsdnasndajkd/pdf/{uid}/{save?}/','updateController@pdf');


Route::get('getNavBarIds/{id}/','mainController@getNavBarIds');
Route::get('offerVaucher/{vid}/','mainController@offerVaucher');

Route::get('getBookingPage/{booking_id}/','mainController@getBookingPage');
Route::post('submitGroupApplication/','updateController@submitGroupApplication');
Route::post('submitContact/','updateController@submitContact');
Route::get('checkUnit/{offer_id}/{hasspeciallist?}/','mainController@checkUnit');

//old redirects
Route::get('fixRegions/','Controller@fixBookings');
Route::post('submitDataForCC/','updateController@submitDataForCC');
Route::get('unsubscribefromemail/','mainController@unsubscribe');


Route::any('/{default?}',  'mainController@act404');
Route::any('/{default1}/{default?}',  'mainController@act404');
Route::any('/{default2}/{default1}/{default?}',  'mainController@act404');
Route::any('/{default3}/{default2}/{default1}/{default?}',  'mainController@act404');



// Route::get('notfound', 'mainController@act404');

// Route::get('/404', 'mainController@act404');
//   Route::get('notfound/',['as'=>'notfound','uses'=>'mainController@get404']);

// Route::get('/gruppenausfluege/kochen-dinner-genuss/region/newsletter/', 'mainController@act404');

// Route::get('/gruppenausfluege/kochen-dinner-genuss/region/impressum/', 'mainController@act404');
// Route::get('/gruppenausfluege/kochen-dinner-genuss/region/kontakt', 'mainController@act404');
// Route::get('/gruppenausfluege/kochen-dinner-genuss/region/newsletter', 'mainController@act404');
// Route::get('/gruppenausfluege/kochen-dinner-genuss/region/datenschutz', 'mainController@act404');
// Route::get('/gruppenausfluege/kochen-dinner-genuss/region/ueber-uns', 'mainController@act404');
