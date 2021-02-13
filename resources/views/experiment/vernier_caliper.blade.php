<?php
$tools = 5;
$toolSizes = [70,90,120,150,230];
$ct = 1;
$started = 0; //this will be from database

?>
@extends('layouts/main')


@section('head')
<script>
   var experimentSheet;
   localStorage.setItem('objectSize',{{$toolSizes[0]}});
   var url = '{{route('vernierEquipment').'?size='.$toolSizes[0] }} ' //localStorage.getItem('objectSize');
   window.onload = function(){
   experimentSheet = document.getElementById('experimentSheet');
      experimentSheet.src= url;
   }
   function changeSize(value) {
      url = '{{route('vernierEquipment').'?size='}}'+value
      experimentSheet.src= url;
   }
</script>
     
@endsection
@section('content-body')
<div style="display: flex;">   

   <!-- main side bar -->
   <v-msidebar></v-msidebar>   
   <!-- end main side bar -->

   <div style="width: 100%;">
         <!-- top nav bar -->
         <v-topnave></v-topnave>
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
            <div style="position: absolute;right: 0;top: 85px;width: 200px;height: 539px;background: #40356E;overflow-x: scroll;" class="zero-space">
                  <input type="text" name="search" class="input-search input-dark" style="width:100%;height:40px;background:#2F274E;padding:10px;color:#fff;border:none;"><span class="fa fa-search serachicon " style="color:#eee;position: absolute;right: 10px; top: 10px;"></span>
               
                  @foreach($toolSizes as $tool)
                  <div onclick="changeSize(<?php echo $tool; ?>)" style="width: {{$tool}}px;height: 30px; background-image:linear-gradient(#34d, #ddf, #34d); margin: 10px auto;text-align: center; color: black;cursor: pointer;">Size {{$ct++}}</div>
                  @endforeach

               
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