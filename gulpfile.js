var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
	// bootstrap
    mix.copy('bower_components/bootstrap/dist/css/bootstrap.min.css', 'public/css');
    mix.copy('bower_components/bootstrap/dist/fonts', 'public/fonts');
    mix.copy('bower_components/bootstrap/dist/js/bootstrap.min.js', 'public/js');
    // fontawesome
    mix.copy('bower_components/fontawesome/css/font-awesome.min.css', 'public/css');
    mix.copy('bower_components/fontawesome/fonts', 'public/fonts');
    // jquery
    mix.copy('bower_components/jquery/dist/jquery.min.js', 'public/js');
    // select2
    mix.copy('bower_components/select2/dist/css/select2.min.css', 'public/css');
    mix.copy('bower_components/select2/dist/js/select2.min.js', 'public/js');
    // vue
    mix.copy('bower_components/vue/dist/vue.min.js', 'public/js');

    mix.sass('streamlet.scss');
    mix.sass('admin/login.scss');
    mix.sass('admin/setup.scss');
    mix.sass('admin/admin.scss');

    mix.scripts([
        'plugins.js'
    ], 'public/js/streamlet.js');
});
