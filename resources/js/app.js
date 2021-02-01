
require('./bootstrap')

import Vue from 'vue'
import bootstrap from "bootstrap";

//Main pages
//import App from './views/app.vue'

/*experiment page component*/
 window.Vue = require('vue');
Vue.component('tlb', require('./components/title-left-bar.vue').default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
 });