
require('./bootstrap')

import Vue from 'vue'
import bootstrap from "bootstrap";

//Main pages
//import App from './views/app.vue'

/*experiment page component*/
 window.Vue = require('vue');
Vue.component('tlb', require('./components/title-left-bar.vue').default);
Vue.component('navb', require('./components/Navbar.vue').default);
Vue.component('t', require('./components/Section.vue').default);
Vue.component('sponsor', require('./components/SponsorSection.vue').default);
Vue.component('avl', require('./components/ExploreSection.vue').default);
Vue.component('avlc', require('./components/AvailableCourses.vue').default);
Vue.component('viewcourses', require('./components/VewCourse.vue').default);

/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
   
 });
