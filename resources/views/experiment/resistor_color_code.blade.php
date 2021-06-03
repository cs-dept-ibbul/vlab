<?php
$tools = 5;

$default = true;
$time_default = true;
if(Session::has('setdata')){
    if (session('setdata') != '[]') {
      $toolSizes = json_decode(session('setdata'));
      $default = false;  
    }
    $time_left = session('time_left');
    $time_default = false;
}
if ($default) {
   $toolSizes = null;
     
}
if ($time_default) {
   $time_left = [
      'hour'=>1,
      'minute'=>30
   ];
}
$access_code = session('access_code');
$user_type = session('user_type');
$resultTable ='
    <div id="result_table" class="bg-white p-2 mx-auto mt-2" style="border-radius:10px;width:450px;overflow:auto;"> 
      <h4 class="text-warning font2 mb-0"> Measurement of the diameter of the wire</h4>
      <h5 class="text-dark font2 fs1 fw6 mt-2">Length of Cylinder</h5>
      <table class="table table-bordered result-table main_result_table"> 
          <thead>
            <th class="p-1 fs01 text-center" width="12%">No.</th>
            <th class="p-1 fs01 text-center" width="16.5%">Resistance value through color codes (Ω)</th>
            <th class="p-1 fs01 text-center" width="16.5%">Tolerance (%)</th>
            <th class="p-1 fs01 text-center" width="16.5%">Range (Ω)</th>            
            <th class="p-1 fs01 text-center" width="16.5%">Value of Resistance measured by the DMM (Ω)</th>            
            <th class="p-1 fs01 text-center" width="16.5%">Error (%)</th>                        
          </thead>
          <tbody>';
   for ($i=1; $i < 6 ; $i++) { 
         $resultTable .= '<tr>
              <td class="r-template p-1 text-center" width="12%"><input type="text" class="resultReading form-control h-100 bg-white" value="'.$i.'." disabled> </td>
              <td class="r-template p-0" width="16.5%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="16.5%"><input type="text" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="16.5%"><input type="text" class="resultReading form-control h-100 bg-white"></td>            
              <td class="r-template p-0" width="16.5%"><input type="text" class="resultReading form-control h-100 bg-white"></td>            
              <td class="r-template p-0" width="16.5%"><input type="text" class="resultReading form-control h-100 bg-white"></td>            
            </tr>';         
      
   }
   $resultTable .= '</tbody>
                  </table>      
                </div>
            ';
?>

@extends('layouts/main')
@section('head')
   <script>
      var toolSizes = <?php echo json_encode($toolSizes); ?>;
   </script>
   @include('layouts.electricity_scripts')
@endsection
@section('content-body')
<div class="d-flex">   
   <!-- <v-userauth></v-userauth> -->

   <!-- main side bar -->
   <v-msidebar  class='vh-100'></v-msidebar>   
   <!-- end main side bar -->

   <div class="w-100 vh-100 position-relative">
         <!-- top nav bar -->
         <v-topnave class="vh-1" equipmentname="Electricity" experimentnum='Resistor Color Code'></v-topnave>
         <!-- end to nav bar -->

         <!-- content -->
         <div class="exp-cont-view" >

            <!-- experiment left side bar -->
               <v-guide aim="<h2>This is Aim</h2>" aparatus="<h2>This is aparatus</h2>" theory="<h2>This is theory</h2>" requirment="" exercise="<h2>exercises comes here</h2>" resources="<h2>No resources Available for this experiment</h2>" ></v-guide>    
               <!--<guide :control="control"></guide>    -->
            <!-- end experiment side bar -->

            <!-- experiment  -->
            <div  id="mainExp">
               <v-ribbon></v-ribbon>
               <div class="w-100" style="height: 480px;display: none;position: relative;" id="experimentSheet">
                                 
               </div>          
               <v-start access_code="{{$access_code}}" user_type="{{$user_type}}" hourdata="{{$time_left['hour']}}" munitedata="{{$time_left['minute']}}"></v-start>               
            </div>
            <!-- end experiment -->
            <div  class="zero-space exprightNav" id="rightNav">         
                  @if($toolSizes == '')      
                     <v-rightnav result="{{$resultTable}}" config="{{json_encode($toolSizes)}}" :toolState=false :electricitytools=true  url=""></v-rightnav>
                  @else                  
                     <v-rightnav result="{{$resultTable}}" :config="{{json_encode($toolSizes)}}" :toolState=false :electricitytools=true  url="wwww"></v-rightnav>                  
                  @endif
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