'use strict';

const gulp = require('gulp'),
    prefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    stripCssComments = require('gulp-strip-css-comments'),
    watch = require('gulp-watch');


let path = {
    build: { // пути для сборки проектов
        scss: 'template/css/'
    },
    src: { // пути размещения исходных файлов проекта
        scss: 'template/scss/**/*.scss'
    },
    watch:{
        scss: 'template/scss/**/*.scss'
    },
    clean: 'template/css/'// путь очистки директории для сборки

};
// SCSS
gulp.task('scss',function (done) {
    gulp.src(path.src.scss)
        .pipe(sass({
            outputStyle:'compressed',
            sourcemaps:false,
            includePaths: require('node-normalize-scss').includePaths
        }))
        .pipe(prefixer({
            cascade: false,
            remove: true
        }))
        .pipe(stripCssComments())
        .pipe(gulp.dest(path.build.scss));
    done();
});

gulp.task('watch',function (done) {
    gulp.watch(path.watch.scss,gulp.series('scss'));
    done();
});