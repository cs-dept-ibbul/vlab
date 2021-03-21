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
				let Auth_ = 'Bearer '+userLoggedInOld.access_token;
				let headers ={
					'Content-Type':'application/json',
					'Authorization':Auth_
				};
				$('#system-loader').css('display','flex');
				try{
                    $vm.axios.post('api/logout',Auth_, {headers:headers}).then(function(response, status, request) {  
                  		
		             localStorage.removeItem("LoggedUser");                                    
                            
                     }, function() {
                     	launch_toast();
						$('#system-loader').css('display','none');
                        
                    });                                
                }catch(err){
                   
                }                 
                        
			}
		}
	}
</script>