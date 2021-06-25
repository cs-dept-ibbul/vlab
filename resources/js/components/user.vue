<template>	
		<div class="w-100 mt-2 py-3 position-relative">
          <a v-if="!loaderState"  href="#" @click="createuser" class="btn-admin-user btn py-1 mb-5 mr-2 px-2 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 3px;">Create user <span class="text-white fa fa-chevron-down"></span></a>
          <a v-if="!loaderState" href="#" @click="uploadstudent" class="btn-admin-user btn py-1 mb-5 mr-2 px-2 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 3px;">Upload Student <span class="text-white fa fa-cloud-upload"></span></a>
          <a href="templateFiles/userupload_template.csv" target="_self" class="btn-admin-user btn py-1 mb-5 mr-2 px-2 text-white fs01 font1 bg-dark btn-lg pull-right" style="border-radius: 3px;">Download Template<span class="text-white fa fa-cloud-download"></span></a>
          
          <br>

      	<div class="w-100 user-search-box" style="pointer-events: none;"> 
		    <div class="py-2 d-inline-block"  style="pointer-events: auto;">		        
		        <select id="sessionid" class="form-control d-inline-block"  placeholder="select session">
		        	<option value="">By Session</option>
		        	<option v-for="(session,index) in sessions" :value="session.id">{{session.session}}</option>
		        </select>	        
		        <select id="roleid" class="form-control  d-inline-block" >
		        	<option value="">By Role</option>		        	
		        	<option v-for="(role,index) in JSON.parse(roles)" :value="role">{{index}}</option>
		        </select>
		        <select id="departmentid" class="form-control  d-inline-block"  placeholder="department" >
		        	<option value="">Department</option>		        	
		        	<option v-for="(department,index) in departments" :value="department.id">{{department.code}}</option>
		        </select>
		        <button class="button" @click="fetchUser" >Go</button>
		    </div>

		</div>
		<br>
		<div v-if="loaderState">
			<br><br><br><br><br><br>
          	<v-loader count="2"></v-loader>
         </div>
          <div class="notification-table forUser v-scroll-x" >			     
			     
				<table id="usertable" class="table table-hover">
					<thead>
						<tr id="cheadV">							
							<th width="30%">user name</th>
				            <th width="40%">Email/Matric Number</th>	            
				            <th width="10%">role</th>	            
							<th width="10%">Department</th>				            			           
				            <th width="10%">Action</th>
						</tr>
					</thead>
					<tbody v-if="!loaderState">
				        <tr v-for="(user, index) in createduser" :key="index">	         
				            <td width="30%">{{user.first_name}} {{user.other_names}}</td>
				            <td width="40%" style="white-space: nowrap;">
				            	<code v-if="user.email !=''">{{user.email}}</code>
				            	<span v-if="user.email != '' && user.matric_number !=''">-</span>
				            	<span v-if="user.matric_number !=''">{{user.matric_number}}</span>
				            </td>	           
				            <td width="20%">{{ getRoleName(user.role_id) }}</td>	           
				            <td width="20%">{{user.department.code}}</td>	           			                  
				            <td width="15%" >
				            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="edituser(user)" style="border-left: 1px solid #ccc;"></span>
				            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deleteuser(user.id)"></span>
				            </td>
				        </tr>
			    	</tbody>
		    	</table>            
          </div>
        </div>
</template>

<script>
	import loader from './skeletalLoaderA.vue'; 
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
				listTrHtml:"",
				sessions:[],
				loaderState:true,
				response:'',
				dTable:'',

			}
		},
		components:{		
			'v-loader':loader,
		},
		methods: {
		 
			createuser:function(){
				this.VueSweetAlert2('v-userform', {
					type:'user',
					faculties: this.faculties,
					departments: this.departments,
					roles:this.roles
				});
			},
			getRoleName:function(role_id){
				var role = JSON.parse(this.roles);
				for(var i in role){						
					if (role[i]==role_id) {
						return i;
						break;
					}
				}				
			},
			fetchUser:function(){
				var session_id = $('#sessionid').val();
				var department_id = $('#departmentid').val();
				var role_id = $('#roleid').val();
				$('#sessionid').css({'border':'1px solid #ccc'});
				if (session_id==''){
					$('#sessionid').attr('style','border:1px solid red !important;');									
					$('.requiredv').remove();
					$('#sessionid').before('<span class="text-danger requiredv">Required !</span>');
					return false;					
				}
				var $this = this;
				this.loaderState = true;
				this.axios.post(this.baseApiUrl+'users/by_search',this.createFormData({session_id:session_id,department_id:department_id, role_id:role_id}), {headers:this.axiosHeader}).then(function(response, status, request) {        
                            if (response.status === 200) {                                     	
                               $this.createduser = response.data;
							   $this.loaderState = false;
							     setTimeout(function() {
						         	$this.dTable = $('#usertable').DataTable({
						         			destroy:true,
									    	pageLength : 5,
									    });
						         }, 500);
                            }else{
                            }
                        }, function(e) {                                	
                             if(e.response.status === 401 ){
                             	 localStorage.removeItem("LoggedUser");
                                location.href = "/logout";
                             }else{                               
                             }                                                                   
                        })  

			},
			swal_form: function(obj){	
				
				var $vm = this, html='';					    
						
					html = "<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Faculty</legend>"+
					  	$vm.facultiesHTML+		
					  	"<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Department</legend>"+
					  	"<select id='department_id' name='department_id' class='form-control w-100'></select>"+									  	
					  	"<legend class='text-left mb-1 mt-3 pb-0 fs1 p-text-success'>Select Role</legend>"+
					  	"<select class='swal2-input' id='role_id'>";
					  	for(var ik in JSON.parse(this.roles)){
					  		html += "<option value='"+JSON.parse(this.roles)[ik]+"'>"+ik+"</option>";
					  	}					  	
					  	html += "<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Select csv file</legend>"+					     
					    '<input id="swal-file1" type="file" class="mt-1 mx-auto"  >' ;	

					
					$('#system-loader').hide();						
					Swal.fire({
					  title: "Upload Bulk User",
					  html:html,
					  focusConfirm: false,
					  cancelButtonText:'Cancel',				      				      
				      cancelButtonColor:'#dd000f',					      
				      confirmButtonColor:'#00b96b',					      
				      showCancelButton:true,
					  preConfirm: () => {
					  	var faculty = document.getElementById('faculty_id').value,
					  		department = document.getElementById('department_id').value,
					  	 	//Validate whether File is valid Excel file.
        					 fileUpload = document.getElementById("swal-file1"),
        					 role_id = document.getElementById("role_id").value,
        					 csv = document.getElementById("swal-file1").files[0]        					
        					 var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xls|.xlsx|.csv)$/;
        					if (regex.test(fileUpload.value.toLowerCase())) {					     
					        } else {
					           Swal.showValidationMessage('Error: please select a valid file (.csv file)');
					        }

					  	if ( faculty == "" || department == "") {					     
					         Swal.showValidationMessage('All fields are required');
					  	}
	
					    return [
					      faculty,
					      department,
					      csv,
					      $( "#faculty_id option:selected" ).text(),
					      $( "#department_id option:selected" ).text(),					     
					      role_id
					    ]
					  } 
					}).then((result)=>{
						if (result.value) {
					    const answers = {faculty_id:result.value[0], user_name:result.value[1], csv:result.value[2],role_id:result.value[5]}
					    Swal.fire({
					      title: 'Click on Proceed to Continue',
					      text: 'you can also click on cancel to restart',
					      html: `faculty: ${result.value[3]}<br>Department: ${result.value[4]}`,					     
					      confirmButtonText:'Proceeed',					      
					      cancelButtonText:'Cancel',					      
					      showCancelButton:true,					      
					      showLoaderOnConfirm: true,
					      confirmButtonColor:'#00b96b',	
					       preConfirm: (login) => {			
					        	var formData=new FormData();
								formData.append("csv",result.value[2]);
								formData.append("department_id", result.value[1]);
								formData.append("faculty_id", result.value[0]);
								formData.append("role_id", result.value[5]);	
								var resultR='';							
					        	$vm.axios.post($vm.baseApiUrl+'users/import_students',formData,{headers:$vm.axiosHeaderWithFiles})
						      	.then(response => {							      		      						      		
							        resultR=response;
							        if (!response.data.sucess) {
							          throw new Error(response.statusText)
							        }		
							        //$vm.response = 'response';
							     //   return response.json()
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
						      	let interval = setInterval(function(){
						      		if (resultR!= ''){
						      			$vm.response = resultR;
								    	clearInterval(interval);					      		
								    	return [
								    	resultR,
								    	120
								    	]	
						      		}
						      	},50);		    		   
						  },
						  allowOutsideClick: () => !Swal.isLoading()
					    }).then((result) => {
					    	let interval = setInterval(function(){
					      		if ($vm.response != ''){
							    	clearInterval(interval);					      		
							    	let html = `<div>
					    					<button class="button btn-info py-2 px-3 mb-2" id="PrintAreaUXP">Print</button>
					    					<div id="resultuploadidX" style="overflow-y:scroll; height:250px;">
					    					<table class="table table-stripped table-hover">
					    				<thead>
					    					<th class="bg-success fs1 text-white p-1 w-50">uploaded</th>
					    					<th class="bg-danger fs1 text-white p-1 w-50">Error: already exists</th>
					    				</thead>
					    				<tbody>							    				
							    	`;

							    	let uploaded = $vm.response.data.uploaded,failed = $vm.response.data.failed, maxRow =  Math.max(uploaded.length,failed.length),
							    	tr='';
							    	for(let k= 0; k<maxRow; k++){
							    		tr += '<tr>';
							    		if (k< uploaded.length) {
								    		tr += '<td class="p-1 fs01">'+ uploaded[k] +'</td>'
							    		}else{tr += '<td class="p-1 fs01"></td>';}

							    		if (k< failed.length) {
								    		tr += '<td class="p-1 fs01">'+ failed[k] +'</td>'
							    		}else{tr += '<td class="p-1 fs01"></td>';}														    		
							    		tr += '</tr>';
							    	}
							    	setTimeout(function() {
							    		$('#PrintAreaUXP').click(function(){
							    			$vm.PrintArea('resultuploadidX','Result on user upload');
							    		})
							    	}, 100);
							    	html += tr +
							    			`</tbody></table></div> </div>`;							    	
									    Swal.fire({							    
									      title: 'Uploaded Result',				
									      html:	html,	      
									      icon: 'success',
									      confirmButtonText:'Ok',										      
				      			  		confirmButtonColor:'#00b96b',	
									    }).then((result)=>{
									    	location.reload();
									    })										    
							    	
					      		}
						      	},100);				    	
					    	//let title = $vm.response.data.success;					    						    	
					    })
					  }
					})
				
					
				//let $vm = this;	
				
			

			},
			edituser:function(obj){				
				this.VueSweetAlert2('v-userform', {
					type:'',
					update:true,
					faculties: this.faculties,
					departments: this.departments,
					roles:this.roles,
					alldata: obj
				});				
			},
			deleteuser: function(id){
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
						this.axiosDelete('api/users/delete',{'user_id': id})					

					}
				})					
			},
			singleValidate: function(id){
			$('#'+id).css('border','1px solid #e45');
			$('.requiredv').remove();
			$('#'+id).after('<span class="text-danger requiredv">Required !</span>')
			},
			uploadstudent: function(){					
				this.swal_form(false, null);					
					    var $this = this;
					    setTimeout(function() {
					    	$('#faculty_id').change(function(){
					    		
					    		var departmentsX = $this.faculties.filter((item)=>{return item.id === $(this).val()})[0].department;
					    		var opt="";
					    		departmentsX.forEach((item, idex)=>{
										opt += "<option value='"+item.id+"'>"+ item.code +"</option>";
								});	

					    	$('#department_id').html(opt);
								
							})
					    }, 50);
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
				this.watchfacultyHtml.value = Math.random(1,1000);
				
			 	
			}
		},
		async created(){			
			this.faculties       =  await this.axiosGet('api/faculties/faculties');						
			this.departments	 = await  this.axiosGet('api/departments/departments');					
			this.createduser     = await this.axiosGet('api/users/users');			
			this.sessions        = await this.axiosGet('api/session/all_session');			
			this.facultiesHTML   = this.selectHtmlGen(this.faculties,'code','faculty_id' )							
			this.departmentsHTML = this.selectHtmlGen(this.departments,'code','department_id' )							

			this.loaderState = false;
			this.tableLoaded = false;
			    /*initialize datatable */
			    var $this = this;
	        setTimeout(function() {
	         	$this.dTable = $('#usertable').DataTable({
			    	pageLength : 5,
			    });
	         }, 50);
			
		},
		 props:{
          	roles:{
          		type:String,
          		default:function(){
          			return '{}'
          		}
          	}
          },
		mounted(){			
			
			this.$nextTick(function(){ 
				function PrintArea(elem, title,length=400)
				{
				    var mywindow = window.open('', 'PRINT', 'height='+length+',width=600');

				    mywindow.document.write('<html><head><title>' + title  + '</title>');
				    mywindow.document.write('</head><body >');
				    mywindow.document.write('<h1>' + title  + '</h1>');
				    mywindow.document.write(document.getElementById(elem).innerHTML);
				    mywindow.document.write('</body></html>');

				    mywindow.document.close(); // necessary for IE >= 10
				    mywindow.focus(); // necessary for IE >= 10*/

				    mywindow.print();
				    mywindow.close();

				    return true;
				}
			}); 
		}
	};
</script>
<style type="text/css">
	tr td{
		text-transform: capitalize;
	}
	.form-control{
		width: 120px;
	}

</style>