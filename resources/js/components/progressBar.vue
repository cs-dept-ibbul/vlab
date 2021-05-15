<template>
	<div style="width: 100%;">
		<div class ="progress mt-4" style="width: 100%;">			
			<div v-bind:style="{width:percentage +'%'}" class="p-success progress-bar"></div>
			<span style="position: absolute;right: 20px;">{{percentage.toFixed(0)}}% <span class="hideOnMobile"> Complete </span></span>					
		</div>
		<!-- 
		<span v-if="percentage==100">
			<div class ="progress mt-4" style="width: 100%;">
				<div v-bind:style="{width:percentage +'%'}" class="p-success progress-bar"></div>
				<span style="position: absolute;right: 20px;">{{percentage}}% Complete</span>				
			</div>
		</span>
		
		<span v-if="percentage >49" class="m-0 p-0">
			<span v-if="percentage<100" class="m-0 p-0">
				<div class ="progress mt-4" style="width: 100%;">
					<div v-bind:style="{width:percentage +'%'}" class="p-success progress-bar m-0"></div>
					<span style="position: absolute;right: 20px;">{{percentage}}% Complete</span>				
				</div>
			</span>
		</span>

		<span v-if="percentage < 50">
			<span v-if="percentage>0"> 				
				<div class ="progress mt-4" style="width: 100%;">
					<div v-bind:style="{width:percentage +'%'}" class="p-danger progress-bar"></div>
					<span style="position: absolute;right: 20px;">{{percentage}}% Complete</span>				
				</div>
			</span>
		</span>
			
		<span v-if="percentage === 0">	
			<div class ="progress mt-4" style="width: 100%;">			
				<div v-bind:style="{width:percentage +'%'}" class="p-success progress-bar"></div>
				<span style="position: absolute;right: 20px;">{{percentage}}% Complete</span>					
			</div>
		</span> -->
	</div>
		
</template>
<script>
	export default{

	 data:function() {
		   	return{		    	
            	stage : 0,
            	percentage:0
		    }
        },
        methods:{
         expandVideo:function(){
         },
     	},
         created(){
         	this.percentage  = (parseInt(this.evalue)/parseInt(this.avalue))* 100;
         	//console.log(this.percentage);
         	if (this.percentage == 100) {

         	}
				
         },
         props:['evalue','avalue'],
         mounted(){
         	let $vm = this;
         	this.$nextTick(function(){
         	
         	})
         }

        	
	}

</script>
<style scoped>
	div{
		font-family: 'Roboto', sans-serif;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.progress {
    background: #eee !important;
    border-radius: 13px;    
    width: 87% !important;
    padding: 0px;
    max-height: 7px;
	}
	.progress-bar{
    border-radius: 13px;
    padding: 1px;
    max-height: 7px;
    padding: 0px;
    margin: 0px;
    position: relative;
}
.p-danger{
  background: #ff0000 !important;
}
.p-warning{
  background: orange !important; 

}
.p-success{    
    background: #00b96b !important;  
}
</style>