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
@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
	<!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="courses"  ></v-msidebar>   
	<!-- end main side bar -->

   <div class="expr-dashboard-container" style="background-color:#eee;">
   		<!-- top nav bar -->
        <v-systopnave title="Courses" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
        
        <!-- start tab -->
   		<v-coursestab systabActive="resources"></v-coursestab>
        <!-- End tab -->

        <div class="px-5 mt-5 ml-3 mr-3" style="margin-bottom:2rem; border-radius: 0.8rem;max-height:600px;overflow:auto;">
            <div style="text-align:center">
                <button class="btn p-success text-white my-10 py-2 px-3" style="border-radius: 0.5rem;"> Add Experiment</button>
            </div>
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