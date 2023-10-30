import {createRouter, createWebHistory} from "vue-router";
import ExampleComponent from "../component/ExampleComponent.vue";
import Example2Component from "../component/Example2Component.vue";

const routes = [
    {
        path: '/',
        name:'home',
        component: ExampleComponent
    },
    {
        path: '/about',
        name:'about',
        component: Example2Component
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
