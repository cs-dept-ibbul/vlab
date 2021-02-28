@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
	<!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="courses"  ></v-msidebar>   
	<!-- end main side bar -->

   <div class="expr-dashboard-container" style="background-color:#eee;">
   		<!-- top nav bar -->
        <v-systopnave title="Dashboard" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
   		<div style="display: flex;" class="px-4">
   			<div class="w-100 mt-4 ">
                <a class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>
            <div>
          
   </div>
   <div class="expr-uploads-header">
    <h4><strong>Created Courses</strong></h4>
    <div class="expr-items">
        <span class="font2 fs1 fw3">Sort By</span>
						<button class="sort sortbtn" data-sort="name">Time <span class="fa fa-chevron-down"></span></button>
        <p><span class="ml-2 fa fa-long-arrow-up pl-3 fw2" style="border-left: 1px solid #ccc;"></span></p>
        <p>view all</p>
    </div>
</div>
<div>
    <table class="table table-hover">
        <tr>
            <td width="5%"></td>
            <td width="25%">Title</td>
            <td width="20%">Code</td>
            <td width="10%">Practice(s)</td>
            <td width="5%">Students</td>
            <td width="5%">level</td>
            <td width="20%">Date Created</td>
            <td width="10%">Actions</td>
        </tr>
    </table>
</div>
<div class="notification-table">
    <table class="table table-hover">
        <tr v-for="x in 7" :key="x">
            <td width="5%">
                <label class="container">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>
            </td>
            <td width="25%">Physics Experiment</td>
            <td width="20%">PHY507</td>
            <td width="10%">12</td>
            <td width="5%">12</td>
            <td width="5%">500L</td>
            <td width="20%">2:30PM</td>
            <td width="10%"><span class="ml-2 fa fa-trash pl-3 fw2" style="border-left: 1px solid #ccc;font-size:20px;"></span></td>
        </tr>
    </table>
</div>

</div>

@endsection