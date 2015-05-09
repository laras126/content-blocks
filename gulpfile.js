// Include gulp
var gulp = require('gulp'); 

// Include Our Plugins
var jshint = require('gulp-jshint');
var sass = require('gulp-sass');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var cssmin = require('gulp-cssmin');
var autoprefixer = require('gulp-autoprefixer');
var svgmin = require('gulp-svgmin');
var svgstore = require('gulp-svgstore');

// Lint Task
gulp.task('lint', function() {
    return gulp.src('assets/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Compile Our Sass
gulp.task('sass', function() {
    return gulp.src('assets/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('assets/css'));
});

// Minify and Autoprefix CSS
gulp.task('build-css', function () {
    return gulp.src('assets/css/*.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(cssmin())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest('assets/css/build'));
});


gulp.task('watch', function() {
    gulp.watch('assets/js/*.js', ['lint', 'scripts']);
    gulp.watch('assets/scss/*.scss', ['sass']);
    gulp.watch('assets/img/svg-raw/*.svg', ['svgs']);
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    return gulp.src('assets/js/*.js')
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest('assets/js/build'))
        .pipe(rename('scripts.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/js/build'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/js/*.js', ['lint', 'scripts']);
    gulp.watch('assets/scss/*.scss', ['sass']);
    gulp.watch('assets/img/svg-raw/*.svg', ['svgs']);
});

// Clean and add SVGs to Sprite
gulp.task('svgs', function () {
    return gulp
        .src('assets/img/svg-raw/*.svg')
        .pipe(svgmin())
        .pipe(svgstore())
        .pipe(rename('svg-defs.svg'))
        .pipe(gulp.dest('views/partials'));
});


// Default Task
gulp.task('default', ['lint', 'sass', 'scripts', 'watch', 'svgs']);