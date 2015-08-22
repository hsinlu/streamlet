var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix
    // bootstrap
    .copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', 'public/js')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap/', 'public/fonts')
    // fontawesome
    .copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/css')
    .copy('node_modules/font-awesome/fonts/', 'public/fonts')
    // jquery
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js')
    // select2
    .copy('node_modules/select2/dist/css/select2.min.css', 'public/css')
    .copy('node_modules/select2/dist/js/select2.min.js', 'public/js')
    // vue
    .copy('node_modules/vue/dist/vue.min.js', 'public/js')
    // tinymce
    .copy('node_modules/ckeditor-dev', 'public/vendor/ckeditor')

    .sass('streamlet.scss')
    .sass('admin/login.scss')
    .sass('admin/setup.scss')
    .sass('admin/streamlet-admin.scss')

    .scripts([
        'plugins/scroll-to-top.js',
        'plugins/toggle-visibility-navbar.js',
        'plugins/reveal-on-scroll.js',
        'plugins/auto-close-alerts.js'
    ], 'public/js/streamlet.js')
    .scripts([
        'admin/functions.js',
        'admin/articles.js',
        'admin/settings-profile.js',
        'plugins/auto-close-alerts.js'
    ], 'public/js/streamlet-admin.js');
});
