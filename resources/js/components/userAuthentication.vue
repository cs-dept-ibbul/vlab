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
			let $vm = this;

			//register all routes by categories
			var adminRoutes = ['create-course'];
			var userRoutes =[ 'view-created-course','course-resources','course-experiments','my-practicals','my-courses','simpleCircuit','simple-pendulum','simplependulumEquipment','vernierEquipment','vernier-caliper','micrometer','micrometerEquipment','resistor-color-code','resistorExperiment','my-course-review'];
			var guestRoutes = ['login','explore','view-Students-dashboard'];

			//filter
			function baseName(str){
				str = str.slice(1,str.length);
				let n = str;				
			  	if(str.includes('/')){
			  		n = str.split('/')[0];
			  	}else if(str.includes('?')){
			  	
			  		n = str.slice(0,str.indexOf("?"));
			  	}
			  	return n;

			}

			let pathname = baseName(window.location.pathname); 			 
			let userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser'));
			
			let hostname =window.location.hostname;
						
			if (localStorage.getItem("LoggedUser") === null) {	
				if (!guestRoutes.includes(pathname)) {
					alert(49)
					window.location.replace('/login');							
		        }	   
			}
			


			//access route control
			if(userLoggedInOld.user.role_id){
				var roleOld = userLoggedInOld.user.role_id;
			}else{
				alert(60)
				window.location.replace('/login');				
			}		

			if(roleOld == 0){
				//guest restricted to admin and user
				if(adminRoutes.includes(pathname) || userRoutes.includes(pathname)){
					alert(67)
					window.location.replace('/login');
				}
			}else if (roleOld ==1){				
				//user restricted to admin
				if(adminRoutes.includes(pathname)){
					alert(73)
					window.location.replace('/login');
				}
			}


		    //watch logged in 
			let Auth_ = 'Bearer '+userLoggedInOld.access_token;
			let headers ={
				'Content-Type':'application/json',
				'Authorization':Auth_
			};


			setInterval(function(){				
				try{
		            $vm.axios.post('api/me',Auth_, { headers: headers }).then(function(response, status, request) {  
		            	if (pathname=='login') {
							window.location.replace('/');
							alert(92)

		            	}
		            }, function(e) {		  
		            	localStorage.removeItem("LoggedUser");
		            	if (!guestRoutes.includes(pathname)) {
							window.location.replace('/login');		
							alert(99)

		            	}	            
		            });

		        }catch(err){
		          console.log(err)//show network error notification
		        }
			}, 3000);
			//end watch logged in 




		}
	}
</script>