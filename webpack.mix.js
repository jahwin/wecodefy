let mix = require("laravel-mix");
require("./webpack-custom-config");
mix
    .options({
        postCss: [
            require('autoprefixer'),
        ],
    })
    /*
     |--------------------------------------------------------------------------
     | Mix Asset Management
     |--------------------------------------------------------------------------
     */

mix
    .js(
        ["scheme/vue/main.js", "scheme/angular/polyfills.ts", "scheme/angular/main.ts", "scheme/react/main.js"],
        "assets/js/main.js"
    ).setPublicPath('assets/')
    .disableNotifications();