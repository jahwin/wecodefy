import Vue from 'vue'
import Vuex from 'vuex'

const base_url = document.head.querySelector('meta[name="app-url"]')
let BASE_URL = null;
if (base_url) {
    BASE_URL = base_url.content;
} else {
    // Enter your api base url
    BASE_URL = "http://wecodefy.test";
}

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        base_url: BASE_URL + "/dev-ui/api/",
    },
    mutations: {},
    actions: {},
    modules: {}
})