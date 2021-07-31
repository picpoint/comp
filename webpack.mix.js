const mix = require('laravel-mix');

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



mix.styles([
    'resources/front/css/bootstrap.css',
    'resources/front/css/main.css',
    'resources/front/css/style.css'
], 'public/css/style.css');


mix.scripts([
    'resources/front/js/jquery.js',
    'resources/front/js/bootstrap.js'
], 'public/js/script.js');


mix.copyDirectory('resources/front/pict', 'public/pict');

mix.browserSync('comp');






// mix.js('resources/js/test.js', 'public/js')
//     .sass('resources/sass/style.scss', 'public/css/style.css')
//     .browserSync({
//         proxy: 'http://comp/'
//     });

// npm i
// npm update
// npm run dev
// npm run watch