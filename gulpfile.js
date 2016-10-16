var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cssnano = require('gulp-cssnano');
var uglify = require('gulp-uglify');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');

// STYLE
gulp.task('css', function () {
  return gulp.src('./scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      errLogToConsole: true
    }).on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer({
      browsers: ['last 1 versions']
    }))
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
});

gulp.task('css-min', ['css'], function () {
  return gulp.src('./style.css')
    .pipe(cssnano({
      discardComments: {
        removeAll: false
      }
    }))
    .pipe(gulp.dest('./'));
});

// SCRIPT
var jsfiles = [
  './js/lib/picturefill.js',
  // './js/logo-animation.js'
];

gulp.task("js", function () {
  return gulp.src(jsfiles)
    .pipe(sourcemaps.init())
    .pipe(concat('script.js'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest("./"))
});

gulp.task("js-min", ['js'], function () {
  return gulp.src('./script.js')
    .pipe(uglify())
    .pipe(gulp.dest("./"))
});

// BROWSERSYNC
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

// DO IT
gulp.task('default', ['serve']);
gulp.task('build', ['css-min', 'js-min']);