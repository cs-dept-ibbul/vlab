<template>
	<div class="vhE-2" id="rightNavigation">
		<div class="containerR" id="tools" style="height:100%;">	
			
		   	<div class="input-alt"></div>	
		   	<span v-if="vicelab==1" class="pr z-1" >		 
		   	 	<vicelabtools has='1'  ></vicelabtools>
		   	</span>	   
		   	<span v-else>
		   		
			   	<span class="fa fa-align-justify bg-white rightnavexpander"></span>
	            <div v-for="tool in toolSizes"  :key="tool" @click="addactivate;changeApparatus(tool)"  v-bind:style="{width:tool+'px'}" class="box">
	            		Size
	        	</div>                  
		   	</span>
		<!-- <span v-if="toolState==true">
		</span>		
		<span v-else>			
		</span> -->
		</div>
		<div class="containerR" style="display: none;" id="resulttable">
		   	<div class="input-alt"></div>
		   <span class="fa fa-align-justify bg-white rightnavexpander"></span>
		   <h1>Result table</h1>				                
		</div>
		<div class="containerR" style="display: none;" id="resultgraph">				
		   	<div class="input-alt"></div>
		   	<span class="fa fa-align-justify bg-white rightnavexpander"></span>

		   <h1>Graph</h1>				                
		</div>
		<div class="containerR" style="display: none;" id="userhelp">		
		   	<div class="input-alt"></div>		
		   	<span class="fa fa-align-justify bg-white rightnavexpander"></span>			
		   <h1>Help</h1>				                
		</div>
		<div class="containerR" style="display: none;" id="unkl">	
		<!--    	 <input type="text" name="search" class="input-search input-dark" ><span class="fa fa-search serachicon "></span> -->           
		   	<span class="fa fa-align-justify bg-white rightnavexpander"></span>
            <div v-if="toolState==true" v-for="tool in toolSizes"  :key="tool" @click="addactivate;changeApparatus(tool)"  v-bind:style="{width:tool+'px'}" class="box">
            		Size
        	</div> 			                
		</div>
	</div>
</template>
<script>
	import vicelabtools from './vicelabExpEquip';
	export default{
	components:{
		vicelabtools,
	},
	 data:function() {
		    return{
		    	numC:0,
		    	exerc:false,
		    	resour:false,
		    	show:false,
            	hide:true,
            	control:false,           
            	toolSizes:[],
            	rightNavState:false,
            	activeRightNav:'tools'		            
		   	}
        },
        methods:{
        	toggleNavOffHover(){
        			                    		 
            	//control = false;
        	},
        	addactivate(e){
        		console.log(e.target);
        		alert(2);
        		let box = document.getElementsByClassName('box');
        		for (let i = 0; i < box.length; i++) {
        			box[i].classList.remove('boxActive');
        		}
        		e.target.classList.add('boxActive');

        	},
        	changeApparatus(tool){

        		//let  experimentSheet = document.getElementById('experimentSheet');
        		let  experimentSheet = $('#experimentSheet');
        		 experimentSheet.attr('src',this.url+tool); //tool is value

        	},
        	toggleNavOnHover: function(value){          
        		
            },
        	toggller(e){

        	},

        },	
        
        created: function () {        	
        	if (this.toolState==true) {
        		
		  this.toolSizes = JSON.parse(this.toolsizes);
        	}
		  this.$eventBus.$on('rightNavtoggleClick', data => {		  	
		  	//this.toggleNavOnHover();
		  	if(this.activeRightNav === data.text){		  		

		  	}else{
		  		$('.containerR').slideUp();
		  		$('#'+data.text).slideDown(200);		  			  		
		  		this.activeRightNav = data.text
		  	}
		  })		  

		},

		beforeDestroy: function () {
		  //this.eventBus.$off('rightNavtoggleClick', this.toggleNavOnHover)		  
		},

        props:{
            toolsizes: String,
            url:String,
            toolState:Boolean,
            vicelab:String
        },        
        mounted(){
        var $vm = this;	               	
        	$('.box').click(function(){
        		$('.box').removeClass('boxActive');
        		$(this).addClass('boxActive');

        	});
        	$('.rightnavexpander').click(function(){
        		if($vm.rightNavState=== false){
        			$('#rightNav').addClass('width50');
        			$vm.rightNavState = true;
        		}else if($vm.rightNavState === true){
        			$('#rightNav').removeClass('width50');
        			$vm.rightNavState = false;
        		}
        	})
        }		
	}

</script>
<style scoped>
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	/*@import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");*/
	
	div{
		font-family: 'Roboto', sans-serif;
	}
	.slidewr {
    position: absolute;
    width: 100px;
    height: 100px;    
    transform: translateX(-100%);
    -webkit-transform: translateX(-100%);
    
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
   0%   { transform:scale(0.5); opacity:0.0; left:0}
    50%  { transform:scale(1.2); opacity:0.5; left:100px}
    100% { transform:scale(1.0); opacity:1.0; left:200px}

}

@-webkit-keyframes slide-in {
    0%   { transform:scale(0.5); opacity:0.0; left:0}
    50%  { transform:scale(1.2); opacity:0.5; left:100px}
    100% { transform:scale(1.0); opacity:1.0; left:200px}

}
    
@keyframes slide-out {
   0%   { transform:scale(1); opacity:1; }
    50%  { transform:scale(0.1); opacity:0.5;}
    100% { transform:translateX(-300%); opacity:0; }
}

@-webkit-keyframes slide-out {
    0%   { transform:scale(1); opacity:1; }
    50%  { transform:scale(0.5); opacity:0.5;}
    100% { transform:translateX(-300%); opacity:-10; }
}

::-webkit-scrollbar {
  width: 9px; 
  cursor: pointer;
}

/* Track */
::-webkit-scrollbar-track {
	width: 50px;
  border-radius: 5px;
}
 
/* Handle */
		
::-webkit-scrollbar-thumb {
  background: #eee; 
  border-radius: 10px;
  cursor: pointer;

}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #fff; 
  cursor: pointer;
}

.box{
	height: 35px; 
	/*background-image:linear-gradient(#2F274E, #34d, #2F274E);*/
	background: darkblue;
	box-shadow: 0px 0px 10px #fff;
	margin: 35px auto;
	text-align: center;
	color: #fff;
	padding-top: 5px;
	border-radius: 4px;
	text-shadow: 1px 2px 2px #555;
	cursor: pointer !important;
}
.boxActive{
	background: #2F274E;
}
.containerR{
	height: 537px;
	background: #40356E;
	overflow-x: scroll;
	color: #fff;
}
.fa-align-justify{
	padding: 5px;
	border-radius: 0px 0px 3px 0px;
	cursor: pointer;
	border-left: 1px solid #2F274E;
	color: #fff;	
	background:transparent !important;
}
.fa-align-justify:hover{
	color: #2F274E;
	background:#fff !important;
}
.input-search{
	width:100%;
	height:37px;
	background:#2F274E;
	padding:10px;
	color:#fff;
	border:none;
}
.input-alt{
	width:100%;
	height:37px;
	background:#2F274E;
	padding:10px;
	color:#fff;
	border:none;
	position: relative;
	z-index: 10;
}
.serachicon{
	color:#eee;
	position: absolute;
	right: 10px; 
	top: 10px;
}
.pr{
	position: relative;
	display: block;
	} 
.z-1{
	z-index: 1;
}
.vhE-2{
	height: 87vh;
	width: 100%;
}
</style>