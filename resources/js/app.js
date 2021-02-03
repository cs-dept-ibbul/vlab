require('./bootstrap');


import Vue from 'vue'
import bootstrap from "bootstrap";

//Main pages
//import App from './views/app.vue'
   
/*experiment page component*/
 window.Vue = require('vue');
Vue.component('msidebar', require('./components/leftNavBar.vue').default);//main system side bar
Vue.component('topnave', require('./components/experimentTopNav.vue').default);
Vue.component('guide', require('./components/ExphowToNav.vue').default); //experiment side bar
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