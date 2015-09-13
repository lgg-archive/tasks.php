var gulp  = require('gulp'),
    livereload = require('gulp-livereload');


gulp.task('reloadJs', function() {
    gulp.src('web/js/*.js').pipe(livereload());
});

gulp.task('reloadCss', function() {
    gulp.src('web/css/*.css').pipe(livereload());
});


// Watch Files For Changes
gulp.task('watch', function() {
    livereload.listen();
    gulp.watch('web/js/*.js', ['reloadJs']);
    gulp.watch('web/css/*.css', ['reloadCss']);
});

// create a default task and just log a message
gulp.task('default', ['watch']);