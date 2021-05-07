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
						<span style="font-family: inherit;font-weight: 300;font-size: 0.9em;">Sort By</span>
						<button class="sort sortbtn" data-sort="name">Name <span class="fa fa-chevron-down"></span></button>
						<span class="ml-2 fa fa-long-arrow-up pl-3" style="border-left: 1px solid #ccc;font-weight: 200;"></span>
					</div>
				</div>
			</div>
			<div class="row">
				

					<!-- experiment box -->
				<div v-for="course in mycourses" class="p-4 w-100 bg-white shadow-sm my-3 fholder" style="border-radius: 9px;">
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div class="font ">
							<h3 class="fw6 fdata">{{course.code}}</h3>
							<p class="my-1 font2 " style="color:#888;font-size: 0.85em;">{{course.description}}</p>
							<p class="my-0 fw5" style="font-size: 0.9em;"><!-- {{course.experiments.length}} --> Practicals</p>
						</div>
						<div>
							<a :href="'my-course-review/'+course.id" class="sysbtn-md p-success text-white">View <span class="fa fa-arrow-right text-white"></span></a>
						</div>
					</div>
					<v-progress evalue=0 avalue=4></v-progress>
					
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
				mycourses:{},
			}
		},
		methods:{

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
			let userD  = await this.axiosGetById('api/courses/student_courses','user_id', this.currentUser.id);
			this.mycourses = userD[0].courses;         //change request to merge expeiment_tbl with user_course_table

			console.log(this.mycourses)
		}
	}
</script>
<style scoped="">
	.fdata{
		text-transform: uppercase;
	}
</style>