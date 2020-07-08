import { enableProdMode } from "@angular/core";
import { platformBrowserDynamic } from "@angular/platform-browser-dynamic";

import { AppModule } from "./src/app.module";

if (process.env.ENV === "production") {
    enableProdMode();
}

const el = document.querySelector('app');
if (el) {
    const bootstrapPromise = platformBrowserDynamic().bootstrapModule(AppModule);
    // Logging bootstrap information
    bootstrapPromise
        .then()
        .catch(err => console.error(err));
}