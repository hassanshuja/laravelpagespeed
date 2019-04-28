let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
//mix.js('resources/assets/js/app.js', 'public/js')
//   .sass('resources/assets/sass/app.scss', 'public/css');

//mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');
//
//mix.styles([
//    'resources/assets/css/starterPageV7.css'
//], 'public/css/starterPageV7.css');
//
//mix.styles([
//    'resources/assets/css/fontawesome-all.css'
//], 'public/css/fontawesome-all.css');
//
//mix.styles([
//    'resources/assets/css/styleV4.css'
//], 'public/css/styleV4.css');
//
//mix.styles([
//    'resources/assets/css/customMasonary.css'
//], 'public/css/customMasonary.css');
//
//mix.styles([
//    'resources/assets/css/booking02.css'
//], 'public/css/booking02.css');
//
//mix.styles([
//    'resources/assets/css/booking03.css'
//], 'public/css/booking03.css');
//
//mix.styles([
//    'resources/assets/css/booking04.css'
//], 'public/css/booking04.css');
//
//mix.styles([
//    'resources/assets/css/catoverview.css'
//], 'public/css/catoverview.css');
//
//mix.styles([
//    'resources/assets/css/contact.css'
//], 'public/css/contact.css');
//
//mix.styles([
//    'resources/assets/css/geschenkgutschein.css'
//], 'public/css/geschenkgutschein.css');
//
//mix.styles([
//    'resources/assets/css/giftcard02.css'
//], 'public/css/giftcard02.css');
//
//mix.styles([
//    'resources/assets/css/giftcard03.css'
//], 'public/css/giftcard03.css');
//
//mix.styles([
//    'resources/assets/css/gruppenanfrage.css'
//], 'public/css/gruppenanfrage.css');
//
//mix.styles([
//    'resources/assets/css/newsletter.css'
//], 'public/css/newsletter.css');
//
//mix.styles([
//    'resources/assets/css/noooffer.css'
//], 'public/css/noooffer.css');
//
//mix.styles([
//    'resources/assets/css/offerVaucherPageV2.css'
//], 'public/css/offerVaucherPageV2.css');
//
//mix.styles([
//    'resources/assets/css/offerpageV5.css'
//], 'public/css/offerpageV5.css');
//
//mix.styles([
//    'resources/assets/css/offersV2.css'
//], 'public/css/offersV2.css');
//
//mix.styles([
//    'resources/assets/css/reservation.css'
//], 'public/css/reservation.css');
//
//mix.styles([
//    'resources/assets/css/reservations.css'
//], 'public/css/reservations.css');
//
//mix.styles([
//    'resources/assets/css/about.css'
//], 'public/css/about.css');

//mix.styles([
//    'public/css/bootstrap.min.css',
//    'public/css/bootstrap-datepicker1.7.1.min.css',
//    'public/css/starterPageV7.css',
//    'public/css/offerpageV5.css',
//    'public/css/offersV2.css',
//    'public/css/fontawesome-all.css',
//    'public/css/customMasonary.css',
//    'public/css/styleV4.css'
//
//], 'public/css/all.css')
//.version();

mix.js([
//    'resources/assets/js/old/jquery.min.js',
//    'resources/assets/js/old/moment.min.js',
//    'resources/assets/js/old/bootstrap.min.js',
//    'resources/assets/js/old/bootstrap-datepicker.min.js',
//    'resources/assets/js/old/bootstrap-datepicker.de.js',
//    'resources/assets/js/old/jquery.validate.min.js',
//    'resources/assets/js/old/jssor.slider.min.js',
    'resources/assets/js/main.js',
    'resources/assets/js/secondaryjs.js'

], 'public/js/front.js');
//.version();

// mix.js('resources/assets/js/mainjsV2.js', 'public/js/mainjsV2.js');
// mix.js('resources/assets/js/secondaryjsV4.js', 'public/js/secondaryjsV4.js');
