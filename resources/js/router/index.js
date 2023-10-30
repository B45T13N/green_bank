import {createRouter, createWebHistory} from "vue-router";
import Home from "@/pages/Home.vue";
import Simulator from "@/pages/Simulator.vue";
import Result from "@/pages/Result.vue";
import NotFound from "@/pages/NotFound.vue";

const routes = [
    {
        path: '/404',
        name:'error 404',
        component: NotFound
    },
    { path: '/:pathMatch(.*)*', redirect: '/404' },
    {
        path: '/',
        name:'home',
        component: Home
    },
    {
        path: '/simulator',
        name:'simulator',
        component: Simulator
    },
    {
        path: '/result',
        name:'result',
        component: Result
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
