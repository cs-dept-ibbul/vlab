<template>
  <div>
      <button v-if="!facultyCourses" @click="facultyCourses = true" class="button bg-primary text-white ml-5 mt-3"><span class="fa fa-chevron-left text-white "></span> Back</button>
      <div v-if="facultyCourses">
      <div class="w-100 row px-6 mx-0 mt-4">

        <div class="col-lg-6 col-md-12 col-sm-12 p-0">         
          <v-loader v-if="loadederState" type='line'></v-loader>                       
          <p v-if="!loadederState" style="font-size: 3em; font-family: 'Roboto', serif; font-weight:400;">{{faculty.name}}</p>
          <p class="text-justify" style="font-family: 'Roboto', serif;font-size: 0.9em;font-weight: 300;">
            {{faculty.description}}
          </p>
        </div>
        <div class="col-lg-2 col-md-12 col-sm-12"></div>
        <div class="col-lg-4 col-md-12 col-sm-12 p-0">
          <div class="boxX p-4" style="">
            <p class="fs2 fw8 font2">What to Do</p>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Get Enrollment Code from Course Instructor</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Find Your Course</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Click on Enroll</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Enter Enrollment Code</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Click OK</p>
            </div>
          </div>            
        </div>          
      </div>
      <br><br>
      <div class="px-6">          
          <!-- search and filter box for course -->       
        <div class="row d-lg-flex w-100 m-0" style="">          
          <div class="col-lg-4 col-md-3 pt-1 pl-0 ml-0 mb-5">
            <span class="font2 fs2 fw6" style="transition: all;">{{total_courses}} available courses</span>
          </div>
          <div class="some-input-field-class col-lg-8 col-md-9 d-flex justify-content-between p-0 mb-5 row" >          
            <div class="col-lg-6 col-md-none"></div>
            <div class="col-lg-3 p-0 m-0 col-md-6 col-sm-6">
              <input name="filter" id="filter" class="input-search3 w-100" autocomplete="off" placeholder="Search V-labs">
              <span class="fa fa-search serachicon2"></span>                        
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-flex flex-wrap pr-0" style="justify-content: space-between;">
              <span></span>
              <span style="white-space: nowrap;">                
                <span class="font2 fs1 fw3 sortby">Sort By</span> 
                <span class="sort sortbtn"  data-sort="name">Name <span class="fa fa-chevron-down"></span>|</span>
                <span class="fa fa-long-arrow-up px-1 fw2"></span>              
              </span>
            </div>            
          </div>      
        </div>
        <!-- courses container -->
        <div class="p-secondary r2 m-0 p-4 hm300 mb-5">
          <p id="noMatch" style="display: none;" class=" text-dark text-center fw4 font">No course matches</p>
          <div class="row w-100 m-0 ">       
           <!-- experiment box -->
            <span v-for="course in faculty_courses" class="w-100">
              
              <div class="p-4 w-100 bg-white shadow-sm my-3 fholder" style="border-radius: 9px;">
                <div class="d-flex justify-content-between align-items-center mb-2">
                  <div class="font ">
                    <div class="mb-2">
                      <span class="fw5 fs01 ftag">{{course.code}}</span>        

                    </div>
                    <h3 class="fw6 fdata">{{course.title}}</h3>
                    <p class="my-1 font2 fs01 text-secondary" >{{course.description.slice(0,60)}}...</p>
                    <p class="my-0 fw5 fs1">{{course.weekly_work.length}} Task</p>
                  </div> 
                  <div>
                      <div v-if="!checkEnrollment(course.id)">  
                      <!-- if not enrolled -->                      
                        <span v-if="course.enrollment_code != ''">
                          <!-- if enrollment code is required  -->
                          <button @click="viewEnrolledCourse(course.id)" class="fw5 fs01 button shadow-sm bg-success px-3 py-2 text-white p-display-none">View Course</button>
                          <button @click="enrollmentCode(course.enrollment_code, course.id)" class="fw5 fs01 button shadow-sm bg-dark px-3 py-2 text-white d-inline-block">Enroll</button>
                          <input type="text" name="enrollment_code" @keyup="compare(course.enrollment_code,$event.target.value,course.id, $event)" :placeholder="ecode" class="formControl ">
                          <span class="fa fa-check text-success display-none"></span>
                          <span class="fa fa-plus text-danger display-none"></span>
                        </span>           
                        <span v-else>
                          <!-- if enrollment code is not required  -->                          
                          <button @click="enroll(course.id)" class="fw5 fs01 button shadow-sm bg-secondary px-3 py-2 text-white d-inline-block">Enroll</button>
                          <!-- maintain design -->
                          <input type="text" name="enrollment_code" :placeholder="ecode" class="formControl">
                        </span>                 
                      </div>
                      <div v-else>
                          <button v-if="course.weekly_work.length>0" @click="viewEnrolledCourse(course.id)" class="fw5 fs01 button shadow-sm bg-success px-3 py-2 text-white d-inline-block">View Course</button>
                          <button v-else @click="noExperiment" class="fw5 fs01 button shadow-sm bg-success px-3 py-2 text-white d-inline-block">View Course</button>
                          <!-- maintain design -->
                          <input type="text" name="enrollment_code" :placeholder="ecode" class="formControl">
                      </div>
                    <p class="text-success fs1 more-detail-pin text-center" >More Detail <span class="fa fa-chevron-down text-success"></span></p>
                  </div>
                </div>
              </div>
              <div class="more-detail">
                <h6 class="text-warning font2 fw6 m-0 pl-2">Tasks</h6>
                <div v-if="course.weekly_work.length > 0">
                  <ul v-for="task in course.weekly_work" class="mt-1 text-dark d-flex flex-column">
                    <li>{{task.title}}</li>
                  </ul>                  
                </div>                
                <div v-if="course.weekly_work.length < 1" class="text-dark">No Task has been created for this course</div>
                <hr>
                <h6 class="text-info font2 fw6 ml-0 mt-2 mb-0 pl-2">Description</h6>                
                <p>{{course.description}}</p>
              </div>
            </span>
              <!-- end experiment box -->
          </div>  
        </div>
      </div>
    </div>
    <!-- <v-courseexperiment course="" v-else></v-courseexperiment>       -->
  </div>
 
</template>

<script>
  import courseexperiment from './courseExperiment.vue';
  export default {
    compontents:{
      'v-courseexperiment': courseexperiment
    },
   data(){
      return{
        faculty_courses:null,
        faculty:null,
        faculty_id:'',
        total_courses:0,
        loadederState:true,
        ecode: '',
        student_courses:[
          {id:'25cfd559-4b3b-45f3-be6f-1b9d37ff2fd8'}
        ],
        facultyCourses: true,
        courseProp: null,
      }
    },
  methods:{
    initMoreDetail: function(){
         $('.more-detail-pin').click(function(){
            $('.more-detail').not($(this).closest('.fholder').next()).slideUp(200);
            $(this).closest('.fholder').next().slideToggle(200);
          })
    },
    noExperiment(){
         Swal.fire({                  
              title: 'No Task is Available',                   
              text:'Please inquire from your course instructor',          
              confirmButtonText:'Ok',
                confirmButtonColor:'#00b96b', 
            })
      },
    enroll:function(course_id){
       this.show_loader();            
        this.axios.post('api/courses/add_student_course/'+this.currentUser.id, {user_id:this.currentUser.id, course_id: course_id},{headers: this.axiosHeader},function(response,status){
          if (response.status === 200) {                                                                                      
            this.hide_loader();
          }else{

          }
        }, function(e) {                       
           if(e.response.status === 401 ){
              location.href = "/logout";
           }else{
            Swal.fire({
              title:'something went wrong',
              text: 'check your internet connection',
              icon: 'danger',
            })
            this.hide_loader();
           }                                                                   
        })
    },
    checkEnrollment: function(course_id){      
        for (var i = 0; i < this.student_courses.length; i++) {
          if(this.student_courses[i].id == course_id){
            return true;
          }
        }
    },
    viewEnrolledCourse: function(course_id){
      location.href = '/my-course-review/'+course_id;
        /*this.facultyCourses = false;
        this.courseProp = course;*/
    },
    compare:function(code,value,course_id, event){                  
     /* let e = event.target.parentNode.children;
   
      this.removeError(event.target);
        let $this = this;        
        if (event.keyCode === 13) {
            if(value == code){
              event.target.nextElementSibling.style.borderBottom= '1px solid #00b96b';            
              setTimeout(function() {
                $this.show_loader();                        
                $this.axios.post('api/courses/add_student_course', {user_id:$this.currentUser.id, course_id: course_id},{headers: $this.axiosHeader},function(response,status){
                  $this.hide_loader();     
                  if (response.status) {
                    //pass.style.display  = 'inline-block';                    
                    location.reload();
                    setTimeout(function() {e[1].style.display= 'none';}, 10);
                    $this.hide_loader();
                  }else{

                  }
                }, function(e) {                       
                   if(e.response.status === 401 ){
                      location.href = "/logout";
                   }else{
                    Swal.fire({
                      title:'something went wrong',
                      text: 'check your internet connection',
                      icon: 'danger',
                    })
                    $this.hide_loader();
                   }                                                                   
                })   
              }, 100);
            }else{              
              this.addError(event.target);
              //pass.style.display= 'none';              
            }
        }*/ 
    },
    enrollmentCode:function(code,course_id){      
        let $this = this;
          Swal.fire({
            title: 'Enter your Enrollment Code',
            html: `<p class="font1 fs01 fw6">Enter you password</p>
            <input type="password" id="swal-input1" class="swal2-input mt-1" value="">`,
            confirmButtonText:'Ok',               
                cancelButtonText:'Cancel',                            
                cancelButtonColor:'#dd000f',                
                confirmButtonColor:'#00b96b',               
                showCancelButton:true,                
                showLoaderOnConfirm: true,  
                focusConfirm: false,            
              preConfirm: () => {     
              let value = $('#swal-input1').val();   
                 if(value == code){         
                  return $this.axios.post('api/courses/add_student_course', {faculty_id:$this.faculty_id,user_id:$this.currentUser.id, course_id: course_id},{headers: $this.axiosHeader}).then(response => {  
                          if (!response.data.sucess) {
                             throw new Error(response.statusText) 
                          }              
                          return response.data.success;
                    }).catch(error => {                                     
                        if (error.response) {
                          if (error.response.status == 409) {
                            Swal.showValidationMessage('256 Failed: something went wrong');
                          }else if(error.response.status == 401){
                            location.reload();
                          }else{
                            Swal.showValidationMessage('260 Failed: something went wrong');                                           
                          }
                        }
                    })  
                }else{
                  Swal.showValidationMessage('Failed: Incorrect Code');                                           
                }
              },
          }).then((result)=>{
            if (result.value){
              Swal.fire({
                title: 'success',
                icon: 'success',
                text: 'you have been enrolled',
                confirmButtonText: `View Course`,                        
                denyButtonText: `Ok, refresh the page`,
                confirmButtonColor:'#00b96b',   
                denyButtonColor:'#dd000f',                    
                showDenyButton: true,
                allowOutsideClick: false,
                allowEscapeKey: false,
                closeOnClickOutside:false,
              }).then((result)=>{
                if (result.isConfirmed) {
                    location.href = '/my-course-review/'+course_id;                  
                } else if (result.isDenied){
                    location.reload();
                }
              })
            
            }
          })
      }/*,
  enrollmentCode:function(e){
        this.ecode= '';
        e.target.nextElementSibling.style.visibility = 'visible';
        let code = 'enter enrollment code';
        code = code.split('');
        let i = -1;
        let $this = this;
        let interval = setInterval(function() {
          i++;
          if ($this.ecode != 'enter enrollment code'){
            if (code[i]=='') {
                $this.ecode += ' ';
            }else{$this.ecode += code[i];}
          }else{
            clearInterval(interval);
          }
        }, 50)
    }*/
  },
  computed:{
    
  },
  async created(){
        let pathname = location.pathname.split('/')
        this.faculty_id = pathname[pathname.length -1];
         this.faculty_courses  = await this.axiosGetById('api/courses/faculty_courses','faculty_id', this.faculty_id);
         this.student_courses  = await this.axiosGetById('api/courses/student_courses','user_id', this.currentUser.id);
         this.student_courses = this.student_courses[0].courses;
         this.faculty  = await this.axiosGetById('api/faculties/faculty','faculty_id', this.faculty_id);
         //this.student_courses = this.student_courses.courses;
          //console.log(this.student_courses)
         this.loadederState = false;
         let $this = this;
         let interval = setInterval(function () {
          if ($this.total_courses < $this.faculty_courses.length) {
            $this.total_courses +=1;
          }else{
              clearInterval(interval);
          } 
         },400);
          
          /*initialize datatable */
          setTimeout(function() {
            $this.rippleButton();
             $this.initMoreDetail();        
          }, 200);
      
  },
  props:['faculty_uuid'],
 mounted(){     
      this.$nextTick(function(){ 
        $(document).ready(function(){
          var filterDataKey='', filterDataValue='';
          var $md;
          $('#filter').keyup(function(){      
            //$('.scroll-y').scrollTo({top:600,left:0, behavior:'smooth'});
            filterDataKey = $(this).val();
            $('.fholder').each(function(){
              $md = $(this);
              $(this).find('.fdata').each(function(e){  
                filterDataValue = $(this).text();
                if(filterDataValue.toLowerCase().includes(filterDataKey.toLowerCase())=== false){           
                  $md.hide();
                }else{
                  $md.show();
                }
              });
              
            });
            if(!$('.fholder').is(':visible')){
              $('#noMatch').show();
            }else{
              $('#noMatch').hide(100);
            }
          })
       
        });



    })
  }
}
</script>
<style scoped>
.timeline{
  margin-top:10px
}
.text{
  background-color: #d4d9df; 
  padding: 8px; 
  border-radius: 10px; 
  font-size: 16px;
}
.practical-desc {
  display: flex; 
  justify-content: space-between;
  width: 52%;
  font-size: 16px;
  padding: 8px 0;
}

.col-md-10 {
  display: flex;
  flex-direction: column;
  height: 8rem;
  
}

.col-md-2 {
  display: flex;
  flex-direction: column;
  justify-content:space-around;
}

.practical-title {
  font-weight: bolder;
  padding-top: 10px;
  text-transform: capitalize;
}

.child {
  background-color: #fff;
  margin-bottom: 30px;
  margin-top:10px;
  border-radius: 0.5rem;
  padding: 10px;
  height: 10rem;
  display: flex;
  justify-content: space-between;
}
ul.timeline {
  list-style-type: none;
  position: relative;
}
ul.timeline:before {
  content: " ";
  background: #d4d9df;
  display: inline-block;
  position: absolute;
  left: 29px;
  width: 2px;
  height: 100%;
  z-index: 400;
}
ul.timeline > li {
  margin: 0px 0;
  padding-left: 20px;
  margin-bottom: 10px;
}
ul.timeline > li:before {
  content: " ";
  background: white;
  display: inline-block;
  position: absolute;
  border-radius: 50%;
  border: 3px solid #191236;
  left: 20px;
  width: 20px;
  height: 20px;
  z-index: 400;
}

.vlab-practicals {
  width: 100%;
  background-color: #ebeaef;
  max-height: 700px;
  border-radius: 2.5rem;
  
}
.instructors {
  color: #959399;
  margin-bottom: 0%;
}
.view-practicals {
  width: 95%;
  background-color: #ebeaef;
  height: 200px;
  border-radius: 2rem;
  margin-top: 55px;
  display: flex;
}
.view-practicals-box {
  width: 12%;
  background-color: #adaabb;
  height: 150px;

  position: absolute;
  z-index: 1;
  border-radius: 2.5rem;
  right: 55%;
  top: 38%;
}
.view-Practical_text {
  align-self: flex-end;
  padding-left: 20px;
}
.fa {
  padding-left: 5px;
}

.side {
  display: flex;
  justify-content: flex-end;
}
.expect {
  width: 55%;
  background-color: #ebeaef;
  height: 300px;
  border-radius: 2rem;
  margin-top: 55px;
}
.what-to-expect-text {
  padding-left: 20px;
  padding-top: 20px;
  font-weight: bold;
  color: #191236;
}
.expect-content {
  width: 90%;
  overflow-x: hidden;
  overflow-y: scroll;
  scrollbar-color: #191236 #bebebe;
  scrollbar-width: thin;
  max-height: 220px;
  margin-left: 15px;
}
.input-row {
  margin-top: 20px;
}
.md-size{
  font-size: 16px;
}
ul{
  float: left;
}
ul li{
  height: 20px;
  display: inline;    
  list-style: square;   
}
ul li:before{
  content: "";
  width:5px;
  height:5px;
  background: #444;
  display: inline-block;
  margin-right: 5px;
}
hr{
  clear: left;
}
input.formControl{
  transition: 0.5s all;
  width: 130px;
  height: 26px;
  padding: 7px;
  border-radius: 0px;
  border: none;
  border-bottom:1px solid #888;
  display: block;
  visibility: hidden;
  position: relative;
  top: 10px;
  margin-bottom: 5px;
}
.formControl:focus{
  border-bottom:1px solid #00b96b;  
  border-radius: 0px;
  outline: 0;
}
.display-none{
  display: none;
}
.button{
  width: 130px;
  margin-bottom: 7px;
}
.more-detail-pin{
  width: 130px;
  text-align: center;
  position: relative;
  bottom: -10px;
}
</style>
