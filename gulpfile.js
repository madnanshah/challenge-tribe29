const {src, dest, watch, series} = require('gulp')
const sass = require('gulp-sass')(require('sass'))

function buildStyles(){
    return src('assets/sass/**/*.scss')
        .pipe(sass())
        .pipe(dest('assets/css'))
}

function watchTask(){
    watch(['assets/sass/**/*.scss','*.html'],buildStyles)
}

exports.default = series(buildStyles, watchTask)