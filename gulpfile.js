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
    mix.sass('app.scss');
    mix.sass(['app.scss','../bower/font-awesome/css/font-awesome.css'],'public/assets/css/vendor.css');
    mix.scripts([
        '../bower/jquery/dist/jquery.js',
        '../bower/bootstrap/dist/js/bootstrap.js'
    ], 'public/assets/js/vendor.js');
    mix.copy('resources/assets/bower/font-awesome/fonts', 'public/assets/fonts');
    mix.scripts('app.js');
});
