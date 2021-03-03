

import Vue from 'vue'   
import bootstrap from "bootstrap";
import Vuex from 'vuex'

//Main pages
//import App from './views/app.vue'

/*experiment page component*/
 window.Vue = require('vue');

//vuex
Vue.use(Vuex)
/*import storeData from "./store/index";*/
import expvicelab2 from "./store/exp2";
/*
const store = new Vuex.Store(
   storeData
)*/
const store = new Vuex.Store(
   expvicelab2
)
/*global event bus and communication*/
Vue.prototype.$eventBus = new Vue(); 

Vue.component('v-msidebar', require('./components/leftNavBar.vue').default);//main system side bar
Vue.component('v-topnave', require('./components/experimentTopNav.vue').default);
Vue.component('v-systopnave', require('./components/SysTopNav.vue').default);
Vue.component('v-guide', require('./components/ExphowToNav.vue').default); //experiment side bar
Vue.component('v-rightnav', require('./components/ExpRightNav.vue').default); //experiment Right Nav bar
Vue.component('v-expfooter', require('./components/ExpbottomNav.vue').default);
Vue.component('v-ribbon', require('./components/ExperimentRibbon.vue').default);
Vue.component('v-start', require('./components/StartExperimentBtn.vue').default);
Vue.component('v-progress', require('./components/progressBar.vue').default);
Vue.component('v-thread', require('./components/threadTrends.vue').default);
Vue.component('v-createcourse', require('./components/createCourse.vue').default);
Vue.component('v-vicelabexp2', require('./components/vicelabexp2.vue').default);
Vue.component('v-vicelabtools', require('./components/vicelabExpEquip.vue').default); //experiment Right Nav bar



Vue.component('v-tlb2', require('./components/title-left-bar.vue').default);
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('v-tlb', require('./components/title-left-bar.vue').default);
Vue.component('v-navb', require('./components/Navbar.vue').default);
Vue.component('v-t', require('./components/Section.vue').default);
Vue.component('v-sponsor', require('./components/SponsorSection.vue').default);
Vue.component('v-avl', require('./components/ExploreSection.vue').default);
Vue.component('v-avlc', require('./components/AvailableCourses.vue').default);
Vue.component('v-viewcourses', require('./components/VewCourse.vue').default);

Vue.component('v-logintopnavbar', require('./components/NavbarLogin.vue').default);
Vue.component('v-loginbox', require('./components/loginBox.vue').default);
Vue.component('v-secondbox', require('./components/loginBox2.vue').default);
Vue.component('v-welcometext', require('./components/welcomevlb.vue').default);

Vue.component('v-dashb', require('./components/UserDashboard.vue').default);
Vue.component('v-topnav', require('./components/TopNav.vue').default);
Vue.component('v-lactivity', require('./components/Lastactivity.vue').default);
Vue.component('v-practicaltimeline', require('./components/PracticalTimeLine.vue').default);



/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
   store,
   /*expvicelab2,*/
   	 data:function() {
	    	return{
	    	 poor:false,
         exp2vicelab: this.exp2vicelab
	    	}
        },
    methods:{
            toggleClass(){            	
                this.isLoading=!this.isLoading;
                //this.classObj = { "color-blue" : true};
            }
        },
          mounted(){
            /*console.log(expvicelab2.state);*/
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
