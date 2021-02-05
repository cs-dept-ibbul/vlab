<template>
	<div style="display: flex;width: 0px;" id="expSideBar">
		
		<div   v-bind:class="{slidein:show, slideout:hide}" >	

		<div style="display: flex;background: #2F274E;" >
			<div v-bind:class="{btnVActive:proced}" class="btnV"  @click="toggller('procedure')">Procedure</div>
			<div v-bind:class="{btnVActive:exerc}"  class="btnV" @click="toggller('exercise')">Exercise</div>
			<div v-bind:class="{btnVActive:resour}"  class="btnV"  @click="toggller('resources')">Resources</div>
		</div>
		<div style="background: #40356E; padding-right: 9px;">
				<div class="holder">
					<div id="procedure" class="m-0 p-0">	
						<div style="padding: 10px 20px; font-family: 'Roboto';">
							<p class="p-0 m-0" style="font-weight: 300;font-size: 0.95;">Title</p>
					    	<p class="mt-2" style=" font-weight: 500;color:#fff;font-size: 1.3em;">Measurement With Vernier Caliper</p>
							
						</div>
						<!-- Aim -->
						<h3 class="accordion accordBtnV" >Aim<span class="fa fa-chevron-right fontType-ico" style=""></span> </h3>
						<div class="panel accordBodyV" v-html="aim"></div>						  								
						<!-- Aparatus -->
						<h3 class="accordion accordBtnV" >Aparatus<span class="fa fa-chevron-right fontType-ico" style=""></span> </h3>
						<div class="panel accordBodyV" v-html="aparatus">	
						</div>					    		
						<!-- Theory -->
						<h3 class="accordion accordBtnV">Theory<span class="fa fa-chevron-right fontType-ico" style=""></span> </h3>
						<div class="panel accordBodyV" v-html="theory">						    		
						</div>		
						<!-- Requirment -->
						<h3 class="accordion accordBtnV" >Requirement<span class="fa fa-chevron-right fontType-ico" style=""></span> </h3>
						<div class="panel accordBodyV" v-html="requirment">						    		
						</div>		
						<p class="fontType-ico mt-2" style="font-size: 1.3em;padding: 0px 14px;">Instructor's Mock Experiment</p>
						<div class="mt-1" style="padding: 0px 14px;">
							<iframe width="100%" height="auto" src="https://www.youtube.com/embed/5Vc21hGJLpM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>														
						</div>

					</div>
					<div id="exercise" style="display: none; padding: 10px 14px;" v-html="exercise"></div>
					<div id="resources" style="display: none; padding: 10px 14px" v-html="resources" >resources</div>
				</div>
		</div>
		</div>	
	
</div>
</template>
<script>
	export default{

	 data:function() {
		    	return{
		    	proced:true,
		    	exerc:false,
		    	resour:false,
		    	show:false,
            	hide:true,
            	control:false,
            /*classObj:{ "color-red" : true } ,
            show:false,
            hide:true,
            show1:true,
            hide1:false,*/
		    	}
        },
        methods:{
        	toggleNavOffHover(){
        			                    		 
            	//control = false;
        	},
        	toggleNavOnHover: function(value){          
        		//this.control = true;
        		//alert(value);
        		this.show = !this.show;
        		this.hide= !this.show; 
               if (this.show){
            	    //this.show=true;                      
            		document.getElementById('expSideBar').classList.add('addSize');  
    	        	document.getElementById('mainExp').style.width= '62%';                    		 
	            		
                }else{              		
	            	document.getElementById('expSideBar').classList.remove('addSize');  	
	            		document.getElementById('mainExp').style.width= '88%';	
                }  
            },
        	toggller(e){
        		if (e == 'procedure'){
        			document.getElementById('exercise').style.display ='none';
        			document.getElementById('resources').style.display ='none';
        			document.getElementById('procedure').style.display ='block';
        			this.proced = true;
        			this.exerc = false;
        			this.resour = false;
        		}else if(e === 'exercise'){
        			document.getElementById('resources').style.display ='none';
        			document.getElementById('procedure').style.display ='none';
        			document.getElementById('exercise').style.display ='block';
        			this.proced = false;
        			this.resour = false;
        			this.exerc  = true;
        		}else if (e === 'resources') {
        			document.getElementById('exercise').style.display ='none';
        			document.getElementById('procedure').style.display ='none';
        			document.getElementById('resources').style.display ='block';
        			this.resour = true;
        			this.exerc  = false;
        			this.proced = false;
        		}
        	},
        	accordion(e){
        		console.log(e.target.nextElementSibling);
        	}
        },	
        
        created: function () {
		 
		  this.$eventBus.$on('toggleClick', data => {
		  	this.toggleNavOnHover();
		  })		  

		},

		beforeDestroy: function () {
		  this.eventBus.$off('toggleClick', this.toggleNavOnHover)		  
		},

         props: ['aim','aparatus','theory','requirment', 'exercise', 'resources'],
         mounted(){	       
         	
         var acc = document.getElementsByClassName("accordion");
			var i;

			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function(ev) {
			    closeAll(ev.target);
			    this.classList.toggle("accordActiv");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight) {
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    }
			  });
			}

			function closeAll(tar) {
			  var accs = document.querySelectorAll('.accordion');
			  for (var i = 0; i < accs.length; i++) {
			    if (accs[i] == tar) {
			      continue;
			    }
			    accs[i].classList.remove('accordActiv');
			    var panel = accs[i].nextElementSibling;
			    panel.style.maxHeight = null;
			  }
			} 
         }
	}

</script>
<style scoped>
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	/*@import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");*/
	.fontType-ico{		
		font-weight: 100;
	}
	.accordBtnV{
		display: flex;
		justify-content: space-between;
		width: 100%;
		padding: 10px 20px 10px 20px;
		font-family: 'Roboto';
		font-weight: 300;
		margin-bottom: 5px;
		background: rgba(40,35,65,.4);
		font-size: 0.95em;
		color: #fff;
	}

	.holder{
		color: #eee;
		font-family: 'Roboto', sans-serif;
		font-weight: 300; 
		font-size: 0.8em;
		height: 500px;		
		width: 100%;
		margin: 0px;
		padding: 0px !important;
		overflow-y: scroll;
	}
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
.addSize{
	width: 300px !important;
	transition: width 0.5s;

}
	.btnV{		
		color:#eee;
		font-family: calibri;
		font-size: 1em;
		cursor: pointer;
		border-bottom: 3px solid #2F274E;		
	}
	.btnV:nth-child(odd){
		padding: 5px 20px;
	}
	.btnV:nth-child(even){
		padding: 5px 0px;
	}
	.btnVActive{
	   border-bottom: 3px solid #fff;
	   transition: border-bottom 0.8s;
	}
	/* width */
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
p{
	text-align: justify;
}
.venobox{
	position: relative;		
	
}
.accordion {
  outline: none;
  transition: 0.4s;
  cursor: pointer;
  display: flex;
  justify-content: space-between;
}

.accordion:hover {
  background-color: #ADAABB !important; 
  color:#fff !important;
  text-shadow: 1px 2px 3px #000;
  font-weight: 500 !important;
}
.accordActiv{
background-color: #ADAABB !important; 
  color:#fff !important;
  text-shadow: 1px 2px 3px #000;
  font-weight: 500 !important;	
}

.panel {
  max-height: 0;
  overflow: hidden;
  transition: 0.2s ease-out;
  padding: 0px 20px;
  text-align: justify;
}



</style>