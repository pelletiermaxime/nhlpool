var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Compile, minify and add prefixes to our app and libs sass files
 | and use browserify to create a minified and ES6-less bundle
 | file of our main and ui js to send to the client browser
 |
 */

elixir.config.js.browserify.transformers.push({
    name: 'debowerify',
});

elixir(function(mix) {
    mix.sass('app.sass', false, { indentedSyntax: true })
       .sass('libs.sass', 'public/css/libs.css', { indentedSyntax: true })
       .browserify(['main.js', 'ui.js'], 'public/js/bundle.js')
    ;
});
