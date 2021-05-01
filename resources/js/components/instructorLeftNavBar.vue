<template>

	<div style="height: 100vh !important;">
		<div class="menuBtnToggler bg-white cursor-1" id="togglerV"  @click="toggleMenu">
			<span class="fa fa-square mr-2" style="font-size: 2em;"></span>
			<b class="menuLI" v-bind:class="{slidein:showWideMenu, slideout:hideMiniMenuWideMenu}">V-LAB</b>
		</div>

		<div class="m-0 mobileMenu p-display-none " id="MainMobile"></div>
		<div  class="MenuLContainer bg-white"  v-bind:class="{reduceSize:show}">	
			<div v-bind:class="{slidein:show, slideout:hideMiniMenu}" class="niconsV slider" >
					<a :href="home"  v-bind:class="{btnActive:checkActive('home')}">
					<span class="iconOV fa fa-home "></span>
				</a>	
				<a :href="dashboard"   v-bind:class="{btnActive:checkActive('dashboard')}">
					<span class="iconOV fa fa-dashboard"></span>
				</a>	
				<a href="/explore"   v-bind:class="{btnActive:checkActive('explore')}">
					<span class="iconOV fa fa-spinner"></span>
				</a>				
							
				<!-- manage course -->
				<ul class="listCoverV" >
					<li class="listMenuVBtn nChildV"  v-bind:class="{btnActive:checkActive('course')}">
						<span class="iconOV  fa fa-book"></span>
					</li>
					<ul class="listMenuV">
						<li>
							<a href="/create-course" class="text-white" v-bind:class="{btnActiveSub:checkActiveSub('createcourse')}">
								<span class="iconOV text-white fa fa-circle"></span><div class="labelV">Create Course</div>
							</a>
						</li>
						<li>
							<a href="/view-created-course"  class="text-white" v-bind:class="{btnActiveSub:checkActiveSub('editcourse')}">
								<span class="iconOV text-white fa fa-circle"></span><div class="labelV">Edit/Del Course</div>
							</a>
						</li>
					</ul>
				</ul>	
				<!-- manage experiment -->
				<ul class="listCoverV" >
					<li class="listMenuVBtn nChildV"  v-bind:class="{btnActive:checkActive('experiment')}">
						<span class="iconOV  fa fa-cube"></span>
					</li>
					<ul class="listMenuV">
						<li>
							<a href="/add-experiment" class="text-white"  v-bind:class="{btnActiveSub:checkActiveSub('addexperiment')}">
								<span class="iconOV text-white fa fa-circle"></span><div class="labelV">Add Experi.</div>
							</a>
						</li>
						<li>
							<a :href="viewexperiment" class="text-white" v-bind:class="{btnActiveSub:checkActiveSub('viewexperiment')}">
								<span class="iconOV text-white fa fa-circle"></span><div class="labelV">View Experi.</div>
							</a>
						</li>
					</ul>
				</ul>
				<a :href="settings"   v-bind:class="{btnActive:checkActive('settings')}">
					<span class="iconOV fa fa-gear"></span>
				</a>		
				<a href="/view-student"   v-bind:class="{btnActive:checkActive('student')}">
					<span class="iconOV fa fa-user"></span>
				</a>			
				<a href="/manage-task"   v-bind:class="{btnActive:checkActive('task')}">
					<span class="iconOV fa fa-tasks"></span>
				</a>					
				<a @click="logout" :href="'#'"  >				
					<span class="iconOV fa fa-arrow-circle-left"></span>
				</a>	
			</div>
			<!-- end mini side bar -->
			<div id="wideMenu" v-bind:class="{slidein:showWideMenu, slideout:hideMiniMenuWideMenu}" style="position: relative; margin-left: 20px; margin-right:20px;width: 230px;" >
				<a :href="home" class="nChildV" v-bind:class="{btnActive:checkActive('home')}">
					<span class="iconV fa fa-home "></span><div class="labelV">Home</div>
				</a>	
				<a :href="dashboard" class="nChildV"  v-bind:class="{btnActive:checkActive('dashboard')}">
					<span class="iconV fa fa-dashboard"></span><div class="labelV">Dashboard</div>
				</a>	
				<a href="/explore" class="nChildV"  v-bind:class="{btnActive:checkActive('explore')}">
					<span class="iconV fa fa-spinner"></span><div class="labelV">Explore</div>
				</a>	
				<!-- manage course -->
				<ul >
					<li class="listMenuBtn nChildV"  v-bind:class="{btnActive:checkActive('course')}">
						<span class="iconV fa fa-book"></span><div class="labelV">Manage Course</div>
					</li>
					<ul class="listMenu">
						<li>
							<a href="/create-course" class="nChildV " v-bind:class="{btnActiveSub:checkActiveSub('createcourse')}">
								<span class="iconV fa fa-circle"></span><div class="labelV">Create Course</div>
							</a>
						</li>
						<li>
							<a href="/view-created-course" class="nChildV" v-bind:class="{btnActiveSub:checkActiveSub('editcourse')}">
								<span class="iconV fa fa-circle"></span><div class="labelV">Edit/Del Course</div>
							</a>
						</li>
					</ul>
				</ul>	
<!-- manage Experiment -->
				<ul >
					<li class="listMenuBtn nChildV"  v-bind:class="{btnActive:checkActive('experiment')}">
						<span class="iconV fa fa-cube"></span><div class="labelV">Manage Expr.</div>
					</li>
					<ul class="listMenu">
						<li>
							<a href="/add-experiment" class="nChildV" v-bind:class="{btnActiveSub:checkActiveSub('addexperiment')}">
								<span class="iconV fa fa-circle"></span><div class="labelV">Add Experiment</div>
							</a>
						</li>
						<li>
							<a href="/view-created-experiment" class="nChildV" v-bind:class="{btnActiveSub:checkActiveSub('viewexperiment')}">
								<span class="iconV fa fa-circle"></span><div class="labelV">View Experiment</div>
							</a>
						</li>
					</ul>
				</ul>	
				<!-- manage Stduent -->
				<!--
				<ul >
					<li class="listMenuBtn nChildV"  v-bind:class="{btnActive:checkActive('student')}">
						<span class="iconV fa fa-students"></span><div class="labelV">Manage Stduent</div>
					</li>
					<ul class="listMenu">
						<li>
							<a :href="studentdashboard" class="nChildV" v-bind:class="{btnActiveSub:checkActiveSub('studentdashboard')}">
								<span class="iconV fa fa-circle"></span><div class="labelV">Dashboard</div>
							</a>
						</li>
						<li>
							<a :href="viewstudent" class="nChildV" v-bind:class="{btnActiveSub:checkActiveSub('viewstudent')}">
								<span class="iconV fa fa-circle"></span><div class="labelV">View Student</div>
							</a>
						</li>
					</ul>
				</ul>	
				-->
				<a href="/view-student"  class="nChildV" v-bind:class="{btnActive:checkActive('student')}">
					<span class="iconV fa fa-user"></span><div class="labelV">Students</div>
				</a>					
	
				<a :href="settings"  class="nChildV" v-bind:class="{btnActive:checkActive('settings')}">
					<span class="iconV fa fa-gear"></span><div class="labelV">Settings</div>
				</a>	
				<a href="/manage-task"  class="nChildV" v-bind:class="{btnActive:checkActive('task')}">
					<span class="iconV fa fa-tasks"></span><div class="labelV">Manage Task</div>
				</a>					
				<a @click="logout" :href="'#'"  class="nChildV">				
					<span class="iconV fa fa-arrow-circle-left"></span><div class="labelV">Logout</div>
				</a>				
			</div>
		</div>
	</div>
</template>
<script>	
	export default {
		    data:function() {
		    	return{

		            classObj:{ "color-red" : true } ,
		            show:false,
		            hideMiniMenu:true,
		            showWideMenu:true,
		            hideMiniMenuWideMenu:false,
		            iconStateFromSysTopNav:true
           
		    	}
        },
        methods:{
            toggleMenu(e){                      	
                this.show=!this.show;    
                if (this.show){
            		document.getElementById('togglerV').classList.add('widthRed');  	            
                }else{
            		document.getElementById('togglerV').classList.remove('widthRed');  	                            	
                }            
                this.hideMiniMenu=!this.hideMiniMenu;                
                this.showWideMenu=!this.showWideMenu;                
                this.hideMiniMenuWideMenu=!this.hideMiniMenuWideMenu;                
              
            },
        	checkActive: function(el){        		
        		if (this.active===el) {        			
        			return true;
        		}
        	},
        	checkActiveSub: function(el){        		
        		if (this.activesub===el) {        			
        			return true;
        		}
        	}
        },
        computed:{
        },

        created:function(){
		  this.$eventBus.$on('toggleSysNav', data => {
		  	this.toggleMenu();
		  })	
		  this.$eventBus.$on('toggleFromSysTopNav', data => {
		  	 this.iconStateFromSysTopNav = data.data;
		  	this.toggleMenu();
		  })		          
        },
        
		beforeDestroy: function () {
		  this.eventBus.$off('toggleSysNav', this.toggleNavOnHover)		  
		},
        props:['home','dashboard','viewstudent','studentdashboard','viewexperiment','explore','experiment','student','settings', 'active','activesub'],
        mounted(){
        	
         	this.$nextTick(function(){

	        	/*btn slider*/
	        	$('.listMenuBtn').click(function(){        		
	        		$('.listMenu').not($(this).next()).slideUp(200);
		 			$(this).parent().find('ul.listMenu').slideToggle(200);
		 		})
		 		$('.listMenuVBtn').click(function(){   	 				 		

	        		$('.listVMenu').not($(this).next()).addClass('slideout');
	        		$('.listVMenu').not($(this).next()).removeClass('slidein');
	        		let elt = $(this).parent().find('ul.listMenu');
		 			if(elt.hasClass('slidein')){
		 				elt.addClass('slideout');
		 				elt.removeClass('slidin');
		 			}else{
		 				elt.removeClass('slideout');
		 				elt.addClass('slidin');
		 			}
		 		})
		 		let $this = this;
		 		$(window).resize(function() {
         			$('.listVMenu').not($(this).next()).addClass('slideout');
        			$('.listVMenu').not($(this).next()).removeClass('slidein');
        			let elt = $(this).parent().find('ul.listMenu');
	         		if($(this).width() > 750){
	         			if(!$this.iconStateFromSysTopNav && !elt.hasClass('slidein') ){
		        			elt.addClass('slideout');
		 					elt.removeClass('slidin');        				
	         			}else{
	         				elt.removeClass('slideout');
		 					elt.addClass('slidin');
	         			}	    
	         		}
	         	});     			
         	})
        }
	};
</script> 
<style scoped>
@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
ul li{
	list-style: none;
	margin: 0px;
	padding: 0px;
}
ul{
	padding: 0px;
	margin: 0px;
}
.listMenuBtn,.listMenuVBtn{
	display: flex;
	flex-wrap: wrap;
	align-items: center;
}
.listMenuVBtn{
	padding: 1px !important;
	margin: 0px auto !important;
}
.listCoverV:hover  ul.listMenuV{
	display: block;
}
ul.listMenu{
	background: rgba(150,200,150,.1);
	display: none;
	padding:8px;
}
.listCoverV{
	position: relative;
	display: inline-block;
}
ul.listMenuV{	
	width: 150px;
	position: absolute;
	top: 0px;
	left: 50px;
	display: none;	
	background: #3c9;	
	color: white;
	padding:8px;	
}
ul.listMenuV li a.btnActiveSub{
	color: white;
}
ul.listMenuV li a {
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	cursor: pointer;	
}
ul.listMenuV li{
	margin: 5px auto;
}
ul.listMenuV li a span.iconOV{
	width: 1px;
	padding: 5px 8px;
	font-size: 0.45em;
}
a{
	text-decoration: none;	
}
.widthRed{
	width: 60px !important;
}
.MenuLContainer{
	display: flex;
	margin-top:50px;	
}
.menuBtnToggler{
	cursor: pointer;

}
.slider {
    position: absolute;
    width: 100px;
    height: 100px;    
    transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    z-index: 5;
}

.slidein {
    animation: slide-in 0.5s forwards;
    -webkit-animation: slide-in 0.5s forwards;
}

.slideout {
    animation: slide-out 0.5s forwards;
    -webkit-animation: slide-out 0.5s forwards;
}
    
@keyframes slide-in {
    100% { transform: translateX(0%); }
}

@-webkit-keyframes slide-in {
    100% { -webkit-transform: translateX(0%); }
}
    
@keyframes slide-out {
    0% { transform: translateX(0%); }
    100% { transform: translateX(-300%); }
}

@-webkit-keyframes slide-out {
    0% { -webkit-transform: translateX(0%); }
    100% { -webkit-transform: translateX(-300%); }
}
.reduceSize{
	width: 0px !important;
	transition: width 0.5s;

}
	.niconsV{
		width: 55px; 
		margin-top: 5px;
		
	}
	.niconsV-logout{
		position: absolute;
		top: 62vh;
		left: 10px;
	}
	.menuLI{
		color:#2F274E;
		font-size: 1.4em;
	}
	.menuBtnToggler{
		display: flex;
		flex-wrap: wrap;
		align-items:center;
		color:#2F274E;
		margin-top:50px;
		margin-left: 10px;
	}
	.nChildV{
		font-weight: 400;
		font-size: 0.95em;
		font-family: 'Roboto';		
		display: flex;
		padding: 10px 18px;			
		color:#2F274E;
		text-align: left;		
		align-items: center;
		flex-wrap: wrap;
		margin:5px 0px;
		border-radius: 8px;
		cursor: pointer;
	}
	.listMenuVBtn.nChildV{
		padding: 10px 1px;					
	}
	.listMenu li a.nChildV{
		padding: 5px 18px;		
	}
	.nChildV-logout{
		position: absolute;
		top: 72vh;
		left: 10px;
	}
	.btnActive{
		background: rgba(150,200,150,.1) !important;
		color: #3c9 !important;		
	}
	.btnActiveSub{
		color:#3c9;
	}
	.iconV{
		margin-right: 10px;
	}
	.listMenu li a span.iconV{
		font-size: 0.5em;
	}
	.iconOV{
		float: left;			
		padding: 15px 18px;
		border-radius: 8px;
		display:block;
		width: 100%;
		cursor: pointer;
		font-size: 1.1em;	
		color:#2F274E;
	}
	.iconOV:not(:first-child){
		margin:2px 0px;
	}

	.iconOV:hover{
		background: #3c9;
		color:#fff;		
	}
	.nChildV:hover{
		background: #3c9;
		color:#fff;
	}
	.nChildv:hover  .labelV{
		color: #fff;
		border: 1px solid red;
	}
</style>