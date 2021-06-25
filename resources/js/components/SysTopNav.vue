<template>
	<div >
		<!-- <div id="showSessionOnMobile" class="p-warning text-white" style="font-size: 0.8em; position: absolute;top: 45%;left: 0;border-radius:0px 5px 5px 0px;background:white;padding: 4px 0px;font-weight: 500; writing-mode: vertical-rl;">2021/2022 SESSION</div> -->
		<div class="topNav">			
			<div style="display: flex;flex-wrap: wrap;align-items: center; ">
				<!-- <span @click="toggleExperimentGuider" style="font-size: 1.4em;cursor: pointer;" class="fa fa-align-justify mr-3"></span> -->
				<div class="navicon-wide-screen change cursor" @click="toggle()">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
				</div>
				<div class="navicon-small-screen cursor" @click="naviconToggler()">
				  <div class="bar1"></div>
				  <div class="bar2"></div>
				  <div class="bar3"></div>
				</div>
				<span style="font-weight: 500;font-size: 1em;" class="ml-2" id="pageTitle">{{title}}</span>
				
			</div>		

			<!-- <div>{{department}}</div> -->
			<div style="display: flex;flex-wrap: wrap;align-items: center;">
				<span class="fa fa-user mr-2"></span>
				<span style="font-size: 0.9em; font-weight: 300;">{{username}}</span>
				<span class="fa fa-chevron-down ml-2"></span>
			</div>
		</div>
		<div class="text-center fs01 fw5 mt-2 p-display-none" id="showSessionOnMobile"  style="width: 100%; opacity: 0.5;">2021/2022 SESSION</div>
	</div>
</template>

<script>
	export default{

	 data:function() {
	    	return{
	    	 navState:false,
	    	 icon:false,
	    	 username:'',
	    	 department: '',
	    	}
        },
        methods:{
        	toggleExperimentGuider: function () {
//        		alert(this.navState);
        	  this.navState = !this.navState;
        	  if ((window.width() <720)) {

			    this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
        	  }
			},
			toggle(){
				
				$('.navicon-wide-screen').toggleClass('change');
				this.icon = !this.icon;
         		this.$eventBus.$emit('toggleFromSysTopNav',{data:this.icon})				

			}
        },	
        
         props: ['title'],
         created(){	        
         	this.username =  JSON.parse(localStorage.getItem('LoggedUser')).user.first_name; 	
         	
         },        
         events :{
         	'toggleClick':'toggleClick'
         },
         mounted(){
         	let $this = this;
         	this.$nextTick(function(){

         	try{
 				const formData = new FormData();      
                    formData.append('faculty_id',$this.currentUser.faculty_id);
                    formData.append("_token", $('meta[name="csrf-token"]').attr('content'));                    
                $.ajax({
                    url: "/get_user_department", 
                    type: 'POST',
                    data: formData,                                       
                    success: function(result) {
                    	console.log(result);
                    	$this.department = data.department;
                    }
                })      			      			
      		
      		}catch(err){
      			
      		}

	         	$(window).resize(function() {
	         		if($(this).width() < 751){	         			
	         			$this.icon = false;
					    $('.navicon').removeClass('change');

	         		}else{

	         		}
	         	})
	         });
         }

	}
</script>
<style scoped>
	div{
		font-family: 'Roboto', sans-serif;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.navicon-wide-screen{
		display: block;
	}
	.navicon-small-screen{
		display: none;
	}
	@media(max-width: 750px){
		.navicon-small-screen{
			display: block !important;
		}
		.navicon-wide-screen{
			display: none !important;
		}
	}
	.topNav{
		user-select: none;
		margin:0; 
		padding: 18px 20px 18px 20px;
		display: flex;
		justify-content: space-between;
		width: 100%;
		background: #f0f0f0; 
	}
</style>