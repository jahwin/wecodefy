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
        ["js/vue/main.js", "js/angular/polyfills.ts", "js/angular/main.ts", "js/react/main.js"],
        "assets/js/main.js"
    ).setPublicPath('assets/')
    .disableNotifications();