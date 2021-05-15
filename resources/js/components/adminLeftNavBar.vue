<template>

	<div class="vh-100">
		<div class="menuBtnToggler bg-white cursor-1 " id="togglerV"  @click="">
			<span class="fa fa-square mr-2 position-fixed" style="font-size: 2em;"></span>
			<b class="menuLI ml-5" v-bind:class="{slidein:show1, slideout:hide1}">V-LAB</b>
		</div>
		<div class="m-0 mobileMenu p-display-none " id="MainMobile"></div>
		<div  class="MenuLContainer bg-white"  v-bind:class="{reduceSize:show}">			
			<div v-bind:class="{slidein:show, slideout:hide}" class="niconsV slider" >
				<a :href="home"  v-bind:class="{btnActive:checkActive('home')}">
					<span class="iconOV  fa fa-home "></span>
				</a>	
				<a :href="dashboard"   v-bind:class="{btnActive:checkActive('dashboard')}">
					<span class="iconOV  fa fa-dashboard"></span>
				</a>	
				<a href="/explore"   v-bind:class="{btnActive:checkActive('explore')}">
					<span class="iconOV  fa fa-spinner"></span>
				</a>	
				
				<!-- manage faculty -->
				<a :href="department"   v-bind:class="{btnActive:checkActive('department')}">
					<span class="iconOV fa fa-institution"></span>
				</a>	
				
				<!-- manage faculty -->
				<a :href="faculty"   v-bind:class="{btnActive:checkActive('faculty')}">
					<span class="iconOV fa fa-institution"></span>
				</a>	
	
				<!-- manage user -->
				<a :href="user"   v-bind:class="{btnActive:checkActive('user')}">
					<span class="iconOV fa fa-users"></span>
				</a>

				<a :href="settings"   v-bind:class="{btnActive:checkActive('settings')}">
					<span class="iconOV fa fa-gear"></span>
				</a>					
				<a  href="/logout"  >				
					<span class="iconOV fa fa-arrow-circle-left"></span>
				</a>	
			</div>
			<div id="wideMenu" v-bind:class="{slidein:show1, slideout:hide1, scrollableV:hide1, scrollableV:show1}" style="position: relative; margin-left: 10px; margin-right:20px;height:75vh; padding-right: 10px;" >
				<a :href="home" class="nChildV" v-bind:class="{btnActive:checkActive('home')}">
					<span class="iconV fa fa-home "></span><div class="labelV">Home</div>
				</a>	
				<a :href="dashboard" class="nChildV"  v-bind:class="{btnActive:checkActive('dashboard')}">
					<span class="iconV fa fa-dashboard"></span><div class="labelV">Dashboard</div>
				</a>	
				<a href="/explore" class="nChildV"  v-bind:class="{btnActive:checkActive('explore')}">
					<span class="iconV fa fa-spinner"></span><div class="labelV">Explore</div>
				</a>	
				
				<!-- manage department -->
				<a :href="department" class="nChildV"  v-bind:class="{btnActive:checkActive('department')}">
					<span class="iconV fa fa-institution"></span><div class="labelV">Manage Dept.</div>
				</a>	
				
				<!-- manage faculty -->
				<a :href="faculty" class="nChildV"  v-bind:class="{btnActive:checkActive('faculty')}">
					<span class="iconV fa fa-institution"></span><div class="labelV">Manage Faculty</div>
				</a>	
			
				<!-- manage user -->
				<a :href="user" class="nChildV"  v-bind:class="{btnActive:checkActive('user')}">
					<span class="iconV fa fa-users"></span><div class="labelV">Manage User</div>
				</a>	
				<a href="/manage-session" class="nChildV"  v-bind:class="{btnActive:checkActive('session')}">
					<span class="iconV fa fa-calendar"></span><div class="labelV">Manage Session</div>
				</a>	
			
	
				<a :href="settings"  class="nChildV" v-bind:class="{btnActive:checkActive('settings')}">
					<span class="iconV fa fa-gear"></span><div class="labelV">Settings</div>
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
	ul.listMenu li a.nChildV{
		padding: 10px 8px;					
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
	.scrollableV{
		overflow-x: hidden;
		overflow-y: scroll;
	}
</style>