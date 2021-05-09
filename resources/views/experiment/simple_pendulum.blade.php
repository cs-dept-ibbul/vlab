<?php
$tools = 5;
$toolSizes = [80,54,69,70,90];
$ct = 1;
$started = 0; //this will be from database
$experimentName= "Simple Pendulum";
$experimentNum = "Experiment I";
$started = '0'; //this will be from database*/
$resultTable ='
    <div id="result_table" class="bg-white p-2 mx-auto mt-2" style="border-radius:10px;width:450px;overflow:auto;"> 
      <h4 class="text-warning font2 mb-0">Table of Measurements</h4>
      <h5 class="text-dark font2 fs1 fw6 mt-2">Length of Cylinder</h5>
      <table class="table table-bordered result-table main_result_table"> 
          <thead>
            <th class="p-1 fs01 text-center" width="10%">S/NO.</th>
            <th class="p-1 fs01 text-center" width="15%">Length(L) (m)</th>
            <th class="p-1 fs01 text-center pt-4" width="15%" style="position:relative;">
                  <span class="overlapcells">Time (t) for 20 oscillations</span>
                  <br>
                  t<sub>1</sub>(sec)
            </th>
            <th class="p-1 fs01 text-center pt-3" width="15%">t<sub>2</sub>(sec)</th>
            <th class="p-1 fs01 text-center pt-3" width="15%">Average</th>
            <th class="p-1 fs01 text-center" width="15%">Period (T) (sec)</th>
            <th class="p-1 fs01 text-center" width="15%">T<sup>2</sup> (sec<sup>2</sup>)</th>
          </thead>
          <tbody>';    
          for ($i=1; $i <9 ; $i++) { 
           $resultTable .= '<tr>
              <td class="r-template p-1 text-center bg-light" width="10%"><input type="text" style="padding:1px;background:#f5f5f5 !important; border:none!important;" class="resultReading form-control h-100 bg-light fs01 fw5" value="'.$i.'." disabled> </td>
              <td class="r-template p-0" width="15%"><input type="text" style="padding:1px;" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="15%"><input type="text" style="padding:1px;" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="15%"><input type="text" style="padding:1px;" class="resultReading form-control h-100 bg-white"></td>
              <td class="r-template p-0" width="15%"><input type="text" style="padding:1px;" class="resultReading form-control h-100 bg-white"></td>                    
              <td class="r-template p-0" width="15%"><input type="text" style="padding:1px;" class="resultReading form-control h-100 bg-white"></td>                    
              <td class="r-template p-0" width="15%"><input type="text" style="padding:1px;" class="resultReading form-control h-100 bg-white"></td>                    
            </tr>';
            
          }            
          $resultTable .= '</tbody>
                </table>  
          
              </div>';
?>
@extends('layouts/main')


@section('head')
<script>
   var toolSizes = <?php echo json_encode($toolSizes); ?>;

   //localStorage.setItem('objectSize',{{$toolSizes[0]}});
   var experimentSheet;
   var url = '{{route('simplependulumEquipment').'?size='.$toolSizes[0] }} ' //localStorage.getItem('objectSize');
   
   window.onload = function(){
    experimentSheet = document.getElementById('experimentSheet');
    experimentSheet.src= url;
   }

</script>
     
@endsection
@section('content-body')
<div class="d-flex">   
   <v-userauth></v-userauth>

   <!-- main side bar -->
   <v-msidebar  class='vh-100'></v-msidebar>   
   <!-- end main side bar -->

   <div class="w-100 vh-100 position-relative">
         <!-- top nav bar -->
         <v-topnave class="vh-1" equipmentname="{{$experimentName}}" experimentnum='{{$experimentNum}}'></v-topnave>
         <!-- end to nav bar -->

         <!-- content -->
         <div class="exp-cont-view" >

            <!-- experiment left side bar -->
               <v-guide aim="<h2>This is Aim</h2>" aparatus="<h2>This is aparatus</h2>" theory="<h2>This is theory</h2>" requirment="" exercise="<h2>exercises comes here</h2>" resources="<h2>No resources Available for this experiment</h2>" ></v-guide>    
               <!--<guide :control="control"></guide>    -->
            <!-- end experiment side bar -->

            <!-- experiment  -->
            <div id="mainExp">
               <v-ribbon></v-ribbon>
                <iframe width="100%" height="480px"  frameborder="0" style="display: none;" src="" id="experimentSheet"></iframe>
             
               <v-start hourdata="1" munitedata="30" starteddata="{{$started}}" ></v-start>
            </div>
            <!-- end experiment -->
            <div  class="zero-space exprightNav" id="rightNav">       
                 <v-rightnav class="vh-2"  result="{{$resultTable}}"   url="{{route('simplependulumEquipment').'?size='}}" ></v-rightnav>            
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