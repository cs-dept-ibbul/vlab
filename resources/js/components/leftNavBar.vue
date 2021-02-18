<template>
	<div>
		<div class="menuBtnToggler" id="togglerV"  @click="toggleMenu" style="cursor: pointer; background: #fff">
			<span class="fa fa-square mr-2" style="font-size: 2em;"></span>
			<b class="menuLI" v-bind:class="{slidein:show1, slideout:hide1}">V-LAB</b>
		</div>

		<div style="display: flex;width: 200px;background: #fff" class="MenuLContainer"  v-bind:class="{reduceSize:show}">			
			<div v-bind:class="{slidein:show, slideout:hide}" class="niconsV slider">
				<span class="iconOV fa fa-home btn-active" title="Home"></span>
				<span class="iconOV fa fa-spinner" title="Explore"></span>
				<span class="iconOV fa fa-toggle-on" title="My Practical"></span>
				<span class="iconOV fa fa-comment" title="Discussion"></span>
				<span class="iconOV fa fa-gear" title="Settings"></span>
				<span class="iconOV fa fa-arrow-circle-left" style="margin-top: ;" title="Logout"></span>
			</div>
			<div v-bind:class="{slidein:show1, slideout:hide1}" style="position: relative; margin-left: 20px; margin-right:20px;height: " >
				<div class="nChildV btn-active"><span class="iconV fa fa-home "></span><div class="labelV">Home</div></div>	
				<div class="nChildV"><span class="iconV fa fa-spinner"></span><div class="labelV">Explore</div></div>	
				<div class="nChildV"><span class="iconV fa fa-toggle-on"></span><div class="labelV"><a href="/my-Practical">My Practical</a></div></div>	
				<div class="nChildV"><span class="iconV fa fa-comment"></span><div class="labelV">Discussion</div></div>	
				<div class="nChildV"><span class="iconV fa fa-gear"></span><div class="labelV">Settings</div></div>					
				<div class="nChildV"><span class="iconV fa fa-arrow-circle-left"></span><div class="labelV">Logout</div>
				</div>
				
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
              
            }
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
		display: flex;
		padding: 10px 18px;			
		color:#2F274E;
		font-size: 1em;
		text-align: left;		
		align-items: center;
		flex-wrap: wrap;
		margin:5px 0px;
		border-radius: 8px;
		cursor: pointer;

	}
	.nChildV:hover{
		background: #2F274E;
		color:#fff;
	}
	.btn-active{
		background: #EBEAEF;
		
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
	}
	.iconOV:not(:first-child){
		margin:2px 0px;
	}

	.iconOV:hover{
		background: #2F274E;
		color:#fff;		
	}
	.nChildV:hover{
		background: #2F274E;
		color:#fff;
	}
</style>