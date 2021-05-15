@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">       
    
    <!-- main side bar --> 
   <v-isidebar active="student" activesub="student"></v-isidebar>   
    <!-- end main side bar -->

   <div class="w-100 bg-light">
        <!-- top nav bar -->
        <v-systopnave title="Students" username='said'></v-systopnave>   
        <!-- end to nav bar -->

        <!-- content -->
 <!--           <div class="px-5">
            <a class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem;margin-right:22px" data-toggle="modal" data-target="#staticBackdrop">Add Student <span class="text-white fa fa-chevron-down"></span></a>
           </div> -->
        <v-viewstudent class="scroll-y vh-78"></v-viewstudent>
   </div>
 


</div>
<!-- 

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
  </div> -->
@endsection