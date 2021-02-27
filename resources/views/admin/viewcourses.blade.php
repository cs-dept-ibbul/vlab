@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
	<!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="courses"  ></v-msidebar>   
	<!-- end main side bar -->

   <div class="expr-dashboard-container" style="background-color:#eee;">
   		<!-- top nav bar -->
        <v-systopnave title="Courses" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
   		<div style="display: flex;" class="px-0 mx-0">
            <div class="w-100 bg-white px-4" style="box-shadow: 1px 6px 5px rgba(100,100,100,.1);position: relative;z-index: 2;">
                <div class="font2 fw4  systab systabActive ">Activities</div>
                <div class="font2 fw4 systab ml-3">Experiments</div>
                <div class="font2 fw4 systab ml-3">Students</div>
                <div class="font2 fw4 systab ml-3">Resources</div>
                <div class="font2 fw4 systab ml-3">Details</div>
            </div>
        </div>
        <div class="px-5 mt-5">
            <div class="row" style="justify-content: space-between">
                <div class="shadow-sm pl-0 py-3" style="background-color:white;border-radius: 1rem;width:30%;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 120px;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">50</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="color:#f8d877"></span>
                                <span style="color:#f8d877">3 Level</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 bg-danger-l1 mr-3" style="color:#f8d877"></span>
                        </div>
                    </div>
                </div>
                
                <div class="shadow-sm pl-0 py-3" style="background-color:white;border-radius: 1rem;width:68%;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        
                       
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
        <tr v-for="x in 8" :key="x">

            <td width="20%">Experiment Submision</td>
            <td width="10%">PHY507</td>
            <td width="45%">Abdullahi Abubakar Sani</td>
            <td width="10%">MR987654</td>
            <td width="10%">400L</td>
            <td width="5%">2:30pm</td>
        </tr>

        
    </table>
</div>
        </div>
</div>

@endsection