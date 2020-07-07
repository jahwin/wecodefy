import Vue from 'vue'
import Vuex from 'vuex'

const base_url = document.head.querySelector('meta[name="app-url"]')
let API_BASE_URL = null;
if (base_url) {
    API_BASE_URL = base_url.content;
} else {
    // Enter your api base url
    API_BASE_URL = "http://wecodefy.test/";
}

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        api_base_url: API_BASE_URL + "dev/ui/api/",
        base_url: API_BASE_URL,
    },
    mutations: {},
    actions: {},
    modules: {}
})