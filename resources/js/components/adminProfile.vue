<template>
  <div>
   <!-- <h1 class="my-5 text-center explore__header">Explore Available V-lab Courses</h1> -->
        <div class="w-100 bg-white px-6 profile-menu" style="box-shadow: 1px 6px 5px rgba(100,100,100,.1);position: relative;z-index: 2;">
        <div class="font2 fw4  systab systab--active" rel="info" @click="systab" title="System Info">
         	<span class="removeClick"> Sys Info </span>
         	<i class="fa fa-desktop removeClick" ></i>
     	</div>
        <div class="font2 fw4  systab" rel="uinfo" @click="systab" title="User Info">
        	<span class="removeClick">User Info</span>
         	<i class="fa fa-user removeClick"></i>
        </div>
        <div class="font2 fw4 systab" rel="email" @click="systab" title="Change Email">
        	<span class="removeClick">Change Email</span>
         	<i class="fa fa-envelope removeClick" ></i>        	
    	</div>
        <div class="font2 fw4 systab" rel="password" @click="systab" title="Reset Password">
        	<span class="removeClick">Reset Password</span>
         	<i class="fa fa-lock removeClick" ></i>        	

        </div>

        </div>

        <div id="info" class="majorD">
        	<div class="px-5">
        		<br><br>
        		<div class="form-body p-3 bg-white row">
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">School Name: </div>
        				<input type="text" name="school" v-model="schoolname"  class="form-control w-100 vI">        			
        			</div>
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">School Abbr: </div>
        				<input type="text" name="school" v-model="schoolabbr" class="form-control w-100 vI">        			
        			</div>
        		<!-- 	<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">School Description: </div>
        				<input type="text" name="school" v-model="schooldescription" class="form-control w-100">        			
        			</div> -->
        			<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        				<br>
        				<center>
        					<button class="btn button bg-success px-3 py-2 text-white" @click="changeinfo">Save</button>        				
        				</center>
        			</div>
        		</div>
        	</div>
        </div>
        <div id="uinfo" class="p-display-none majorD">
        	<div class="px-5">
        		<br><br>
        		<div class="form-body p-3 bg-white row">
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Title: </div>
        				<input type="text" name="school" v-model="title" disabled="" class="form-control w-100">        		
        			</div>
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">First Name: </div>
        				<input type="text" name="school" v-model="first_name" class="form-control w-100">        			
        			</div>
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Last Name: </div>
        				<input type="text" name="school" v-model="other_name" class="form-control w-100 vI">        			
        			</div>
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Faculty: </div>
        				<input type="text" name="school" v-model="faculty" disabled="" class="form-control w-100">        			
        			</div>
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Department: </div>
        				<input type="text" name="school" v-model="department" disabled="" class="form-control w-100">        			
        			</div>
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Phone: </div>
        				<input type="text" name="school" v-model="phone" class="form-control w-100 vI">        			
        			</div><!-- 
        			<div class="col-lg-6 col-md-6 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Gender: </div>
        				<input type="text" name="school" v-model="gender" class="form-control w-100 vI">        			
        			</div> -->
        			<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        				<br>
        				<center>
        					<button class="btn button bg-success px-3 py-2 text-white" @click="changeuinfo">Save</button>        				
        				</center>
        			</div>
        		</div>
        	</div>
        </div>
        <div id="email" class="majorD p-display-none">
        	<div class="px-5">
        		<br><br>
        		<div class="form-body p-3 bg-white row">
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">Email: </div>
        				<input type="text" name="email" v-model="email" disabled="" class="form-control w-100">        
        			</div>
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2">
        				<div class="white-space mr-3">New Email: </div>
        				<input type="text" name="nemail" v-model="nemail" class="form-control w-100 vI">        
        			</div>        			        		
        			<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        				<br>
        				<center>
        					<button class="btn button bg-success px-3 py-2 text-white" @click="changeemail">Save</button>        				
        				</center>
        			</div>
        		</div>
        	</div>
        </div>
        <div id="password" class="majorD p-display-none">
        	<div class="px-5">
        		<br><br>
        		<div class="form-body p-3 bg-white row">
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2 position-relative">
        				<div class="white-space mr-3">Old Password: </div>
        				<input type="password" name="password" v-model="oldpassword"  class="form-control w-100">        
        				<span  style="user-select: none;cursor: pointer;position:absolute; top: 40%;right: 3%;" class=" togglePwDisplay p-text-dark">show</span>
        			</div>
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2 position-relative">        				
        				<div class="white-space mr-3">New Password: </div>
        				<input type="password" name="nemail" v-model="newpassword" v-on:keyup="checkpassword2" id="pp" class="form-control w-100">        
        				<span  style="user-select: none;cursor: pointer;position:absolute; top: 40%;right: 3%;" class=" togglePwDisplay p-text-dark">show</span>
        			</div>        			        		
        			<div class="col-lg-12 col-md-12 col-sm-12 d-flex flex-wrap mt-2 position-relative">
        				<div class="white-space mr-3">Confirm Password: </div>
        				<input type="password" name="nemail" v-model="cpassword"  v-on:keyup="checkpassword" id="cp" class="form-control w-100">        
        				<span  style="user-select: none;cursor: pointer;position:absolute; top: 40%;right: 3%;" class=" togglePwDisplay p-text-dark">show</span>
        			</div>        			        		
        			<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
        				<br>
        				<center>
        					<button v-if="matched" class="btn button bg-success px-3 py-2 text-white" @click="changepassword">Save</button>        				
        				</center>
        			</div>
        		</div>
        	</div>
        </div>

  </div>
</template>

<script>
export default {
    name: "Button",
    data(){
    	return{
    		matched:false,
    		schoolname:"",
    		schoolabbr:"",
    		schooldescription:"",
    		title:"",
			first_name:"",
			other_name:"",
			faculty:"",
			department:"",
			phone:"",
			gender:"",
			email:"",
			nemail:"",
			oldpassword:"",
			newpassword:"",
			cpassword:"",
    	}
    },
    mounted(){
        let $vm = this;
        this.$nextTick(function(){

    		$('.togglePwDisplay').click(function(){
                    var contX = $(this).text();
                    if (contX==='show') {
                        $(this).prev().attr('type','text');
                        $(this).text('hide')
                    }else if(contX === 'hide'){
                        $(this).prev().attr('type','password');                        
                        $(this).text('show');                        
                    }
                });

        })
    },
    methods:{
    	togglePassword(e){
    	},

    	validatem: function(id){
				let $vm = this,check= true;
				$('.requiredv').remove();		

				$('#'+id).find('.vI').each(function(e){
					if($(this).val()==""){
						$(this).css('border','1px solid #e45');
						$(this).after('<span class="text-danger requiredv">Required !</span>');					
						check = false;						
					}
				})			
				if (check) {
					return true;					
				}else{
					return false;
				}
		},
		checkpassword(){
			this.$nextTick(() => {			
				$('.requiredv').remove();
				if (this.newpassword != this.cpassword){
					this.matched = false;
					$('#cp').after('<span class="text-danger requiredv">Mismatched Password !</span>');					
				}else{
					$('#cp').after('<span class="text-success requiredv">Password Matched !</span>');		
					if (this.newpassword.length < 8) {
						this.matched =false;			
						$('#pp').after('<span class="text-danger requiredv">password must not be less than 8!</span>');		
					}else{
						this.matched =true;									
					}
				}
			})
		},
		checkpassword2(){
			$('.requiredv').remove();		
			if (this.newpassword.length < 8) {				
				this.matched =false;			
				$('#pp').after('<span class="text-danger requiredv">password must not be less than 8!</span>');		
			}else{
				if (this.cpassword != '') {
					if (this.newpassword != this.cpassword){
						this.matched = false;
						$('#pp').after('<span class="text-danger requiredv">Mismatched Password !</span>');					
					}else{
						$('#pp').after('<span class="text-success requiredv">Password Matched !</span>');		
						$('#cp').after('<span class="text-success requiredv">Password Matched !</span>');		
						this.matched =true;														

					}
				}else{
					this.matched =false;														
				}
			}
		},
    	systab:function(e){
    		var tab = $(e.target);
    		$('.systab').removeClass('systab--active');
    		tab.addClass('systab--active');
    		$('.majorD').hide();    		
    		$('#'+tab.attr('rel')).show()
    	},
    	changeinfo:function(){
    		var $this = this;
    		if(this.validatem('info') == false){    			
    			return false;
    		}    		
		 	this.show_loader();                                        
          	var formData = {schoolname:this.schoolname, schoolabbr:this.schoolabbr,schooldescription:this.schooldescription}                                    
            this.axios.post(this.baseApiUrl+'users/change_school_info/',this.createFormData(formData),{headers:this.axiosHeader})
                .then(function(response, status, request) {                                          
                      $this.hide_loader();                      
                      if(response.status== 200){
                           Swal.fire({
                             title: 'changed Successfully',                              
                             icon:'success',                                     
                             showCancelButton: true,
                             confirmButtonText: `Ok`,                                          
                             cancelButtonColor: `red`,        
                             cancelButtonColor:'#dd000f',					      
					      	 confirmButtonColor:'#00b96b',	                                  
                           })
                           /*.then((result) => {                                        
                               location.reload();                                          
                           })*/
                      }else if(response.status == 401){
                           Swal.fire({
                             title: 'something went wrong',                                       
                             icon:'error',                                                                 
                             confirmButtonText: `Ok`,                                                                         
					      	confirmButtonColor:'#00b96b',	
                           }).then((result) => {                                         
                             if (result.isConfirmed) {
                               $this.frontendLogout();
                             } else if (result.isDenied) {                                           
                             }
                           })
                      }else if (e.response.status == 400) {                                   
                            Swal.fire({
                             title: 'all field is required',  
                             confirmButtonColor:'#00b96b',	                                     
                             icon:'warning',                                     
                             confirmButtonText: `Ok`,                                         
                           })
                      }                             
                   }, function(e) {                                       
                           $this.hide_loader();
                           let errMsg = 'errro';                                 
                          if (e.response.status == 409) {                                   
                           errMsg = e.response.data.error;
                          }                             
                   });		
    	},
   		changepassword:function(){
			//			
			var $this = this;
    		if(this.validatem('password') == false){    			
    			return false;
    		}    
		 	this.show_loader();                                            		
          	var formData = {password:this.newpassword,oldpassword:this.oldpassword,  user_id:this.currentUser.id}       
          	   this.axios.post(this.baseApiUrl+'users/change_password/',this.createFormData(formData),{headers:this.axiosHeader})
                .then(function(response, status, request) {                                          
                      $this.hide_loader();                      
                      if(response.status== 200){
                           Swal.fire({
                             title: 'changed Successfully',                              
                             icon:'success',                                     
                             showCancelButton: true,
                             confirmButtonText: `Ok`,                                          
                             cancelButtonColor: `red`,        
                             cancelButtonColor:'#dd000f',					      
					      	 confirmButtonColor:'#00b96b',	                                  
                           })
                           /*.then((result) => {                                        
                               location.reload();                                          
                           })*/
                      }else if(response.status == 401){
                           Swal.fire({
                             title: 'something went wrong',                                       
                             icon:'error',                                                                 
                             confirmButtonText: `Ok`,                                                                         
					      	confirmButtonColor:'#00b96b',	
                           }).then((result) => {                                         
                             if (result.isConfirmed) {
                               $this.frontendLogout();
                             } else if (result.isDenied) {                                           
                             }
                           })
                      }else if (e.response.status == 404) {                                   
                            Swal.fire({
                             title: 'Incorrect Old Password',  
                             confirmButtonColor:'#00b96b',	                                     
                             icon:'warning',                                     
                             confirmButtonText: `Ok`,                                         
                           })
                      }                             
                   }, function(e) {                                       
                           $this.hide_loader();
                           let errMsg = 'errro';                                 
                          if (e.response.status == 409) {                                   
                           errMsg = e.response.data.error;
                          }   
                          if (e.response.status == 404) {                                   
                            Swal.fire({
                             title: 'Incorrect Old Password',  
                             confirmButtonColor:'#00b96b',	                                     
                             icon:'warning',                                     
                             confirmButtonText: `Ok`,                                         
                           })
                          }                             
                   });		
    	                             


    	},
    	changeemail:function(){
    		var $this = this;
    		if(this.validatem('email') == false){    			
    			return false;
    		}    
          	var formData = {email:this.nemail, user_id:this.currentUser.id}                                    
		 	this.show_loader();                                                  	
          	   this.axios.post(this.baseApiUrl+'users/changeEmail/',this.createFormData(formData),{headers:this.axiosHeader})
                .then(function(response, status, request) {                                          
                      $this.hide_loader();                      
                      if(response.status== 200){ 
                           Swal.fire({
                             title: 'Changed Successfully',    
                             html:'<code>Note: this action will take effect in the next logged in.<code>',
                             icon:'success',                                     
                             showCancelButton: true,
                             confirmButtonText: `Ok`,                                          
                             cancelButtonColor: `red`,        
                             cancelButtonColor:'#dd000f',					      
					      	 confirmButtonColor:'#00b96b',	                                  
                           })
                           .then((result) => {                                        
                               $this.frontendLogout();
                           })
                      }else if(response.status == 401){
                           Swal.fire({
                             title: 'something went wrong',                                       
                             icon:'error',                                                                 
                             confirmButtonText: `Ok`,                                                                         
					      	confirmButtonColor:'#00b96b',	
                           }).then((result) => {                                         
                             if (result.isConfirmed) {
                               $this.frontendLogout();
                             } else if (result.isDenied) {                                           
                             }
                           })
                      }else if (e.response.status == 409) {                                   
                            Swal.fire({
                             title: 'Email Already Exist',  
                             confirmButtonColor:'#00b96b',	                                     
                             icon:'warning',                                     
                             confirmButtonText: `Ok`,                                         
                           })
                      }                             
                   }, function(e) {                                       
                           $this.hide_loader();
                           let errMsg = 'errro';                                 
                          if (e.response.status == 409) {                                   
                           errMsg = e.response.data.error;
                          }                             
                   });		
    	
    		//
    	},
    	changeuinfo:function(){
    		var $this = this;
    		if(this.validatem('uinfo') == false){    			
    			return false;
    		}    
          	var formData = {first_name:this.first_name, other_names:this.other_name, phone:this.phone,title:this.title,gender:this.gender, user_id:this.currentUser.id}     
		 	this.show_loader();                                        

          	   this.axios.post(this.baseApiUrl+'users/change_user_info/',this.createFormData(formData),{headers:this.axiosHeader})
                .then(function(response, status, request) {                                          
                      $this.hide_loader();                      
                      if(response.status== 200){
                           Swal.fire({
                             title: 'Changed Successfully',                              
                             html:'<code>Note: this action will take effect in the next logged in.<code>',
                             icon:'success',                                     
                             showCancelButton: true,
                             confirmButtonText: `Ok`,                                          
                             cancelButtonColor: `red`,        
                             cancelButtonColor:'#dd000f',					      
					      	 confirmButtonColor:'#00b96b',	                                  
                           })
                           /*.then((result) => {                                        
                               location.reload();                                          
                           })*/
                      }else if(response.status == 401){
                           Swal.fire({
                             title: 'something went wrong',                                       
                             icon:'error',                                                                 
                             confirmButtonText: `Ok`,                                                                         
					      	confirmButtonColor:'#00b96b',	
                           }).then((result) => {                                         
                             if (result.isConfirmed) {
                               $this.frontendLogout();
                             } else if (result.isDenied) {                                           
                             }
                           })
                      }else if (e.response.status == 400) {                                   
                            Swal.fire({
                             title: 'all field is required',  
                             confirmButtonColor:'#00b96b',	                                     
                             icon:'warning',                                     
                             confirmButtonText: `Ok`,                                         
                           })
                      }                             
                   }, function(e) {                                       
                           $this.hide_loader();
                           let errMsg = 'errro';                                 
                          if (e.response.status == 409) {                                   
                           errMsg = e.response.data.error;
                          }                             
                   });		
    
    		//
    	}
    },
    async created(){
		var school = await this.axiosGet('api/schools/school');
		var dep = await this.axiosGetByParams('api/departments/department',{'department_id':this.currentUser.department_id});
		var fac = await this.axiosGetByParams('api/faculties/faculty',{'faculty_id':this.currentUser.faculty_id});		

		this.schoolname = school.name;
		this.schoolabbr = school.code;

		this.first_name = this.currentUser.first_name;
		this.other_name = this.currentUser.other_names;
		this.email = this.currentUser.email;
		this.phone = this.currentUser.phone;
		this.gender = this.currentUser.gender;
		this.department = dep.name;
		this.faculty = fac.name

			
	},
    props:{
    	student:{
    		type:Boolean,
    		default:function(){
    			return  false;
    		}

    	}
    }
}
</script>

<style scoped>
.white-space{
	white-space: nowrap;
}
</style>