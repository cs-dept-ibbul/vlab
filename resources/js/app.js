require('./bootstrap');


import Vue from 'vue'
import bootstrap from "bootstrap";

//Main pages
//import App from './views/app.vue'
   
/*experiment page component*/
 window.Vue = require('vue');
Vue.component('tlb', require('./components/leftNavBar.vue').default);
Vue.component('topnave', require('./components/experimentTopNav.vue').default);
Vue.component('guide', require('./components/ExphowToNav.vue').default);
Vue.component('expfooter', require('./components/ExpbottomNav.vue').default);

Vue.component('tlb2', require('./components/title-left-bar.vue').default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
    methods:{
            toggleClass(){            	
                this.isLoading=!this.isLoading;
                //this.classObj = { "color-blue" : true};
            }
        }
 });