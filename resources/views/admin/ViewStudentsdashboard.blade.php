@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
	<!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="courses"  ></v-msidebar>   
	<!-- end main side bar -->

   <div class="expr-dashboard-container" style="background-color:#eee;">
   		<!-- top nav bar -->
        <v-systopnave title="Students" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
           <div class="px-5">
            <a class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem;margin-right:22px">Add Student <span class="text-white fa fa-chevron-down"></span></a>
           </div>
   		<div style="display: flex;" class="px-5 mt-5">
   			
            <div class="row w-100 mt-4" style="justify-content: space-between">

                <div class="shadow-sm pl-0 py-3 mb-5" style="background-color:white;border-radius: 1rem;width:32%;height:190px;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 8em;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">154</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="font-size: 1.5em;color:#f8d877"></span>
                                <span style="font-size: 1.5em;color:#f8d877">PHY 107</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 mr-3" style="font-size: 2em;background-color:#f8a677;color:#8a0505"></span>
                        </div>
                    </div>
                </div>


                <div class="shadow-sm pl-0 py-3 mb-5" style="background-color:white;border-radius: 1rem;width:32%;height:190px;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 8em;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">46</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="font-size: 1.5em;color:#f8d877"></span>
                                <span style="font-size: 1.5em;color:#f8d877">PHY 126</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 mr-3" style="font-size: 2em;background-color:#f8a677;color:#8a0505"></span>
                        </div>
                    </div>
                </div>

                <div class="shadow-sm pl-0 py-3 mb-5" style="background-color:white;border-radius: 1rem;width:32%;height:190px;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 8em;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">21</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="font-size: 1.5em;color:#f8d877"></span>
                                <span style="font-size: 1.5em;color:#f8d877">PHY 201</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 mr-3" style="font-size: 2em;background-color:#f8a677;color:#8a0505"></span>
                        </div>
                    </div>
                </div>


                <div class="shadow-sm pl-0 py-3 mb-5" style="background-color:white;border-radius: 1rem;width:32%;height:190px;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 8em;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">14</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="font-size: 1.5em;color:#f8d877"></span>
                                <span style="font-size: 1.5em;color:#f8d877">CHM 111</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 mr-3" style="font-size: 2em;background-color:#f8a677;color:#8a0505"></span>
                        </div>
                    </div>
                </div>

                <div class="shadow-sm pl-0 py-3 mb-5" style="background-color:white;border-radius: 1rem;width:32%;height:190px;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 8em;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">16</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="font-size: 1.5em;color:#f8d877"></span>
                                <span style="font-size: 1.5em;color:#f8d877">ECE 311</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 mr-3" style="font-size: 2em;background-color:#f8a677;color:#8a0505"></span>
                        </div>
                    </div>
                </div>
               

                <div class="shadow-sm pl-0 py-3 mb-5" style="background-color:white;border-radius: 1rem;width:32%;height:190px;">
                    <div class="d-flex p-0 flex-wrap" style=" justify-content: space-between;">
                        <div class="p-0"><span class="fa fa-user fa-lg  p-0" style="font-size: 8em;color:#f8d877"></span></div>
                        <div>
                            <p class="fs2 fw8 mb-0" style="font-size: 3em;">09</p>
                            <p class="mt-0">Students</p>
                            <div>
                                <span class="fa fa-cube" style="font-size: 1.5em;color:#f8d877"></span>
                                <span style="font-size: 1.5em;color:#f8d877">CPT 213</span>
                            </div>
                        </div>
                        <div>
                            <span class="fa fa-plus p-2 r1 mr-3" style="font-size: 2em;background-color:#f8a677;color:#8a0505"></span>
                        </div>
                    </div>
                </div>
               
            <div>
   		</div>
   </div>
 


</div>
</div>
</div>
</div></div>

@endsection