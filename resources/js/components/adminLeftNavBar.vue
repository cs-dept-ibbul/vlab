
<template>

	<div class="vh-100" style="height: 100vh;background: #f0f0f0;"  id="leftNavbarCover">
		<h5 style="" class="font fw6 fs1 w-100 text-white forSessionOnNav">
			<span class="pb-1 d-inline-block">
					{{currentSession.session}} SESSION			
			</span>
		</h5>
		<div class="menuBtnToggler cursor-1 position-relative" id="togglerV"   @click="toggleMenu">
			<!-- <span class="fa fa-square mr-2" style="font-size: 2em;"></span> -->
			<img src="/vlab-nobg.png" width="100px"  class="forLeftSideBarLogo"><!-- 
			<b class="menuLI" v-bind:class="{slidein:showWideMenu, slideout:hideMiniMenuWideMenu}">V-LAB</b> -->
		</div>

		

		<div class="m-0 mobileMenu p-display-none " id="MainMobile"></div>
		<div  class="MenuLContainer scroll-y vh-70"  v-bind:class="{reduceSize:show}">			
			<div v-bind:class="{slidein:show, slideout:hide}" class="niconsV slider" >
				<a :href="home"  v-bind:class="{btnActive:checkActive('home')}">
					<span class="iconOV  fa fa-home "></span>
				</a>	
				<a href="/dashboard"   v-bind:class="{btnActive:checkActive('dashboard')}">
					<span class="iconOV  fa fa-dashboard"></span>
				</a>	
				<a href="/manage-session"   v-bind:class="{btnActive:checkActive('session')}">
					<span class="iconOV fa fa-calendar"></span>
				</a>	
			
				<a href="/explore"   v-bind:class="{btnActive:checkActive('explore')}">
					<span class="iconOV  fa fa-spinner"></span>
				</a>	
				
				<!-- manage faculty -->
				<a href="/manage-department"   v-bind:class="{btnActive:checkActive('department')}">
					<span class="iconOV fa fa-institution"></span>
				</a>	
				
				<!-- manage faculty -->
				<a href="/manage-faculty"   v-bind:class="{btnActive:checkActive('faculty')}">
					<span class="iconOV fa fa-institution"></span>
				</a>	
	
				<!-- manage user -->
				<a href="/manage-user"   v-bind:class="{btnActive:checkActive('user')}">
					<span class="iconOV fa fa-users"></span>
				</a>

				<a href="/settings"   v-bind:class="{btnActive:checkActive('settings')}">
					<span class="iconOV fa fa-gear"></span>
				</a>					
				<a  href="/logout"  >				
					<span class="iconOV fa fa-arrow-circle-left"></span>
				</a>	
			</div>
			<div id="wideMenu" v-bind:class="{slidein:show1, slideout:hide1, scrollableV:hide1, scrollableV:show1}" style="position: relative; margin-left: 5px; margin-right:5px;width: 240px; padding-right: 10px;" >
				<a :href="home" class="nChildV" v-bind:class="{btnActive:checkActive('home')}">
					<span class="iconV fa fa-home "></span><div class="labelV">Home</div>
				</a>	
				<a href="/dashboard" class="nChildV"  v-bind:class="{btnActive:checkActive('dashboard')}">
					<span class="iconV fa fa-dashboard"></span><div class="labelV">Dashboard</div>
				</a>	
				<a href="/manage-session" class="nChildV"  v-bind:class="{btnActive:checkActive('session')}">
					<span class="iconV fa fa-calendar"></span><div class="labelV">Manage Session</div>
				</a>	
			
				<!-- manage faculty -->
				<a href="/manage-faculty" class="nChildV"  v-bind:class="{btnActive:checkActive('faculty')}">
					<span class="iconV fa fa-institution"></span><div class="labelV">Manage Faculty</div>
				</a>	
	
				<!-- manage department -->
				<a href="/manage-department" class="nChildV"  v-bind:class="{btnActive:checkActive('department')}">
	   				<span class="iconV fa fa-institution"></span><div class="labelV">Manage Depts.</div>
				</a>	
				
			
				<!-- manage user -->
				<a href="/manage-user" class="nChildV"  v-bind:class="{btnActive:checkActive('user')}">
					<span class="iconV fa fa-users"></span><div class="labelV">Manage Users</div>
				</a>	
				<a href="/settings"  class="nChildV" v-bind:class="{btnActive:checkActive('settings')}">
					<span class="iconV fa fa-gear"></span><div class="labelV">Settings</div>
				</a>		

				<a href="/explore" class="nChildV"  v-bind:class="{btnActive:checkActive('explore')}">
					<span class="iconV fa fa-spinner"></span><div class="labelV">Explore</div>
				</a>	
				
				<a href="/logout"  class="nChildV">				
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
           currentSession:[],
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
                 if (this.hide1 == true) {                	
                	$('.forLeftSideBarLogo').css({'left':'2px','width':'80px'});                	
                	$('#leftNavbarCover').css({'width':'110px'});
                }else{                	
                	$('.forLeftSideBarLogo').css({'left':'30px','width':'100px'})                	               
                	$('#leftNavbarCover').css({'width':'250px'});                	
                }             
              
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
        async created(){
          this.currentSession = await this.axiosGet('api/current_session',false, 'Please set a Session');          
          window.sessionNow = this.currentSession;          
		  this.$eventBus.$on('toggleFromSysTopNav', data => {
		  	this.toggleMenu();
		  })		          
        },
        
		beforeDestroy: function () {
		  this.eventBus.$off('toggleFromSysTopNav', this.toggleNavOnHover)		  
		},
        props:['home','dashboard','department','viewexperiment','addexperiment','createcourse','editcourse','createuser','edituser','explore','faculty','courses','user','settings', 'active','activesub', 'incourse'],

        mounted(){
        	
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
	    0% { transform: translateX(-300%); }		
	    100% { transform: translateX(0%); }
	}

	@-webkit-keyframes slide-in {
	    0% { transform: translateX(-300%); }	
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
			margin-top:20px;
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
		.listCoverV:hover  .nChildV{
			background: #3c9 !important;
			color:#fff !important;
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
		.niconsV > a, .niconsV > ul {
	    display: block;
	    margin: 0px auto;
	    width: 60px;
	    text-align: center;
	    height: 47px;
		}
		.niconsV > ul {
		    width: 60px;
		}
</style>