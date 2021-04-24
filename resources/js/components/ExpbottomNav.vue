<template>
	<div style="width:100%;background: #2F274E;color: #fff; padding: 0px 39px;"  class="d-flex flex-wrap">
		<div class=" w-25">
			<!-- <span class="fa fa-arrows-alt mr-5 pr-4" style="font-size: 1.4em;padding-top: 5px;"></span> -->
			<span class="fa fa-arrows-alt mr-5 pr-4"  @click="expandVideo"  style="font-size: 1.5em;padding-top: 5px;color:white;cursor: pointer;"></span>			
		</div>
		<span  class="w-75">			
		</span>
	</div>
</template>
<script>
	export default{

	 data:function() {
		    	return{		    	
            /*classObj:{ "color-red" : true } ,
            show:false,
            hide:true,
            show1:true,
            hide1:false,*/            
		    	}
        },
        methods:{
         expandVideo:function(){

         },
         submit: function(a){
         		alert(a);
         }

        },	
       
	}

</script>
<style scoped>
	div{
		font-family: 'Roboto', sans-serif;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.start{
		font-size: 0.9em;
		font-family: Robot;
		display: flex;
		flex-wrap: wrap;
		align-items: center;
		border-radius: 10px;
		cursor: pointer;
		padding: 5px;
	}
	.start:hover{
			background:#EBEAEF;
			color:#50496E;
	}
</style>