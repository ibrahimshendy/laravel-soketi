let mix = require('laravel-mix');

mix.setPublicPath('public');

mix.js('resources/js/app.js', 'public/js').vue();

mix.copy('resources/css/app.css', 'public/css');