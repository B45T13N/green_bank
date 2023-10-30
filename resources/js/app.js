import './bootstrap';
import '../css/app.css';

import {createApp} from 'vue'

import AppComponent from './App.vue'
import router from "./router/index.js";

const app = createApp(AppComponent)

app.use(router);
app.mount("#app")
