@extends('layouts/main')
@section('content-body')
<div style="display: flex;">   	
   <!-- main side bar -->
   <v-msidebar  incourse="1" active="courses"  ></v-msidebar>   
   <!-- end main side bar -->

   <div style="width: 100%; " class="sysbg">
   <v-systopnave title="My Courses" username='said'></v-systopnave>     
   <v-mycourses></v-mycourses> 
	</div>	
</div>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

