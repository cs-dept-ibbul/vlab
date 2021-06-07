<template>
      <div class="row pd-lg-3 pd-sm-2  " style="width: 98%; margin: 50px auto;height: 75.5vh;overflow-y: scroll;" >
     	<div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">   
     		<p class="fw6 font2">Introduction</p>
     		<p class="text-justify font2 fw4" style="color: #666;font-size: 0.9em;">
     			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
     		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
     		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
     		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
     		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
     		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

     		<p class="fw6 font2" style="font-size: 0.9em;">4 Prcaticals</p>
	    </div>
     	<div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 mb-5">
     		<div style="width: 90%;height: 150px;border-radius: 9px;background: #333;" class="mx-auto shadow">
     			<iframe width="100%" class="rounded" height="auto" src="https://www.youtube.com/embed/5Vc21hGJLpM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>		
     		</div>
     	</div>
     	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row ml-3"> 
     		<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 shadow bg-white p-4 pd-sm-2  row" style="border-radius: 24px;">     			
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
				<div  class="p-0 thread" >
					<v-thread :weeks="threadTrends"></v-thread>
				</div>
     			<!-- end thread  -->

     			<!-- start thread joint  -->     		
	     		<div class="thrend-box">	     						     		
	     			<div v-for="(weeks, index) in weeksExp">	     			
		     			<div v-bind:class="{mt30:index==0,mt70:index!=0}">	     				     				
	     					<div v-for="week in weeks">     						
								<div class="d-flex align-items-center my-0 thrend-box-1" v-bind:class="{'my-0':index==0,'my-3':index !=0}">
									<div class="p-3  bg-white shadow-sm mb-3 thrend-box-2">
										<div class="d-flex justify-content-between align-items-center">
											<div class="font">
												<span class="fw4 sys-bg-success fs1 p-2 rounded s1">{{week.title}}</span>
												<p class="fw4 pt-2 pb-0 mb-1 s1" >{{week.experimentType}}</p>
												<div style="clear: left;">
													<div class="float-left fs1 font2 s1 mr-4"><span style="color: #888;">Started</span> <span class="s1">{{week.start}}</span></div>
													<div class="float-left fs1 font2 s1 "><span style="color: #888;">Started</span> <span class="s1">{{week.submit}}</span></div>
												</div>
											</div>
											<div>
					     					
												<span v-if="week.status == 1">Completed</span>										
												<a v-else :href="week.page" class="text-success fs1 fw3">Start</a>									
											</div>
										</div>				
									</div>
									<div class="pl-2">										
										<span v-if="week.status ==1" class="fs8 fa fa-check-circle t-success"></span>				
									</div>
								</div>
							</div>					
	     				</div>
					</div>
	     		</div>
	     			<!-- end thread joint  -->     			

			</div>
     	</div>
     </div>
</template>

<script>
	import thread from './threadTrends.vue';
    export default {
    	components:{
    		'v-thread': thread
    	},
    	data(){
    		return{
    			threadTrends:[
			 	 	[1,1,[1,1,1]],//sub array is for exercises in the week 1:completed, 0: not completed
			 	 	[2,1,[1,0]],
			 	 	[3,0,[0]],
			 	 	[4,0,[0]]
			 	],

			 	weeksExp:{
			 		'week 1':[
				 			{'title':'Phy 107', 'experimentType':'Experiment I', 'start':'11-12-2020','submit':'11-12-2020','page':'simple-pendulum','status':1},
				 			{'title':'Phy 107', 'experimentType':'Experiment II', 'start':'11-12-2020','submit':'11-12-2020','page':'vernier-caliper','status':1},
				 			{'title':'Phy 107', 'experimentType':'Experiment III', 'start':'11-12-2020','submit':'11-12-2020','page':'micrometer','status':1},
			 		],
			 		'week 2':[
				 			{'title':'Phy 107', 'experimentType':'Experiment I', 'start':'11-12-2020','submit':'11-12-2020','page':'micrometer','status':1},
				 			{'title':'Phy 107', 'experimentType':'Experiment II', 'start':'11-12-2020','submit':'11-12-2020','page':'vernier-caliper','status':0}
			 		],
			 		'week 3':[
				 			{'title':'Phy 107', 'experimentType':'Experiment I', 'start':'11-12-2020','submit':'11-12-2020','page':'simple-pendulum','status':0}
			 		],
			 		'week 4':[
				 			{'title':'Phy 107', 'experimentType':'Experiment I', 'start':'11-12-2020','submit':'11-12-2020','page':'micrometer','status':0}
			 		]
				 }
    		}
    	}
    };
</script>

<style>
.mt70{
	margin-top:70px;
}
.mt30{
	margin-top:30px;
}
.thrend{
	width: 15%;
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (max-width: 810px) {

	.s1, div.s1{
		font-size: 0.8em;
	}
	p.s1{
		font-weight: 500;
	}
}
@media only screen and (max-width: 776px) {
	span.sys-bg-success.s1{
		float: left;
		position: relative;
		right: 10px;
	}

	p.s1{
		font-weight: 500;
	}
}
/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {

	.thrend-box-2{
		background: red;
	}
	.thrend-box{
		width: 100%;
	}	
	.thrend-box-1{
		width: 100%;
	}
	.thrend-box-2{
		width: 100%;
	}
}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 1104px) {

	.thrend-box{
		width: 90%;
	}
	.thrend-box-1{
		width: 80%;
	}
	.thrend-box-2{
		border-radius: 9px;
		width: 70%;
	}

}
.thrend-box-2{
	min-width: 250px;
}
.s1{
	white-space: nowrap;
}
</style>