var elixir = require('laravel-elixir');
require('laravel-elixir-webpack');

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
	mix.copy('./node_modules/bootstrap-sass/assets/fonts', 'public/assets/fonts');
	mix.copy('./node_modules/bootstrap-sass/assets/stylesheets/bootstrap', 'resources/assets/sass/bootstrap');
	mix.copy('./node_modules/bourbon/app/assets/stylesheets', 'resources/assets/sass/bourbon');
	
	mix.copy('./node_modules/jquery/dist/jquery.js', 'resources/assets/js/jquery');
	mix.copy('./node_modules/jquery-easing/jquery.easing.1.3.js', 'resources/assets/js/jquery-easing');
	
    mix.sass('app.scss', './public/assets/css/app.css');

	mix.scripts([
		'jquery/jquery.js',
		'jquery-easing/jquery.easing.1.3.js'
			],
		'public/assets/js/jquery-build.js',
		'resources/assets/js/'
	);

	mix.scripts([
		'theme/bootstrap-custom.js',
		'theme/grayscale.js'
			],
		'public/assets/js/theme.js',
		'resources/assets/js/'
	);
	
	mix.webpack('jquery-build.js', {}, './public/assets/js/jquery-custom.js');

    mix.webpack('app.js', {
        module: {
          loaders: [
            { test: /\.css$/, loader: 'style!css' },
          ],
        },
    }, './public/assets/app.js');

    mix.version([

	]);
});



