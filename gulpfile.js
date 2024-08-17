var gulp = require('gulp');

const sass = require('gulp-sass')(require('sass'));
const minify = require('gulp-minify');


// ------------------------------------------------- configs
var paths = {
    sass: {
        src: 'assets/sass/**/*.{scss,sass}',
        dest: 'build',
        opts: {}
    },
    js: {
        src: 'assets/js/*.js',
        dest: 'build',
    }
};

// ---------------------------------------------- Gulp Tasks
gulp.task('sass', function () {
    console.log('Building CSS...');
    return gulp.src(paths.sass.src)
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest(paths.sass.dest))
});

gulp.task('min-js', function () {
    console.log('Building JS...');
    return gulp.src('assets/js/*.js')
        .pipe(minify({
            ext: {
                min: '.min.js',
            },
            noSource: true,
            ignoreFiles: ['*.min.js', '*-min.js']
        }))
        .pipe(gulp.dest('build/js/'))
});

// ------------------------------------ Gulp Testing Message
gulp.task('message', function () {
    console.log('It works!!');
});

// ---------------------------------------------- Gulp Watch
gulp.task('watch:styles', function () {
    gulp.watch(paths.sass.src, gulp.series('sass'));
});

gulp.task('watch:js', function () {
    gulp.watch(paths.js.src, gulp.series('min-js'));
});

gulp.task('watch',
    gulp.parallel('watch:styles', 'watch:js')
);


// -------------------------------------------- Default task
gulp.task('default', gulp.series('sass', 'min-js',
    gulp.parallel('message', 'watch')
));

gulp.task('build', gulp.series('sass', 'min-js')
);