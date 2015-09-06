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
    mix.sass('app.sass', false, { indentedSyntax: true })
       .sass('libs.sass', 'public/css/libs.css', { indentedSyntax: true })
       .browserify(['main.js', 'ui.js'], 'public/js/bundle.js')
    ;
});
