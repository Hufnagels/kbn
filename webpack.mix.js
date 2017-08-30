let mix = require('laravel-mix');
let webpack = require('webpack');

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
    .js('resources/assets/js/manage.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/manage.scss', 'public/css')
   .extract([
     'moment',
    ]);
/**/
mix.webpackConfig({
  plugins: [
   // reduce bundle size by ignoring moment js local files
    new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/)
  ]
});
