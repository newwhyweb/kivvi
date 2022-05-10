var gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const path = require("path");

gulp.task("sass", function () {
    return gulp
        .src("scss/*.scss")
        .pipe(customPlumber("Error running Sass"))
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(gulp.dest("css"));
});

gulp.task("watch", function () {
    gulp.watch(["scss/**/*.scss"], gulp.series("sass"));
});

function customPlumber(errTitle) {
    return plumber({
        errorHandler: notify.onError({
            title: errTitle || "Error running Gulp",
            message: "Error: <%= error.message %>",
        }),
    });
}

gulp.task("default", gulp.series("sass", "watch"));
