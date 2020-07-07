import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [{
        path: '/dev',
        redirect: '/dev/ui'
    },
    {
        path: '/dev/ui/*',
        redirect: '/dev/ui'
    },
    {
        path: '/dev/ui',
        name: 'home',
        component: Home
    }

]

const router = new VueRouter({
    mode: 'history',
    base: process.env.BASE_URL,
    routes
})

export default router