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
            <a class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem;margin-right:22px" data-toggle="modal" data-target="#staticBackdrop">Add Student <span class="text-white fa fa-chevron-down"></span></a>
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


<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 1rem;">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add Student</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form class="box" method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Select Course</label>
                  <select class="form-control" style="border-radius: 0.5rem;font-weight: 700;font-size: 20px;">
                      <option></option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Select Department</label>
                    <select class="form-control" style="border-radius: 0.5rem;font-weight: 700;font-size: 20px;">
                        <option></option>
                    </select>
                </div>

                <div class="form-group" style="height:200px;background-color:rgb(236, 248, 233);border-radius: 0.4rem;">
                    <div id="drop-area">
                        <div class="drop-zone">
                            <div class="drop-zone-text">
                                <b><span class="fa fa-cloud-upload fa-lg  p-0" style="font-size: 2em;color:#000"></span></b>
                            </div>
                            <div class="drop-zone-text mt-4">
                                <b>Upload Student List</b>
                            </div>
                            <div class="drop-zone-text">
                                <p>Only support .CSV file less than 1mb</p>
                                <input type="file" name="myFile" class="drop-zone__input">
                            </div>
                          </div>
                      </div>
                </div>
                
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection