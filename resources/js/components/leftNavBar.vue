<template>

	<div>
		<div class="menuBtnToggler" id="togglerV"  @click="toggleMenu" style="cursor: pointer; background: #fff">
			<span class="fa fa-square mr-2" style="font-size: 2em;"></span>
			<b class="menuLI" v-bind:class="{slidein:show1, slideout:hide1}">V-LAB</b>
		</div>

		<div style="display: flex;width: 200px;background: #fff" class="MenuLContainer"  v-bind:class="{reduceSize:show}">			
			<div v-bind:class="{slidein:show, slideout:hide}" class="niconsV slider">
				<a :href="home"  v-bind:class="{btnActive:homeA}">
					<span class="iconOV fa fa-home btnActive" title="Home"></span>					
				</a>
				<a :href="dashboard"  v-bind:class="{btnActive:dashboardA}">
					<span class="iconOV fa fa-dashboard" title="Dashboard"></span>					
				</a>
				<a :href="explore"  v-bind:class="{btnActive:exploreA}">
					<span class="iconOV fa fa-spinner" title="Explore"></span>					
				</a>
				<a :href="courses"  v-if="incourse == '1'"  v-bind:class="{btnActive:coursesA}">
					<span class="iconOV fa fa-toggle-on" title="Courses"></span>					
				</a>
				<a :href="mycourse" v-else v-bind:class="{btnActive:mycourseA}">
					<span class="iconOV fa fa-toggle-on" title="My Courses"></span>					
				</a>
				<a :href="discussion" v-bind:class="{btnActive:discussionA}">
					<span class="iconOV fa fa-comment" title="Settings"></span>					
				</a>
				<a :href="settings" v-bind:class="{btnActive:settingsA}">
					<span class="iconOV fa fa-gear" title="Settings"></span>					
				</a>
				<a @click="logout" >
					<span class="iconOV fa fa-arrow-circle-left" style="margin-top: ;" title="Logout"></span>
				</a>
			</div>
			<div v-bind:class="{slidein:show1, slideout:hide1}" style="position: relative; margin-left: 20px; margin-right:20px;height: " >
				<a :href="home" class="nChildV" v-bind:class="{btnActive:homeA}">
					<span class="iconV fa fa-home "></span><div class="labelV">Home</div>
				</a>	
				<a :href="dashboard" class="nChildV"  v-bind:class="{btnActive:dashboardA}">
					<span class="iconV fa fa-dashboard"></span><div class="labelV">Dashboard</div>
				</a>	
				<a :href="explore" class="nChildV"  v-bind:class="{btnActive:exploreA}">
					<span class="iconV fa fa-spinner"></span><div class="labelV">Explore</div>
				</a>	
				<a :href="courses" v-if="incourse == '1'" class="nChildV" v-bind:class="{btnActive:coursesA}">
					<span class="iconV fa fa-toggle-on"></span><div class="labelV">Course</div>
				</a>
				<a :href="mycourse" v-else class="nChildV" v-bind:class="{btnActive:mycourseA}">
					<span class="iconV fa fa-toggle-on"></span><div class="labelV">My Courses</div>
				</a>
				<a :href="'#'"  class="nChildV" v-bind:class="{btnActive:discussionA}">
					<span class="iconV fa fa-comment"></span><div class="labelV">Discussion</div>
				</a>	
				<a :href="settings"  class="nChildV" v-bind:class="{btnActive:settingsA}">
					<span class="iconV fa fa-gear"></span><div class="labelV">Settings</div>
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
            hide:true,
            show1:true,
            hide1:false,
            homeA:false,
            exploreA:false,
            coursesA:false,
            discussionA:false,
            settingsA:false,
            mycourseA:false,
            dashboardA:false
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
                this.hide=!this.hide;                
                this.show1=!this.show1;                
                this.hide1=!this.hide1;                
              
            }
        },


        created:function(){
		  this.$eventBus.$on('toggleSysNav', data => {
		  	this.toggleMenu();
		  })		  
        	if (this.active=='home'){
        		this.homeA = true;
        	}
        	if (this.active=='dashboard'){
        		this.dashboardA = true;
        	}
        	if (this.active=='explore'){
        		this.exploreA = true;
        	}
        	if (this.active=='courses'){
        		this.coursesA = true;
        	}
        	if (this.active=='mycourse'){
        		this.mycourseA = true;
        	}
        	if (this.active=='settings'){
        		this.settingsA = true;
        	}
        	if (this.active=='discussion'){
        		this.discussionA = true;
        	}
        },
        
		beforeDestroy: function () {
		  this.eventBus.$off('toggleSysNav', this.toggleNavOnHover)		  
		},
        props:['home','dashboard','explore','mycourse','courses','discussion','settings', 'active', 'incourse'],
        mounted(){
        	var $this = this;        	
        	var screenSize = function(){
        		  if($(window).width()<= 700){
	        	  	$this.hide = false;
	        	  	$this.hide1 = true;
	        	  	$this.show1 = false;
	        	  	$this.show = true;
	        	  }
        	}
        	screenSize();
        	$(window).resize(function(){        		
        		screenSize();
        	})
        }
	};

/*
$(document).ready(function(){
   $('button').click(function(){
       $('.sidebar').toggleClass('fliph');
   });    
});*/
</script> 
<style scoped>
@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');

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
	.niconsV >a:last-child{
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
	.nChildV:last-child{
		position: absolute;
		top: 72vh;
		left: 10px;
	}
	.btnActive{
		background: rgba(150,200,150,.1) !important;
		color: #3c9 !important;
		
	}
	.iconV{
		margin-right: 10px;
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