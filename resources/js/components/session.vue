<template>	
		<div class="w-100 mt-2 py-3">
          <a href="#" @click="createsession" class="btn py-3 mb-5 mr-2 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
          <br>
          <div class="notification-table ">
				<table id="sessiontable" class="table table-hover">
					<thead>
						<tr id="cheadV">
							
						<th width="40%">session name</th>			               
			            <th width="15%">date created</th>
			            <th width="5%">status</th>
			            <th width="40%">Action</th>
						</tr>
					</thead>
					<tbody v-if="tableLoaded">
			        <tr v-for="(session, index) in createdsession" :key="index">	         
			            <td width="40%" :title="session.title">{{session.name}}</td>			            
			            <td width="15%">{{session.updated_at}}</td>	            
			            <td width="5%">{{session.status}}</td>	            
			            <td width="40%">
			            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="editsession(session)" style="border-left: 1px solid #ccc;"></span>
			            	<span class="ml-2 fa fa-edit pl-3  fs01 cursor-1" @click="setsession(session)" style="border-left: 1px solid #ccc;"></span>
			            	<span class="ml-2 fa fa-trash pl-3  fs01 cursor-1" @click="deletesession(session.id)"></span>
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
				let topic = "Create session";
				console.log(obj);
				//watch(this.watchsessionHtml, 'value', function(){
				if(update){			
					topic = 'Update session';
					html = 			
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>session Name</legend>"+					  		   
				    '<input id="swal-input1" class="swal2-input mt-1" value="'+obj.name+'" >' ;			 
				}else{
					html =
				  	"<legend class='text-left mb-1 pb-0 fs1 p-text-success'>session Name</legend>"+					  		   
				    '<input id="swal-input1" class="swal2-input mt-1" >' 
				    ;
				}										
				$('#system-loader').hide();						
				Swal.fire({
				  title: topic,
				  html:html,
				  confirmButtonText:'Create',					      
			      cancelButtonText:'Cancel',					      
			      cancelButtonColor:'#dd000f',					      
			      confirmButtonColor:'#00b96b',					      
			      showCancelButton:true,					      
			      showLoaderOnConfirm: true,
				  focusConfirm: false,
				  preConfirm: () => {					  	
				  	 let  sessionName = document.getElementById('swal-input1').value;
				      				      					  	  
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
				    ]
				  } 
				}).then((result)=>{
					if (result.value) {
				    const answers = {name:result.value[0]}
				    Swal.fire({
				      title: 'Confirm Data',				      
				      html: `<table class='table text-left'>						      		
					      		<tr>					      		
					      			<td width='70%' class="text-center fs2 fw6 font1">session:  ${answers.name}</td>
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
				        	formData.append("name",result.value[0]);				        				        	
				        	return $vm.axios.post('api/sessions/update',formData,{headers:$vm.axiosHeader})
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
				        	return $vm.axios.post('api/sessions/create',$vm.createFormData(answers),{headers:$vm.axiosHeader})
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
			Swal.fire('sj');
			},
			deletesession: function(session_id){
				this.axiosDelete('api/sessions/delete',{'session_id': session_id})					
										
			},
			createsession: function(){
					var $vm = this;
					this.swal_form();				
				}
		},
		async created(){

		    this.createdsession  = await this.axiosGet('api/sessions/sessions');
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
