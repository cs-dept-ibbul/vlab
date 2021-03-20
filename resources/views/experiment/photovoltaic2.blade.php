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
<div class="d-flex">   
	 <v-msidebar class='vh-100'></v-msidebar>   
   <!-- end main side bar -->

   <div class="w-100 vh-100 position-relative">
         <!-- top nav bar -->
         <v-topnave class="vh-1"  equipmentname="Photovoltaic Experiment 2" experimentnum='Solar Power Dependency'></v-topnave>
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
               <v-photovoltaic2 style="display: none;" id="experimentSheet"></v-photovoltaic2>
               <v-start hourdata="1" munitedata="30" starteddata="{{$started}}" ></v-start>               
   			    </div>
   			    <!-- end experiment -->

            <div  class="zero-space vh-2 exprightNav" id="rightNav">               
               <v-rightnav toolsizes="false" url="{{route('photovoltaic2')}}" vicelab=1 ></v-rightnav>
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