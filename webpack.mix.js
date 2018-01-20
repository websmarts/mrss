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

mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/booking.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .version();

mix.copy('resources/assets/js/ie-emulation-modes-warning.js','public/js');
mix.copy('resources/assets/js/ie10-viewport-bug-workaround.js','public/js');
mix.copy('resources/assets/css/ie10-viewport-bug-workaround.css','public/css');

