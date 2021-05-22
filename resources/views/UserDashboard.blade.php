
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
	</div>
</div>
@endsection
<!-- use this it will give you animate play icon  on embeded video-->

