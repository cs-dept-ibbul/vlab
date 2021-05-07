<template>
	<div class="m-0 p-0 w-100">
		 <div class="row pd-lg-3 pd-sm-2  " style="width: 98%; margin: 50px auto;height: 75.5vh;overflow-y: scroll;">
     	<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">   
     		<p class="fw6 font2">Introduction</p>
     		<p class="text-justify font2 fw4" style="color: #666;font-size: 0.9em;">
     			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
     	   </p>

     		<p class="fw6 font2" style="font-size: 0.9em;">4 Prcaticals</p>
	    </div>
     	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-5">
     		<div style="width: 90%;height: 150px;border-radius: 9px;background: #333;" class="mx-auto shadow">
     			<iframe width="100%" class="rounded" height="auto" src="https://www.youtube.com/embed/5Vc21hGJLpM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		
     		</div>
     	</div>
     	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row ml-3"> 
     		<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 shadow bg-white p-4 pd-sm-2  row" style="border-radius: 24px;">     			
	     		<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mx-0 mt-0 mb-4 p-0 md-center ">
	     			<p class="fw6 font2">Summary</p>
					<h1 class="fw8 font mt-4 py-0" style="font-size: 6em;line-height: 0.8;">20</h1>	
					<p class="font fw3 mt-0 mb-0 py-0">Point Scored</p>
	     		</div>
	     		<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 m-0 p-0 d-flex  justify-content-between text-md-center text-sm-center">
	     			<span class="toberemoved" ></span>
	     			<div class="m-0 p-0 w-100 text-md-center text-sm-center">
	     				<p class="fw6 font2">In Progress</p>
	     				<div class="fw8 font mt-4 py-0 w-100 d-flex justify-content-between">	     			
     						<div class="lg-flex lg-flex-wrap sm-justify-center">
     							<span class="small-box"></span>
     							<div class="p-0 my-0 mx-2 d-flex flex-column">
     								<p class="fw8 font mt-0 mb-1">2/4</p>
     								<p class="fw3 my-0" style="color: #555;font-size: 0.9em;">Experiment</p>
     							</div>
     						</div>
     						<div class="lg-flex lg-flex-wrap sm-justify-center ml-4">
     							<span class="small-box"></span>
     							<div class="p-0 my-0 mx-2 d-flex flex-column">
     								<p class="fw8 font mt-0 mb-1">2/4</p>
     								<p class="fw3 my-0" style="color: #555;font-size: 0.9em;">Experiment</p>
     							</div>
     						</div>	     					
	     				</div>
	     				<div class="fw8 font mt-4 py-0 w-100 d-flex justify-content-between">	     		
     						<div class="lg-flex lg-flex-wrap sm-justify-center">
     							<span class="small-box"></span>
     							<div class="p-0 my-0 mx-2 d-flex flex-column">
     								<p class="fw8 font mt-0 mb-1">2/4</p>
     								<p class="fw3 my-0" style="color: #555;font-size: 0.9em;">Experiment</p>
     							</div>
     						</div>
     						<div class="lg-flex lg-flex-wrap sm-justify-center ml-4">
     							<span class="small-box"></span>
     							<div class="p-0 my-0 mx-2 d-flex flex-column">
     								<p class="fw8 font mt-0 mb-1">2/4</p>
     								<p class="fw3 my-0" style="color: #555;font-size: 0.9em;">Experiment</p>
     							</div>
     						</div>	     					
	     				</div>	     				     			
	     			</div>
	     		</div>
	     		<div class="w-100">
	     			<v-progress evalue='2' avalue='4'></v-progress>	
	     		</div>
     		</div>
     	</div>
     	<div class="w-100">
     		<br><br>
     		<div style="border-bottom: 1px solid #ccc;">
     			<div class="font2 fw4 systab systabActive">Experiment</div>
     			<div class="font2 fw4 systab">Resources</div>
     		</div>
     		<br><br>
     		<div class="d-flex">
     			<!-- start thread  -->
				<div class="p-0 thread" v-if="threadReady" >
					<v-thread :weeks="threadTrends" key='noew'></v-thread>
				</div>
     			<!-- end thread  -->

     			<!-- start thread joint  -->     		
     				<div class="timelineContainer">
     					<div v-for="(weeks, index) in weeksExp">     					     			     	  	
	     					<div  :style="[index == 0? {'margin-top':'30px'}:{'margin-top':'70px'}]">	         				     							
								<div v-for="(experiment,innerindex) in weeks.experiments"  v-bind:class="{'my-0':innerindex ==0, 'my-3':index !=0}" class="d-flex align-items-center timelineBox">     					     			
									<div class="p-3  bg-white shadow-sm mb-3 timelineBoxContainer" style="border-radius: 9px;">
										<div class="d-flex justify-content-between align-items-center">
											<div class="font">
												<span class="fw4 sys-bg-success fs1 p-2 rounded">{{weeks.course.code}}</span>
												<p class="fw4 pt-2 pb-0 mb-1" >Experiment {{innerindex+1}}</p>
												<div class="fs1 font2" style="color: #888;">
													<div class="d-inline-block">
														<span class="fw6">Date:</span> <span>{{weeks.date_open}} </span>
													</div>
													<span class="d-inline-block mx-2">-</span>
													<div class="d-inline-block"><span>{{weeks.date_close}}</span></div>
												</div>
											</div>
											<div>					     		
												<span class="timeline-name-status" v-if="checkStatus(experiment)">Completed</span>	
												<a  v-else :href="'/'+experiment.experiment.page" class="text-success fs1 fw3 timeline-name-status">Start</a>
												<!-- on mobile -->
												<div  v-if="checkStatus(experiment)" class="timeline-name-status-mobile">		
														<span class="fs8 fa fa-check-circle t-success"></span>				
												</div>			
												<a  v-else :href="'/'+experiment.experiment.page" class="text-success fs1 fw3 timeline-name-status-mobile"><span class="fa fa-play text-success fs1"></span></a>
												<!-- end on mobile -->
											</div>
										</div>				
									</div>
									<div  v-if="checkStatus(experiment)" class="pl-2 timeline-name-status">		
										<span class="fs8 fa fa-check-circle t-success"></span>				
									</div>
								</div>			
		     				</div>
					
	     				</div>
     			<!-- end thread joint  -->     			

					</div>
			</div>
		</div>
		</div>

   </div>	
</template>


<script>
	import thread from './threadTrends.vue';
	export default{
		components:{
			'v-thread': thread
		},
		data(){
			return{
				threadTrends:[],
				threadReady: false,
				weeksExp:[
					{
						title:'week 1',
						date_open:'11-12-2020',
						date_close:'16-12-2020',
						access_close:'16-12-2020',
						limitation:'16-12-2020',
						course:[
							{
								code: 'Phy 107'
							}
						],
						experiments:[
				 			{
				 				id:1,
				 				name:'micrometer',
				 				page:'micrometer',
				 				experiment_results:[{completion_status:'Completed'}]
				 			},				 			
				 			{
				 				id:2,
				 				name:'vernier-caliper',
				 				page:'verniercaliper',
				 				experiment_results:[{completion_status:'Not Completed'}]
				 			},
			 			]
			 		},
			 		{
			 			title:'week 2',
			 			date_open:'11-12-2020',
			 			date_close:'16-12-2020',
			 			access_close:'16-12-2020',
						limitation:'16-12-2020',
						course:[
							{
								code: 'Phy 107'
							}
						],
			 			experiments:[
				 			{
				 				id:2,
				 				name:'vernier-caliper',
				 				page:'verniercaliper',
				 				experiment_results:[{completion_status:'Not Completed'}]
				 			}
			 			]
			 		},
			 		{
			 			title:'week 3',
			 			date_open:'11-12-2020',
			 			date_close:'16-12-2020',
			 			access_close:'16-12-2020',
						limitation:'16-12-2020',
						course:[
							{
								code: 'Phy 107'
							}
						],
			 			experiments:[
				 			{
				 				id:2,
				 				name:'vernier-caliper',
				 				page:'verniercaliper',
				 				experiment_results:[{completion_status:'Completed'}]
				 			},
			 			]
			 		},			 
				 ]
				
			}
		},
		methods:{
			checkStatus: function(experiment){
				if(experiment.experiment_results.length>0){					
					if (experiment.experiment_results.completion_status =='Completed'){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			},
			checkExperimentsStatus:function(experiments){
				let arr = [];
				for(let i = 0; i < experiments.length; i++) {
					if(experiments[i].experiment_results.length!=0){								
						if (experiments[i].experiment_results.completion_status == 'Completed') {
							arr.push(1)
						}else{
							arr.push(0)						
						}
					}
					else{
						arr.push(0)
					}
				}
				return arr;
			},
			checkCompletionStatus:function(experiments){
				let status = 1;
				for(let i = 0; i < experiments.length; i++) {						
					if(experiments[i].experiment_results.length!=0){					
						if(experiments[i].experiment_results.completion_status != 'Completed'){
							status = 0;
						}
					}					
				}
				return status;
			}
		},
		mounted(){
			this.$nextTick(function(){
				 setInterval(function() {
				 	if ($(window).width() <1000) {
				 		$('.toberemoved').hide();
				 	}else{
				 		$('.toberemoved').show();	 		
				 	}
				 }, 1000);
			})
		},
		async created(){
			
			let pathname = location.pathname.split('/');
        	let course_id = pathname[pathname.length -1];
			this.weeksExp = await this.axiosGetByParams('api/works/student_task',{'user_id':this.currentUser.id, 'course_id':course_id});			
			for (let i = 0; i < this.weeksExp.length; i++) {				
				this.threadTrends[i] = [
					this.weeksExp[i].title,
					this.checkCompletionStatus(this.weeksExp[i].experiments),
					this.checkExperimentsStatus(this.weeksExp[i].experiments)
				]
				if (i == this.weeksExp.length-1) {
					this.threadReady = true;
				}
			}
			//console.log(this.threadTrends)
			/*[1,1,[1,1,1]],//sub array is for exercises in the week 1=>completed, 0=> not completed
	 	 	[2,1,[1,0]],
	 	 	[3,0,[0]],
	 	 	[4,0,[0]]*/
		}
	}
</script>
<style>	
</style>