'use strict';

let CONFIG = require('./gulp/config');

// Plugins
let gulp = require('gulp'),
    plugins = require('gulp-load-plugins')(CONFIG.plugins),
    bsync = require('browser-sync');



/**
 * General
 */
gulp.task('default', ['watch', 'build']);



/**
 * Build
 */
gulp.task('build', ['include', 'fonts', 'icons', 'less', 'images'], function() {
    console.log('BUILD DONE');
});


/**
 * HTML
 */
gulp.task('include', function() {
    return gulp.src(CONFIG.include.src)
        .pipe(plugins.plumber({
            errorHandler: onPlumberError
        }))
        .pipe(plugins.include({
            basepath: CONFIG.include.basepath
        }))
        .pipe(gulp.dest(CONFIG.include.dest))
        .pipe(bsync.stream());
});


/**
 * LESS
 */
gulp.task('less', function() {
    return gulp.src(CONFIG.less.src)
        .pipe(plugins.plumber({
            errorHandler: onPlumberError
        }))
        .pipe(plugins.less())
        .pipe(plugins.autoprefixer(CONFIG.autoprefixer))
        .pipe(gulp.dest(CONFIG.less.dest))
        .pipe(bsync.stream());
});



/**
 * Icons
 */
gulp.task('icons', function() {
    return gulp.src(CONFIG.icons.src)
        .pipe(plugins.plumber({
            errorHandler: onPlumberError
        }))
        .pipe(plugins.uri({
            template: {
                file: CONFIG.icons.template
            }
        }))
        .pipe(plugins.concat(CONFIG.icons.concat))
        .pipe(gulp.dest(CONFIG.icons.dest));
});



/**
 * Images
 */
gulp.task('images', function() {
    return gulp.src(CONFIG.images.src)
        .pipe(plugins.plumber({
            errorHandler: onPlumberError
        }))
        .pipe(gulp.dest(CONFIG.images.dest))
        .pipe(bsync.stream());
});



/**
 * Fonts
 */
gulp.task('fonts', function() {
    return gulp.src(CONFIG.fonts.src)
        .pipe(plugins.plumber({
            errorHandler: onPlumberError
        }))
        .pipe(gulp.dest(CONFIG.fonts.dest))
        .pipe(bsync.stream());
});



/**
 * Browser sync
 */
gulp.task('bsync', function() {
    bsync.init({
        startPath: "/markup/",
        server: {
            baseDir: "./dev/"
        }
    });
});



/**
 * Watch
 */
// General watch task
gulp.task('watch', ['bsync'], function() {
    gulp.watch(CONFIG.watch.include, ['include']);
    gulp.watch(CONFIG.watch.less, ['less']);
    gulp.watch(CONFIG.watch.icons, ['icons']);
    gulp.watch(CONFIG.watch.images, ['images']);
});


/**
 * Clean
 */
gulp.task('clean', function(cb) {
    return gulp.src(CONFIG.clean.src, {read: false})
        .pipe(plugins.rimraf());
});


/**
 * Helpers
 */
process.on('uncaughtException', function(err) {
    console.error(err.message, err.stack, err.errors);
    //process.exit(255);
});

gulp.on('err', function(gulpErr) {
    if (gulpErr.err) {
        console.error('Gulp error details', [gulpErr.err.message, gulpErr.err.stack, gulpErr.err.errors].filter(Boolean));
    }
});

function onPlumberError(error) {
    console.log(error, ' plumber Error');
    this.emit('end');
}
