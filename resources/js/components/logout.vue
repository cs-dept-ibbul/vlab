<template>
	<div class="m-0 p-0"></div>
</template>
<script >
	export default{
		data(){
			return{

			}
		},
		method:{
			logout: function(){
				/*let Auth_ = 'Bearer '+userLoggedInOld.access_token;
				let headers ={
					'Content-Type':'application/json',
					'Authorization':Auth_
				};*/ 
				$('#system-loader').css('display','flex');

				try{
                    this.axios.post('api/logout','', {headers:this.axiosHeader}).then(function(response, status, request) {  
                  		
		             localStorage.removeItem("LoggedUser");                                    
                            
                     }, function(error) {
                     	console.log(error)
                     	console.log(error.data)
                     	console.log(error.message)
                     	console.log(error.data.message)
                     	console.log(error.data.response)
                     	//this.launch_toast();
						// $('#system-loader').css('display','none');
                        
                    });                                
                }catch(err){
                   
                }                 
                        
			}
		}
	}
</script>