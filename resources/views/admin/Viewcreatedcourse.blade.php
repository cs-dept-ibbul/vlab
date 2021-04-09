@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
  <!-- <v-userauth></v-userauth> -->
  
	<!-- main side bar -->
      <v-asidebar home="{{route('home')}}" dashboard="" department="{{route('manage-department')}}" viewexperiment="{{route('view-created-experiment')}}" addexperiment="{{route('add-experiment')}}" explore="{{route('explore')}}" settings="{{route('home')}}"  faculty="{{route('manage-faculty')}}" createcourse="{{route('create-courses')}}" editcourse="{{route('view-created-course')}}" createuser="" user=""  active="course" activesub="editcourse"></v-asidebar> 
	<!-- end main side bar -->

   <div class="expr-dashboard-container" style="background-color:#eee;">
   		<!-- top nav bar -->
        <v-systopnave title="Dashboard" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
   		<div style="display: flex;" class="px-4">
   			<div class="w-100 mt-2 py-3">
                <a href="{{route('create-courses')}}" class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
            <div>
          
   </div>
   <div class="expr-uploads-header">
    <h4><strong>Created Courses</strong></h4>
    <!-- <div class="expr-items">
        <span class="font2 fs1 fw3">Sort By</span>
						<button class="sort sortbtn" data-sort="name">Time <span class="fa fa-chevron-down"></span></button>
        <p><span class="ml-2 fa fa-long-arrow-up pl-3 fw2" style="border-left: 1px solid #ccc;"></span></p>
        <p>view all</p>
    </div> -->
</div>
<div class="notification-table">
   <v-viewcreatedcourse></v-viewcreatedcourse>
</div>

</div>
</div>
</div>
</div>
@endsection