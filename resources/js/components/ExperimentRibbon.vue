<template>
	<div style="display: flex;justify-content: space-between; background: #40356E;">		
		<span style=" width: 30%;display: flex;flex-wrap: wrap;align-items: center; ">			
			<span class="fa fa-chevron-right text-dark ml-4 pl-2 tbtn" v-if="btnState==true" @click="toggleExperimentGuider"></span>
			<span class="fa fa-chevron-left text-dark ml-4  tbtn" @click="toggleExperimentGuider" v-else></span>
		</span>
		<div style="display: flex;justify-content: space-between; background: #40356E;width: 70%;color: white;">
			<div style="padding: 6px;">				
				<span class="fa fa-flask fa-ico activeIco" @click="toggleRightNav" rel="tools"></span>
				<span class="fa fa-table fa-ico" @click="toggleRightNav" rel="resulttable"></span>
				<span class="fa fa-area-chart fa-ico" @click="toggleRightNav" rel="resultgraph"></span>
				<span class="fa fa-question-circle-o fa-ico" @click="toggleRightNav" rel="userhelp"></span>
				<span class="fa fa-file-text-o fa-ico" @click="toggleRightNav" rel="tools"></span>
			</div>
			<div style="padding: 6px;margin-right: 60px;" v-if="startExperiment">				
				<span @click="submit('test')" v-if="mode=='test'" class="fa fa-save fa-ico"></span>				
				<span @click="submit('test')"  v-if="mode=='practice'" class="text-white submit">Submit</span>				
			</div>
		</div>
	</div>
</template>
<script>
	export default{

	 data:function() {
	    	return{
	    	btnState:true,
	    	startExperiment:false,
	    	resultData: null,
	    	weekly_work_id:null,
	    	timeStart:0,
	    	timeleft:0
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
			toggleRightNav2: function(e){
				$('.fa-ico').removeClass('activeIco');
				let rel;
        		$('.fa-ico').each(function(){
        			rel = $(this).attr('rel');
        			if (rel == e) {
        				$(this).addClass('activeIco')
        			}
        		});
			   this.$eventBus.$emit('rightNavtoggleClick',{text:e});
			   this.$eventBus.$emit('toggleRightNav2',{text:e});
			},
			toggleExperimentGuider: function () {
//        		alert(this.navState);
				this.btnState = !this.btnState;
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
			},			
			submit(a){
				var $this = this;
				let value, header, bdy,emptyChk='',
				resultData = {};
				this.resultData = [];

				/*get result data*/				

				$('.main_result_table').each(function(index){
					resultData.title = $(this).prev().text();
					resultData.head=  [];
					resultData.data=  [];		
					
					/*get table headers*/
					header = [];
					$(this).find('th').each(function(index2){
						header.push($(this).text());
					});				
					resultData.head = header

					/*get table rows*/
					$(this).find('tr').each(function(index2){						
						bdy = [];						
						$(this).find('.resultReading').each(function(index3){						
							value = $(this).val();
							bdy.push(value);		
							if (index3 != 0) {
								if (value!=''){emptyChk=1;}					
							}
						});											
						resultData.data[index2] = bdy;
					});
					$this.resultData.push(resultData);

				});

				/*console.log(JSON.stringify(this.resultData).length);
				console.log(this.resultData);*/
				/*validate result data*/
				if (emptyChk == '' ){
					Swal.fire({
						title:'Please enter your data'
					}).then(result=>{
						if (result.value){
							$this.toggleRightNav2('resulttable');
						}
					})
					return 0;
				}

				/*submit result data*/
				if (a=='test') {

					Swal.fire({
						title: 'Are you sure you want to submit',
						showCancelButton:true,
						confirmButtonText: 'Yes',
						cancelButtonText: 'No',
						cancelButtonColor: '#666'
					}).then(result=>{
						if(result.value){
							if ($this.weekly_work_id != null){
								let formobj = {
									user_id:$this.currentUser.id,
									weekly_work_id:$this.weekly_work_id,
									result_json: JSON.stringify($this.resultData),
									time_started:$this.timeStart,
									time_submitted:new Date().toLocaleString(),
									time_left:$this.timeleft}
								$this.axiosGetByParamsWithMessage($this.baseApiUrl+'experiments/save_experiment_result',formobj, $this,'Saved !');
							}

						}
					})
				}
			}
        },	
          props:{
        	mode:{
        		type:String,
        		default: function(){
        			return 'practice';
        		},
        	}
        },       
         events :{
         	'rightNavtoggleClick':'rightNavtoggleClick'
         },
          events :{
         	'toggleClick':'toggleClick'
         },
         mounted(){	
         	this.$nextTick(function(){         	
	         
	         	if (this.startExperiment){	         	
		         	
	         	}         			         	
         	})
         },
          created: function () {
		 	let pathname = location.pathname.split('/')
        	this.weekly_work_id = pathname[pathname.length -1];
	  		
	  		this.$eventBus.$on('listeningToTimeLeft', data => {	  			
	  			this.timeleft = data;
	  		});
        	
		  this.$eventBus.$on('startExperiment', data => {
		  	this.startExperiment = true;
		  	this.timeStart= new Date().toLocaleString();
		  })		  

		},

		beforeDestroy: function () {
		  this.eventBus.$off('toggleClick', this.toggleNavOnHover)		  
		},
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
	.submit:hover{
		color: #00b96b;
	}
	.submit:active{
		font-weight: bold;
	}
	.submit{
		cursor: pointer;
		user-select: none;
	}
</style>