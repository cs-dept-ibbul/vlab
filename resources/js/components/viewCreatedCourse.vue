<template>
	<div>
		
		<v-loader v-if="loaderState"></v-loader>		
		<div v-show="!loaderState" class="v-scroll-x">				
			<table id="coursetable" class="table table-hover">
				<thead>
					<tr id="cheadV">
						
					<th width="5%">Img</th>
		            <th width="25%">Title</th>
		            <th width="10%">Code</th>
		            <th width="25%">Description</th>
		            <th width="25%">Experiments</th>
		            <!-- <th width="15%">Instructors</th> -->		            
		            <th width="10%">Actions</th>
					</tr>
				</thead>
				<tbody v-if="tableLoaded">				
			        <tr v-for="(course, index) in createdCourses" :key="course.course_id" :data-counter="counter=0">
			            <td width="5%">
			                <label class="container">
			                    <input type="checkbox">
			                    <span class="checkmark"></span>
			                  </label>
			            </td>
			            <td width="25%" :title="course.title">{{course.title.slice(0,20)}} ...</td>
			            <td width="10%">{{course.code}}</td>
			            <td width="25%" :title="course.description">{{course.description.slice(0,20)}} ...</td>
			            <td width="25%">
			            	<a class="bullets line-h01 text-primary" v-for="(course_experiment,index) in course.course_experiment" href="#" @click="checktaskcreated(course_experiment.experiments.id,course_experiment.experiments.page,)"> {{course_experiment.experiments.name}}</a>
			            </td>
			            <!-- <td width="15%">500L</td>	 -->		            
			            <td width="10%">

			            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="editCourse(createdCourses[index])" style="border-left: 1px solid #ccc;"></span>
			            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deleteCourse(course.course_id)"></span>
			            </td>
			        </tr>
		    	</tbody>
	    	</table>
    	</div>						
	</div>
</template>

<script>

	export default{
	
		data(){
			return{
				createdCourses:null,
				tableLoaded:false,
				loaderState:true,
				counter:0,
				weeklyworks:[],
			}
		},
		methods: {

			 	//<createcourse update='${true}' alldata='${[]}'></createcourse>
				checktaskcreated:function(id,pagename){					
					if(this.weeklyworks.length >0){						
						var find = 0;
						for(var i=0; i<this.weeklyworks.length;i++){
							if(this.weeklyworks[i].experiment_id == id){								
								find = 1;
							}							
						}
						if (find==1) {
							window.location.replace('/'+pagename);
						}else{
							Swal.fire({
					     		title:'No Task Created for this Experiments',
					     		text:'You have not created any Task',
					     		icon:'warning',
					     		showDenyButton: false,
							    showCancelButton: true,				    
				      		    confirmButtonColor:'#00b96b',		
				      		    cancelButtonColor:'#d33',		
							    confirmButtonText: `Goto Manage Task`,						       
							}).then((result) => {
							  
							  if (result.isConfirmed) {
							    location.href = "/manage-task";
							  }
							})	
						}

					}else{
						Swal.fire({
				     		title:'No Task Created for this Experiments',
				     		text:'You have not created any Task',
				     		icon:'warning',
				     		showDenyButton: false,
						    showCancelButton: true,				    
			      		    confirmButtonColor:'#00b96b',		
			      		    cancelButtonColor:'#d33',		
						    confirmButtonText: `Goto Manage Task`,						       
						}).then((result) => {
						  
						  if (result.isConfirmed) {
						    location.href = "/manage-task";
						  }
						})	
					}
								
				},
				editCourse:function(obj,id){
					this.VueSweetAlert2('v-createcourse',{
						update:true,
						alldata: obj,
						course_id:2 //id
					})
					/*Swal.fire({
					  title: 'Update course',
					  html:`<v-createcourse id='forvuecomponent'></v-createcourse>`,
					  focusConfirm: false,				
					  preConfirm: () => {
					  	let faculty = document.getElementById('swal-input0').value,
					  	 facultyName , departmentName = document.getElementById('swal-input1').value,
					      departmentAbbr = document.getElementById('swal-input2').value;
					      facultyName = document.getElementById('swal-input0').options;
					  	  facultyName = facultyName[facultyName.selectedIndex].text
					  	if ( faculty == "" || departmentName == "" || departmentAbbr == "") {					     
					         Swal.showValidationMessage('All fields are required');
					  	}
					    return [
					      faculty,
					      departmentName,
					      departmentAbbr,
					      facultyName,
					    ]
					  } 
					}).then((result)=>{

					});*/
				},
				deleteCourse: function(id){
					Swal.fire({
						title:'are you sure you want to delete',
						text:'',
						showCancelButton: true,
						CancelButtonText: 'No',
						ConfirmButtonText: 'Yes'
					}).then((result)=>{
						if(result.value){
							this.axiosDelete('api/courses/delete', {course_id: id});
						}
					});					
				}
		},
		async created(){

		    this.createdCourses  = await this.axiosGet('api/courses/courses'); //this endpoint is not returning foriegn data
		    this.weeklyworks  = await this.axiosGet('api/works/weekly_works_only'); //this endpoint is not returning foriegn data
		    //console.log(this.createdCourses)
		    this.tableLoaded = true;
		    
			let $this = this;
		    /*initialize datatable */
             setTimeout(function() {
             	 $('#coursetable').DataTable({
			    	pageLength : 5,
			    });
             	$this.loaderState = false;
             }, 200);
		},
		mounted(){			
			this.$nextTick(function(){ 
				$(document).ready(function(){
					
				})
			}); 
		}
	};
</script>
<style type="text/css">
	.bullets:before{
		content: '\f08e';
		font-size: 0.7em;
		color: blue;
		font-family: FontAwesome;		
		display: block;
		position: relative;
		top: 15px;
		left: -15px;

	}
</style>