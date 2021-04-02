@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
<!--   <v-userauth></v-userauth> -->
  
	<!-- main side bar -->
   <v-asidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" faculty="" createcourse="{{route('create-courses')}}" incourse="1" active="course" activesub="createcourse"  ></v-asidebar>   
	
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