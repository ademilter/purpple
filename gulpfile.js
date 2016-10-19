var gulp = require('gulp');
browserSync = require('browser-sync').create(),
  sass = require('gulp-sass'),
  prefix = require('gulp-autoprefixer'),
  cssnano = require('gulp-cssnano'),
  uglify = require('gulp-uglify'),
  size = require('gulp-size'),
  concat = require('gulp-concat'),
  header = require('gulp-header'),
  svgmin = require('gulp-svgmin'),
  sourcemaps = require('gulp-sourcemaps'),
  pkg = require('./package.json');

var banner = ['/*',
  ' Theme Name: <%= pkg.name %>',
  ' Version: <%= pkg.version %>',
  ' Author: <%= pkg.author.name %>',
  ' Author URI: <%= pkg.author.web %>',
  ' License: <%= pkg.license %> ',
  '*/',
  ''].join('\n');


// STYLE //////////////////

gulp.task('css', function () {
  return gulp.src('./scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass())
    .pipe(prefix({browsers: ['last 1 versions']}))
    .pipe(sourcemaps.write('./maps/'))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
});

gulp.task('css-min', ['css'], function () {
  return gulp.src('./style.css')
    .pipe(cssnano({discardComments: {removeAll: true}}))
    .pipe(header(banner, {pkg: pkg}))
    .pipe(gulp.dest('./'))
    .pipe(size({pretty: true, showFiles: true}))
    .pipe(gulp.dest('./'));
});


// SCRIPT //////////////////

var jsfiles = [
  './js/lib/jquery.min.js',
  './js/lib/picturefill.js',
  //'./js/lib/wp-emoji-release.min.js'
];

gulp.task("js", function () {
  return gulp.src(jsfiles)
    .pipe(sourcemaps.init())
    .pipe(concat('script.js'))
    .pipe(sourcemaps.write('./maps/'))
    .pipe(gulp.dest("./"))
});

gulp.task("js-min", ['js'], function () {
  return gulp.src('./script.js')
    .pipe(uglify())
    .pipe(gulp.dest("./"))
    .pipe(size({pretty: true, showFiles: true}))
    .pipe(gulp.dest("./"))
});

// SVG MIN //////////////////

gulp.task('svg-min', function () {
  return gulp.src('./img/emoji/svg/**/*.svg')
    .pipe(svgmin())
    .pipe(gulp.dest('./img/emoji/svg-min/'));
});

// BROWSERSYNC //////////////////

gulp.task('serve', ['css', 'js'], function () {
  browserSync.init({
    notify: false,
    proxy: {
      target: "ai/"
    }
  });
  gulp.watch('./scss/**/*.*', ['css']);
  gulp.watch('./js/**/*.*').on('change', browserSync.reload);
  gulp.watch('./**/*.php').on('change', browserSync.reload);
});


// DO IT  //////////////////

gulp.task('default', ['serve']);
gulp.task('build', ['css-min', 'js-min']);
gulp.task('svg', ['svg-min']);