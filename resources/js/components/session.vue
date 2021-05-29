<template>	
		<div class="w-100 mt-2 py-3">
          <a href="#" @click="createsession" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
          <br>
          <div class="notification-table ">
				<table id="sessiontable" class="table table-hover">
					<thead>
						<tr id="cheadV">							
							<th width="40%">session name</th>			               			            
				            <th width="20%">status</th>
				            <th width="40%">Action</th>
						</tr>
					</thead>
					<tbody v-if="tableLoaded">
			        <tr v-for="(session, index) in createdsession" :key="index">	         
			            <td width="40%" :title="session.title">{{session.session}}</td>			            
			            <td width="20%">{{session.is_current==1?'current session':''}}</td>	            
			            <td width="30%">
			            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" :title="'Edit '+session.session" @click="editsession(session)" style="border-left: 1px solid #ccc;"></span>
			            	<span class="ml-2 fa fa-check pl-3 text-success fs01 cursor-1" :title="'set ' + session.session+ ' as current session'" @click="setsession(session)" style="border-left: 1px solid #ccc;"></span>			            	
			            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" :title="'Delete '+session.session" @click="deletesession(session.id)"></span>
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
				createdsession:null,
				tableLoaded:false
			}
		},
		methods: {
			swal_form: function(update = false, obj={session_id:1, name:'Natural science', code: 'fns'}){	
				$('#system-loader').css('display','flex');
				let formcount = 0;
				let $vm = this, html='';
				let topic = "Create Session";				
				let popbtn = "Create";				
				//watch(this.watchsessionHtml, 'value', function(){
					
				if(update){			
					topic = 'Update session';
					popbtn = 'Update';
					html = 			
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Session Name</legend>"+					  		   
				    '<input id="swal-input1" placeholder="e.g. 2021/2022" class="swal2-input mt-1" value="'+obj.session+'" >'  +
				    '<input id="swal-input2" type="checkbox" class="mr-1 mt-2 d-inline-block"><label class="mb-1 d-inline-block">set as current session</label>' ;		 
				}else{
					html =
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>Session Name</legend>"+					  		   
				    '<input id="swal-input1" placeholder="e.g. 2021/2022" class="swal2-input mt-1" >' +
				    '<input id="swal-input2" type="checkbox" class="mr-1 mt-2 d-inline-block"><label class="mb-1 d-inline-block">set as current session</label>' ;			 				    
				    ;
				}										
				$('#system-loader').hide();						
				Swal.fire({
				  title: topic,
				  html:html,
				  confirmButtonText:popbtn,					      
			      cancelButtonText:'Cancel',					      
			      cancelButtonColor:'#dd000f',					      
			      confirmButtonColor:'#00b96b',					      
			      showCancelButton:true,					      
			      showLoaderOnConfirm: true,
				  focusConfirm: false,
				  preConfirm: () => {					  	
				  	 let  sessionName = document.getElementById('swal-input1').value;
				  	 let is_current = 0,
				  	 current = 'No';

				  	 if($('#swal-input2').prop('checked')){
				  	 	current = 'Yes';
				  	 	is_current =1;
				  	 }
				  	 //let  is_current = document.getElementById('swal-input1 ').value;
				      				      					  	  
				  	if ( sessionName == "" ) {					     
				         Swal.showValidationMessage('All fields are required');
				  	}
				  	let regExp = /^(20?\d)\d{2}\/(20?\d)\d{2}$/;
				  	if (!regExp.test(sessionName)) {
				  		 Swal.showValidationMessage('Invalid session');	
				  	}else{
				  		let sessionArr = sessionName.split('/');
				  		if(sessionArr[1]-sessionArr[0] < 0 || sessionArr[1]-sessionArr[0] >1)
				  			Swal.showValidationMessage('InValid session');
				  	}
				    return [					      
				      sessionName,				      					     
				      is_current,
				      current
				    ]
				  } 
				}).then((result)=>{
					if (result.value) {
				    const answers = {session:result.value[0], is_current:result.value[1]}
				    Swal.fire({
				      title: 'Confirm Data',				      
				      html: `<table class='table text-left'>						      		
					      		<tr>					      		
					      			<td width='70%' class="text-center fs2 fw6 font1">session:  ${answers.session}</td>
					      			<td width='70%' class="text-center fs2 fw6 font1">current Session: ${result.value[2]} </td>
					      		</tr>					      	

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
				        	formData.append("session_id",obj.id);
				        	formData.append("session",result.value[0]);				        				        	
				        	formData.append("is_current",result.value[1]);				        				        	
				        	return $vm.axios.post('api/session/update',formData,{headers:$vm.axiosHeader})
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
								          `Failed: session Already Exist`
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
				        	return $vm.axios.post('api/session/create',$vm.createFormData(answers),{headers:$vm.axiosHeader})
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
								          `Failed: session Already Exist`
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
			editsession:function(obj){
					this.swal_form(true,obj);
			},
			setsession:function(obj){
			//		this.swal_form(true,obj);
			var $vm = this;
				Swal.fire({
					text:`are you sure you want to set ${obj.session} as current session `,
					  confirmButtonText:'Yes',					      
				      cancelButtonText:'No',				      				      
				      cancelButtonColor:'#dd000f',					      
				      confirmButtonColor:'#00b96b',					      
				      showCancelButton:true,			
				      showLoaderOnConfirm: true,
				       preConfirm: (login) => {	
				       	const formData = new FormData();
			        	formData.append("session_id",obj.id);				        	
			        	return $vm.axios.post($vm.baseApiUrl+'session/set_session',formData,{headers:$vm.axiosHeader})
				      	.then(response => {						      	
					        if (!response.data.sucess) {
					          throw new Error(response.statusText)
					        }						   
					        return {reponse:response.json(),status:true}
				      	})
				      	.catch(error => {
					      	if (error.response) {
					      		Swal.showValidationMessage(
						          `Failed: Something went wrong, check your internet connection`
						        )						      		
					      	}
				       })
				   }
				}).then((result)=>{
					if (result.value) {						
						Swal.fire({
							title:'Session set successfully',
							confirmButtonText:'Ok',
							confirmButtonColor:'#00b96b',	
						}).then((result)=>{
							location.reload();
						})
					}
				})
			},
			deletesession: function(session_id){
				this.axiosDelete('api/session/delete',{'session_id': session_id})					
										
			},
			createsession: function(){
					var $vm = this;
					this.swal_form();				
				}
		},
		async created(){

		    this.createdsession  = await this.axiosGet('api/session/all_session');
		    //console.log(this.createdsession)
		    this.tableLoaded = true;
		    
		    /*initialize datatable */
             setTimeout(function() {
             	 $('#sessiontable').DataTable({
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
