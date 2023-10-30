import {createRouter, createWebHistory} from "vue-router";
import Home from "@/pages/Home.vue";
import Simulator from "@/pages/Simulator.vue";
import Result from "@/pages/Result.vue";

const routes = [
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
