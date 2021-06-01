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

mix.js('resources/js/test.js', 'public/js')
    .sass('resources/sass/style.scss', 'public/css/style.css')
    .browserSync({
        proxy: 'http://comp/'
    });


// npm i
// npm update
// npm run dev
// npm run watch