var gulp = require('gulp');
var watch = require('gulp-watch');

gulp.task('watch', function() {
    return watch('**/*', ['build']);
});

gulp.task('build', function() {
    gulp.src('build/**/*')
        .pipe(gulp.dest('../kam-wp/wp-content/themes/refur-kam'));
});