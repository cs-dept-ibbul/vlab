<?php 
	$threadTrends = [
	 	 	[1,1,[1,1,1]],//sub array is for exercises in the week 1=>completed, 0=> not completed
	 	 	[2,1,[1,0]],
	 	 	[3,0,[0]],
	 	 	[4,0,[0]]
	 ];
	 $threadTrends = (array) $threadTrends;

	 $weeksExp = [
 		'week 1'=>[
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment I', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'simple-pendulum','status'=>1],
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment II', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'vernier-caliper','status'=>1],
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment III', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'micrometer','status'=>1],
 		],
 		'week 2'=>[
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment I', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'micrometer','status'=>1],
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment II', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'vernier-caliper','status'=>0]
 		],
 		'week 3'=>[
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment I', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'simple-pendulum','status'=>0]
 		],
 		'week 4'=>[
	 			['title'=>'Phy 107', 'experimentType'=>'Experiment I', 'start'=>'11-12-2020','submit'=>'11-12-2020','page'=>'micrometer','status'=>0]
 		]
	 ];
	 $weeksExp = json_decode(json_encode($weeksExp));
 ?>
@extends('layouts/main')
@section('head')
<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>

<script>	
	 setInterval(function() {
	 	if ($(window).width() <1000) {
	 		$('.toberemoved').hide();
	 	}else{
	 		$('.toberemoved').show();	 		
	 	}
	 }, 1000);
		//console.log(<?php// echo json_encode($weeksExp);?>);
</script>

@endsection
@section('content-body')
<div style="display: flex;overflow: hidden;">   
	<!-- <v-userauth></v-userauth> -->
asdfwae
   <!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="0" active="mycourse"  ></v-msidebar>   
   
   <!-- end main side bar -->

   <div style="width: 100%; " class="sysbg">
     <v-systopnave title="My Courses" username='said'></v-systopnave>     
     <div class="row pd-lg-3 pd-sm-2  " style="width: 98%; margin: 50px auto;height: 75.5vh;overflow-y: scroll;" class="">
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
				<div style="width: 12%;" class="p-0 thread" >
					<v-thread :weeks="{!! json_encode($threadTrends) !!}"></v-thread>
				</div>
     			<!-- end thread  -->

     			<!-- start thread joint  -->     		
     				<div style="width: 90%;">
     					
     			@foreach($weeksExp as $weeks)     			
	     			@if($loop->index ==0)
	     				<div style=" margin-top:30px;">	    
	     			@else			
	     				<div style=" margin-top:70px;">	    	     			 
	     			@endif
     				@foreach($weeks as $week)
     						@if($loop->index ==0)
								<div class="d-flex align-items-center my-0" style="width: 80%;">     		
			     			@else			
								<div class="d-flex align-items-center my-3" style="width: 80%;">     	
			     			@endif
							<div class="p-3  bg-white shadow-sm mb-3" style="border-radius: 9px; width: 70%;">
								<div class="d-flex justify-content-between align-items-center">
									<div class="font">
										<span class="fw4 sys-bg-success fs1 p-2 rounded">{{$week->title}}</span>
										<p class="fw4 pt-2 pb-0 mb-1" >{{$week->experimentType}}</p>
										<div>
											<div class="float-left fs1 font2"><span style="color: #888;">Started</span> <span>{{$week->start}}</span></div>
											<div class="float-left fs1 font2 ml-4"><span style="color: #888;">Started</span> <span>{{$week->submit}}</span></div>
										</div>
									</div>
									<div>
			     					@if($week->status ==1)
										<span>Completed</span>
									@else
										<a href="{{route($week->page)}}" class="text-success fs1 fw3">Start</a>
									@endif
									</div>
								</div>				
							</div>
							<div class="pl-2">
								@if($week->status ==1)
									<span class="fs8 fa fa-check-circle t-success"></span>				
								@endif
							</div>


						</div>
					@endforeach
     				</div>
				@endforeach
     				</div>
     			<!-- end thread joint  -->     			

			</div>
     	</div>
     </div>

   </div>
	
</div>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

