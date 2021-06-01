<template>
	<div class="w-100 p-0 m-0">
		<div class="row p-3" style="width: 98%; margin: 50px auto;height: 75.5vh;overflow-y: scroll;" >
     	<div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">   
	     	<div class="row d-lg-flex" style="">	     		
		     	<div class="col-md-4 pt-1 pl-0 ml-0 mb-5">
		     		<span style="font-family: inherit;font-weight: 500;font-size: 0.9em;" >Enrolled Courses</span>
		     	</div>
				<div class="some-input-field-class col-md-8 d-flex justify-content-between p-0 mb-5" >					
					<span style="display: inline;">						
		     			<input name="filter" id="filter" class="input-search2" placeholder="Search V-labs">
						<span class="fa fa-search serachicon2"></span> 				   				   			
					</span>
					<div style="display: inline-block;">
						<i style="font-family: inherit;font-weight: 300;font-size: 0.9em;">Sort By</i>
						<button class="sort sortbtn" data-sort="name">Name <i class="fa fa-chevron-down"></i></button>
						<i class="ml-2 fa fa-long-arrow-up pl-3" style="border-left: 1px solid #ccc;font-weight: 200;"></i>
					</div>
				</div>
			</div>
			<div v-if="loaderState">
				<br>
          		<v-loader count="2"></v-loader>
         	</div>
			<div class="row" v-if="!loaderState">
				

					<!-- experiment box -->
				<div v-for="course in mycourses" class="p-4 w-100 bg-white shadow-sm my-3 fholder" style="border-radius: 9px;">
					<div v-if="course.course != null" class="d-flex justify-content-between align-items-center mb-2">
						<div class="font ">
							<h3 class="fw6 fdata">{{course.course.code}}</h3>
							<p class="my-1 font2 " style="color:#888;font-size: 0.85em;">{{course.course.description}}</p>
							<p class="my-0 fw5" style="font-size: 0.9em;"><!-- {{course.experiments.length}} --> Practicals</p>
						</div>
						<div>
							<a :href="'my-course-review/'+course.course.id" class="sysbtn-md p-success text-white">View <i class="fa fa-arrow-right text-white"></i></a>
						</div>
					</div>
					<div v-if="course.course == null" class="d-flex justify-content-between align-items-center mb-2">
						<div class="font ">
							<h3 class="fw6 fdata">{{getCourseCode(course.course_id)}}</h3>
							<p class="my-1 font2 " style="color:#888;font-size: 0.85em;">{{getCourseDesc(course.course_id)}}</p>
							<p class="my-0 fw5" style="font-size: 0.9em;">0 Practicals</p>
						</div>
						<div>							
							<a href="#" @click="noExperiment" class="sysbtn-md p-success text-white">View <i class="fa fa-arrow-right text-white"></i></a>
						</div>
					</div>						
					<v-progress v-if="course.course != null" :evalue="experimentDone(course.weekly_work_experiment)" :avalue="course.weekly_work_experiment.length" ></v-progress>
					<v-progress v-else evalue="0" avalue="1" ></v-progress>
					
				</div>
				<!-- end experiment box -->

	     	</div>  		

     	</div>
     </div>

   </div>
	</div>
</template>
<script>
	import progress from './progressBar.vue';
	export default{
		components:{
			'v-progress':progress
		},
		data(){
			return {
				loaderState:true,
				mycourses:{},
				courses:null,
			}
		},
		methods:{
			getCourseCode(course_id){
				var course;
				if (this.courses != null){
					course = this.courses.filter((item)=>{
						if (item.id == course_id) {							
							return item;
						}
					});
					return course[0].code;
				}else{
					return "Can't get Course";
				}
			},
			getCourseDesc(course_id){
				var course;
				if (this.courses != null){
					course = this.courses.filter((item)=>{
						if (item.id == course_id) {
							return item;
						}
					});
					return course[0].description;
				}else{
					return "can't get Description"
				}
			},
			noExperiment(){
				 Swal.fire({                  
		          title: 'No Experiment is Available',                   
		          text:'Please inquire from your course instructor',          
		          confirmButtonText:'Ok',
		            confirmButtonColor:'#00b96b', 
		        })
			},
			experimentDone(expAll){
				//console.log(expAll);
				let count =0;
				for(let i =0; i< expAll.length; i++){
					console.log(expAll[i]);
					if(expAll[i].result.length > 0){
						count+=1;
					}
				}
				return count;
			}
		},
		mounted(){
			this.$nextTick(function(){
				$(document).ready(function(){
				 	var filterDataKey='', filterDataValue='';
				 	var $md;
				 	$('#filter').keyup(function(){
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
				 			
				 		})
				 	})
				})
			})
		},
		async created(){
			this.mycourses = await this.axiosGetById('api/courses/enrolledCourses','user_id', this.currentUser.id);
			this.courses   = await this.axiosGet('api/courses/allcourses');
			this.loaderState = false;
		      //change request to merge expeiment_tbl with user_course_table
		     if (this.mycourses.length<1) {
		     	Swal.fire({
		     		title:'No Course Found',
		     		text:'You have not been enrolled on any course',
		     		icon:'warning',
		     		showDenyButton: false,
				    showCancelButton: false,				    
	      		    confirmButtonColor:'#00b96b',		
				    confirmButtonText: `Find Courses`,		
				    allowOutsideClick: false,
                    allowEscapeKey: false,
                    closeOnClickOutside:false,		    
				}).then((result) => {
				  
				  if (result.isConfirmed) {
				    location.href = "/explore";
				  }
				})
		     }
			
		}
	}
</script>
<style scoped="">
	.fdata{
		text-transform: uppercase;
	}
</style>