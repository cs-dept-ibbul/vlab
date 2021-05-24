<?php
$time_default = true;
if(Session::has('time_left')){
    $time_left = session('time_left');
    $time_default = false;
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

   
   var experimentSheet;
   var url = '{{route("simpleCircuit")}} ' 
   
   window.onload = function(){
    experimentSheet = document.getElementById('experimentSheet');
    experimentSheet.src= url;
   }
/*   setTimeout(function() {
      document.getElementById('rightNav').style.display='block';
   }, 50);*/
/*   function changeSize(value) {
      url = '{{route('micrometerEquipment').'?size='}}'+value
      experimentSheet.src= url;
   }*/
</script>
     
@endsection

@section('content-body')
<div class="d-flex">   
  <!-- <v-userauth></v-userauth> -->
  
	 <v-msidebar class='vh-100'></v-msidebar>   
   <!-- end main side bar -->

   <div class="w-100 vh-100 position-relative">
         <!-- top nav bar -->
         <v-topnave class="vh-1"  equipmentname="Simple Circuit" experimentnum='Experiment I'></v-topnave>
         <!-- end to nav bar -->

         <!-- content -->
         <div class="exp-cont-view">

            <!-- experiment left side bar -->
             <v-guide aim="<h2>This is Aim</h2>" aparatus="<h2>This is aparatus</h2>" theory="<h2>This is theory</h2>" requirment="" exercise="<h2>exercises comes here</h2>" resources="<h2>No resources Available for this experiment</h2>" ></v-guide>    
               <!--<guide :control="control"></guide>    -->
            <!-- end experiment side bar -->

       			<!-- experiment  -->
   			    <div id="mainExp">
               <v-ribbon></v-ribbon>
                <iframe width="100%"   frameborder="0" style="display: none;height: 77vh;" src="" id="experimentSheet"></iframe>
               <v-start access_code="{{$access_code}}" hourdata="{{$time_left[0]}}" munitedata="{{$time_left[1]}}"></v-start>
   			    </div>
   			    <!-- end experiment -->

            <div  class="zero-space exprightNav" id="rightNav">               
               <v-rightnav class="vh-2" toolsizes="false" url="{{route('simple-circuit')}}"  ></v-rightnav>
            </div>

       			<!-- experiment footer -->
       			<div class="position-absolute bottom-0 w-100" style="">
       		   <v-expfooter></v-expfooter>
       			</div>
       			<!-- end experiment footer -->

   		</div>
   </div>


</div>

@endsection