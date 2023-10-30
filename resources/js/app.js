import './bootstrap';
import {createApp} from 'vue'
import AppComponent from './App.vue'
import router from "./router/index.js";


import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives,
})

const app = createApp(AppComponent)

app.use(vuetify);
app.use(router);
app.mount("#app")
