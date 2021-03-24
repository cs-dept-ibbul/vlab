<template>
	<div class="m-0 p-0"></div>
</template>

<script>


/*end resistors color code*/	
	export default{

		data(){
			return{
				userLoggedIn :[],
				role:0,
			}
		},
		mounted(){

		},
		beforeCreate(){

			setInterval(function(){				
				try{
		            $vm.axios.post('api/me',Auth_, { headers: headers }).then(function(response, status, request) {  		            
		            }, function(e) {		  
		            	localStorage.removeItem("LoggedUser");
		            });

		        }catch(err){
		          console.log(err)//show network error notification
		        }
			}, 1000);
			//end watch logged in 




		}
	}
</script>