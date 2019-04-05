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

// mix.js('resources/js/app.js', 'public/js')
//    .sass('resources/sass/app.scss', 'public/css');

// default\base scss
mix.sass('resources/assets/css/default.scss', 'public/css/default.css');
mix.sass('resources/assets/css/base.scss', 'public/css/base.css');

// admin css, js
mix.styles(['resources/assets/css/admin.css'], 'public/css/admin.css');
mix.js('resources/assets/js/admin.js', 'public/js/admin.js');

// web css, js
mix.sass('resources/assets/css/web.scss', 'public/css/web.css');
mix.js(['resources/assets/js/web.js'], 'public/js/web.js');

// version
if (mix.config.inProduction) {
    mix.version();
}