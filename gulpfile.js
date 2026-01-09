var gulp = require('gulp'),
    sass = require('gulp-sass');
    minify = require('gulp-minifier');
    rename = require('gulp-rename');



/* jshint task would be here */

gulp.task('build-css', function () {
    return gulp.src('scss/*.scss')
            .pipe(sass())
            .pipe(gulp.dest('css'));
});

gulp.task('minify-css', function () {
    return gulp.src('css/*.css')
            .pipe(minify({
                minify: true,
                collapseWhitespace: true,
                conservativeCollapse: true,
                minifyJS: false,
                minifyCSS: true,
                getKeptComment: function (content, filePath) {
                    var m = content.match(/\/\*![\s\S]*?\*\//img);
                    return m && m.join('\n') + '\n' || '';
                }
            }))
            .pipe(rename({
                suffix: '.min'
            }))
            .pipe(gulp.dest('css/dist'));
});

gulp.task('minify-js', function () {
    return gulp.src('js/*.js')
            .pipe(minify({
                minify: true,
                collapseWhitespace: true,
                conservativeCollapse: true,
                minifyJS: true,
                minifyCSS: false,
                getKeptComment: function (content, filePath) {
                    var m = content.match(/\/\*![\s\S]*?\*\//img);
                    return m && m.join('\n') + '\n' || '';
                }
            }))
            .pipe(rename({
                suffix: '.min'
            }))
            .pipe(gulp.dest('js/dist'));
});


/* updated watch task to include sass */

gulp.task('watch', function () {
    gulp.watch('scss/*.scss', ['build-css']);
    gulp.watch('css/*.css', ['minify-css']);
    gulp.watch('js/*.js', ['minify-js']);
});


// define the default task and add the watch task to it
gulp.task('default', ['watch']);
