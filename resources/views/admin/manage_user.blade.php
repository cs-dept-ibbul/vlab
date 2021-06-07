@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
  <!-- <v-userauth></v-userauth> -->
	<!-- main side bar -->
       <v-asidebar home="{{route('home')}}" dashboard="" department="{{route('manage-department')}}" viewexperiment="{{route('view-created-experiment')}}" addexperiment="{{route('add-experiment')}}" explore="{{route('explore')}}" settings="{{route('home')}}"  faculty="{{route('manage-faculty')}}" createcourse="{{route('create-courses')}}" editcourse="{{route('view-created-course')}}" createuser="" user="{{route('manage-user')}}"  active="user" activesub="user"></v-asidebar>    
	<!-- end main side bar -->

   <div class="expr-dashboard-container bg-content">
   		<!-- top nav bar -->
        <v-systopnave title="Manage User" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
      <div class="px-4">        
          <v-user roles="{{json_encode(config('calculations.default_roles'))}}"></v-user>
      </div>
      
    </div>
</div>
@endsection