
require('./bootstrap')

import Vue from 'vue'
import router from "./router";
import bootstrap from "bootstrap";

//Main pages
import App from './views/app.vue'


new Vue({
    router,
    bootstrap,
    render: h=>h(App)
}).$mount('#app')