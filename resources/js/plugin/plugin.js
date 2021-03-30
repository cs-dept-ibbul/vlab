export default {
  install(Vue, options) {
    Vue.mixin({
      data(){
      	return {
      		userLoggedInOld: "",
      		axiosHeader:"",
      		errorNetworkMessage:"network error",
      		errorSessionMessage:"Session Expired",
      		successLoginMessage:"logged in successfuly",
      		createdMessage:"created successfuly",
      		currentWidth:100

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
      mounted: function(){

      	let $vm = this;
      	this.$nextTick(function(){
      		let windowWidth =	$(document).width();
      		setInterval(function(){
	      		if ($('.scroll-y').innerWidth()) {
	        	 	$vm.currentWidth = (($('.scroll-y').width()/windowWidth)* 100)+2;
	      		}        	 	
      		},5);
      		
        })
      }     		 
    });
  }
};