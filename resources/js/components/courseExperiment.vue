<template>
	<div class="cover-template pl-5 pr-3">
		<br><br>		
		<div class="w-100 row px-2 py-3 border" style="border-left: 3px solid #00b96b !important; border-right:3px solid #00b96b!important; ">
			<div class="col-lg-4 col-md-3 col-sm-6 col-xs-8">
				<div class="w-100">Select Course</div>
				<select class="form-control w-100" v-model="selectedcourse" @change="FetchCourseResources">	
					<option></option>				
					<option v-for="course in courses" :value="course.id">{{course.code}}</option>
				</select>								
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 position-relative">					
			</div>
			<div class="col-lg-4 col-md-3 col-sm-6 col-xs-8">				
				<p class="fs001 my-1">Select Experiment</p>
				<select class="form-control  w-100" v-model="selectExperiment" id="experimentBox">
					<option ></option>
					<option v-for="experiment in experiments" :value="experiment.id">{{experiment.name}}</option>
				</select>
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 position-relative">								
				<button class="button bg-light text-center text-dark w-75 py-2" style="position: absolute;left:0;bottom: 0;" @click="AddExperiment">Add</button>
			</div>
		</div>
			<br>
			<p class="text-white badge badge-success">{{courseName}} Experiments</p>
			<div class="row w-100 py-3" v-if="!toload">				
				<div v-for="experiment in courseexperiments" class="col-lg-4 col-md-3 col-sm-6 col-sm-12 resource">
					
					<div class="w-100 rounded shadow-sm bg-white p-2 d-flex justify-between" style="border: 1px solid #eee;" >
						<span>{{experiment.experiments.name}}</span>
						<span class="fa fa-trash text-danger cursor-1" @click="deleteResource(experiment.id)"></span>						
					</div>

				</div>
			</div>
		
	</div>
</template>

<script>
	

	export default{

		data(){
			return{
				courses:[],
				selectExperiment:'',
				courseName:'',
				experiments:[],
				selectedcourse:'',
				courseexperiments:[],
				thiscourse:'',
				toload:true,
				file: '',
			}
		},
		methods:{
			FetchCourseResources: function(){				
				this.toload = true;
				location.hash = this.selectedcourse;
				this.thiscourse = this.courses.filter((item)=>{ return item.id===this.selectedcourse})
				this.courseName = this.thiscourse[0].code;
				this.courseexperiments = this.thiscourse[0].course_experiment;
				this.toload = false;
				
			},
		
			deleteResource:function(id){				
				Swal.fire({
					title: 'confirm delete',
					icon:'warning',
					confirmButtonText:'Continue',					      
			      cancelButtonText:'Cancel',				      				      
			      cancelButtonColor:'#dd000f',					      
			      confirmButtonColor:'#00b96b',					      
			      showCancelButton:true,					      
			      showLoaderOnConfirm: true,
				}).then((result)=>{
					if (result.value) {
						this.axiosDelete('api/courses/delete_experiment',{'course_experiment_id': id})					

					}
				})
			},
			AddExperiment:function(){
				var $vm = this;				
				if (this.selectExperiment == '') {
					Swal.fire('select experiment to add');
					return false;
				}
				for (var i = 0; i < this.courseexperiments.length; i++) {
					if (this.courseexperiments[i].experiments.id == this.selectExperiment){
						Swal.fire({
						  title: 'Already Exist',
						  text: `${$('#experimentBox option:selected').text()} exist in  ${$vm.courseName}`,	
						  confirmButtonText:'Ok',					      					      					      
					      confirmButtonColor:'#00b96b',					      					      
						});
						return false;
					}
				}
				const formData = new FormData();				   	
				formData.append('course_id',this.selectedcourse);
				formData.append('experiment_id',this.selectExperiment);	

				Swal.fire({
					title: 'you are about to add',
					text: `${$('#experimentBox option:selected').text()} to ${$vm.courseName}`,					
					confirmButtonText:'Continue',					      
				      cancelButtonText:'Cancel',				      				      
				      cancelButtonColor:'#dd000f',					      
				      confirmButtonColor:'#00b96b',					      
				      showCancelButton:true,	
					showLoaderOnConfirm: true,
					preConfirm: (login) => {			
						return $vm.axios.post($vm.baseApiUrl+'courses/add_experiment',formData,{headers:$vm.axiosHeaderWithFiles})
				      	.then(response => {						      	
					        if (!response.data.sucess) {
					          throw new Error(response.statusText)
					        }						   
					        return true;
				      	})
				      	.catch(error => {
					      	if (error.response) {
						      	if (error.response.status == 409) {									       					      	
						      	}else if(error.response.status == 401){
						      		location.reload();
						      	}else{
						      		Swal.showValidationMessage(
							          `Failed: Something went wrong`
							        )						      		
						      	}
					      	}
				      	})
					}
				}).then((result)=>{
					if (result.isConfirmed) {
						Swal.fire({
							title: 'Added',
							icon:'success',
							confirmButtonText:'ok',					      				      	
					      	cancelButtonColor:'#dd000f',					      
					      	confirmButtonColor:'#00b96b',					      				      					      	
						}).then((result)=>{
							location.reload();
						})			
					}

				})
				

			}


		},
		async created(){
			this.experiments  = await this.axiosGet('api/experiments/experiments');
			this.courses  = await this.axiosGet('api/courses/courses'); //this endpoint is not returning foriegn data		
			this.selectedcourse = location.hash.substring(1);;			
			this.FetchCourseResources();
				
		},
		mounted(){
			var $this = this;
			this.$nextTick(function(){


			})
		}
	}
</script>

<style scoped="">
	.cover-template{
		position: relative;		
	}
		.closeMsg{			
		font-size: 0.9em;
		color: #b56;		
	}
	.resource{
		position: relative;
		height: 60px;
	}
	.resource-caption{
	  position: absolute;
	  bottom: 100%;
	  left: 0;
	  right: 0;
	  background-color: rgba(0,0,50,.6);
	  overflow: hidden;
	  width: 100%;
	  height:0;
	  transition: .5s ease;
	  z-index: 100;
	}
	
.overlaytext {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
}
	.resource:hover .resource-caption{
		 bottom: 0;
  		height: 100%;
	}
	.button:focus{
		box-shadow: none !important;
	}
</style>