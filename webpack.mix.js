const mix = require('laravel-mix');

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
    .postCss('resources/css/app.css', 'public/css', [
    ]);

mix.js('resources/js/manifests/homeManifest.js','public/js/manifests/homeManifest.js')
mix.js('resources/js/service-worker.js','public/service-worker.js')

mix.js('resources/js/manifests/orlasManifest.js', 'public/js/manifests/orlasManifest.js')
