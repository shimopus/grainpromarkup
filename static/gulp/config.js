module.exports = {
    autoprefixer: {
        browsers: [
            'last 2 versions',
            'safari 5',
            'ie 9',
            'opera 12.1',
            'ios 6',
            'android 4'
        ],
        cascade: true
    },

    // LESS config
    less: {
        src: './src/styles/*.less',
        dest: '../grain-pro'
    },

    // Icons config
    icons: {
        src: './src/images/icons/*',
        dest: './src/styles/common',
        template: './gulp/icons-template',
        concat: 'icons.less'
    },

    // Images
    images: {
        src: [
            './src/images/**/*.*',
            '!./src/images/icons/**/*.*'
        ],
        dest: '../grain-pro/images'
    },

    // Fonts config
    fonts: {
        src: './src/fonts/*',
        dest: './dev/fonts'
    },

    // Scripts config
    scripts: {
        src: './src/scripts/*',
        dest: './dev/scripts'
    },

    // Browser Sync config
    bsync: {
        proxy: 'localhost:8080'
    },

    // Watch config
    watch: {
        include: [
            'src/markup/**/*.html',
            'src/images/svg/**/*.svg'
        ],
        less: [
            'src/styles/*.less',
            'src/styles/**/*.less'
        ],
        fonts: 'src/fonts/*',
        scripts: 'src/scripts/*',
        icons: 'src/images/icons/**/*',
        images: 'src/images/*.*'
    },

    // Clean config
    clean: {
        src: ['./dev/', './prod/']
    },

    // Include config
    include: {
        basepath: './src/markup/',
        src: './src/markup/*.html',
        dest: './dev/markup'
    },

    // Plugins config
    plugins: {
        scope: ['dependencies', 'devDependencies', 'peerDependencies'],
        rename: {
            'gulp-sourcemaps': 'sourcemaps',
            'gulp-plumber': 'plumber',
            'gulp-less': 'less',
            'gulp-image-data-uri': 'uri',
            'gulp-concat': 'concat',
            'gulp-ignore': 'ignore',
            'gulp-babel': 'babel',
            'gulp-add-src': 'add',
            'gulp-file-include': 'include',
            'gulp-rimraf': 'rimraf'
        }
    }
};