const mix = require('laravel-mix');

mix.js('resources/flatlab/app.js', 'flatlab/all.js').vue()
    .sass('resources/flatlab/app.scss', 'flatlab/all.css')
    .copy('resources/flatlab/js/html5shiv.js', 'public/js/html5shiv.js', false)
    .copy('resources/flatlab/js/respond.min.js', 'public/js/respond.min.js', false);

mix.webpackConfig({
    module: {
        rules: [
            {
                exclude: /node_modules/,
            },
        ],
    },
});

if (mix.inProduction()) {
    mix.version();
}

mix.js('resources/hi/js/app.js', 'hi/all.js').vue()
.sass('resources/hi/sass/app.scss', 'hi/all.css');
