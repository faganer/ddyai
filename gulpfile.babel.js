// import commonjs from '@rollup/plugin-commonjs'
import eslint from '@rollup/plugin-eslint'
import { nodeResolve } from '@rollup/plugin-node-resolve'
import { terser } from 'rollup-plugin-terser'
import { babel } from '@rollup/plugin-babel'
const autoprefixer = require('autoprefixer')
const cache = require('gulp-cache')
const changed = require('gulp-changed')
const cssBase64 = require('gulp-css-base64')
const cssnano = require('cssnano')
const del = require('del')
const gulp = require('gulp')
const imagemin = require('gulp-imagemin')
const plumber = require('gulp-plumber')
const postcss = require('gulp-postcss')
// const purgecss = require('gulp-purgecss')
const rename = require('gulp-rename')
const sass = require('gulp-sass')
const rollup = require('rollup')

sass.compiler = require('node-sass')

const paths = {
  styles: {
    src: 'scss/**/*.scss',
    dest: 'assets/css/'
  },
  scripts: {
    src: 'js/**/*.js',
    dest: 'assets/js/'
  },
  images: {
    src: 'images/*',
    dest: 'assets/images/'
  }
}

/* Not all tasks need to use streams, a gulpfile is just another node program
 * and you can use all packages available on npm, but it must return either a
 * Promise, a Stream or take a callback and call it
 */
function clean() {
  // You can use multiple globbing patterns as you would with `gulp.src`,
  // for example if you are using del 2.0 or above, return its promise
  return del(['assets'])
}

/*
 * Define our tasks using plain functions
 */
function cssCompile() {
  return gulp
    .src(paths.styles.src)
    .pipe(changed(paths.styles.dest))
    .pipe(plumber())
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(plumber.stop())
    .pipe(gulp.dest(paths.styles.dest))
}

function cssMinify() {
  const plugins = [
    autoprefixer(),
    cssnano({
      preset: ['default', {
        discardComments: {
          removeAll: true
        }
      }]
    })
  ]
  return gulp
    .src(paths.styles.dest + 'style.css')
    .pipe(plumber())
    .pipe(cssBase64())
    .pipe(postcss(plugins))
    // .pipe(purgecss({
    //   content: ['*.php', './js/main.js', './scss/*.scss']
    // }))
    .pipe(
      rename({
        basename: 'style',
        suffix: '.min'
      })
    )
    .pipe(plumber.stop())
    .pipe(gulp.dest(paths.styles.dest))
}

function jsCompile() {
  return rollup
    .rollup({
      input: './js/main.js',
      external: ['jquery', 'popper.js'],
      plugins: [
        // commonjs(),
        nodeResolve(),
        eslint(),
        babel({
          babelHelpers: 'bundled'
        }),
        terser({
          format: {
            comments: false,
            quote_style: 1
          }
        })
      ]
    })
    .then((bundle) => {
      return bundle.write({
        file: './assets/js/bundle.min.js',
        format: 'iife',
        // name: 'bundle',
        globals: {
          jquery: 'jQuery', // Ensure we use jQuery which is always available even in noConflict mode
          'popper.js': 'Popper'
        }
        // sourcemap: true
      })
    })
}

function imageMinify() {
  return gulp
    .src(paths.images.src)
    .pipe(changed(paths.images.dest))
    .pipe(plumber())
    .pipe(cache(imagemin()))
    .pipe(plumber.stop())
    .pipe(gulp.dest(paths.images.dest))
}

function watch() {
  gulp.watch(paths.styles.src, cssCompile)
  gulp.watch(paths.styles.dest + 'style.css', cssMinify)
  gulp.watch(paths.scripts.src, jsCompile)
  gulp.watch(paths.images.src, imageMinify)
}

/*
 * Specify if tasks run in series or parallel using `gulp.series` and `gulp.parallel`
 */
const build = gulp.series(cssCompile,
  gulp.parallel(cssMinify, jsCompile, imageMinify, watch)
)

/*
 * You can use CommonJS `exports` module notation to declare tasks
 */
exports.clean = clean
exports.cssCompile = cssCompile
exports.cssMinify = cssMinify
exports.jsCompile = jsCompile
exports.imageMinify = imageMinify
exports.watch = watch
exports.build = build
/*
 * Define default task that can be called by just running `gulp` from cli
 */
exports.default = build
