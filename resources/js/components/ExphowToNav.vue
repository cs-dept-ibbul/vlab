<template>
	<div style="width:100%;">
		<div style="display: flex;background: #2F274E;">
			<div v-bind:class="{btnVActive:intro}" class="btnV"  @click="toggller('introduction')">Introduction</div>
			<div v-bind:class="{btnVActive:instru}"  class="btnV" @click="toggller('instruction')">Instruction</div>
			<div v-bind:class="{btnVActive:proced}"  class="btnV"  @click="toggller('procedure')">Procedure</div>
		</div>
		<div style="background: #50496E;">
				<div style="color: #eee;font-family: 'Roboto', sans-serif;font-weight: 300; font-size: 0.8em;padding: 25px 20px;height: 500px;overflow-y: scroll;width: 97%;">
					<div id="introduction" style="">
							
						<p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
						<h4>PREPARATION OF LABORATROY REPORT</h4>
						<p>lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>

						<h4>Watch How To</h4>
						<iframe width="100%" height="auto" src="https://www.youtube.com/embed/5Vc21hGJLpM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>							

					</div>
					<div id="instruction" style="display: none"></div>
					<div id="procedure" style="display: none">procedures</div>
				</div>
		</div>
	</div>
</template>
<script>
	export default{

	 data:function() {
		    	return{
		    	intro:true,
		    	instru:false,
		    	proced:false,
            /*classObj:{ "color-red" : true } ,
            show:false,
            hide:true,
            show1:true,
            hide1:false,*/
		    	}
        },
        methods:{
        	toggller(e){
        		if (e == 'introduction'){
        			document.getElementById('instruction').style.display ='none';
        			document.getElementById('procedure').style.display ='none';
        			document.getElementById('introduction').style.display ='block';
        			this.intro = true;
        			this.instru= false;
        			this.proced= false;
        		}else if(e === 'instruction'){
        			document.getElementById('introduction').style.display ='none';
        			document.getElementById('procedure').style.display ='none';
        			document.getElementById('instruction').style.display ='block';
        			this.intro = false;
        			this.proced= false;
        			this.instru= true;
        		}else if (e === 'procedure') {
        			document.getElementById('introduction').style.display ='none';
        			document.getElementById('instruction').style.display ='none';
        			document.getElementById('procedure').style.display ='block';
        			this.intro = false;
        			this.instru= false;
        			this.proced= true;
        		}
        	}
        },	
	}

</script>
<style scoped>
	div{
		font-family: 'Roboto', sans-serif;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.btnV{
		
		color:#eee;
		font-family: calibri;
		font-size: 1em;
		cursor: pointer;
		border-bottom: 3px solid #2F274E;
		/*letter-spacing: px;*/
	}
	.btnV:nth-child(odd){
		padding: 6px 20px;
	}
	.btnV:nth-child(even){
		padding: 6px 0px;
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
</style>