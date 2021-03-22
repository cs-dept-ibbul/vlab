export default {
  install(Vue, options) {
    Vue.mixin({
      methods:{
  		logout: function(){
				let userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser'));

				let Auth_ = 'Bearer '+userLoggedInOld.access_token;
				let headers ={
					'Content-Type':'application/json',
					'Authorization':Auth_
				};
				$('#system-loader').css('display','flex');
				try{
                    this.axios.post('api/logout',Auth_, {headers:headers}).then(function(response, status, request) {  
                  		
		             localStorage.removeItem("LoggedUser");  		             
                     window.location.href   = "/logout"  
                     }, function() {
                     	launch_toast();
						$('#system-loader').css('display','none');
                        
                    });                                
                }catch(err){
                   console.log(err)
                }                 
                        
			}    	
      }
    });
  }
};