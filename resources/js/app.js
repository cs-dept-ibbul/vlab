

import Vue from 'vue'
import bootstrap from "bootstrap";

//Main pages
//import App from './views/app.vue'

/*experiment page component*/
 window.Vue = require('vue');

/*global event bus and communication*/
Vue.prototype.$eventBus = new Vue(); 

Vue.component('v-msidebar', require('./components/leftNavBar.vue').default);//main system side bar
Vue.component('v-topnave', require('./components/experimentTopNav.vue').default);
Vue.component('v-guide', require('./components/ExphowToNav.vue').default); //experiment side bar
Vue.component('v-expfooter', require('./components/ExpbottomNav.vue').default);
Vue.component('v-ribbon', require('./components/ExperimentRibbon.vue').default);
Vue.component('v-start', require('./components/StartExperimentBtn.vue').default);


Vue.component('v-tlb', require('./components/title-left-bar.vue').default);
Vue.component('v-navb', require('./components/Navbar.vue').default);
Vue.component('v-t', require('./components/Section.vue').default);
Vue.component('v-sponsor', require('./components/SponsorSection.vue').default);
Vue.component('v-avl', require('./components/ExploreSection.vue').default);
Vue.component('v-avlc', require('./components/AvailableCourses.vue').default);
Vue.component('v-viewcourses', require('./components/VewCourse.vue').default);

Vue.component('v-lnb', require('./components/NavbarLogin.vue').default);
Vue.component('v-lbx', require('./components/loginBox.vue').default);
Vue.component('v-lbx2', require('./components/loginBox2.vue').default);
Vue.component('v-vlb', require('./components/welcomevlb.vue').default);


/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
   	 data:function() {
	    	return{
	    	 poor:false
	    	}
        },
    methods:{
            toggleClass(){            	
                this.isLoading=!this.isLoading;
                //this.classObj = { "color-blue" : true};
            }
        }
 });
Vue.filter('two_digits', (value) => {
  if (value < 0) {
  	value = 0;
    return '00';
  }
  if (value.toString().length <= 1) {
    return `0${value}`;
  }
  return value;
});
