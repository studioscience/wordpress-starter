/*
 * swps uses Laravel Mix
 *
 * Check the documentation at
 * https://laravel-mix.com/
 */

let mix = require( 'laravel-mix' );
require( '@tinypixelco/laravel-mix-wp-blocks' );

// Autloading jQuery to make it accessible to all the packages, because, you know, reasons
// You can comment this line if you don't need jQuery.
mix.autoload({
	jquery: ['$', 'window.jQuery', 'jQuery'],
});

mix.setPublicPath( './assets/dist' );

// Compile assets.
mix.js( 'assets/src/scripts/app.js', 'assets/dist/js' )
	.js( 'assets/src/scripts/admin.js', 'assets/dist/js' )
	.sass( 'assets/src/sass/gutenberg.scss', 'assets/dist/css' )
	.block( 'assets/src/scripts/gutenberg.js', 'assets/dist/js' )
	.postCss( 'assets/src/styles/style.css', 'assets/dist/css', [
		require( 'tailwindcss' ),
		require( 'postcss-nested' ),
		require( 'autoprefixer' ),
	])
	
	.options( {
		processCssUrls: false,
	} );
	

// Add source map and versioning to assets in production environment.
if ( mix.inProduction() ) {
	mix.sourceMaps().version();
}
