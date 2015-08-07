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
    // fontawesome
    mix.copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/css');
    // jquery
    mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/js');
    // jquery.qrcode
    // mix.copy('bower_components/jquery.qrcode/dist/jquery.qrcode.min.js', 'public/js');
    // select2
    mix.copy('node_modules/select2/dist/css/select2.min.css', 'public/css');
    mix.copy('node_modules/select2/dist/js/select2.min.js', 'public/js');
    // vue
    mix.copy('node_modules/vue/dist/vue.min.js', 'public/js');

    mix.sass('streamlet.scss');
    mix.sass('admin/login.scss');
    mix.sass('admin/setup.scss');
    mix.sass('admin/streamlet-admin.scss');

    mix.scripts([
        'plugins/scroll-to-top.js',
        'plugins/toggle-visibility-navbar.js',
        'plugins/reveal-on-scroll.js',
        'plugins/auto-close-alerts.js'
        // 'plugins/qrcode.js'
    ], 'public/js/streamlet.js');

    mix.scripts([
        'admin/functions.js',
        'admin/articles.js',
        'admin/settings-profile.js',
        'plugins/auto-close-alerts.js'
    ], 'public/js/streamlet-admin.js');
});
