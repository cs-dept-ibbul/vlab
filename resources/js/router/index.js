import Vue from "vue";
import VueRouter from "vue-router";
import Home from "../views/pages/Home.vue";
import Explore from "../views/pages/Explore.vue";

Vue.use(VueRouter)

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/explore',
        name: 'Explore',
        component: Explore,
    }
]

const router = new VueRouter({
    mode: 'history',
    routes,
})

export default router