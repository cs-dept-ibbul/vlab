<template>
  <div>
      <div class="w-100 row px-6 mx-0 mt-4">

        <div class="col-lg-6 col-md-12 col-sm-12 p-0">         
          <v-loader v-if="loadederState" type='line'></v-loader>                       
          <p v-if="!loadederState" style="font-size: 3em; font-family: 'Roboto', serif; font-weight:400;">{{faculty.name}}</p>
          <p class="text-justify" style="font-family: 'Roboto', serif;font-size: 0.9em;font-weight: 300;">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
        <div class="col-lg-2 col-md-12 col-sm-12"></div>
        <div class="col-lg-4 col-md-12 col-sm-12 p-0">
          <div class="boxX p-4" style="">
            <p class="fs2 fw8 font2">What to Expect</p>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
            </div>
            <div class="d-flex ">
              <span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
              <p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p>
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
              <input name="filter" id="filter" class="input-search3 w-100" placeholder="Search V-labs">
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
                    <p class="my-0 fw5 fs1">{{course.experiments_count}} Practicals</p>
                  </div>
                  <div>
                    <p class="text-success fs1 more-detail-pin" >More Detail <span class="fa fa-chevron-down text-success"></span></p>
                  </div>
                </div>
              </div>
              <div class="more-detail">
                <h6 class="text-warning font2 fw6 m-0 pl-2">Exerpiment</h6>
                <ul v-for="experiment in course.experiments" class="mt-1 text-dark d-flex flex-column">
                  <li>{{experiment.name}}</li>
                </ul>
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
 
</template>

<script>
  export default {
   data(){
      return{
        faculty_courses:null,
        faculty:null,
        total_courses:0,
        loadederState:true
      }
    },
  methods:{
    initMoreDetail: function(){
         $('.more-detail-pin').click(function(){
            $('.more-detail').not($(this).closest('.fholder').next()).slideUp(200);
            $(this).closest('.fholder').next().slideToggle(200);
          })
    }

  },
  async created(){
        let pathname = location.pathname.split('/')
        let faculty_id = pathname[pathname.length -1];
         this.faculty_courses  = await this.axiosGetById('api/courses/faculty_courses','faculty_id', faculty_id);
         this.faculty  = await this.axiosGetById('api/faculties/faculty','faculty_id', faculty_id);
         
          //console.log(this.faculty_course_student)
         this.loadederState = false;
         let $this = this;
         let interval = setInterval(function () {
          if ($this.total_courses <= $this.faculty_courses.length) {
            $this.total_courses +=1;
          }else{
              clearInterval(interval);
          }
         },400);
          
          /*initialize datatable */
          setTimeout(function() {
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
</style>