var gulp = require('gulp')
var sass = require('gulp-sass')
var uglify = require("gulp-uglify-es").default
var concat = require('gulp-concat')
var autoprefixer = require('gulp-autoprefixer')
var browserify = require('browserify')
var source = require("vinyl-source-stream")
var buffer = require("vinyl-buffer")
var sourcemaps = require('gulp-sourcemaps')
var browserSync = require('browser-sync').create()
var php = require('gulp-connect-php')
var reload = browserSync.reload
var cssDist = './app/assets/css'
var jsDist = './app/assets/js'

gulp.task('styles', function () {
  return gulp.src('./src/scss/**/*.scss')
    .pipe(sass({
      outputStyle: 'compressed'
    })
    .on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(gulp.dest(cssDist))
    .pipe(browserSync.stream());
})

// new
gulp.task('js', function () {
  var b = browserify({
    entries: './src/js/main.js',
    debug: true
  });

  return b.bundle()
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({loadMaps: true}))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(jsDist))
})


gulp.task('build-js', function () {
  var b = browserify({
    entries: './src/js/main.js',
    debug: true
  });

  return b.bundle()
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(sourcemaps.init({ loadMaps: true }))
    .pipe(uglify()) 
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest(jsDist))
})


gulp.task('php', function () {
  php.server({ base: 'app', port: 9000 })
})

gulp.task('browser-sync', ['php'], function () {
  browserSync.init({
    proxy: 'http://127.0.0.1:9000',
    "proxyOptions": {
        "xfwd": true
    },
    port: 9000,
    open: false,
    notify: false,
    snippetOptions: {
      ignorePaths: ['./panel/**'] 
    }
  })
})

gulp.task('build', ['build-js', 'styles'])

gulp.task('init', ['browser-sync'], function () {
  gulp.watch('./src/scss/**/*.scss', ['styles']);
  gulp.watch('./src/js/**/*.js', ['js']).on('change', reload)
  gulp.watch('**/*.php').on('change', function () {
    browserSync.reload();
  });
})

gulp.task('default', ['init'])

