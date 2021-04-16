<?php 
//dd($info);
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
<div style="display: flex;">   
<!-- <v-userauth></v-userauth> -->
   <!-- main side bar -->
   <v-msidebar dashboard="{{route('sdashboard')}}" home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('courses')}}" courses="{{route('courses')}}" incourse="0" active="dashboard"  ></v-msidebar>   
   
   <!-- end main side bar -->

   <div style="width: 100%; " class="sysbg">
     <v-systopnave title="Dashboard" username='said'></v-systopnave>     
   	<v-dashb></v-dashb>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

