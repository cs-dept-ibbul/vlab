<template>	
		<div class="w-100 mt-2 py-3">
          <a href="#" @click="createuser" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create user <span class="text-white fa fa-chevron-down"></span></a>
          <a href="#" @click="uploadstudent" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Upload Student <span class="text-white fa fa-chevron-down"></span></a>
          <br>
     
          <div class="notification-table ">
				<table id="usertable" class="table table-hover" @click="edituser">
					<thead>
						<tr id="cheadV">							
							<th width="30%">user name</th>
				            <th width="20%">user abbr.</th>	            
							<th width="20%">Faculty</th>
				            <th width="15%">date created</th>			            
				            <th width="15%">Action</th>
						</tr>
					</thead>
					<tbody v-if="tableLoaded">
				        <tr v-for="(user, index) in createduser" :key="index">	         
				            <td width="30%" :title="user.title">{{user.name}}</td>
				            <td width="20%">{{user.code}}</td>	           
				            <td width="20%">{{user.faculty_code}}</td>	           
				            <td width="15%">{{user.updated_at}}</td>	            			            	           
				            <td width="15%" >
				            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="edituser(createduser[index])" style="border-left: 1px solid #ccc;"></span>
				            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deleteuser(user.id)"></span>
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
				createduser:null,
				tableLoaded:false,
				facultiesHTML: null,
				faculties: null,
				watchfacultyHtml:{value:null}
			}
		},
		methods: {
			
			createuser:function(){
				this.VueSweetAlert2('v-userform', {type:'user'});
			},
			swal_form: function(update = false, obj={faculty_id:1, user_id:2, name:'computer science', code: 'csc'}){	
				$('#system-loader').css('display','flex');
				let formcount = 0;
				let $vm = this, html='';
				let topic = "Create user";
				if(update){
				    topic = "Update user";
					this.axiosGetFacultyHtml(update,obj.faculty_id); // fetch faculties and set selected base on update parameter if ture
				}else{
					this.axiosGetFacultyHtml(update); // fetch faculties
				}
				watch(this.watchfacultyHtml, 'value', function(){
					if(update){

					//this.axiosGetFacultyHtml(update,obj.faculty_id);					
					html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+				
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>user Name</legend>"+					  		   
					    '<input id="swal-input1" class="swal2-input mt-1" value="'+obj.name+'" >' +
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>user Abbr</legend>"+					  		   				    
					    '<input id="swal-input2" class="swal2-input mt-1" value="'+obj.code+'">';
					}else{
						html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+				
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>user Name</legend>"+					  		   
					    '<input id="swal-input1" class="swal2-input mt-1" >' +
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>user Abbr</legend>"+					  		   				    
					    '<input id="swal-input2" class="swal2-input mt-1">';	
					}										
					$('#system-loader').hide();						
					Swal.fire({
					  title: topic,
					  html:html,
					  focusConfirm: false,
					  preConfirm: () => {
					  	let faculty = document.getElementById('swal-input0').value,
					  	 facultyName , userName = document.getElementById('swal-input1').value,
					      userAbbr = document.getElementById('swal-input2').value;
					      facultyName = document.getElementById('swal-input0').options;
					  	  facultyName = facultyName[facultyName.selectedIndex].text
					  	if ( faculty == "" || userName == "" || userAbbr == "") {					     
					         Swal.showValidationMessage('All fields are required');
					  	}
					    return [
					      faculty,
					      userName,
					      userAbbr,
					      facultyName,
					    ]
					  } 
					}).then((result)=>{
						if (result.value) {
					    const answers = {faculty_id:result.value[0], user_name:result.value[1], user_code:result.value[2]}
					    Swal.fire({
					      title: 'click on proceed',
					      text: 'other cancel and restart',
					      html: `<table class='table text-left'>
						      		<tr>
						      			<td width='30%'><b>Faculty :</b></td>
						      			<td width='70%'>${result.value[3]}</td>
						      		</tr>
						      		<tr>
						      			<td width='30%'><b>user:</b></td>
						      			<td width='70%'> ${answers.user_name},</td>
						      		</tr>
						      		<tr>
						      		 	<td width='30%'><b>Abbr:</b></td>
						      		 	<td width='70%'> ${answers.user_code} </td>
						      		 <tr>
					      		</table>`,
					      confirmButtonText:'Process',					      
					      cancelButtonText:'Cancle',					      
					      showCancelButton:true,					      
					      showLoaderOnConfirm: true,
					       preConfirm: (login) => {			
					        if (update){
					        	let formData = {user_id:obj.user_id};
					        	return $vm.axios.post('api/users/upadte',formData,{headers:$vm.axiosHeader})
						      	.then(response => {						      	
							        if (!response.data.sucess) {
							          throw new Error(response.statusText)
							        }						   
							        return response.json()
						      	})
						      	.catch(error => {
							      	if (error.response) {
								      	if (error.response.status == 409) {
									        Swal.showValidationMessage(
									          `Failed: user Already Exist`
									        )						      		
								      	}else if(error.response.status == 401){
								      		location.reload();
								      	}else{
								      		Swal.showValidationMessage(
									          `Failed: Something went wrong`
									        )						      		
								      	}
							      	}
						      	})
					        }else{
					        	return $vm.axios.post('api/users/create',$vm.createFormData(answers),{headers:$vm.axiosHeader})
						      	.then(response => {						      	
							        if (!response.data.sucess) {
							          throw new Error(response.statusText)
							        }						   
							        return response.json()
						      	})
						      	.catch(error => {
							      	if (error.response) {
								      	if (error.response.status == 409) {
									        Swal.showValidationMessage(
									          `Failed: user Already Exist`
									        )						      		
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
						    	
						  },
						  allowOutsideClick: () => !Swal.isLoading()
					    }).then((result) => {
					    	let title = 'created successfully';
					    	if (update) {
					    		title = 'updated successfully'
					    	}
					    	if (result.isConfirmed) {
							    Swal.fire({							    
							      title: title,							      
							      icon: 'success',
							      confirmButtonText:'Ok',	
							    }).then((result)=>{
							    	location.reload();
							    })
							  }
					    })
					  }
					})
				
					formcount++;
				});		
				//let $vm = this;	
				
			

			},
			edituser:function(obj){
				this.swal_form(true);
			},
			deleteuser: function(id){
				Swal.fire('delete');					
			},
			singleValidate: function(id){
			$('#'+id).css('border','1px solid #e45');
			$('.requiredv').remove();
			$('#'+id).after('<span class="text-danger requiredv">Required !</span>')
			},
			uploadstudent: function(){					
				this.swal_form(false, null);			
			},
			async axiosGetFacultyHtml(update, faculty_id){
				//method 1 
				//it relies on only the first faculties fetched
				//require page reload in other to get faculty update
				//it increase speed
				if (this.faculties === null) {
					this.faculties =  await this.axiosGet('api/faculties/faculties');						
				}

				//method 2 
				//does not require page reload 
				//ajax request is made every time
				//it might slow down operation
				/*this.faculties =  await this.axiosGet('api/faculties/faculties');*/

				this.facultiesHTML = "<select id='swal-input0' class='swal2-input mt-1'>"
				this.faculties.forEach((item, idex)=>{
					if (update) {						
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
				this.watchfacultyHtml.value = Math.random(1,1000);
				//console.log(this.watchfacultyHtml.value)
			 	
			}
		},
		async created(){
			   this.createduser  = await this.axiosGet('api/users/users');
			    //console.log(this.createduser)
			    this.tableLoaded = true;
			    
			    /*initialize datatable */
	             setTimeout(function() {
	             	 $('#usertable').DataTable({
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