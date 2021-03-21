	let $vm = this;
			var adminRoutes = ['create-course','view-created-course','course-resources','course-experiments','view-Students-dashboard'];
			var userRoutes =[ 'my-practicals','my-courses','simpleCircuit','simple-pendulum','simplependulumEquipment','vernierEquipment','vernier-caliper','micrometer','micrometerEquipment','resistor-color-code','resistorExperiment'];
			var guestRoutes = ['login','explore','']
			function baseName(str){
				let n = str;
			  	if(str.includes('/')){
			  		n = str.split('/')[0];
			  	}else if(str.includes('?')){
			  	
			  		n = str.slice(0,str.indexOf("?"));
			  	}
			  	return n;
			}

			var pathname = baseName(window.location.pathname); 			 
			var userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser'));
			
			var hostname =window.location.hostname;
			
			console.log(userLoggedInOld.access_token);

			if(JSON.parse(localStorage.getItem('LoggedUser')) == undefined ){
				window.location.replace('/login');				
			}
				
				//watch logged in 
			var Auth_ = 'Bearer '+userLoggedInOld.access_token;
			var headers ={
				'Content-Type':'application/json',
				'Authorization':Auth_
			};
			setInterval(function(){
				
				try{
		            $vm.axios.post('api/me',Auth_, { headers: headers }).then(function(response, status, request) {  
		            		//console.log(true);        
		            }, function(e) {		  		            
						window.location.replace('/login');
		            });                                
		        }catch(err){
		          console.log(err)//show network error notification
		        }
			}, 5000);
			//end watch logged in 

			//access route control
			if(userLoggedInOld.user.role_id){
				var roleOld = userLoggedInOld.user.role_id;
			}else{
				window.location.replace('/login');				
			}

			if(roleOld == '0'){
				//guest restricted to admin and user
				if(adminRoutes.includes(pathname) || userRoutes.includes(pathname)){
					window.location.replace('/login');
				}
			}else if (roleOld=='1'){
				//user restricted to admin
				if(adminRoutes.includes(pathname)){
					window.location.replace('/login');
				}
			}
