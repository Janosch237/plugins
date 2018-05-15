var gulp = require('gulp');
var plumber = require('gulp-plumber');
var uglify = require('gulp-uglify');
var sass = require('gulp-ruby-sass');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var manifest = require('./assets/manifest.json');
var config = manifest.config;


// Scripts Task
// Minify JS
gulp.task('scripts', function(){

	gulp.src('assets/js/*.js')
	.pipe(plumber())
	.pipe(uglify())
	.pipe(gulp.dest('js'))
	.pipe(reload({ stream: true }))

});

// Styles Task
// Compile Main Styles
gulp.task('styles', function() {

	return sass('assets/scss/wpbf-premium.scss', {
		style: 'compressed' 
	})
	.pipe(gulp.dest('css'))
	.pipe(reload({ stream: true }))

});﻿

// Compile WooCommerce Styles
gulp.task('woocommerce_styles', function() {

	return sass('assets/scss/wpbf-premium-woocommerce.scss', {
		style: 'compressed' 
	})
	.pipe(gulp.dest('css'))
	.pipe(reload({ stream: true }))

});﻿

// Browser Sync
gulp.task('serve', function() {

	browserSync.init( {
		proxy: "http://" + config.url,
		host: config.host,
		notify: false,
	});

});

// Watch Tasks
gulp.task('watch', function() {

	// Styles & Scripts to be watched
	gulp.watch('assets/js/*.js', ['scripts']);
	gulp.watch('assets/scss/**/*.scss', ['styles']);
	gulp.watch('assets/scss/**/*.scss', ['woocommerce_styles']);

	// browserSync
	gulp.watch('**/*.php').on('change', reload);
})

// Gulp
gulp.task('default', ['scripts', 'styles', 'woocommerce_styles', 'watch', 'serve']);