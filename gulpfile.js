var gulp = require('gulp');

const sass = require('gulp-sass')(require('sass'));
const minify = require('gulp-minify');
//const cache = require('gulp-cache');
const clean = require('gulp-rimraf')

// ------------------------------------------------- configs
var paths = {
    sass: {
        src: 'assets/sass/**/*.{scss,sass}',
        dest: 'build',
        opts: {}
    },
    js: {
        src: 'assets/js/*.js',
        dest: 'build/js/',
    },
    fonts: {
        src: 'assets/fonts/*.{woff,woff2}',
        dest: 'build/fonts/',
    },
    images: {
        src: 'assets/images/*.{jpg,png,svg}',
        dest: 'build/images/'
    },
    vendor: {
        src: 'assets/vendor/**/*',
        dest: 'build/vendor/'
    }
};

// ---------------------------------------------- Gulp Tasks

gulp.task('clean', async function() {
    console.log('Cleaning the build folder...')
    return gulp.src('build/*', { read: false }).pipe(clean());
})

gulp.task('sass', function () {
    console.log('Building CSS...');
    return gulp.src(paths.sass.src)
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(gulp.dest(paths.sass.dest))
});

gulp.task('min-js', function () {
    console.log('Building JS...');
    return gulp.src(paths.js.src)
        .pipe(minify({
            ext: {
                min: '.min.js',
            },
            noSource: true,
            ignoreFiles: ['*.min.js', '*-min.js']
        }))
        .pipe(gulp.dest(paths.js.dest))
});

gulp.task('move-images', async function(){
    return gulp.src('assets/images/**/*.+(png|jpg|jpeg|gif|svg)')
        .pipe(gulp.dest('build/images'))
});

gulp.task('move-fonts', async function(){
    return gulp.src(paths.fonts.src)
        .pipe(gulp.dest(paths.fonts.dest))
});

gulp.task('move-vendor-scripts', async function(){
    return gulp.src(paths.vendor.src)
        .pipe(gulp.dest(paths.vendor.dest))
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
gulp.task('default', gulp.series('move-vendor-scripts', 'sass', 'min-js', 'move-images', 'move-fonts',
    gulp.parallel('message', 'watch')
));

gulp.task('build', gulp.series('move-vendor-scripts', 'sass', 'min-js', 'move-images', 'move-fonts')
);