import axios from 'axios';
axios.defaults.baseURL = (process.env.API_PATH !== 'production') ? 'http://localhost:8000' : 'http://localhost:8000';
import loader from '../components/skeletalLoaderA.vue'; 
export default {
  install(Vue, options) {
    Vue.mixin({
    	components:{		
			'v-loader':loader,
		},
      data(){
      	return {
      		userLoggedInOld: "",
      		axiosHeader:"",
      		axiosHeaderWithFiles:"",
      		errorNetworkMessage:"network error",
      		errorSessionMessage:"Session Expired",
      		successLoginMessage:"logged in successfuly",
      		createdMessage:"created successfuly",
      		currentWidth:100,
      		currentUser:'',
      		startExperiment: false,
      		navbarState:false,
      		baseApiUrl : 'api/'

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
		selectHtmlGen: function(obj,name,idname="idname001",selected_id, update=false){
			let html = "<select id='"+idname+"' class='form-control'>"
			if (!update) {
				obj.forEach((item, idex)=>{
					html += "<option value='"+item.id+"'>"+ item[name] +"</option>";							
				});		
			}else{
				obj.forEach((item, idex)=>{					
					html += "<option value='"+item.id+"'";
					if (item.id == selected_id){
						html += "selected=selected";
					}
					html += ">"+ item[name] +"</option>";					
				});			
			}
			html += "</select>";			
			return html;
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
                     }, function(error) {                     	
                     	if(error.response.status==401){
                     		localStorage.removeItem("LoggedUser");  		             
                     		window.location.href   = "/logout"  
                     	}
                     	this.launch_toast();
						$('#system-loader').css('display','none');
                        
                    });                                
                }catch(err){
                 //  console.log(err)
                }                 
                        
		},  
		show_loader(){
			$('#system-loader').css('display','flex');
		},
		hide_loader(){
			$('#system-loader').hide();
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
		addError(element) {                
        	element.classList.add('errorshake');
      	},
      	removeError(e) {
        	e.classList.remove('errorshake');
      	},
  		web_player(w='250px',h='140px',autoplay=1){
  			const tag = document.createElement("script");
		    tag.src = "https://www.youtube.com/player_api";
		    const firstScriptTag = document.getElementsByTagName("script")[0];
		    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		    function onPlayerReady(evt) {
			    const player = evt.target;
			    player.setVolume(50); // percent
			  }
			 window.onYouTubePlayerAPIReady = function() {
			    const video = document.querySelector("video");
			    const videoId = video.getAttribute("data-id");
			    new YT.Player(video, {
			      width: w,
			      height: h,
			      videoId: videoId,
			      playerVars: {
			        autoplay: autoplay,
			        controls: 1,
			        rel: 0,
			        iv_load_policy: 3,
			        cc_load_policy: 0,
			        fs: 0,
			        disablekb: 1
			      },
			      events: {
			        "onReady": onPlayerReady
			      }
			    });
			  };						
			
  		},
  		youtubeID(url){
  			if (url == null) {
  				throw ERROR('youtubeID(url): youtube link required');
  			}
  			return url.split('=')[1];
  		},
  		axiosDelete:function(url, data){  			
			let retryCount = 0;			
				let $this = this;
				
				
				let attemptsFailsV = function(){
					$this.hide_loader();
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
					$this.show_loader();
                   	axios.post(url,$this.createFormData(data),{headers: $this.axiosHeader}).then(function(response, status, request) {        
                            if (response.status === 200) {     
                            	$this.hide_loader();                                	
                            	Swal.fire({
                            		title:'deleted successfuly',
                            		icon: 'success',                            		
                            	}).then((result)=>{
                            		location.reload();
                            	});
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
						//console.log(err)
					}
					//return datafetched;
				}		
				AxiosFetchData();									
  		},
  		axiosGet: async(url) => {
  			//console.log(url)
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
						//console.log(err)
					}
					//return datafetched;
				}							
				return AxiosFetchData();				
                    
  		},
  		axiosGetById: async(url,idname,idvalue) => {
  			if (url=='' ||idname=='' || idvalue == '') {
  				throw Error('axiosGetById: all parameter data must be provided');
  			}
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
					
					let formdata = new FormData;
					formdata.append(idname, idvalue);						
                   return axios.post(url,formdata,{headers: axiosHeader}).then(function(response, status, request) {        
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
                    
  		},
  		axiosGetByParams: async(url,obj=null) => {
  			if (obj== null) {
  				throw Error('axiosGetById: all parameter data must be provided');
  			}
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
										
					  const formdata  = new FormData();
		    		  Object.keys(obj).forEach(key => formdata .append(key, obj[key]));
                   return axios.post(url,formdata,{headers: axiosHeader}).then(function(response, status, request) {        
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
                    
  		},
  		
  		rippleButton: function(){      				
					$('.button').click(function(event){
						var $this = $(this);
					    var $offset = $this.parent().offset();
					    //var $circle = $this.find('.c-ripple__circle');
					  const diameter = Math.max($this.width(), $this.height());
					  const radius = diameter / 2;
					  let left = event.pageX - $offset.left - radius;
					  let top = event.pageY - $offset.top - radius;

					  $('.ripple').remove()
					  $this.append("<span class='ripple b-warning' style='width:"+diameter+"px; height:"+diameter+"px; left:"+left+"px; top:"+top+"px;'></span>");
					})			
      			},
      	naviconToggler: function(e){
      		if ($(window).width() <751) {

	      		if (this.navbarState === false) {
	      			
	      			this.navbarState = true;
	      			$('.navicon-small-screen').addClass('change');
	      			$('.mobileMenu').show();
	      			$('#slideId').show()	      			
	      			$('#slideId').animate({
	      				'top':65,
	      				'opacity':1,
	      			}, 300)

	      		}else{
	      			$('#slideId').animate({
	      				'top':'-50%',
	      				'opacity':0,
	      			}, 300,function(){
	      				$('#slideId').hide();
	      			})
	      			this.navbarState = false;
	      			$('.navicon-small-screen').removeClass('change');
	      			$('.mobileMenu').hide(200);
	      		}
      		}
      	}

      },
      created: function(){
      		/*goes global*/      		
      		if(typeof localStorage.getItem('LoggedUser') != undefined){      			
      			this.userLoggedInOld = JSON.parse(localStorage.getItem('LoggedUser')).access_token
      			this.currentUser = JSON.parse(localStorage.getItem('LoggedUser')).user;
      		}else{
		        localStorage.removeItem("LoggedUser");
      		}
      		let Auth_ = 'Bearer '+this.userLoggedInOld;
			this.axiosHeader ={
					'Content-Type':'application/json',
					'Authorization':Auth_
			};
			this.axiosHeaderWithFiles ={
					'Content-Type':'multipart/form-data',
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
      		let mobileS = function(size) {
      			if(size < 751) {      				
      				/*hide wide screen element*/
	      				$('.MenuLContainer').addClass('removeMenu');
	      				$('.menuBtnToggler').addClass('removeMenu');      				
	      			/*end  wide screen element*/
      				let widemenu = $('#wideMenu').clone();
      				widemenu.removeClass('slideout slidein');
      				widemenu.removeAttr('');
      				widemenu.css({'position':'relative', 'top':'-70px','margin':'0px auto','opacity':'0'});
      				widemenu.addClass('slideMenu');
      				widemenu.attr('id','slideId');
      				$('#MainMobile').html(widemenu);      				
      				/*$('#MainMobile').slideUp(200);
      				$('#MainMobile').slideUp(200);*/
       				$('.listMenu').not($(this).next()).slideUp(200);
  	 			    $(this).parent().find('ul.listMenu').slideDown(200);
      			}else{
      				$('#MainMobile').css('display','none');      				
      				$('.MenuLContainer').removeClass('removeMenu');
      				$('.menuBtnToggler').removeClass('removeMenu');
				}

      		}
      		mobileS($(window).width());
      		$(window).resize(function(){
      			mobileS($(this).width())
      		})
      		$(document).ready(function(){      			
      			window.rippleButton = function(){      				
					$('.button').click(function(event){
						var $this = $(this);
					    var $offset = $this.parent().offset();					    
					  const diameter = Math.max($this.width(), $this.height());
					  const radius = diameter / 2;
					  let left = event.pageX - $offset.left - radius;
					  let top = event.pageY - $offset.top - radius;

					  $('.ripple').remove()
					  $this.append("<span class='ripple b-warning' style='width:"+diameter+"px; height:"+diameter+"px; left:"+left+"px; top:"+top+"px;'></span>");
					})			
      			}
      			window.rippleButton();
      		})
      		
        })
      }     		 
    });
  }
};