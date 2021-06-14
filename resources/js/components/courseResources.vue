<template>
	<div class="cover-template pl-5 pr-3">
		<br><br>		
		<div class="w-100 row px-2 py-3 border" style="border-left: 3px solid #00b96b !important; border-right:3px solid #00b96b!important; ">
			<div class="col-lg-4 col-md-3 col-sm-6 col-xs-8">
				<div class="w-100">Select Course</div>
				<select class="form-control w-100" v-model="selectedcourse">	
					<option></option>				
					<option v-for="course in courses" :value="course.id">{{course.code}}</option>
				</select>								
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 position-relative">				
				<button class="button bg-light text-center text-dark w-75 py-2 mt-2" @click="FetchCourseResources" style="position: absolute;bottom: 0; left: 0;">Select</button>
			</div>
			<div class="col-lg-4 col-md-3 col-sm-6 col-xs-8">				
				<div class="w-100">Select File</div>
				<input type="file" class="w-100" id="file" name="files[]">
			</div>
			<div class="col-lg-2 col-md-3 col-sm-4 col-xs-4 position-relative">								
				<button class="button bg-light text-center text-dark w-75 py-2" style="position: absolute;left:0;bottom: 0;" @click="uploadFile">upload</button>
			</div>
		</div>
			<br><br>
			<p class="text-white badge badge-dark">Uploaded Files</p>
			<div class="row w-100 p-5" v-if="!toload">				
				<div v-for="resource in resources" class="col-lg-4 col-md-3 col-sm-6 col-sm-12 resource">
					
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='image'" >
						<center>
							<img :src="'/'+resource.resourceUrl" width="80%" height="150px">						
						</center>
					</div>
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='doc'" >
						<center>
							<img src="/images/docx.png" width="80%" height="150px">						
						</center>
					</div>
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='vid'" >
						<center>
							<img src="/images/vid.jpg" width="80%" height="150px">						
						</center>
					</div>
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='other'" >
						<center>
							<img src="/images/file.png" width="80%" height="150px">						
						</center>
					</div>

					<div class="resource-caption text-center py-2 font fw5 w-100">
						<div class="overlaytext">
							{{resource.caption}}							
							<br>
							<a class="bg-warning text-white button btn-sm" :href="resource.resourceUrl">Download</a>
							<button class="bg-warning text-white button btn-sm" @click="deleteResource(resource.id)">delete</button>
						</div>		
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
				selectedcourse:'',
				resources:[],
				thiscourse:[],
				toload:true,
				file: '',
			}
		},
		methods:{
			FetchCourseResources: function(){				
				this.toload = true;
				location.hash = this.selectedcourse;
				this.thiscourse = this.courses.filter((item)=>{ return item.id===this.selectedcourse});				
				this.resources = this.thiscourse[0].course_resources;
				this.toload = false;
				
			},
			resoursType(url){
				let urltype = url.split('.')[url.split('.').length -1];
				
				let image = ['jpg', 'png','gif', 'jpeg'];
				let doc = ['doc', 'docx','pdf'];
				let vid = ['mp4', 'mpeg','3gp'];
				if (image.includes(urltype)){
					return 'image';
				}else if(doc.includes(urltype)){
					return 'doc'
				}else if(vid.includes(urltype)){
					return 'video'
				}else {
					return 'other'
				}
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
						this.axiosDelete('api/courses/delete_resources',{'course_resourses_id': id})					

					}
				})
			},
			uploadFile:function(){
				var $vm = this;
				this.file = $('#file').prop('files')[0];
				if (this.file == '' || this.file == undefined) {
					Swal.fire('select file to upload');
					return false;
				}
				const formData = new FormData();				   	
				formData.append('course_id',this.selectedcourse);
				formData.append('file',this.file);	

				Swal.fire({
					title: 'enter caption',
					html: `<input type='text' class='form-control w-100' id='captionx'>`,
					confirmButtonText:'Continue',					      
				      cancelButtonText:'Cancel',				      				      
				      cancelButtonColor:'#dd000f',					      
				      confirmButtonColor:'#00b96b',					      
				      showCancelButton:true,	
					showLoaderOnConfirm: true,
					preConfirm: (login) => {			
						let caption = $('#captionx').val();
						if (caption ==''){
							Swal.showValidationMessage(
					          `Failed: Please enter caption`
					        )	
						}else{
							formData.append('caption',caption);

							return $vm.axios.post($vm.baseApiUrl+'courses/upload_resources',formData,{headers:$vm.axiosHeaderWithFiles})
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
					}
				}).then((result)=>{
					if (result.isConfirmed) {
						Swal.fire({
							title: 'uploaded',
							icon:'sucess',
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
		bottom: 0 !important;
  		height: 100% !important;
	}
	.button:focus{
		box-shadow: none !important;
	}
</style>