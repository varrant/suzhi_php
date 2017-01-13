var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var relativeSourcemapsSource = require('gulp-relative-sourcemaps-source');
var browserSync = require('browser-sync').create();
var plumber = require('gulp-plumber'); //错误不中断解决方案

//检测
var postcss     = require('gulp-postcss');
var reporter    = require('postcss-reporter');
var syntax_scss = require('postcss-scss');
var stylelint   = require('stylelint');

// 检测sass代码
gulp.task("scss-lint", function() {

  // Stylelint config rules
  var stylelintConfig = {
    "rules": {
      "block-no-empty": true,
      "color-no-invalid-hex": true,
      "declaration-colon-space-after": "always",
      "declaration-colon-space-before": "never",
      "function-comma-space-after": "always",
      "function-url-quotes": "double",
      "media-feature-colon-space-after": "always",
      "media-feature-colon-space-before": "never",
      "media-feature-name-no-vendor-prefix": true,
      "max-empty-lines": 5,
      "number-leading-zero": "never",
      "number-no-trailing-zeros": true,
      "property-no-vendor-prefix": true,
      "rule-no-duplicate-properties": true,
      "declaration-block-no-single-line": true,
      "rule-trailing-semicolon": "always",
      "selector-list-comma-space-before": "never",
      "selector-list-comma-newline-after": "always",
      "selector-no-id": true,
      "string-quotes": "double",
      "value-no-vendor-prefix": true
    }
  }

  var processors = [
    stylelint(stylelintConfig),
    reporter({
      clearMessages: true,
      throwError: true
    })
  ];

  return gulp.src(
      ['./webroot-dev/static/sass/**/*.scss']
    )
    .pipe(postcss(processors), {syntax: syntax_scss});
});

//
gulp.task('serve', function() {
    // browserSync.init({
    //     server: "./app"
    // });
    browserSync.init(null, {
      proxy: "http://localhost:8888" // port of node server
  });
    gulp.watch("./html/sass/**/*.scss", ['sass']); // sass监听
    gulp.watch("./html/js/**/*.js", ['js-watch']); //js监听
    gulp.watch("./html/**/*.html").on('change', browserSync.reload); //html监听
});

gulp.task('js-watch', function (done) {
    browserSync.reload();
    done();
});

// sass 编译
gulp.task('sass', function() {
    gulp.src('./html/sass/**/*.scss')
        .pipe(sourcemaps.init({largeFile: true}))
        // .pipe(sassLint())
        // .pipe(sassLint.format())
        // .pipe(sassLint.failOnError())
        .pipe(plumber())
        .pipe(sass())
        // .pipe(sourcemaps.write('./'))
        // Pass the same directory as passed to gulp.dest()
        .pipe(relativeSourcemapsSource({dest: 'dist'}))
        // Write sourcemaps to the same directory as the transpiled files are
        // written to and do not let the sourceRoot affect the relative path
        .pipe(sourcemaps.write('./', {
          includeContent: false,
          sourceRoot: '.'
        }))
        // .pipe(browserSync.stream({match: './webroot-dev/public/css'}));
        .pipe(gulp.dest('./html/css'));
});

gulp.task('default', ['serve']);
