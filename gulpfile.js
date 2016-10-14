var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss','public/assets/css/app.css');
    mix.sass(['app.scss','../bower/font-awesome/css/font-awesome.css'],'public/assets/css/vendor.css');
    mix.styles('../bower/parsleyjs/src/parsley.css', 'public/assets/css/parsley.css');
    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/bootstrap/dist/js/bootstrap.js'
    ], 'public/assets/js/vendor.js');
    mix.copy('resources/assets/bower/font-awesome/fonts', 'public/assets/fonts');
    mix.scripts('app.js','public/assets/js/app.js');
    mix.scripts('../bower/parsleyjs/dist/parsley.min.js','public/assets/js/parsley.min.js');
});
