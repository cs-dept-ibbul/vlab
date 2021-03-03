<?php
$started = 0; //this will be from database
?>
@extends('layouts/main')

@section('head')
<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>

    <script src="{{ asset('js/jsplumb.js')}}"></script>
    <script src="{{ asset('js/jsplumb_list.js')}}"></script>
    <script src="{{ asset('js/plotly-latest.min.js')}}"></script>
    <script src="{{ asset('js/gauge.min.js')}}"></script>
    <script src="{{ asset('js/jquery.ui.js')}}"></script>

@endsection
@section('content-body')
<div style="display: flex;">   
	 <v-msidebar></v-msidebar>   
   <!-- end main side bar -->

   <div style="width: 100%;">
         <!-- top nav bar -->
         <v-topnave equipmentname="ViceLab Experiment 2" experimentnum='Experiment I'></v-topnave>
         <!-- end to nav bar -->

         <!-- content -->
         <div style="display: flex;flex-wrap: wrap;" >

            <!-- experiment left side bar -->
               <v-guide aim="<h2>This is Aim</h2>" aparatus="<h2>This is aparatus</h2>" theory="<h2>This is theory</h2>" requirment="" exercise="<h2>exercises comes here</h2>" resources="<h2>No resources Available for this experiment</h2>" ></v-guide>    
               <!--<guide :control="control"></guide>    -->
            <!-- end experiment side bar -->

   			<!-- experiment  -->
   			<div  style="width: 88%;overflow-x: scroll;" id="mainExp">
               <v-ribbon></v-ribbon>
               <v-vicelabexp2 style="display: none;" id="experimentSheet"></v-vicelabexp2>
               <v-start hourdata="1" munitedata="30" starteddata="{{$started}}" ></v-start>               
   			</div>
   			<!-- end experiment -->
            <div  class="zero-space exprightNav" id="rightNav">               
               <v-rightnav  toolsizes="false" url="{{route('vicelab-exp2')}}" vicelab=1 ></v-rightnav>
            </div>
   			<!-- experiment footer -->
   			<div style="flex: 100% 0 0;">
   		   <v-expfooter></v-expfooter>
   			</div>
   			<!-- end experiment footer -->

   		</div>
   </div>


</div>

@endsection