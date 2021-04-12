<template>
	<div  class="px-5 mt-5 card-cont">
            <div v-if="section!=0" class="mb-2">
            	<button class="button bg-primary text-white pl-1 pr-2 py-2" @click="sectionControl"><span class="fa fa-chevron-left ml-2 mr-1 text-white"></span>back</button>
            </div>
            <div v-if="loaderState">
            	<v-loader></v-loader>
            </div>
            <div v-if="section==0" class="row mt-4 w-100">
                <div class="col-lg-4 col-md-6 col-sm-12 p-3 " v-for="course in courses">
                    <div @click="selectCourse(course)" class="shadow-sm r2 button bg-white d-flex flex-wrap justify-content-between w-100 pl-0 py-4 pr-4">                
                        <div class="p-0 image-bg-1"></div>
                        <div class="my-2">
                            <p class="fs2 fw7 mb-2 mt-4 fs10 font2 p-text-dark line-height-none show-student-detail cursor-1" @click='studentDetail(students)'>109</p>
                            <p class="mt-0 pt-0 p-text-dark font2 fw4 fs2 pl-2 ">Students</p>
                            <div class="font fs2 mt-4 p-text-warning cursor-1 show-course-detail r1" @click="couseDetail(departments)">
                                <span class="fa fa-cube" ></span>
                                <span class="" >{{course.code}}</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r2 mr-3 p-text-warning p-transparent-warning fs9"></span>
                        </div>                    
                    </div>
    
                </div>                       
            </div>        
            <div v-if="section==1">
            	<v-viewstudentbycourse></v-viewstudentbycourse>
            </div>
        </div>
</template>


<script>
	import studentincourse from './studentInCourse.vue'; 
	import loader from './skeletalLoaderA.vue'; 
	export default{
		components:{
			'v-viewstudentbycourse':studentincourse,
			'v-loader':loader,
		},
		data(){
			return {
				loaderState:true,
				section: 0,
				selectedCourse: null,
				courses:null,
				departments:[
					{departments: 'physics', total:60},
					{departments: 'computer science', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},
					{departments: 'physics education', total:50},				
				],
				students:[
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					{fname: 'ibrahim', lname:'amisu', matric:'u15/fns/csc/1030'},
					
				],
			}
		},
		methods: {
			selectCourse: function(obj){
				let $this = this;
				setTimeout(function() {					
					$this.selectedCourse = obj;
					$this.section = 1;
				}, 230);

			},
			sectionControl: function(){
				let $this = this;
				setTimeout(function(){
					$this.section--;
				},200)
			},
			couseDetail:function(d){
				let table = "<table class='table r2 shadow-sm table-hover'><thead><tr>	<th >Department</th>	<th >No of Student</th> </tr></thead><tbody>";
					for (var i = 0; i < d.length; i++) {
						table += "<tr>";
						table += "<td >"+d[i]['departments'] + "</td>";
						table += "<td >"+d[i]['total'] + "</td>";
						table += "</tr>";
					}
					table += "</tbody></table>";
				Swal.fire({					
					html: table,
					width:'90%',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Print',
					cancelButtonText: 'exit'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	let printWin = window.open();
					   printWin.document.write(table);
					   printWin.document.close();
					   printWin.focus();
					   printWin.print();
					   printWin.close();				    
				  }
				})
			},
			studentDetail:function(d){
				let table = "<table class='table r2 shadow-sm table-hover'><thead><tr><th class='text-left'>matric</th>	<th  class='text-left'>first name</th ><th class='text-left'>last name</th> </tr></thead><tbody>";
					for (var i = 0; i < d.length; i++) {
						table += "<tr>";
						table += "<td class='text-left' >"+d[i]['matric'] + "</td>";
						table += "<td  class='text-left'>"+d[i]['fname'] + "</td>";
						table += "<td class='text-left' >"+d[i]['lname'] + "</td>";
						table += "</tr>";
					}
					table += "</tbody></table>";
				Swal.fire({					
					html: table,
					width:'90%',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#3085d6',
					confirmButtonText: 'Print',
					cancelButtonText: 'exit'
				}).then((result) => {
				  if (result.isConfirmed) {
				  	let printWin = window.open();
					   printWin.document.write(table);
					   printWin.document.close();
					   printWin.focus();
					   printWin.print();
					   printWin.close();				    
				  }
				})
			}
		},
		async created(){

		    this.courses  = await this.axiosGet('api/courses/courses');
		    //console.log(this.createdCourses)
		    this.tableLoaded = true;
		    /*initialize datatable */
		    let $this = this;

             setTimeout(function() {
             	$this.loaderState =false;
		    	$this.rippleButton();
             	 $('#coursetable').DataTable({
			    	pageLength : 5,
			    });
             }, 200);
		},
	}
</script>
<style scss>
	$box-width:365px;
$box-height:175px;

body{
  background-color:#69D2E7;  
}

.dropDown-tltp{
  position: absolute;
  display: inline-block;
  left:40%;
  top:60%;
  
  font-family: 'Roboto Condensed', sans-serif;
  .label{
    font-size: 20px;
    border-radius: 5px;
    border:2px solid #E0E4CC;
    padding: 5px 31px;
    color: #fff;
    cursor: pointer;
    display: inline-block;
    background: none;    
    font-family:inherit;
    box-shadow: 1px 1px 5px rgba(42, 42, 42,0.6);
    background-color:#F38630;
    &:focus{
      outline: 0;
      border:0;
      box-shadow:none;
      background-color:#de670a;
    }
    &:focus ~ .content{  
      display: flex;             
    }   
  }
  .content{
    display:none;         
    flex-direction: column;
    flex-wrap: wrap;
    border-radius: 5px;
    border: 3px solid #A7DBD8;
    position: absolute;    
    bottom: 50px;
    left: 0px;
    width: 365px;
    max-width: 365px;
    max-height: 175px;
    background-color: #fff;
    box-shadow: 1px 1px 10px rgba(42, 42, 42, 0.5);
    padding: 20px 10px 5px 20px;
    transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms;
    a{
      text-align: left;
      font-size: 14px;
      padding: 0px 0 15px 0;
      color: #399bda;
      text-decoration: none;
      &:hover{
        font-weight: bold;
      }
      &.selected{
        font-weight: bold;
      }
    }
    &:after{
     position: absolute;
    display: block;
    bottom: -13px;
    left: 12%;
    border-left: 12px solid transparent;
    border-right: 12px solid transparent;
    border-top: 12px solid #A7DBD8;
    content: " ";
    font-size: 0;
    line-height: 0;
    width: 0;
    }
  }
}
</style>
<style scoped="">
	.card-cont::-webkit-scrollbar-thumb {
  background: #20154f;
  border-radius: 10px;
  cursor: pointer;
}

/* Handle on hover */
.card-cont::-webkit-scrollbar-thumb:hover {
  background: #20154e;
  cursor: pointer;
}
.show-course-detail:hover{	
	color: #dd8200;
	text-decoration: underline;

}
.show-student-detail,.show-course-detail{
	transition: all 0.2s;
}
.show-student-detail:hover{	
	color: white;	
	text-shadow: #20154e 0px 1px 3px;
}
button.button.btn:focus{
  outline: 0 !important;
  border:0px solid transparent !important;
  box-shadow: 0 !important;
}
</style>