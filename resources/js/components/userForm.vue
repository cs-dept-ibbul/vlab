
<template>
	<div class="m-0 p-0">
      <form @submit.prevent="submitForm" id="myform" class="m-0 p-0">
      	<span class="d-none">
      		<input type="text" name="user_id" :value="id">
      	</span>
		<div class="row py-4 px-4 m-0 r2 bg-white vh-78 scroll-y " >     					    					
			<h5 class="form-header" >{{typex}}</h5>
		  <!-- user form -->
			<div v-if="rolename != 'student'" class="m-0 form-body">
				<div v-if="watchfacultyHtml.value == true" class="row m-0">				
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Faculty *</p>
							<span v-html="facultiesHTML" class="w-100"></span>		            				
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Department *</p>		            				
					  		<select id='department_id' name='department_id' class='form-control w-100 vI'></select>									  	
						</div>
					</div>
				  	<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Title *</p>		            				
							<select type="text" @keyup="normalize" class="form-control w-100" name="utitle" id="utitle">
								<option v-for="mtitle in titleCont" :value="mtitle" v-bind:selected="{selected:mtitle==title}"  >{{mtitle}}</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">First Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100 vI" :value="first_name" name="first_name" id="first_name">
						</div>
					</div>	 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Last Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100 vI" :value="other_names" name="other_names" id="other_names">
						</div>
					</div>	
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Email *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100" :value="email" name="email" id="email">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Phone *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100" :value="phone" name="phone" id="phone">
						</div>
					</div>	       
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Role*</p>		            				
							<select type="text" @keyup="normalize" class="form-control w-100" name="role" id="role">
								<option v-for="(role,index) in JSON.parse(roles)" :selected="role==urole" :value="role">{{index}}</option>		            					
								 							            				
							</select>
						</div>
					</div> 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Gender *</p>		            				
							<select type="text" @keyup="normalize" class="form-control " name="gender" id="gender">
								<option v-for="mgender in genderCont" :value="mgender" v-bind:selected="mgender==gender"  >{{mgender}}</option>									            				
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
								<input @change=""  type="file" style="position: absolute;top: 0; left: 0;" name="files" class="draginto form-control" id="fileI">
							</div>
						</div>
					</div>	      	            	
					<div class="col-12">    				
						<center>
							<button type="submit" @click="submitForm" class="btn py-2 mb-5 mr-2 mt-3 px-4 text-white fs1 font1 p-success btn-sm" >
								<span v-if="update">Update</span>
								<span v-else>Submit</span>
							</button>			    			
						</center>
					</div>
				</div>
	      	</div>
	      	<!-- student form -->
	      	<div v-if="rolename == 'student'" class="form-body">
				<div v-if="watchfacultyHtml.value == true" class="row m-0">			
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Faculty *</p>
							<span v-html="facultiesHTML" class="w-100"></span>		            				
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Department *</p>		            										
					  		<select id='department_id' name='department_id'  class='form-control w-100 vI'></select>									  	

						</div>
					</div>		      		
		          	<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Matric No *</p>	
							<input type="text" @keyup="normalize" class="form-control w-100" :value="matric_number" name="matric_number" id="matric_number">
						</div>
					</div>
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">First Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100 vI" :value="first_name" name="first_name" id="first_name">
						</div>
					</div>	 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Last Name *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100 vI" :value="other_names" name="other_names" id="other_names">
						</div>
					</div>	
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1">	            					
							<p class="fs001 my-1">Email *</p>		            				
							<input type="text" @keyup="normalize" class="form-control w-100" :value="email" name="email" id="email">
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
							<select type="text" @keyup="normalize" class="form-control " name="role" id="role_id">
								<option v-for="(role,index) in JSON.parse(roles)" v-bind:selected="role==urole" :value="role">{{index}}</option>		            					
							</select>
						</div>
					</div> 
					<div class="col-lg-6 col-md-6 m-0">
						<div class="px-1" >	            					
							<p class="fs001 my-1">Gender *</p>		            				
							<select type="text" @keyup="normalize" class="form-control" name="gender" id="gender">
								<option v-for="mgender in genderCont" :value="mgender" v-bind:selected="mgender==gender"  >{{mgender}}</option>									            				
							</select>
						</div>
					</div> 			      	            
					<div class="col-12">    				
						<center>
							<button type="submit" @click="submitForm" class="btn py-2 mb-5 mr-2 mt-3 px-4 text-white fs1 font1 p-success btn-sm" >
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
				facultiesHTML:null,
				departmentHTML:null,
				phone:"",				
				watchfacultyHtml:{value:false},
				first_name:"",
				other_names:"",
				matric_number:"",
				email:"",
				gender:"",
				department_id:"",
				faculty_id:"",
				role_id:"",
				title:"",				
				id:"",
				rolename:'',
				urole:'',
				sent:0,
				typex:'Add New User',
			}
		},
		methods:{
			normalize:function(el){
				el.target.style.border = "1px solid #eee";
				$('.requiredv').remove();
			},
			submitForm: function(){	
				this.validateI('myform');											
				if($('#department_id').val() == ""){
					$('.requiredv').remove();					
					$('#department_id').after('<span class="text-danger requiredv">Required !</span>');	
					return false
				}				
				if($('#faculty_id').val() == ""){
					$('.requiredv').remove();					
					$('#department_id').after('<span class="text-danger requiredv">Required !</span>');	
					return false
				}				
					this.show_loader();
					var formD = $('#myform').serialize().split('&'),ky,kn, $this= this;
					const formData = new FormData(document.getElementById('myform'));				

					/*for (var m in formD) {
					 	ky = formD[m].split('=')[0];
					 	kn = formD[m].split('=')[1];
						formData.append(ky,kn);
					}*/
					if (!this.update) {
						this.sent += 1;	
						if (this.sent == 1) {
						    this.axios.post('api/users/create',formData,{headers:this.axiosHeader})
					      	.then(response => {		

					      		$this.hide_loader();											  
					      		if (response.status==200) {				      			
							        Swal.fire({
							        	title: 'created succefully',
							        	icon: 'success',
							        	confirmButtonText:'Ok',
							      		confirmButtonColor:'#00b96b',	
							        }).then((result)=>{
							        	location.reload();
							        })
					      		}else{
					      			Swal.fire({
						        		title: 'something went wrong',
							        	icon: 'error',
							        	confirmButtonText:'Ok',
					      				confirmButtonColor:'#00b96b',	
							        })		  
					      		}
					      	})
					      	.catch(error => {
					      		$this.hide_loader();
						      	if (error.response) {
							      	if (error.response.status == 409) {					      	
								        Swal.fire({
								        	title: 'already exist user',
								        	text: 'email or matric number',
								        	icon: 'warning',
						        			confirmButtonText:'Ok',
						      				confirmButtonColor:'#00b96b',	

						      			})					      		
							      	}else if(error.response.status == 401){
							      		location.reload();
							      	}else{

							      		Swal.fire({
							        		title: 'something went wrong',
								        	icon: 'error',
								        	confirmButtonText:'Ok',
						      				confirmButtonColor:'#00b96b',	
								        })		      		
							      	}
						      	}	
						    })					  
						}
					}

					if (this.update) {
						this.sent += 1;	

						if (this.sent == 1) {				
						this.axios.post('api/users/update',formData,{headers:this.axiosHeader})
				      	.then(response => {	
				      		$this.hide_loader();					      		
				      		if (response.status ==200) {				      			
						        Swal.fire({
						        	title: 'updated succefully',
						        	icon: 'success',
								    confirmButtonText:'Ok',
					      			confirmButtonColor:'#00b96b',	
						        }).then((result)=>{
						        	location.reload();
						        })
				      		}else{
				      			Swal.fire({
					        		title: 'something went wrong',
						        	icon: 'error',
						        	confirmButtonText:'Ok',
					      			confirmButtonColor:'#00b96b',	
						        })	
				      		}				      						  
				      	})
				      	.catch(error => {
				      		$this.hide_loader();

					      	if (error.response) {
						      	if (error.response.status == 409) {					      	
							        Swal.fire({
							        	title: 'already exist user',
							        	text: 'email or matric number',
							        	icon: 'warning',
							        	confirmButtonText:'Ok',
					      				confirmButtonColor:'#00b96b',	
					      			})					      		
						      	}else if(error.response.status == 401){
						      		location.reload();
						      	}else{
						      		Swal.fire({
						        		title: 'something went wrong',
							        	icon: 'error',
							        	confirmButtonText:'Ok',
					      				confirmButtonColor:'#00b96b',	
							        })		      		
						      	}
					      	}	
					    })					  
						}
					}
				}							
		},
		async created(){
			
			if (this.update) {
					this.typex = "Update User";
					this.first_name = 	this.alldata.first_name;
					this.other_names = 	this.alldata.other_names;
					this.matric_number =this.alldata.matric_number;
					this.email = 		this.alldata.email;
					this.gender = 		this.alldata.gender;
					this.department_id =this.alldata.department_id;
					this.faculty_id=	this.alldata.faculty_id;
					this.role_id = 		this.alldata.role_id;
					this.title = 		this.alldata.title;
					this.id = 			this.alldata.id;
					this.phone = 		this.alldata.phone;
					this.urole = 		this.alldata.role_id;					
					for(var k in JSON.parse(this.roles)){
						if (JSON.parse(this.roles)[k]==this.urole) {
							this.rolename = k;
							break;
						}
					}					
			}					

			
			if (this.update) {						
				this.facultiesHTML = this.selectHtmlGen(this.faculties,'code', 'faculty_id',this.faculty_id, true )				
				this.departmentHTML = this.selectHtmlGen(this.departments,'code', 'department_id',this.department_id, true )				
			}else{
				this.facultiesHTML = this.selectHtmlGen(this.faculties,'code','faculty_id' )				
				this.departmentHTML = this.selectHtmlGen(this.departments,'code','department_id')				
			}
			
			this.watchfacultyHtml.value = true;			
		 	
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
	     		type:Object	     	
	     	},
	     	faculties:{
	     		type:Array,	     	
	     		default:function(){
	     			return [{"empty":"-"}]
	     		}
	     	},
	     	departments:{
	     		type:Array,	     	
	     		default:function(){
	     			return [{"empty":"-"}]
	     		}
	     	},
	     	roles:{
	     		type:String
	     	}
		},
		mounted(){
			
			this.$nextTick(function(){ 
				  var $this = this;					    
			    	$('#faculty_id').change(function(){
			    		
			    		var departmentsX = $this.faculties.filter((item)=>{return item.id === $(this).val()})[0].department;
			    		var opt="";
			    		departmentsX.forEach((item, idex)=>{
							opt += "<option value='"+item.id+"'>"+ item.code +"</option>";
						});	
			    		$('#department_id').html(opt);						
					})
					$(document).ready(function(){
						$('#faculty_id').addClass('vI');
					});
			    	setTimeout(function() {			    		
						if( $('#faculty_id').val()!= ""){

						  	var departmentsX = $this.faculties.filter((item)=>{return item.id === $('#faculty_id').val()})[0].department;
				    		var opt="";
				    		departmentsX.forEach((item, idex)=>{
				    			if(item.id == $this.department_id){
									opt += "<option value='"+item.id+"' selected>"+ item.code +"</option>";
				    			}else{
									opt += "<option value='"+item.id+"' >"+ item.code +"</option>";
				    			}
							});	
				    		$('#department_id').html(opt);						  
						}
			    	}, 500);
			})
		}
	}
</script>

<style scoped="">
	.form-control,select#faculty_id.form-control,#department_id{
		width: 100% !important;
	}

</style>