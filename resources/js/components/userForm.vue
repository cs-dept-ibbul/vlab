
<template>
	<div class="m-0 p-0">
      <form @submit.prevent="submitForm" id="myform" class="m-0 p-0">
      	<span class="d-none">
      		<input type="text" name="id" :value="id">
      	</span>
		<div class="row py-4 px-4 m-0 r2 bg-white vh-70 scroll-y " >     					    					
			<h3 class="mt-0">Add New User</h3>
		  <!-- user form -->
			<div v-if="type == 'user'" class="m-0">
				<div v-if="watchfacultyHtml.value == true" class="row m-0">				
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Faculty *</p>
							<span v-html="facultiesHTML"></span>		            				
						</div>
					</div>				
				  	<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Title *</p>		            				
							<select type="text" @keyup="normalize" class="form-control vI" name="utitle" id="utitle">
								<option v-for="mtitle in titleCont" :value="mtitle" v-bind:selected="{selected:mtitle==title}"  >{{mtitle}}</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">First Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="first_name" name="first_name" id="first_name">
						</div>
					</div>	 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Last Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="other_names" name="other_names" id="other_names">
						</div>
					</div>	
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Email *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="email" name="email" id="email">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Phone *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="phone" name="phone" id="phone">
						</div>
					</div>	       
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Role*</p>		            				
							<select type="text" @keyup="normalize" class="form-control vI" name="role" id="role">
								<option v-for="mrole in roleCont" :value="mrole" v-bind:selected="{selected:mrole==role}"  >{{mrole}}</option>								            				
							</select>
						</div>
					</div> 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Gender *</p>		            				
							<select type="text" @keyup="normalize" class="form-control vI" name="role" id="role">
								<option v-for="mgender in genderCont" :value="mtitle" v-bind:selected="{selected:mgender==gender}"  >{{mgender}}</option>									            				
							</select>
						</div>
					</div> 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Picture</p>		            				
							<div class="w-100  p-0" style="position: relative;">
								<span class="d-flex w-100 cursor-1">		            						
			    					<span class="form-control fw2 font w-60 r-right-none p-text-secondary no-border-right" id="imageName" >.jpg, .png</span>
			    					<span class="form-control  fw2 font w-40 r-left-none p-text-success">Upload File</span>
								</span>
								<input @change="getDragedInFile"  type="file" style="position: absolute;top: 0; left: 0;" name="files" class="draginto form-control" id="fileI">
							</div>
						</div>
					</div>	      	            	
					<div class="col-12">    				
						<center>
							<button type="submit" class="btn py-2 mb-5 mr-2 mt-3 px-4 text-white fs1 font1 p-success btn-sm" >
								<span v-if="update">Update</span>
								<span v-else>Submit</span>
							</button>			    			
						</center>
					</div>
				</div>
	      	</div>
	      	<!-- student form -->
	      	<div v-if="type == 'student'">
				<div v-if="watchfacultyHtml.value == true" class="row m-0">					      		
		          	<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Matric No *</p>	
							<input type="text" @keyup="normalize" class="form-control" :value="matric_number" name="matric_number" id="matric_number">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">First Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="first_name" name="first_name" id="first_name">
						</div>
					</div>	 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Last Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="other_names" name="other_names" id="other_names">
						</div>
					</div>	
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Email *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="email" name="email" id="email">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Phone *</p>		            				
							<input type="text" @keyup="normalize" class="form-control" :value="phone" name="phone" id="phone">
						</div>
					</div>	     
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Role*</p>		            				
							<select type="text" @keyup="normalize" class="form-control  vI" name="role" id="role">
								<option value="Student">Student</option>		            					
							</select>
						</div>
					</div> 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Gender *</p>		            				
							<select type="text" @keyup="normalize" class="form-control vI" name="role" id="role">
								<option v-for="mgender in genderCont" :value="mtitle" v-bind:selected="{selected:mgender==gender}"  >{{mgender}}</option>									            				
							</select>
						</div>
					</div> 			      	            
					<div class="col-12">    				
						<center>
							<button type="submit" class="btn py-2 mb-5 mr-2 mt-3 px-4 text-white fs1 font1 p-success btn-sm" >
								<span v-if="update">Update</span>
								<span v-else>Submit</span>
							</button>			    			
					</center>
					</div> 
				</div>	
	        </div>
        </div>
      </form>
	</div>
</template>

<script>
	export default{
		data(){
			return{
				titleCont:["Dr.","Engr.","Mr.","Mrs.","Prof."],
				roleCont:["admin", 'instructor', 'student'],
				genderCont:['male', 'female'],
				faculties:null,
				facultiesHTML:null,				
				watchfacultyHtml:{value:false},
				first_name:"",
				other_names:"",
				matric_number:"",
				email:"",
				gender:"",				
				faculty_id:"",
				role_id:"",
				title:"",				
				id:""
			}
		},
		methods:{
			submitForm: function(){	
				if (this.validateI('myform')) {
					$('#system-loader').css('display','flex');	
					if (!update) {						
						this.axios.post('api/users/create',$('#myform').serialize(),{headers:this.axiosHeader})
				      	.then(response => {						      	
					        if (!response.data.sucess) {
					          throw new Error(response.statusText);
					        }						   
					        Swal.fire({
					        	title: 'created succefully',
					        	icon: 'success'
					        }).then((result)=>{
					        	location.reload();
					        })
				      	})
				      	.catch(error => {
					      	if (error.response) {
						      	if (error.response.status == 409) {					      	
							        Swal.fire({
							        	title: 'already exist user',
							        	text: 'email or matric number',
							        	icon: 'warning'
					      			})					      		
						      	}else if(error.response.status == 401){
						      		location.reload();
						      	}else{
						      		Swal.fire({
						        		title: 'something went wrong',
							        	icon: 'error'
							        })		      		
						      	}
					      	}	
					    })					  
					}

					if (update) {						
						this.axios.post('api/users/update',$('#myform').serialize(),{headers:this.axiosHeader})
				      	.then(response => {						      	
					        if (!response.data.sucess) {
					          throw new Error(response.statusText);
					        }						   
					        Swal.fire({
					        	title: 'updated succefully',
					        	icon: 'success'
					        }).then((result)=>{
					        	location.reload();
					        })
				      	})
				      	.catch(error => {
					      	if (error.response) {
						      	if (error.response.status == 409) {					      	
							        Swal.fire({
							        	title: 'already exist user',
							        	text: 'email or matric number',
							        	icon: 'warning'
					      			})					      		
						      	}else if(error.response.status == 401){
						      		location.reload();
						      	}else{
						      		Swal.fire({
						        		title: 'something went wrong',
							        	icon: 'error'
							        })		      		
						      	}
					      	}	
					    })					  
					}
				}			
			}		
		},
		async created(){
				//method 1 
				//it relies on only the first faculties fetched
				//require page reload in other to get faculty update
				//it increase speed
					$('#system-loader').css('display','flex');	

				if (this.faculties === null) {
					this.faculties =  await this.axiosGet('api/faculties/faculties');											
				}

				//method 2 
				//does not require page reload 
				//ajax request is made every time
				//it might slow down operation
				/*this.faculties =  await this.axiosGet('api/faculties/faculties');*/

				this.facultiesHTML = "<select id='deparment_id' class='form-control'>"
				this.faculties.forEach((item, idex)=>{
					if (this.update) {						
						this.facultiesHTML += "<option value='"+item.id+"'";
						if (item.id == faculty_id){
							this.facultiesHTML += "selected=selected";
						}
						this.facultiesHTML += ">"+ item.code +"</option>";
					}else{
						this.facultiesHTML += "<option value='"+item.id+"'>"+ item.code +"</option>";
					}
				});
				this.facultiesHTML += "</select>";	
				//console.log(facultiesHTML);
				//console.log(this.facultiesHTML);
				if (this.update) {
					this.first_name = 	alldata.first_name;
					this.other_names = 	alldata.other_names;
					this.matric_number = 	alldata.matric_number;
					this.email = 	alldata.email;
					this.gender = 	alldata.gender;					
					this.faculty_id = 	alldata.faculty_id;
					this.role_id = 	alldata.role_id;
					this.title = 		alldata.title;
					this.id = 		alldata.id;
				}				
				this.watchfacultyHtml.value = true;
					$('#system-loader').hide();	
				
				//console.log(this.watchfacultyHtml.value)
		 	
		},
		props:{
			type:{
				type:String,
				default:'user'
			},
			update:{
	     		type:Boolean, 
	     		default: function(){
	     			return false;
	     		}
	     	},
	     	alldata:{
	     		type:Array, 
	     		default: function(){
	     			return [];
	     		}
	     	}
		}
	}
</script>