<template>
	<div class="w-100">
		<div v-for="(week,index) in weeks" class=""><!-- loop weekly -->
			<div class="d-flex flex-wrap-center timelineSM" style="margin-bottom: 20px;" v-if="weeks[index][1] != 0">
				<span class="fs1 w10">Week {{index+1}}</span>
				<span class="fa fa-check-circle fs3 text-success"></span>				
			</div>
			<div class="d-flex flex-wrap-center timelineSM-o" style="margin-bottom: 20px;"  v-else>				
				<span class="fs1 w10">Week {{index+1}}</span>
				<span class="syscircle-o-l"></span>				
			</div>
			
			<div v-for="(exp, i) in weeks[index][2]"> 
				<div class="d-flex flex-wrap-center">		
					<span class="fs1 w10"></span>
					<span v-if="week[i+1]==1">
						<span class="syscircle timelineX"></span>						
					</span>
					<span v-else>
						<span class="syscircle-o timelineX-o"></span>												
					</span>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default{

	 data:function() {
		    return{
		    	numC:0,		                
		   	}
        },
        methods:{
        	toggleNavOffHover(){
        		
        	},
        	addactivate(e){
        		

        	},
        	changeApparatus(tool){


        	},
        	toggleNavOnHover: function(value){          
        		
            },
        	toggller(e){

        	},

        },	
        
        created: function () {
        	//console.log(this.week);
			
		},

		beforeDestroy: function () {
		  //this.eventBus.$off('rightNavtoggleClick', this.toggleNavOnHover)		  
		},
        props:{
           weeks: Array,
        },        
        mounted(){
        	console.log(this.weeks);
        }		
	}

</script>
<style scoped>
	div{
		font-family: 'Roboto', sans-serif;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.syscircle{
		width: 12px !important;
		height: 12px !important;
		border-radius: 50%;
		background: #00b96b;
		display: block;
		margin: 0px 0px 0px 12px;
	}
	.syscircle-o{
		width: 12px;
		height: 12px;
		border-radius: 50%;
		border: 2px solid #999;
		display: block;	
		margin-left:12px;
	}
	.syscircle-o-l{
		width: 22px;
		height: 22px;
		border-radius: 50%;
		border: 2px solid #999;
		display: block;	
		margin-left: 5px;
	}
	.fs3{
		font-size: 1.7em;
	}
	.fs1{
		font-family: 'Roboto', sans-serif;
		font-size: 0.9em;
		color: #888;
		font-weight: 300;
	}
	.flex-wrap-center{
		flex-wrap: wrap;
		align-items: center;
	}
	.w10{
		width: 60px;
	}
	.timelineX{
		margin-top: 10px; 
		margin-bottom: 120px; 
	}
	.timelineX-o{
		margin-top: 10px; 
		margin-bottom: 120px; 
	}
	.timelineSM:before{
		content: "";
		height: 40px;
		width: 2px;
		background: #00b96b;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineSM-o:before{
		content: "";
		height: 40px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineX-o:before{
		content: "";
		height: 140px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineX:before{
		content: "";
		height: 132px;
		width: 2px;
		background: #00b96b;		
		display: block;
		position: relative;
		top: 10px;		
		left: 5px;
	}
	.timelineX-o:before{
		content: "";
		height: 130px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 10px;		
		left: 3px;
	}
</style>
