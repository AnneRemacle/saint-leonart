var
	gulp = require( "gulp" ),
	browsersync = require("browser-sync"),
	htmlclean = require( "gulp-htmlclean" ),
	sass = require( "gulp-sass" ),
	imagemin = require( "gulp-imagemin" ),
	newer = require( "gulp-newer" ),
	size = require( "gulp-size" ),
	destclean = require( "gulp-dest-clean" ),
	imacss = require( "gulp-imacss" ),
	preprocess = require( "gulp-preprocess" ),
	pkg = require( "./package.json" );

var
	devBuild = ( (process.env.NODE_ENV || "development").trim().toLowerCase() !== 'production'),
	source = 'sources/',
	dest = 'build/';

var
	imagesOpts = {
		in: source + "images/*.*",
		out: dest + "assets/images/",
		watch: source + "images/*.*"
	},
	imageUriOpts = {
		in: source + "images/*.*",
		out: source + "sass/images/",
		filename: "_datauri.scss",
		namespace: "img"
	},
	css = {
		in: source + "sass/styles.scss",
		watch: [ source + "sass/**/*" ],
		out: dest + "css/",
		sassOpts: {
			outputStyle: "expanded",
			precision: 3, // nombre de valeurs derrière la virgule
			errLogToConsole: true // pour que les erreurs s'affichent dans la console
		}
	},
	html = {
		in: source + "*.html",
		watch: [source + "*.html", source + "html/**/*"],
		out: dest,
		context: {
			devBuild: devBuild,
			author: pkg.author,
			version: pkg.version
		}
	},
	syncOpts = {
		server: {
			baseDir: dest,
			index: "index.html"
		},
		open: false,
		notify: true
	};

gulp.task( "sass", function() {
	return gulp.src( css.in )
		.pipe( sass( css.sassOpts ) )
		.pipe( gulp.dest( css.out ) )
		.pipe( browsersync.reload( { stream: true } ) );
} );

gulp.task( "images", function(){
	return gulp.src( imagesOpts.in )
		.pipe( destclean( imagesOpts.out ) )
		.pipe( newer( imagesOpts.out ) )
		.pipe( size( { title: "Images size before compression; ", showFiles: true } ) )
		.pipe( imagemin() )
		.pipe( size( { title: "Images size after compression; ", showFiles: true } ) )
		.pipe( gulp.dest( imagesOpts.out ) );
} );

gulp.task( "imageuri", function() {
	return gulp.src( imageUriOpts.in )
		.pipe( imagemin() )
		.pipe( imacss( imageUriOpts.filename, imageUriOpts.namespace ) )
		.pipe( gulp.dest( imageUriOpts.out ) );
} );

gulp.task( "html", function() {
	// résultat du premier traitement, à savoir les include et les valeurs des variables
	var page =  gulp.src( html.in )
		.pipe( preprocess( { context: html.context } ) );

	if( !devBuild ) {
		page = page
			.pipe( size( {title: "HTML avant minification: "} ) )
			.pipe( htmlclean() )
			.pipe( size( {title: "HTML après minification: "} ) )
	}
	return page.pipe( gulp.dest( html.out ) );
} );

gulp.task( "browsersync", function() {
	browsersync( syncOpts );
} );

gulp.task( "default", [ "sass", "html", "browsersync", "imageuri", "images" ], function(  ) {
	gulp.watch( html.watch, [ "html", browsersync.reload ] );
	gulp.watch( css.watch, [ "sass" ] );
} );
