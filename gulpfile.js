var gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const sassGlob = require("gulp-sass-glob");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const path = require("path");
const concat = require("gulp-concat");

gulp.task("sass", function () {
    return gulp
        .src("scss/*.scss")
        .pipe(customPlumber("Error running Sass"))
        .pipe(sassGlob())
        .pipe(sass())
        .pipe(gulp.dest("css"));
});

gulp.task("js", function () {
    return gulp
        .src("js/partials/*.js")
        .pipe(concat("global.js"))
        .pipe(gulp.dest("js"));
});

gulp.task("watch", function () {
    gulp.watch(
        ["scss/**/*.scss", "js/partials/*.js"],
        gulp.series("sass", "js")
    );
});

function customPlumber(errTitle) {
    return plumber({
        errorHandler: notify.onError({
            title: errTitle || "Error running Gulp",
            message: "Error: <%= error.message %>",
        }),
    });
}

gulp.task("default", gulp.series("js", "sass", "watch"));
