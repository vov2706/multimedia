const mix = require('laravel-mix');
const admin = require('./webpack.admin.js');

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

if (process.env.PART === 'admin') {
    admin(mix);
} else {
    mix.js('resources/js/app.js', 'public/js')
        .vue()
        .sass('resources/sass/app.scss', 'public/css');
}

if (mix.inProduction()) {
    mix.version();
}

mix.browserSync({
    proxy: process.env.APP_URL,
    host: process.env.APP_HOST,
    open: 'external'
});
