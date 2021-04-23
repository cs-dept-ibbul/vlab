<template>
  <div>  
       <h1 class="my-5 text-center explore__header">Explore Available V-lab Courses</h1>
        <div class="w-100 bg-white px-6" style="box-shadow: 1px 6px 5px rgba(100,100,100,.1);position: relative;z-index: 2;">
          <div class="font2 fw4  systab systab--active ">Course Category</div>
        <div class="font2 fw4 systab ml-3">Most Visited Courses</div>
        </div>
        <div class="row hm300 w-100 px-6 py-5" style="background: #f0f0f0;">          
          <div class="col-12 col-md-6 col-lg-4 mt-5" v-for="cat in courseCate.faculties">
            <a style="text-decoration: none;" :href="link+cat.id" class="w-100 cadin">
              
            <div class="w-100 r2 shadow">
              <div  class="h130 w-100 p-secondary rt2"></div>
              <div class="p-3 bg-white rb2">
                <br>
                <h5 class="fw5 text-dark">{{cat.name}}</h5>
                <br>
                <div class="d-flex justify-content-between text-dark">
                  <div class="d-flex flex-wrap fs01 font fw4">
                    <span class="fa fa-table"></span>
                    <span>{{cat.courses_count}} Course</span>
                  </div>
                  <div class="d-flex flex-wrap fs01 font fw4">
                    <span class="fa fa-user"></span>
                    <span>{{cat.students_count}} students</span>
                  </div>
                </div>
              </div>
            </div>            
            </a>
          </div>          
        </div>
  </div>
</template>

<script>
export default {
  data(){
    return {
      link:'/viewCourse/',
      courseCate: [
        {'id':1,'name': 'Applied Science','totalCourse':'7','totalStudents':500},
        {'id':2,'name': 'Science & Engineering ','totalCourse':'12','totalStudents':1000},
        {'id':3,'name': 'Biological Science','totalCourse':'3','totalStudents':10},
        {'id':4,'name': 'Others','totalCourse':'4','totalStudents':100},
      ]
    }
  },
  async created(){
    if (this.currentUser.role_id != 3) {
        this.link = '/view-course/'
    }
      
        this.courseCate  = await this.axiosGet('api/faculties/faculty_course_student');
        //console.log(this.createdFaculty)
        this.tableLoaded = true;
        
        /*initialize datatable */            
    }
};
</script>

<style lang="scss" scoped>


#alignment {
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
#title {
    width: 95%;
    margin-top:50px;
}
//section
.custom-section {
  width: 99%;
  padding: 40px 0px;
  background-color: #eeeeef;
  border-radius: 2rem;
  height: 250px;

  @media screen and (width: 991.98px) {
    flex-direction: column-reverse;
  }

  .col-lg-8 {
    margin-top: 100px;
    h2 {
      font-weight: 700px;
      font-size: 63px;
      color: #0c105a;
      margin-bottom: 0;
      line-height: 1;
      white-space: nowrap;
    }
    h3 {
      font-weight: 300px;
      font-size: 64px;
      color: #000000;
      line-height: 1;
    }
    p {
      padding-top: 100px;
      color: #0c105a;
      font-size: 14px;
      
    }
    a {
      display: inline-block;
      padding: 8px 22px;
      color: #ffffff;
      background-color: #0c105a;
      border: 1px solid transparent;
      margin-top: 60px;
      text-decoration: none;
      transition: 5s cubic-bezier(0.785, 0.135, 0.15, 0.86);

      &:hover {
        color: white;
        background-color: darkblue;
        border: 1px solid rgb(1, 1, 59);
      }
    }
  }
}
</style>
