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
   $toolSizes = [80,54,69,70,90];
     
}
if ($time_default) {
   $time_left = [
      'hour'=>1,
      'minute'=>30
   ];
}
$access_code = session('access_code');
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
               <v-start access_code="{{$access_code}}" hourdata="{{$time_left['hour']}}" munitedata="{{$time_left['minute']}}"></v-start>               
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