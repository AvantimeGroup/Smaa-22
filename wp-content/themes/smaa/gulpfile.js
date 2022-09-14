(() => {

  'use strict';

  /**************** Gulp.js 4 configuration ****************/

  const

    // development or production
    devBuild  = ((process.env.NODE_ENV || 'development').trim().toLowerCase() === 'development'),

    // directory locations
    dir = {
      src         : 'assets/src/',
      build       : 'assets/'
    },

    // modules
    concat        = require('gulp-concat'),
    gulp          = require('gulp'),
    del           = require('del'),
    noop          = require('gulp-noop'),
    newer         = require('gulp-newer'),
    size          = require('gulp-size'),
    imagemin      = require('gulp-imagemin'),
    sass          = require('gulp-sass'),
    postcss       = require('gulp-postcss'),
    uglify        = require('gulp-uglify'),
    sourcemaps    = devBuild ? require('gulp-sourcemaps') : null,
    browsersync   = devBuild ? require('browser-sync').create() : null;


  console.log('Gulp', devBuild ? 'development' : 'production', 'build');


  /**************** clean task ****************/

  function clean() {

    return del([ dir.build ]);

  }
  exports.clean = clean;
  exports.wipe = clean;


  /**************** images task ****************/

  const imgConfig = {
    src           : dir.src + 'images/**/*',
    build         : dir.build + 'images/',

    minOpts: {
      optimizationLevel: 5
    }
  };

  function images() {

    return gulp.src(imgConfig.src)
      .pipe(newer(imgConfig.build))
      .pipe(imagemin(imgConfig.minOpts))
      .pipe(size({ showFiles:true }))
      .pipe(gulp.dest(imgConfig.build));

  }
  exports.images = images;


  /**************** CSS task ****************/

  const cssConfig = {

    src         : [
                    'node_modules/font-awesome/scss/font-awesome.scss', 
                     dir.src + 'sass/*.scss'
                  ],
    watch       : dir.src + 'sass/**/*',
    build       : dir.build + 'css/',
    sassOpts: {
      sourceMap       : devBuild,
      outputStyle     : 'compressed',
      imagePath       : '/images/',
      precision       : 3,
      errLogToConsole : true
    },

    postCSS: [
      require('postcss-assets')({
        loadPaths: ['images/'],
        basePath: dir.build
      }),
      require('autoprefixer')
    ]

  };

  // remove unused selectors and minify production CSS
  if (!devBuild) {

    cssConfig.postCSS.push(
      require('usedcss')({ html: ['index.html'] }),
      require('cssnano')
    );

  }

  function css() {

    return gulp.src(cssConfig.src)
      .pipe(sourcemaps ? sourcemaps.init() : noop())
      .pipe(sass(cssConfig.sassOpts).on('error', sass.logError))
      .pipe(postcss(cssConfig.postCSS))
      .pipe(sourcemaps ? sourcemaps.write() : noop())
      .pipe(size({ showFiles:true }))
      .pipe(concat('main.min.css'))
      .pipe(gulp.dest(cssConfig.build))
      .pipe(browsersync ? browsersync.reload({ stream: true }) : noop());

  }

    /**************** JS task ****************/

    const jsConfig = {

      src         : [
                      'node_modules/popper.js/dist/umd/popper.min.js',
                      'node_modules/jquery/dist/jquery.js',
                      'node_modules/bootstrap/dist/js/bootstrap.min.js', 
                      dir.src + 'js/*.js'
                    ],
      watch       : dir.src + 'js/**/*',
      build       : dir.build + 'js/'
  
    };
  
    function js() {

      return gulp.src(jsConfig.src)
        .pipe(sourcemaps ? sourcemaps.init() : noop())
        .pipe(concat('main.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest(jsConfig.build))
        .pipe(sourcemaps ? sourcemaps.init() : noop())
        .pipe(browsersync ? browsersync.reload({ stream: true }) : noop());
  
    }

  exports.css = gulp.series(images, css);
  exports.js = js;


  /**************** server task (now private) ****************/

  const syncConfig = {
    server: {
      baseDir   : './',
      index     : 'index.html'
    },
    port        : 80,
    open        : false
  };

  // browser-sync
  function server(done) {
    if (browsersync) browsersync.init(syncConfig);
    done();
  }


  /**************** watch task ****************/

  function watch(done) {

    // image changes
    gulp.watch(imgConfig.src, images);

    // CSS changes
    gulp.watch(cssConfig.watch, css);

    // JS changes
    gulp.watch(jsConfig.watch, js);

    done();

  }

  /**************** default task ****************/

  exports.default = gulp.series(exports.css, exports.js, watch/* , server */);

})();