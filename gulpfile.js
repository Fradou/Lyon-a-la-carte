const gulp = require('gulp');
const clean = require('gulp-clean-css');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const concat = require('gulp-concat');
const ugly = require('gulp-uglify');

var paths = {
  materialize: 'node_modules/materialize-css/dist/',
  styles: ['web-src/css/*.css', '!web-src/css/main.css'],
  scripts: ['web-src/js/*.js', '!web-src/js/main.js']
};

gulp.task('ugly', function(){
    gulp.src(paths.scripts)
        .pipe(ugly())
        .pipe(gulp.dest('web/js'));
    gulp.src([paths.materialize+'js/materialize.js','web-src/js/main.js'])
        .pipe(ugly())
        .pipe(concat('main.js'))
        .pipe(gulp.dest('web/js'));
 });

gulp.task('clean', function () {
    gulp.src(paths.styles)
        .pipe(clean())
        .pipe(gulp.dest('web/css'));
    gulp.src([paths.materialize+'css/materialize.css','web-src/css/main.css'])
        .pipe(clean())
        .pipe(concat('main.css'))
        .pipe(gulp.dest('web/css'));
});

gulp.task('imagemin', function(){
    gulp.src('web-src/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('web/img'))

});

gulp.task('font', function() {
    return gulp.src(paths.materialize+'fonts/**/*')
        .pipe(gulp.dest('web/fonts'))

});

gulp.task('watch', function() {
    gulp.watch('web-src/js/*', ['ugly']);
    gulp.watch('web-src/css/*', ['clean']);
    gulp.watch('web-src/img/*', ['imagemin'])
});

gulp.task('default', ['clean', 'ugly','imagemin','font']);