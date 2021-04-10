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
				departments:null,
				watchfacultyHtml:{value:null},
				uploadlist:[],
				listTrHtml:""
			}
		},
		methods: {
		  ProcessExcel:function(data) {
		        //Read the Excel File data.

		        var workbook = XLSX.read(data, {
		            type: 'binary'
		        }),
		        dataARR =[];
		 
		        //Fetch the name of First Sheet.
		        var firstSheet = workbook.SheetNames[0];
		 
		        //Read all rows from First Sheet into an JSON array.
		        var excelRows = XLSX.utils.sheet_to_row_object_array(workbook.Sheets[firstSheet]);
		      	//column 1 == matric number else skipped
		      	//column 2 == first name // important
		      	//column 3 == other name // important
		      	//column 4 == email // important
		      	//column 6 == gender ///important 
		      	//column 5 == phonenumber 

		 		for(i in excelRows){
		 			dataARR[i] = [];
		 			c =-1;
		 			if (i == 0) {
		 				/*if (excelRows[i][0].toLowerCase() != "matric number" || excelRows[i][1].toLowerCase() != "first name" || excelRows[i][3].toLowerCase() != "last name" || excelRows[i][4].toLowerCase() != "email" || excelRows[i][4].toLowerCase() != "gender" || excelRows[i][3].toLowerCase() != "phone number") {}*/
		 			}else{
		 				dataARR[i]={
			 				matric_number: excelRows[i][0],	 			
			 				first_name:    excelRows[i][1],	 			
			 				other_names:   excelRows[i][2],	 			
			 				email:         excelRows[i][3],	 			
			 				gender:         excelRows[i][4],	 					 					
			 				phone:         excelRows[i][4],	 					 					
		 				}
		 				if (dataARR[i].matric_number == "") {
		 					return {sucess:false, message:'matric number is required on row'+ i} // matric number is required 
		 				}
		 				if (dataARR[i].first_name == "") {
		 					return {sucess:false, message:'first name is required on row'+ i} // matric number is required 
		 				}
		 				if (dataARR[i].other_names == "") {
		 					return {sucess:false, message:'other name is required on row'+ i} // matric number is required 
		 				}
		 				if (dataARR[i].email == "") {
		 					return {sucess:false, message:'first name is required on row'+ i} // matric number is required 
		 				}

		 			}		 			
		 		}

		 		return {sucess:true,message:dataARR};
		 	},
			createuser:function(){
				this.VueSweetAlert2('v-userform', {
					type:'user',
					faculties: this.faculties,
					departments: this.departments
				});
			},
			swal_form: function(obj){	
				
				let $vm = this, html='';					    
				//this.axiosGetFacultyHtml(false,obj.faculty_id); // fetch faculties and set selected base on update parameter if ture
				

					//this.axiosGetFacultyHtml(update,obj.faculty_id);					
					html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+		
					  	"<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Department</legend>"+
					  	$vm.departmentsHTML+									  	
					  	"<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Role</legend>"+
					  	"<select class='swal2-input' id='role_id'>"+
					  	"<option value='admin'>admin</option>"+				
					  	"<option value='instructor'>instructor</option>"+
					  	"<option value='student'>student</option>"+									  	
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Select csv file</legend>"+					     
					    '<input id="swal-file1" type="file" class="mt-1 mx-auto"  >' ;	

					
					$('#system-loader').hide();						
					Swal.fire({
					  title: "Upload bulk user",
					  html:html,
					  focusConfirm: false,
					  preConfirm: () => {
					  	let faculty = document.getElementById('faculty_id').value,
					  		department = document.getElementById('department_id').value,
					  	 	//Validate whether File is valid Excel file.
        					 fileUpload = document.getElementById("swal-file1"),
        					 regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx|.csv)$/;
        					  if (regex.test(fileUpload.value.toLowerCase())) {
					          	if (typeof (FileReader) != "undefined") {
					                var reader = new FileReader();
					 
					                //For Browsers other than IE.
					                if (reader.readAsBinaryString) {
					                    reader.onload = function (e) {
					                       $vm.uploadlist = ProcessExcel(e.target.result);
					                    };
					                    reader.readAsBinaryString(fileUpload.files[0]);
					                } else {
					                    //For IE Browser.
					                    reader.onload = function (e) {
					                        var data = "";
					                        var bytes = new Uint8Array(e.target.result);
					                        for (var i = 0; i < bytes.byteLength; i++) {
					                            data += String.fromCharCode(bytes[i]);
					                        }
					                      $vm.uploadlist =  ProcessExcel(data);

					                    };
					                    reader.readAsArrayBuffer(fileUpload.files[0]);
					                }
					                if (!$vm.uploadlist.sucess){
					                	Swal.showValidationMessage($vm.uploadlist.message);
					                }
					            } else {
					                Swal.showValidationMessage("This browser does not support HTML5.");
					            }
					        } else {
					           Swal.showValidationMessage('Error: please select a valid file (.xls,. xlsx or .csv file)');
					        }

					  	if ( faculty == "" || department == "") {					     
					         Swal.showValidationMessage('All fields are required');
					  	}
					  	for (var i = 0; i < $vm.uploadlist.message.length; i++) {
					  		$vm.listTrHtml += "<tr>";
					  		$vm.listTrHtml += "<td>"+$vm.uploadlist.message[i].matric_number+"</td>"
					  		$vm.listTrHtml += "<td>"+$vm.uploadlist.message[i].first_name+"</td>"
					  		$vm.listTrHtml += "<td>"+$vm.uploadlist.message[i].other_names+"</td>"
					  		$vm.listTrHtml += "<td>"+$vm.uploadlist.message[i].email+"</td>"
					  		$vm.listTrHtml += "<td>"+$vm.uploadlist.message[i].gender+"</td>"
					  		$vm.listTrHtml += "<td>"+$vm.uploadlist.message[i].phone+"</td>"
					  		$vm.listTrHtml += "</tr>";
					     }
					    return [
					      faculty,
					      department,
					      $vm.uploadlist.message
					      
					    ]
					  } 
					}).then((result)=>{
						if (result.value) {
					    const answers = {faculty_id:result.value[0], user_name:result.value[1], user_code:result.value[2]}
					    Swal.fire({
					      title: 'click on proceed',
					      text: 'other cancel and restart',
					      html: "<table class='table text-left'>"+
					      		"<tr><td>Matric Number</td><td>First Name</td><td>Last Name</td><td>email</td><td>gender</td><td>phone</td></tr>"+$vm.listTrHtml+"</table>",
					      confirmButtonText:'Process',					      
					      cancelButtonText:'Cancle',					      
					      showCancelButton:true,					      
					      showLoaderOnConfirm: true,
					       preConfirm: (login) => {			
					        
					        	let formData = {user_id:obj.user_id};
					        	return $vm.axios.post('api/users/import_students',{bulk_users:$vm.uploadlist.message, department_id:result.value[1],faculty_id:result.value[0], role_id:result.value[2]},{headers:$vm.axiosHeader})
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
				
					
				//let $vm = this;	
				
			

			},
			edituser:function(obj){
				this.VueSweetAlert2('v-userform', {
					type:'user',
					update:true,
					faculties: this.faculties,
					departments: this.departments,
					alldata: {
						first_name :"s2o3disdho",
						other_names :"s2o3disdho",
						matric_number :"s2o3disdho",
						email :"s2o3disdho",
						phone :"08023",
						gender :"s2o3disdho",
						faculty_id :72,
						department_id :1,
						role_id :1,
						title :"s2o3disdho",
						id :"s2o3disdho",
					}
				});				
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
				html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+				
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>user Name</legend>"+					  		   
					    '<input id="swal-input1" class="swal2-input mt-1" value="'+obj.name+'" >' +
					  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>user Abbr</legend>"+					  		   				    
					    '<input id="swal-input2" class="swal2-input mt-1" value="'+obj.code+'">';	
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
			this.faculties =  await this.axiosGet('api/faculties/faculties');						
			this.departments	 = await  this.axiosGet('api/departments/departments');					
			this.createduser  = await this.axiosGet('api/users/users');
			

			this.facultiesHTML = this.selectHtmlGen(this.faculties,'code','faculty_id' )							
			this.departmentsHTML = this.selectHtmlGen(this.departments,'code','department_id' )							

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