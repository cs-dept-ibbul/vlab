
require('./bootstrap')

import Vue from 'vue'
import bootstrap from "bootstrap";

//Main pages
//import App from './views/app.vue'

/*experiment page component*/
 window.Vue = require('vue');
Vue.component('v-tlb', require('./components/title-left-bar.vue').default);
Vue.component('v-navb', require('./components/Navbar.vue').default);
Vue.component('v-t', require('./components/Section.vue').default);
Vue.component('v-sponsor', require('./components/SponsorSection.vue').default);
Vue.component('v-avl', require('./components/ExploreSection.vue').default);
Vue.component('v-avlc', require('./components/AvailableCourses.vue').default);
Vue.component('v-viewcourses', require('./components/VewCourse.vue').default);
Vue.component('v-testing', require('./components/VewCourse.vue').default);

/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
   
 });
