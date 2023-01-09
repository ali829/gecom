const mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('resources/js/front.js', 'public/js')
    .sass('resources/sass/front/front.scss', 'public/css')
    .tailwind('resources/sass/front/tailwind.config.js');

mix
    .js('resources/js/dashboard.js', 'public/js')
    .sass('resources/sass/dashboard/dashboard.scss', 'public/css')
    .tailwind('resources/sass/dashboard/tailwind.config.js');

mix
    .js('resources/js/admin.js', 'public/js')
    .sass('resources/sass/admin/admin.scss', 'public/css')
    .tailwind('resources/sass/admin/tailwind.config.js');

mix.browserSync('127.0.0.1:8000');
