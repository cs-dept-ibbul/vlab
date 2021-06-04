<?php
$tools = 5;
$default = true;

if(Session::has('setdata')){
    if (session('setdata') != '[]') {
      $toolSizes = json_decode(session('setdata'));
      $default = false;  
    }    
    $time_left = session('time_left');
    $time_default = false;
}
$access_code = session('access_code');
$user_type = session('user_type');
if ($default) {
  $toolSizes = [
    [50,60],//'size'
    [40,54],//'sizeI'
    [80,54],//'sizeD'
  ];  
}
if ($time_default) {
   $time_left = [
      'hour'=>1,
      'minute'=>30
   ];
}


$resultTable ='
    <div id="result_table" class="bg-white p-2 mx-auto mt-2" style="border-radius:10px;width:450px;overflow:auto;"> 
      <h4 class="text-warning font2 mb-0">Table of Measurements</h4>
      <h5 class="text-dark font2 fs1 fw6 mt-2">Length of Cylinder</h5>
      <table class="table table-bordered result-table main_result_table"> 
          <thead>
            <th class="p-1 fs01 text-center" width="12%">No. Of Readings</th>
            <th class="p-1 fs01 text-center" width="22%">Main Scale Reading (cm)</th>
            <th class="p-1 fs01 text-center" width="22%">Vernier Coincidence</th>
            <th class="p-1 fs01 text-center" width="22%">Vernier Readings (cm)</th>
            <th class="p-1 fs01 text-center" width="22%">Length (L) Reading (cm)</th>
          </thead>
          <tbody>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="1." disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="2." disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="Average" disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
          </tbody>
      </table>
      <h5 class="text-dark font2 fs1 fw6 mt-2">Diameter of Cylinder</h5>
      <table class="table table-bordered result-table main_result_table"> 
          <thead>
            <th class="p-1 fs01 text-center" width="12%">No. Of Readings</th>
            <th class="p-1 fs01 text-center" width="22%">Main Scale Reading (cm)</th>
            <th class="p-1 fs01 text-center" width="22%">Vernier Coincidence</th>
            <th class="p-1 fs01 text-center" width="22%">Vernier Readings (cm)</th>
            <th class="p-1 fs01 text-center" width="22%">Length (L) Reading (cm)</th>
          </thead>
          <tbody>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="1." disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="2." disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="Average" disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
          </tbody>
      </table>
      <h5 class="text-dark font2 fs1 fw6 mt-2">Diameter of Bob</h5>
      <table class="table table-bordered result-table main_result_table"> 
          <thead>
            <th class="p-1 fs01 text-center" width="12%">No. Of Readings</th>
            <th class="p-1 fs01 text-center" width="22%">Main Scale Reading (cm)</th>
            <th class="p-1 fs01 text-center" width="22%">Vernier Coincidence</th>
            <th class="p-1 fs01 text-center" width="22%">Vernier Readings (cm)</th>
            <th class="p-1 fs01 text-center" width="22%">Length (L) Reading (cm)</th>
          </thead>
          <tbody>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="1." disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="2." disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
            <tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="Average" disabled> </td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="22%"><input type="text" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>
          </tbody>
      </table>

    </div>
';

?>
@extends('layouts/main')


@section('head')
<script>
   var toolSizes = <?php echo json_encode($toolSizes); ?>;
   
   var experimentSheet;
   var url = '{{route("vernierEquipment")."?size=".$toolSizes[0][0]."-".$toolSizes[1][0]."-".$toolSizes[2][0] }} ' 
   //localStorage.getItem('objectSize');   
   //var url = '{{route("vernierEquipment")}}"' ///localStorage.getItem('objectSize');   
   window.onload = function(){
    experimentSheet = document.getElementById('experimentSheet');
    experimentSheet.src= url;
   }

</script>
     
@endsection
@section('content-body')
<div class="d-flex">   
    <v-msidebar class='vh-100'></v-msidebar>   
   <!-- end main side bar -->


   <div class="w-100 vh-100 position-relative" style="overflow-y: hidden;">
         <!-- top nav bar -->
         <v-topnave class="vh-1" equipmentname="Micrometer Screw Guage" experimentnum='Experiment I'></v-topnave>
         <!-- end to nav bar -->

         <!-- content -->
         <div class="exp-cont-view">

            <!-- experiment left side bar -->
               <v-guide aim="<h2>This is Aim</h2>" aparatus="<h2>This is aparatus</h2>" theory="<h2>This is theory</h2>" requirment="" exercise="<h2>exercises comes here</h2>" resources="<h2>No resources Available for this experiment</h2>" ></v-guide>    
               <!--<guide :control="control"></guide>    -->
            <!-- end experiment side bar -->

            <!-- experiment  -->
            <div  id="mainExp">
               <v-ribbon></v-ribbon>
                <iframe width="100%" height="480px"  frameborder="0" style="display: none;" src="" id="experimentSheet"></iframe>
               <v-start access_code="{{$access_code}}" user_type="{{$user_type}}" hourdata="{{$time_left['hour']}}" munitedata="{{$time_left['minute']}}"></v-start>
            </div>
            <!-- end experiment -->
            <div  class="zero-space exprightNav" id="rightNav">               
               <v-rightnav result="{{$resultTable}}" type='measurement' :toolstate=true :othertools=true toolsizes="{{json_encode($toolSizes)}}" url="{{route('vernierEquipment').'?size='}}" ></v-rightnav>        
            </div>
            <!-- experiment footer -->
            <div class="position-absolute bottom-0 w-100">
               <v-expfooter></v-expfooter>
            </div>
            <!-- end experiment footer -->

         </div>
   </div>

</div>
@endsection
@section('scripts_section')

@endsection