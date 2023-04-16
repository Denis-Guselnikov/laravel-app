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

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .sass('resources/sass/app.scss', 'public/css').version();
    // version() - если запустим скрипт-сборщик, в папке public появится файл mix_manifest (будут указаны уникальные
    // идентификаторы для каждого файла стилей и скриптов). Каждый раз при сборке webpack-ом данные файлового
    // идентификатора будут менятся что не даст браузеру использовать файлы стилей или скриптов из кеша.

mix.copy('resources/img', 'public/img');  // копирование папки (начальное и конечное место расположения)

