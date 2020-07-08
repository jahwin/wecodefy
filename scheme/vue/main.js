import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

Vue.config.productionTip = false

const el = document.querySelector('#app');
if (el) {
    new Vue({
        router,
        store,
        render: h => h(App)
    }).$mount('#app')
    if (process.env.ENV !== "production") {
        console.log('Vue app is running in development mode');
    }
}