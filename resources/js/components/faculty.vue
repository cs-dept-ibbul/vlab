<template>	
		<div class="w-100 mt-2 py-3">
          <a href="#" @click="createFaculty" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
          <br>
          <div class="notification-table v-scroll-x">
				<table id="facultytable" class="table table-hover">
					<thead>
						<tr id="cheadV">
							
						<th width="40%">faculty name</th>
			            <th width="20%">faculty abbr.</th>	            			            
			            <th width="30%">Description</th>			            
			            <th width="10%">Action</th>
						</tr>
					</thead>
					<tbody v-if="tableLoaded">
			        <tr v-for="(faculty, index) in createdFaculty" :key="index">	         
			            <td width="40%" :title="faculty.title">{{faculty.name}}</td>
			            <td width="20%">{{faculty.code}}</td>	           			            
			            <td width="30%">{{faculty.description}}</td>	            
			            <td width="10%">
			            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="editfaculty(faculty)" style="border-left: 1px solid #ccc;"></span>
			            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deletefaculty(faculty.id)"></span>
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
				createdFaculty:null,
				tableLoaded:false
			}
		},
		methods: {
			swal_form: function(update = false, obj={faculty_id:1, name:'Natural science', code: 'fns',picture:'/picture',description:'description'}){	
				$('#system-loader').css('display','flex');
				let formcount = 0;
				let $vm = this, html='';
				let topic = "Create Faculty";
				let old = {name:"",code:"",description:""};
				let btnName ="Create";				
				//watch(this.watchfacultyHtml, 'value', function(){
				if(update){
					btnName= "Update";
					old = {name:'<span class="text-danger">'+obj.name+'</span> <b class="text-success"> to </b> ', code: '<span class="text-danger">'+ obj.code+'</span> <b class="text-success"> to </b> ',
					description: '<span class="text-danger">'+ obj.description+'</span> <b class="text-success"> to </b> '
					 };			
					topic = 'Update Faculty';
					html = 			
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Faculty Name</legend>"+					  		   
				    '<input id="swal-input1" class="swal2-input mt-1" value="'+obj.name+'" >' +
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Faculty Abbr</legend>"+					  		   				    
				    '<input id="swal-input2" class="swal2-input mt-1" value="'+obj.code+'">'+

				    "<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Description</legend>"+					  	
				    '<input id="swal-input3" class="swal2-input mt-1" value="'+obj.description+'">'+
				    "<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Faculty Picture</legend>"+					  	
				    '<input id="swal-file4" type="file" class="mt-1 mx-auto" >' ;

				}else{					
					html =
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Faculty Name</legend>"+					  		  
				    '<input id="swal-input1" class="swal2-input mt-1" >' +
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Faculty Abbr</legend>"+					  	
				    '<input id="swal-input2" class="swal2-input mt-1">'+
				    "<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Description</legend>"+					  	
				    '<input id="swal-input3" class="swal2-input mt-1">'+
				    "<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Faculty Picture</legend>"+					  	
				    '<input id="swal-file4" type="file" class="mt-1 mx-auto"  >' ;
				    ;	
				}										
				$('#system-loader').hide();						
				Swal.fire({
				  title: topic,
				  html:html,
				  confirmButtonText:btnName,					      
			      cancelButtonText:'Cancel',				      				      
			      cancelButtonColor:'#dd000f',					      
			      confirmButtonColor:'#00b96b',					      
			      showCancelButton:true,					      
			      showLoaderOnConfirm: true,
				  focusConfirm: false,
				  preConfirm: () => {					  	
				  	 let  FacultyName = document.getElementById('swal-input1').value.toUpperCase(),
				      FacultyAbbr = document.getElementById('swal-input2').value,					      					 
				      description = document.getElementById('swal-input3').value,		
				      pic = document.getElementById('swal-file4');				            					
				      if (pic.files.length !=0 ) {				      	
				      var picture = pic.files[0];
				      var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpeg|.png|.jpg|.gif)$/;
					      if (regex.test(pic.value.toLowerCase())) {					     
						  } else {
						           Swal.showValidationMessage('Error: please select a valid file (.csv file)');
						  }
				      }else{
				      	picture = '/no-pic';
				      }

				  	if ( FacultyName == "" || FacultyAbbr == "") {					     
				         Swal.showValidationMessage('All fields are required');
				  	}
				    return [					      
				      FacultyName,
				      FacultyAbbr,
				      description,
				      picture					      
				    ]
				  } 
				}).then((result)=>{
					if (result.value) {
				    const answers = {faculty_name:result.value[0], faculty_code:result.value[1], description:result.value[2],file:result.value[3]}

				    Swal.fire({
				      title: 'click on proceed',
				      text: 'other cancel and restart',
				      html: `<table class='table text-left'>						      		
					      		<tr>
					      			<td width='30%'><b>Faculty Abbr:</b></td>
					      			<td width='70%'>${old.name} ${answers.faculty_name}</td>
					      		</tr>
					      		<tr>
					      		 	<td width='30%'><b>Abbr:</b></td>
					      		 	<td width='70%'>${old.code} ${answers.faculty_code} </td>
					      		 <tr>
					      		 <tr>
					      		 	<td width='30%'><b>Description:</b></td>
					      		 	<td width='70%'>${old.description} ${answers.description} </td>
					      		 <tr>
				      		</table>`,
				      confirmButtonText:'Continue',					      
				      cancelButtonText:'Cancel',				      				      
				      cancelButtonColor:'#dd000f',					      
				      confirmButtonColor:'#00b96b',					      
				      showCancelButton:true,					      
				      showLoaderOnConfirm: true,
				       preConfirm: (login) => {			
				        if (update){
				        	const formData = new FormData();
				        	formData.append("faculty_id",obj.id);
				        	formData.append("faculty_name",result.value[0]);
				        	formData.append("faculty_code",result.value[1]);				        	 
				        	formData.append("description",result.value[2]);				        	 
				        	formData.append("file",result.value[3]);				        	 
				        	return $vm.axios.post($vm.baseApiUrl+'faculties/update',formData,{headers:$vm.axiosHeader})
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
								          `Failed: Faculty Already Exist`
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
				        	return $vm.axios.post('api/faculties/create',$vm.createFormData(answers),{headers:$vm.axiosHeader})
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
								          `Failed: Faculty Already Exist`
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
			
				//formcount++;
			//});		
			//let $vm = this;				
			},
			editfaculty:function(obj){
					this.swal_form(true,obj);
			},
			deletefaculty: function(faculty_id){
				this.axiosDelete('api/faculties/delete',{'faculty_id': faculty_id})					
										
			},
			createFaculty: function(){
					var $vm = this;
					this.swal_form();				
				}
		},
		async created(){

		    this.createdFaculty  = await this.axiosGet('api/faculties/faculties');
		    //console.log(this.createdFaculty)
		    this.tableLoaded = true;
		    
		    /*initialize datatable */
             setTimeout(function() {
             	 $('#facultytable').DataTable({
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
