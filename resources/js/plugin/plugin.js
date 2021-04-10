import axios from 'axios';

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
      	validateI: function(id,sel=0){
				if (sel ===0) {

					let index =-1;
					$('#'+id).find('.vI').each(function(){
						index++;
					});
					let $vm = this;
					$('#'+id).find('.vI').each(function(e){
						if($(this).val()==""){
							$(this).css('border','1px solid #e45');
							$('.requiredv').remove();
							$(this).after('<span class="text-danger requiredv">Required !</span>');						
							$vm.validateState = false;
							return false;
						}					
						if(e == index){
							$vm.validateState = true;
						}
					})
				}
				if (sel=== 1) {
					if($('#'+id+ 'option:selected').text()==""){
						$('#'+id).css('border','1px solid #e45');
						$('.requiredv').remove();
						$('#'+id).after('<span class="text-danger requiredv">Required !</span>');						
						this.validateState = false;						
					}else{						
						this.validateState = true;	
					}
				}
			},
		VueSweetAlert2:function(component,propsData)
		{
		    swal.fire({
		        html: '<div id="VueSweetAlert2" class="text-left"></div>',
		        showConfirmButton: false,
		        width: '97%',
		        onBeforeOpen: () => {
		            let ComponentClass = Vue.extend(Vue.component(component));
		            let instance = new ComponentClass({
		                propsData: propsData,
		            });
		            instance.$mount();
		            document.getElementById('VueSweetAlert2').appendChild(instance.$el);
		        }
		    });
		},
      	createFormData: function(data){      		
		    const formData = new FormData();
		    Object.keys(data).forEach(key => formData.append(key, data[key]));
		    return formData;
      	},
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
  		},
  		frontendLogout(){
		    localStorage.removeItem("LoggedUser");
  			location.href = "/logout";
  		},
  		axiosGet: async(url) => {
  				let retryCount = 0;			
				var $this = this;
				//console.log($this);
				let attemptsFailsV = function(){
						Swal.fire({
						  text: 'something went wrong',
						  title: 'click Ok to retry',
						  icon:'error',
						  showClass: {
						    popup: 'animate__animated animate__fadeInDown'
						  },
						  hideClass: {
						    popup: 'animate__animated animate__fadeOutUp'
						  }
						}).then((result) => {
							  /* Read more about isConfirmed, isDenied below */
							  if (result.isConfirmed) {
							    location.reload();
							  } else if (result.isDenied) {
							    Swal.fire('please reload the page', '', 'info')
							  }
						});
				}
				let AxiosFetchData = function(){
					let datafetched = '0';						
					retryCount +=1;		
					let userLoggedInOld;
					if(typeof localStorage.getItem('LoggedUser') != undefined){		      			
		      			userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser')).access_token
		      		}else{
				        localStorage.removeItem("LoggedUser");
		      		}
		      		let Auth_ = 'Bearer '+userLoggedInOld;
					let axiosHeader ={
							'Content-Type':'application/json',
							'Authorization':Auth_
					};
                   return axios.get(url,{headers: axiosHeader}).then(function(response, status, request) {        
                            if (response.status === 200) {                                     	
                            	let i,j;                  
                               //console.log(response.data.map((a,b)=>{j = []; for(i in a) {j.push(a[i])} return j; }));                               
                               return response.data;                                                                
                            }else{
                            	if (retryCount < 4) {
                            		setTimeout(function() {
                            			AxiosFetchData();
                            		}, 5000);
                            	}else{
                            		/*when all attempts fails inform the user what to do*/
                            		attemptsFailsV();
                            	}
                            }
                        }, function(e) {        
                        	//console.log(e.response.status);
                             if(e.response.status === 401 ){
                                location.href = "/logout";
                             }else{
                               attemptsFailsV()                                           
                             }                                                                   
                        })                             
					try{
					}catch(err){
						console.log(err)
					}
					//return datafetched;
				}							
				return AxiosFetchData();				
                    
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