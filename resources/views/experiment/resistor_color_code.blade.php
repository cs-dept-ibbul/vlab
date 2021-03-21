<?php
$tools = 5;
$toolSizes = [80,54,69,70,90];
$ct = 1;
$started = 0; //this will be from database

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
   <v-userauth></v-userauth>

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
               <v-start hourdata="1" munitedata="30" starteddata="{{$started}}" ></v-start>
            </div>
            <!-- end experiment -->
            <div  class="zero-space exprightNav" id="rightNav">               
               <v-rightnav :toolState=false :electricitytools=true  url="{{route('micrometerEquipment').'?size='}}"></v-rightnav>
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