

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
Vue.component('v-tlb', require('./components/title-left-bar.vue').default);
Vue.component('v-navb', require('./components/Navbar.vue').default);
Vue.component('v-t', require('./components/Section.vue').default);
Vue.component('v-sponsor', require('./components/SponsorSection.vue').default);
Vue.component('v-avl', require('./components/ExploreSection.vue').default);
Vue.component('v-avlc', require('./components/AvailableCourses.vue').default);
Vue.component('v-viewcourses', require('./components/VewCourse.vue').default);

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
