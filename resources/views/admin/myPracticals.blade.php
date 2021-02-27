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
                <a class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right">Create New <span class="text-white fa fa-chevron-down"></span></a>
            <div>
            <div style="clear: right;">
                <p class="font fw6">Summary</p>
            </div                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         >
            <div class="row" style="justify-content: space-between">
                <div class="shadow-sm pl-0 py-3" style="background-color:white;border-radius: 1rem;width:30%;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg text-danger p-0" style="font-size: 120px;"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">2000</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube text-danger"></span>
                                <span>3 Level</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 text-danger bg-danger-l1 mr-3"></span>
                        </div>
                    </div>
                </div>
                
                <div class="shadow-sm pl-0 py-3" style="background-color:white;border-radius: 1rem;width:30%;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-graduation-cap fa-lg text-danger p-0" style="font-size: 5em;"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">2000</p>
                            <p class="mt-0">Courses</p>
                            <div>
                                <span class="fa fa-cube text-danger"></span>
                                <span class="fw8">3 Experiments</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 text-danger bg-danger-l1 mr-3"></span>
                        </div>
                    </div>
                </div>

                <div class="shadow-sm pl-0 py-3" style="background-color:white;border-radius: 1rem;width:30%;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-graduation-cap fa-lg text-danger p-0" style="font-size: 5em;"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">3</p>
                            <p class="mt-0">Experiments</p>
                            <div>
                                <span class="fa fa-cube text-danger"></span>
                                <span>30 Exercises</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 text-danger bg-danger-l1 mr-3"></span>
                        </div>
                    </div>
                </div>
            <div>
   		</div>
   </div>
   <div class="expr-uploads-header">
    <h4><strong>Notifications</strong></h4>
    <div class="expr-items">
        <span class="font2 fs1 fw3">Sort By</span>
						<button class="sort sortbtn" data-sort="name">Time <span class="fa fa-chevron-down"></span></button>
        <p><span class="ml-2 fa fa-long-arrow-up pl-3 fw2" style="border-left: 1px solid #ccc;"></span></p>
        <p>view all</p>
    </div>
</div>
<div class="notification-table">
    <table class="table table-hover">
        <tr v-for="x in 7" :key="x">
            <td width="2%">
                <label class="container">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                  </label>
            </td>
            <td width="20%">Experiment Submision</td>
            <td width="10%">PHY507</td>
            <td width="45%">Abdullahi Abubakar Sani</td>
            <td width="10%">MR987654</td>
            <td width="10%">400L</td>
            <td width="3%">2:30pm</td>
        </tr>

        
    </table>
</div>

</div>

@endsection