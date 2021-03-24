@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
  <v-userauth></v-userauth>
  
	<!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="courses"  ></v-msidebar>   
	
	<!-- end main side bar -->

   <div style="width: 100%;">
   		<!-- top nav bar -->
     <v-systopnave title="My Courses" username='said'></v-systopnave>        		
   		<!-- end to nav bar -->

   		<!-- content -->
   		<v-createcourse></v-createcourse>
   </div>


</div>

@endsection