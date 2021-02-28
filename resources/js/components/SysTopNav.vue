<template>
	<div style="margin:0; padding: 18px 20px 18px 20px;display: flex;justify-content: space-between;width: 100%;background: #f0f0f0;">
		<div style="display: flex;flex-wrap: wrap;align-items: center; ">
			<!-- <span @click="toggleExperimentGuider" style="font-size: 1.4em;cursor: pointer;" class="fa fa-align-justify mr-3"></span> -->
			<span  style="font-size: 1.4em;cursor: pointer;" class="fa fa-align-justify mr-3"></span>
			<span style="font-weight: 500;font-size: 1em;">{{title}}</span>
		</div>
		<div style="display: flex;flex-wrap: wrap;align-items: center;">
			<span class="fa fa-user mr-2"></span>
			<span style="font-size: 0.9em; font-weight: 300;">{{username}}</span>
			<span class="fa fa-chevron-down ml-2"></span>
		</div>
	</div>
</template>

<script>
	export default{

	 data:function() {
	    	return{
	    	 navState:false
	    	}
        },
        methods:{
        	toggleExperimentGuider: function () {
//        		alert(this.navState);
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
			}
        },	
        
         props: ['username','title'],
         mounted(){	         	
         },
         events :{
         	'toggleClick':'toggleClick'
         }

	}
</script>
<style scoped>
	div{
		font-family: 'Roboto', sans-serif;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	
</style>