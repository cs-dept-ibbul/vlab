<template>
	<div>
		<table id="coursetable" class="table table-hover">
			<thead>
				<tr id="cheadV">
					
				<th width="5%">Img</th>
	            <th width="25%">Title</th>
	            <th width="10%">Code</th>
	            <th width="15%">Description</th>
	            <th width="15%">Experiments</th>
	            <th width="15%">Instructors</th>
	            <th width="5%">Date Created</th>
	            <th width="10%">Actions</th>
				</tr>
			</thead>
			<tbody v-if="tableLoaded">
	        <tr v-for="(course, index) in createdCourses" :key="course.id">
	            <td width="5%">
	                <label class="container">
	                    <input type="checkbox">
	                    <span class="checkmark"></span>
	                  </label>
	            </td>
	            <td width="25%" :title="course.title">{{course.title.slice(0,20)}} ...</td>
	            <td width="10%">{{course.code}}</td>
	            <td width="15%" :title="course.description">{{course.description.slice(0,20)}} ...</td>
	            <td width="15%">12</td>
	            <td width="15%">500L</td>
	            <td width="5%">{{course.updated_at}}</td>
	            <td width="10%">

	            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="editCourse(createdCourses[index])" style="border-left: 1px solid #ccc;"></span>
	            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deleteCourse(course.id)"></span>
	            </td>
	        </tr>
	    	</tbody>
    	</table>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				createdCourses:null,
				tableLoaded:false
			}
		},
		methods: {
				editCourse:function(obj){
					Swal.fire('edit');
				},
				deleteCourse: function(id){
					Swal.fire('delete');					
				}
		},
		async created(){

		    this.createdCourses  = await this.axiosGet('api/courses/courses');
		    //console.log(this.createdCourses)
		    this.tableLoaded = true;
		    /*initialize datatable */
             setTimeout(function() {
             	 $('#coursetable').DataTable({
			    	pageLength : 5,
			    });
             }, 200);
		},
		mounted(){			
			this.$nextTick(function(){ 
			}); 
		}
	};
</script>
<style type="text/css">
	
</style>