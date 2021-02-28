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

   //localStorage.setItem('objectSize',{{$toolSizes[0]}});
   var experimentSheet;
   var url = '{{route('vernierEquipment').'?size='.$toolSizes[0] }} ' //localStorage.getItem('objectSize');
   
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
<div style="display: flex;">   

   <!-- main side bar -->
   <v-msidebar></v-msidebar>   
   <!-- end main side bar -->

   <div style="width: 100%;">
         <!-- top nav bar -->
         <v-topnave equipmentname="Micrometer Screw Guage" experimentnum='Experiment I'></v-topnave>
         <!-- end to nav bar -->

         <!-- content -->
         <div style="display: flex;flex-wrap: wrap;" >

            <!-- experiment left side bar -->
               <v-guide aim="<h2>This is Aim</h2>" aparatus="<h2>This is aparatus</h2>" theory="<h2>This is theory</h2>" requirment="" exercise="<h2>exercises comes here</h2>" resources="<h2>No resources Available for this experiment</h2>" ></v-guide>    
               <!--<guide :control="control"></guide>    -->
            <!-- end experiment side bar -->

            <!-- experiment  -->
            <div style="width: 88%;overflow-x: scroll;" id="mainExp">
               <v-ribbon></v-ribbon>
                <iframe width="100%" height="480px"  frameborder="0" style="display: none;" src="" id="experimentSheet"></iframe>
             
               <v-start hourdata="1" munitedata="30" starteddata="{{$started}}" ></v-start>
            </div>
            <!-- end experiment -->
            <div  class="zero-space exprightNav" id="rightNav">               
               <v-rightnav toolState='true' toolsizes="<?php echo json_encode($toolSizes); ?>" url="{{route('vernierEquipment').'?size='}}"></v-rightnav>
            </div>
            <!-- experiment footer -->
            <div style="flex:100%">
               <v-expfooter></v-expfooter>
            </div>
            <!-- end experiment footer -->

         </div>
   </div>

</div>
@endsection
@section('scripts_section')

@endsection