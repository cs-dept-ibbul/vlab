<template>
	<div class="m-0 p-0 w-100">
		<div style="position: relative;top:10px;left:50px;z-index: 100;text-transform: uppercase;" class="font2 fs1 w-75">
			::My Courses Review
			<span>
				<i class="fa fa-angle-double-right"></i>
				{{course_with_exp.code}}		
			</span>
		</div>
		<div id="wideArea"></div>		
		 <div class="row pd-lg-3 pd-sm-2  " style="width: 98%; margin: 50px auto;height: 75.5vh;overflow-y: scroll;">
     	<div class="col-lg-7 col-md-8 col-sm-12 col-xs-12">   
     		<p class="fw6 font2">Introduction</p>
     		<v-loader type='line' v-if="loaderState"></v-loader>
     		<p v-if="!loaderState" class="text-justify font2 fw4" style="color: #666;font-size: 0.9em;">
     			{{course_with_exp.description}}
     	   </p>

     		<!-- <p class="fw6 font2" style="font-size: 0.9em;">{{course_with_exp.course_experiment.length}} Prcaticals</p> -->
	    </div>
     	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 mb-5">
     		<div style="width: 90%;height: 150px;border-radius: 9px;background: #333;" class="mx-auto shadow">
     			<div class="videoContainer" v-if="!loaderState && course_with_exp.video_url != null" id="smallArea">
					<video class="mx-auto" :data-id="youtubeID(course_with_exp.video_url)"></video>
				</div>
     		</div>
     	</div>
     	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row ml-3"> 
     		<div class="col-lg-10 col-md-12 col-sm-12 col-xs-12 px-0 row bg-white shadow" style="border-radius: 24px;">     			
	     		<div class="col-lg-12 text-center bg-info text-white rounded ">
	     			<span class="fw6 font2">Summary</span>
	     		</div>
	     		<div class="col-lg-6 col-md-6 p-3 mb-3 col-sm-6 col-xs-6 mx-0 mt-0 p-0 md-center ">
					<h1 class="fw8 font py-0 text-center" style="font-size: 3em;line-height: 0.8;">{{weeksExp.length}}</h1>	
					<p class="font fw3 mt-0 mb-0 py-0 text-center">Total Task</p>
	     		</div>
	     		<div class="col-lg-6 col-md-6 p-3 mb-3 col-sm-6 col-xs-6 mx-0 mt-0 p-0 md-center ">	     			
					<h1 class="fw8 font py-0 text-center" style="font-size: 3em;line-height: 0.8;">{{avalue}}</h1>	
					<p class="font fw3 mt-0 mb-0 py-0 text-center">Total Experiments</p>
	     		</div>
	     		<!-- <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 m-0 p-0 d-flex  justify-content-between text-md-center text-sm-center">
	     			<span class="toberemoved" ></span>
	     			<div class="m-0 p-0 w-100 text-md-center text-sm-center">
	     				<p class="fw6 font2"><span style="text-transform: uppercase;">{{course_with_exp.code}}</span> In Progress</p>
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
	     		</div> -->
	     		<div class="col-lg-12" style="position:absolute; bottom:10px;">
					<v-progress :evalue="evalue" :avalue="avalue" v-if="avalue !=0" ></v-progress>					
	     			<!-- <v-progress evalue='2' avalue='4'></v-progress>	 -->
	     		</div>
     		</div>
     	</div>
     	<div class="w-100">
     		<br><br>
     		<div style="border-bottom: 1px solid #ccc;">
     			<div class="font2 fw4 systab" v-bind:class="{systabActive:minitab=='experiments'}"  @click="minitab = 'experiments'">Experiment</div>
     			<div class="font2 fw4 systab" v-bind:class="{systabActive:minitab=='resources'}" @click="minitab ='resources'" >Resources</div>
     		</div>
     		<br><br>
     		<div class="d-flex" v-if="minitab=='experiments' && weeksExp.length >0">
     			<!-- start thread  -->     			
				<div class="p-0 thread" v-if="threadReady" >
					<v-thread :weeks="threadTrends" key='noew'></v-thread>
				</div>
     			<!-- end thread  -->

     			<!-- start thread joint  -->     		
     				<div class="timelineContainer" >
     					<div v-for="(weeks, index) in weeksExp">     					     			     	  	     						
	     					<div  :style="[index == 0? {'margin-top':'30px'}:{'margin-top':'70px'}]">	         				     							
								<div v-for="(experiment,innerindex) in weeks.experiments"  v-bind:class="{'my-0':innerindex ==0, 'my-3':index !=0}" class="d-flex align-items-center timelineBox">     					     			
									<div class="p-3  bg-white shadow-sm mb-3 timelineBoxContainer" style="border-radius: 9px;">
										<div class="d-flex justify-content-between align-items-center">
											<div class="font">
											<span class="fw4 fs1 p-2 rounded" v-bind:class="{'sys-bg-success':!weeks.expired,'sys-bg-danger':weeks.expired}">{{weeks.course.code}}
												</span>
												<p class="fw4 pt-2 pb-0 mb-1" >Experiment {{innerindex+1}}</p>
												<div class="fs1 font2" style="color: #888;">
													<div class="d-inline-block">
														<span class="fw6">Date:</span> <span>{{weeks.date_open}} </span>
													</div>
													<span class="d-inline-block mx-2">-</span>
													<div class="d-inline-block"><span>{{weeks.date_close}}</span></div>
												</div>
											</div>
											<div class="text-right">					     		
												<span class="timeline-name-status" v-if="checkStatus(experiment)">Completed
												</span>	
												<span v-else>
													<a v-if="!weeks.expired" :href="'/'+experiment.page+'/'+experiment.weekly_experiment_work_id" class="text-success fs1 fw3 timeline-name-status">Start</a>
													<span v-else class="closeMsg text-right">Closed</span>
												</span>
												<!-- on mobile -->
												<div  v-if="checkStatus(experiment)" class="timeline-name-status-mobile">		
														<span class="fs8 fa fa-check-circle t-success"></span>				
												</div>			
												<a  v-else :href="'/'+experiment.page+'/'+experiment.weekly_experiment_work_id" class="text-success fs1 fw3 timeline-name-status-mobile"><span class="fa fa-play text-success fs1"></span></a>
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
			<div v-if="weeksExp.length >0" v-show="minitab=='resources'" class="row" style="min-height: 500px;">
				<div v-for="resource in weeksExp[0].course.course_resources" tabindex="1" class="col-lg-4 col-md-3 col-sm-6 col-sm-12 resource">
					
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='image'" >
						<center>
							<img :src="'/'+resource.resourceUrl" width="80%" height="150px">						
						</center>
					</div>
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='doc'" >
						<center>
							<img src="/images/docx.png" width="80%" height="150px">						
						</center>
					</div>
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='vid'" >
						<center>
							<img src="/images/vid.jpg" width="80%" height="150px">						
						</center>
					</div>
					<div class="w-100 rounded shadow-sm bg-white p-2" v-if="resoursType(resource.resourceUrl)=='other'" >
						<center>
							<img src="/images/file.png" width="80%" height="150px">						
						</center>
					</div>

					<div class="resource-caption text-center py-2 font fw5 w-100">
						<div class="overlaytext">
							{{resource.caption}}							
							<br>
							<a class="bg-warning text-white button btn-sm" :href="resource.resourceUrl">Download <i class="fa fa-cloud-download text-white"></i> </a>
						</div>		
					</div>
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
				loaderState:true,
				course_with_exp:[],
				minitab:'experiments',
				evalue:0,
				avalue:0,
				weeksExp:[
					/*{
						title:'week 1',
						date_open:'11-12-2020',
						date_close:'16-12-2020',
						access_close:'16-12-2020',
						limitation:'16-12-2020',
						course:[
							{
								code: 'Phy 107',
								description:'',
								video_url:'',
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
			 			*/	 
				 ]
				
			}
		},
		methods:{
			changeTab:function(tab){					
				this.mintab = tab;
			},
			resoursType(url){				
				let urltype = url.split('.')[url.split('.').length -1];
				
				let image = ['jpg', 'png','gif', 'jpeg'];
				let doc = ['doc', 'docx','pdf'];
				let vid = ['mp4', 'mpeg','3gp'];
				if (image.includes(urltype)){
					return 'image';
				}else if(doc.includes(urltype)){
					return 'doc'
				}else if(vid.includes(urltype)){
					return 'video'
				}else {
					return 'other'
				}
			},		
			checkStatus: function(experiment){				
				if(experiment.experiment_results.length!=0){					
					if (experiment.experiment_results.completion_status =='Completed'){
						return true;
					}else{
						return false;
					}
				}else{
					return false;
				}
			},
			dateCheck(date1,date2){
				function parseDate(str) {
				    var mdy = str.split('/');
				    return new Date(mdy[2], mdy[0]-1, mdy[1]);
				}

				function datediff(first, second) {
				    // Take the difference between the dates and divide by milliseconds per day.
				    // Round to nearest whole number to deal with DST.
				    return Math.round((second-first)/(1000*60*60*24));
				}
				return datediff(parseDate(date1), parseDate(date2));
			},
			checkExperimentsStatus:function(experiments){
				let arr = [];
				for(let i = 0; i < experiments.length; i++) {
					if(experiments[i].experiment_results.length!=0){														
						if (experiments[i].experiment_results[0].completion_status == 'Completed') {
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
						if(experiments[i].experiment_results[0].completion_status != 'Completed'){
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
			this.weeksExp = await this.axiosGetByParams('api/works/student_task2',{'user_id':this.currentUser.id, 'course_id':course_id});		        	
			this.course_with_exp = await this.axiosPost('api/courses/course_experiments',{course_id:course_id});			
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
			this.loaderState = false;
				let $this = this;
				setTimeout(function() {					
					$this.web_player();
					$('.videoContainer').dblclick(function(){						
						$this.expandVideo();
					});
				}, 500);
				var count =0, t=0;
				for(var i =0; i< this.weeksExp.length; i++){								
					for (var j= 0; j < this.weeksExp[i].experiments.length; j++) {											
						t++;
						if(this.weeksExp[i].experiments[j].experiment_results.length > 0){							
							count+=1;							
						}
					}
				}				
				this.evalue = count;
				this.avalue = t;

			//console.log(this.threadTrends)
			/*[1,1,[1,1,1]],//sub array is for exercises in the week 1=>completed, 0=> not completed
	 	 	[2,1,[1,0]],
	 	 	[3,0,[0]],
	 	 	[4,0,[0]]*/
		},
		props:['publicPath']
	}
</script>
<style>	

.cover-template{
		position: relative;		
	}
		.closeMsg{			
		font-size: 0.9em;
		color: #b56;		
	}
	.resource{
		position: relative;
		cursor: pointer;
		height: 170px;
	}
	.resource-caption{
	  position: absolute;
	  top: 60%;
	  left: 0;
	  right: 0;
	  background-color: rgba(0,0,50,.6);
	  overflow: hidden;
	  width: 100%;
	  height:0;
	  transition: .5s ease;
	  z-index: 100;
	  opacity: 0;
	}
	
.overlaytext {
  color: white;
  font-size: 20px;
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -40%);
  text-align: center;
}
	.resource:focus .resource-caption{
		 top: 0;
		 opacity: 1;
  		height: 100%;
	}
	.button:focus{
		box-shadow: none !important;
	}
</style>