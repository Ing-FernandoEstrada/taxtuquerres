const mix = require('laravel-mix');
const {copy} = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [require('tailwindcss')])
    .copy('resources/js/modals.js', 'public/js')
    .copy('node_modules/moment/moment.js','public/moment')
    .copy('node_modules/moment/locale/es.js','public/moment/locale')
    .copy('node_modules/pikaday/pikaday.js','public/js')
    .copy('node_modules/pikaday/css/pikaday.css','public/css');

if (mix.inProduction()) {mix.version();}
