<template>
	<div style="display: flex;justify-content: space-between; background: #2F274E;">		
		<span style=" width: 30%;display: flex;flex-wrap: wrap;align-items: center; ">			
			<span class="fa fa-chevron-right text-dark ml-4 pl-2 tbtn" v-if="btnState==true" @click="toggleExperimentGuider"></span>
			<span class="fa fa-chevron-left text-dark ml-4  tbtn" @click="toggleExperimentGuider" v-else></span>
		</span>
		<div style="display: flex;justify-content: space-between; background: #2F274E;width: 70%;color: white;">
			<div style="padding: 6px;">				
				<span class="fa fa-flask fa-ico activeIco" @click="toggleRightNav" rel="tools"></span>
				<span class="fa fa-table fa-ico" @click="toggleRightNav" rel="resulttable"></span>
				<span class="fa fa-area-chart fa-ico" @click="toggleRightNav" rel="resultgraph"></span>
				<span class="fa fa-question-circle-o fa-ico" @click="toggleRightNav" rel="userhelp"></span>
				<span class="fa fa-file-text-o fa-ico" @click="toggleRightNav" rel="tools"></span>
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
	    	btnState:true,
	    	}
        },
        methods:{
        	toggleRightNav: function (e) {      
        		$('.fa-ico').removeClass('activeIco');
        		e.target.classList.add('activeIco');
			   this.$eventBus.$emit('rightNavtoggleClick',{text:e.target.getAttribute("rel")});
//        		alert(this.navState);
        		/*this.navState = !this.navState;
			   */
			    //this.newTodoText = ''
			},
			toggleExperimentGuider: function () {
//        		alert(this.navState);
				this.btnState = !this.btnState;
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
			}
        },	
         props: [],
         events :{
         	'rightNavtoggleClick':'rightNavtoggleClick'
         },
          events :{
         	'toggleClick':'toggleClick'
         },
         mounted(){	
         }/*,
          created: function () {
		 
		  this.$eventBus.$on('toggleClick', data => {
		  	this.toggleNavOnHover();
		  })		  

		},

		beforeDestroy: function () {
		  this.eventBus.$off('toggleClick', this.toggleNavOnHover)		  
		},*/
	}

</script>
<style scoped>
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	/*@import url("https://use.fontawesome.com/releases/v5.13.0/css/all.css");*/
    .tbtn:active{
    	box-shadow: inset 1px 2px 3px #111;
    }
    .tbtn{
    	display: flex;
    	
    	flex-wrap: wrap;
    	align-items: center;
    	width:25px;
    	height: 25px; 
    	border-radius: 50%;
    	background: #eee;
    	cursor: pointer;

    }
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
	.activeIco{
		background: #EBEAEF;
		color:#2F274E;

	}
</style>