import Vue from 'vue'
import Antd from 'ant-design-vue';
import App from './App';
import 'ant-design-vue/dist/antd.css';
import router from './router';
import store from './store';
import mixin from './mixin/mixin'
import axios from 'axios'
import VueAxios from 'vue-axios'
import VueChatScroll from 'vue-chat-scroll'


Vue.use(VueChatScroll)
Vue.use(VueAxios, axios)
Vue.config.productionTip = false
Vue.use(Antd);
Vue.mixin(mixin);

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')