@extends('layouts/main')
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

