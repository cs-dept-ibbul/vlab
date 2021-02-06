<template>
	<div style="display: flex;justify-content: space-between; background: #2F274E;">		
		<span style=" width: 30%; "></span>
		<div style="display: flex;justify-content: space-between; background: #2F274E;width: 70%;color: white;">
			<div style="padding: 6px;">				
				<span class="fa fa-flask fa-ico active-ico"></span>
				<span class="fa fa-table fa-ico"></span>
				<span class="fa fa-area-chart fa-ico"></span>
				<span class="fa fa-question-circle-o fa-ico"></span>
				<span class="fa fa-file-text-o fa-ico"></span>
			</div>
			<div style="padding: 6px;margin-right: 60px;">
				<span class="fa fa-save fa-ico"></span>				
			</div>
		</div>
	</div>
</template>
<script>
	export default{

	 data:function() {
	    	return{
	    
	    	}
        },
        methods:{
        
        },	
         props: [],
         mounted(){	
         }
	}

</script>
<style scoped>
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	/*@import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");*/

	.fa-ico{
		margin: 0px 5px;
		padding: 2px 5px;
		border-radius: 5px;
		color:#eee;
		font-size: 1.2em;		
		cursor: pointer;
		margin: 0px 5px;
	}
	.fa-ico:hover{
		background: #EBEAEF;
		color:#2F274E;
	}
	.active-ico{
		background: #EBEAEF;
		color:#2F274E;

	}
</style>