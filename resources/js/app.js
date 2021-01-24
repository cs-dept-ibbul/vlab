import Vue from 'vue'

require('./bootstrap');
//Main pages
import App from './views/app.vue'


const app = new Vue({
    el: '#app',
    components: { App }
});