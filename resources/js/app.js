

import Vue from 'vue'   
import bootstrap from "bootstrap";
import Vuex from 'vuex'
import axios from 'axios'
import VueAxios from 'vue-axios'
import plugin from "./plugin/plugin";
//Main pages
//import App from './views/app.vue'

/*experiment page component*/
 //window.Vue = require('vue');
 window.Vue = Vue;
/*Vue.prototype.$http = axios*/
//vuex
Vue.use(Vuex)
//axios
Vue.use(VueAxios, axios);
/*import storeData from "./store/index";*/

Vue.use(plugin);

import storedata from "./store/exp1";
//import expvicelab3 from "./store/exp2";
/*
const store = new Vuex.Store(
   storeData
)*/
const store = new Vuex.Store(storedata)
/*const store2 = new Vuex.Store(   expvicelab3 )*/

/*global event bus and communication*/
Vue.prototype.$eventBus = new Vue(); 
 
Vue.component('v-asidebar', require('./components/adminLeftNavBar.vue').default);//admin system side bar
Vue.component('v-isidebar', require('./components/instructorLeftNavBar.vue').default);//instructor system side bar
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
Vue.component('v-circuitconnection1', require('./components/searies_and_parallel_p.vue').default);
Vue.component('v-circuitconnection2', require('./components/shade_level_p.vue').default);
Vue.component('v-simplecircuit', require('./components/simple-circuit.vue').default);
Vue.component('v-circuitconnectiontools', require('./components/circuitconnectiontools.vue').default); //experiment Right Nav bar


/*admin component*/
Vue.component('v-viewcreatedcourse', require('./components/viewCreatedCourse.vue').default); 
Vue.component('v-faculty', require('./components/faculty.vue').default); 
Vue.component('v-department', require('./components/department.vue').default); 
Vue.component('v-session', require('./components/session.vue').default); 
Vue.component('v-user', require('./components/user.vue').default); 
Vue.component('v-userform', require('./components/userForm.vue').default); 
Vue.component('v-addexperiment', require('./components/addExperiment.vue').default); 
Vue.component('v-viewcreatedexperiment', require('./components/viewCreatedExperiment.vue').default); 

/*end admin component*/

/*instructor component*/
Vue.component('v-viewcoursesinstructor', require('./components/viewCoursesInstructor.vue').default);
Vue.component('v-task', require('./components/task.vue').default);
Vue.component('v-taskform', require('./components/taskForm.vue').default);
/*end instructor component*/

Vue.component('v-tlb2', require('./components/title-left-bar.vue').default);

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('v-tlb', require('./components/title-left-bar.vue').default);
Vue.component('v-navb', require('./components/Navbar.vue').default);
Vue.component('v-home', require('./components/home.vue').default);
Vue.component('v-sponsor', require('./components/SponsorSection.vue').default);
Vue.component('v-explore', require('./components/ExploreSection.vue').default);
Vue.component('v-avlc', require('./components/AvailableCourses.vue').default);

Vue.component('v-viewcourses', require('./components/viewCourses.vue').default);
Vue.component('v-courseexperiment', require('./components/courseExperiment.vue').default);
Vue.component('v-courseresources', require('./components/courseResources.vue').default);

Vue.component('v-logintopnavbar', require('./components/NavbarLogin.vue').default);
Vue.component('v-loginbox', require('./components/loginBox.vue').default);
Vue.component('v-secondbox', require('./components/loginBox2.vue').default);
Vue.component('v-welcometext', require('./components/welcomevlb.vue').default);

Vue.component('v-dashb', require('./components/UserDashboard.vue').default);
Vue.component('v-topnav', require('./components/TopNav.vue').default);
Vue.component('v-lactivity', require('./components/Lastactivity.vue').default);
Vue.component('v-practicaltimeline', require('./components/PracticalTimeLine.vue').default);
Vue.component('v-viewstudent', require('./components/viewStudent.vue').default);
Vue.component('v-mycourses', require('./components/mycourses.vue').default);
Vue.component('v-reviewcourse', require('./components/reviewCourse.vue').default);

Vue.component('v-enrolledpracticals', require('./components/EnrolledPractical.vue').default);

Vue.component('v-coursestab', require('./components/CoursesTab.vue').default);
Vue.component('v-electricityscript', require('./components/electricityScript.vue').default);
Vue.component('v-loginscript', require('./components/loginScript.vue').default);
Vue.component('v-userauth', require('./components/userAuthentication.vue').default);
Vue.component('v-feedback', require('./components/feedback.vue').default);
Vue.component('v-errorpage', require('./components/errorPage.vue').default);




/*end experiment page component*/
 const app = new Vue({
   el: '#app',
   bootstrap,
   store,   
   userType:0,   
     data:function() {
        return{
         poor:false,
         //exp2vicelab: this.exp2vicelab
        }
        },
    methods:{
            toggleClass(){              
                this.isLoading=!this.isLoading;                
            },
            likeThisPage(){
              alert();
            }
        },
    beforeCreated(){          
     },
      mounted(){     
        $('body').append(`
          <a class="flex-wrap forBug" style=" width:50px; height:50px; display:flex; justify-content:center;"><span class="fa fa-bug text-danger fs8 p-0"></span></a>
          `);
        $('body').append(`
          <div class="flex-wrap justify-between forThumb d-flex">
          <span>Did you like this page?</span>
              <span>
              <i class="fa fa-thumbs-o-down likeThisPage" rel="no" style="font-size:1.3em;"></i>          
              <i class="fa fa-thumbs-o-up likeThisPage"   rel="yes"  style="font-size:1.3em;"></i>          
              </span>
          </div>
          <div style="position:absolute;top:103%;height:30px;width:100%;"></div>
          `); 


        $('.likeThisPage').on('click', function(){
          let res = $(this).attr('rel');
          let $vm = this;      
          let pathname = location.pathname.split('/')[1];           
          if (pathname == "") {
            pathname = 'home'
          }
          if (res == 'no') {            
            Swal.fire({              
              title: 'Please can you tell us why?',
              html: `<input type="text" class="form-control" id="feedbackmsgx">`,              
              confirmButtonText:'Send',
              confirmButtonColor:'#00b96b', 
              showConfirmButton: true,
              preConfirm: (login) => {

                let msg = $('#feedbackmsgx').val();
                const formData = new FormData();
                formData.append('message', msg);
                formData.append('like',res);
                formData.append('page_name',pathname);                
                    return axios.post('api/feedback',formData,{headers:$vm.axiosHeader})
                    .then(response => {                   
                      if (!response.data.sucess) {
                        throw new Error(response.statusText)
                      }              
                      return response.json()
                    })
                    .catch(error => {
                      if (error.response) {
                        if (error.response.status == 409) {                                        
                        }else if(error.response.status == 401){}                     
                      }
                    });
              }              
            }).then((result)=>{

              if (result.isConfirmed){
                const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })

              Toast.fire({
                icon: 'success',
                title: 'Thanks for your feedback'
              })
            }
              /*
                Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  heightAuto: false,
                  title: 'Than you for your feedback',
                  showConfirmButton: false,
                  timer: 1500

                })*/
            })
          }else{

              const formData = new FormData();
                formData.append('message', '-');
                formData.append('like',res); 
                formData.append('page_name',pathname);  
              axios.post('api/feedback',formData,{headers:$vm.axiosHeader})
              .then(response => {                   
                if (response.data.success) {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                      toast.addEventListener('mouseenter', Swal.stopTimer)
                      toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                  })

                  Toast.fire({
                    icon: 'success',
                    title: 'Thanks for your feedback'
                  })
                }              
                
              })
              .catch(error => {
                if (error.response) {
                  if (error.response.status == 409) {                                        
                  }else if(error.response.status == 401){}                     
                }
              });
              
             
          }
        })
    }
 });

 /*experiment timing filter */
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


document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

  $(document).ready(function(){
    setTimeout(function() {
        $('#system-loader2').hide();
    }, 50);
  }) 