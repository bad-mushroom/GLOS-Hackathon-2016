var gulp = require('gulp');
var elixir = require('laravel-elixir');

require('laravel-elixir-browserify-official');
// require("laravel-elixir-browsersync-official")

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

var config = elixir.config;
config.sourcemaps = false;

 var paths = {
    "resources": "./resources/assets/",
    "public": "./public/assets/",
    "bourbon": "./node_modules/bourbon/app/assets/stylesheets",
    "jquery": './node_modules/jquery/dist/jquery.js',
    "jqueryEasing": './node_modules/jquery-easing/jquery.easing.1.3.js',
    "npmBootstrapSass": "./node_modules/bootstrap-sass/assets/"
}

elixir(function(mix) {

/*--- Pull into public/assets --- */

	// fonts
	// mix.copy(paths.npmBootstrapSass + 'fonts', paths.public + 'fonts');

/*--- Pull into resources/assets --- */

	// // sass
	// mix.copy(paths.npmBootstrapSass + 'stylesheets/bootstrap', paths.resources + 'sass/bootstrap');
	// mix.copy(paths.bourbon, paths.resources + 'sass/bourbon');
	
	// // js
	// mix.copy(paths.jquery, paths.resources + 'js/jquery');
	// mix.copy(paths.jqueryEasing, paths.resources + 'js/jquery-easing');
	
/*--- Compile Sass --- */
    mix.sass('app.scss', paths.public + 'css/app.css');

/*--- Combine JS --- */
	// mix.scripts([
	// 	'jquery/jquery.js',
	// 	'jquery-easing/jquery.easing.1.3.js'
	// 		],
	// 	paths.public + 'js/jquery-build.js',
	// 	paths.resources + 'js/'
	// );

	// mix.scripts([
	// 	'theme/bootstrap-custom.js',
	// 	'theme/grayscale.js'
	// 		],
	// 	paths.public + 'js/theme.js',
	// 	paths.resources + 'js/'
	// );
/*--- React --- */

  mix.browserify('react/pulse.js', paths.public + 'js/pulse.js');

});



