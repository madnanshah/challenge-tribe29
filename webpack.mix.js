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

mix
    .js('resources/js/app.js', 'assets/js')
    .sass('resources/sass/styles.scss', 'assets/css', [])
    .browserSync({
        host: '127.0.0.1',
        proxy: 'localhost',
        open: false,
        files: [
            'assets/js/**/*.js',
            'assets/css/**/*.css',
            'index.php',
        ],
        watchOptions: {
            usePolling: true,
            interval: 500
        }
    });