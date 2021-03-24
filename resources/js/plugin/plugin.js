export default {
  install(Vue, options) {
    Vue.mixin({
      data(){
      	return {
      		userLoggedInOld: "",
      		axiosHeader:"",
      		errorNetworkMessage:"network error",
      		errorSessionMessage:"Session Expired",
      		successLoginMessage:"logged in successfuly"
      	}
      },
      methods:{
  		logout: function(){
		
				$('#system-loader').css('display','flex');
				try{
                    this.axios.post('api/logout','', {headers:this.axiosHeader}).then(function(response, status, request) {  
                  		
		             localStorage.removeItem("LoggedUser");  		             
                     window.location.href   = "/logout"  
                     }, function() {
                     	launch_toast();
						$('#system-loader').css('display','none');
                        
                    });                                
                }catch(err){
                   console.log(err)
                }                 
                        
		},  	
      	launch_toast(msg){
      		var x = $("#toast");
      		$('#toastdesc').html(msg);
      		x.addClass("show");
      		setTimeout(function(){x.removeClass("show"); }, 5000);
  		}
      },
      created: function(){
      		/*goes global*/      		
      		if(typeof localStorage.getItem('LoggedUser') != undefined){
      			console.log(1);
      			this.userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser')).access_token
      		}else{
		        localStorage.removeItem("LoggedUser");
      		}
      		let Auth_ = 'Bearer '+this.userLoggedInOld;
			this.axiosHeader ={
					'Content-Type':'application/json',
					'Authorization':Auth_
			};
      },
      beforeCreate(){
      	/*	let userLoggedInOld = "";
      		if(typeof localStorage.getItem('LoggedUser') != undefined){
      			console.log(localStorage.getItem('LoggedUser'))
      			userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser')).access_token
      		}else{
		        localStorage.removeItem("LoggedUser");
      		}

				let Auth_ = 'Bearer '+userLoggedInOld;
				let headers ={
					'Content-Type':'application/json',
					'Authorization':Auth_
				};
				let $vk = this;*/
		/*	setInterval(function(){				
				try{
		            $vk.axios.post('api/me',Auth_, { headers: headers }).then(function(response, status, request) {  		            
		            }, function(e) {		  
		            	localStorage.removeItem("LoggedUser");
		            });

		        }catch(err){
		          console.log(err)//show network error notification
		        }
			}, 1000);*/
			//end watch logged in 




		}
    });
  }
};