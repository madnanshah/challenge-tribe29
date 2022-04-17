//importing src, dest, watch, series functions from gulp package
const {src, dest, watch, series} = require('gulp')
//importing gulp-sass plugin that is already installed. Invoked passing sass compiler
const sass = require('gulp-sass')(require('sass'))

function buildStyles(){// it will get sass and will compile in css
    return src('assets/sass/**/*.scss')
        .pipe(sass()) // pipe function combines multiple functions
        .pipe(dest('assets/css'))
}

function watchTask(){ // it will keep watching given files
    // run buildStyles when files given in array change
    watch(['assets/sass/**/*.scss','*.html'],buildStyles)
}
// exporting results of both task functions being executed one after other by series()
exports.default = series(buildStyles, watchTask) 