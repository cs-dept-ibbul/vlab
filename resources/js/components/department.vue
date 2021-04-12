<template>	
		<div class="w-100 mt-2 py-3">
          <a href="#" @click="createdepartment" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
          <br>
          <div class="notification-table ">
				<table id="departmenttable" class="table table-hover">
					<thead>
						<tr id="cheadV">
							
						<th width="30%">department name</th>
			            <th width="20%">department abbr.</th>	            
						<th width="20%">Faculty</th>
			            <th width="15%">date created</th>			            
			            <th width="15%">Action</th>
						</tr>
					</thead>
					<tbody v-if="tableLoaded">
			        <tr v-for="(department, index) in createddepartment" :key="index">	         
			            <td width="30%" :title="department.title">{{department.name}}</td>
			            <td width="20%">{{department.code}}</td>	           
			            <td width="20%">{{department.faculty_code}}</td>	           
			            <td width="15%">{{department.updated_at}}</td>	            			            	           
			            <td width="15%" >
			            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="editdepartment(createddepartment[index])" style="border-left: 1px solid #ccc;"></span>
			            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deletedepartment(department.id)"></span>
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
				createddepartment:null,
				tableLoaded:false,
				facultiesHTML: null,
				faculties: null,
				watchfacultyHtml:{value:null}
			}
		},
		methods: {
			swal_form: function(update = false, obj){	
				$('#system-loader').css('display','flex');
				let formcount = 0;
				let $vm = this, html='';
				let topic = "Create Department";
				if(update){
				    topic = "Update Department";
					this.axiosGetFacultyHtml(update,obj.faculty_id); // fetch faculties and set selected base on update parameter if ture
				}else{
					this.axiosGetFacultyHtml(update); // fetch faculties
				}
				watch(this.watchfacultyHtml, 'value', function(){
					if(update){

					//this.axiosGetFacultyHtml(update,obj.faculty_id);					
					html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+				
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Department Name</legend>"+					  		   
					    '<input id="swal-input1" class="swal2-input mt-1" value="'+obj.name+'" >' +
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Department Abbr</legend>"+					  		   				    
					    '<input id="swal-input2" class="swal2-input mt-1" value="'+obj.code+'">';
					}else{
						html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+				
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Department Name</legend>"+					  		   
					    '<input id="swal-input1" class="swal2-input mt-1" >' +
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Department Abbr</legend>"+					  		   				    
					    '<input id="swal-input2" class="swal2-input mt-1">';	
					}										
					$('#system-loader').hide();						
					Swal.fire({
					  title: topic,
					  html:html,
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
						if (result.value) {
					    const answers = {faculty_id:result.value[0], name:result.value[1], code:result.value[2]}
					    Swal.fire({
					      title: 'click on proceed',
					      text: 'other cancel and restart',
					      html: `<table class='table text-left'>
						      		<tr>
						      			<td width='30%'><b>Faculty :</b></td>
						      			<td width='70%'>${result.value[3]}</td>
						      		</tr>
						      		<tr>
						      			<td width='30%'><b>department:</b></td>
						      			<td width='70%'> ${answers.name},</td>
						      		</tr>
						      		<tr>
						      		 	<td width='30%'><b>Abbr:</b></td>
						      		 	<td width='70%'> ${answers.code} </td>
						      		 <tr>
					      		</table>`,
					      confirmButtonText:'Process',					      
					      cancelButtonText:'Cancle',					      
					      showCancelButton:true,					      
					      showLoaderOnConfirm: true,
					       preConfirm: (login) => {			
					        if (update){
					        	let formData = $vm.createFormData({department_id:obj.department_id});
					        	return $vm.axios.post('api/departments/update',formData,{headers:$vm.axiosHeader})
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
									          `Failed: department Already Exist`
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
					        	return $vm.axios.post('api/departments/create',$vm.createFormData(answers),{headers:$vm.axiosHeader})
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
									          `Failed: department Already Exist`
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
			editdepartment:function(obj){
				
				this.swal_form(true,obj);
			},
			deletedepartment: function(depertment_id){				
				this.axiosDelete('api/departments/delete',{'department_id': depertment_id})					
			},
			singleValidate: function(id){
			$('#'+id).css('border','1px solid #e45');
			$('.requiredv').remove();
			$('#'+id).after('<span class="text-danger requiredv">Required !</span>')
			},
			createdepartment: function(){					
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
			   this.createddepartment  = await this.axiosGet('api/departments/departments');
			    //console.log(this.createddepartment)
			    this.tableLoaded = true;
			    
			    /*initialize datatable */
	             setTimeout(function() {
	             	 $('#departmenttable').DataTable({
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