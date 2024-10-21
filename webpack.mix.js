const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css') // If using SASS
   .css('resources/css/app.css', 'public/css') // If using CSS
   .version();
