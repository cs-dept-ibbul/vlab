@extends('../layouts/main')
@section('head')

  <!-- <link rel="stylesheet" href="{{asset('css/ckeditor/samples/css/samples.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('css/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}"> -->
<script src="{{ asset('css/ckeditor/ckeditor.js')}}"></script>
@endsection('head')
@section('content-body')
<div style="display: flex;">   

	<!-- main side bar -->
   <v-isidebar active="experiment" activesub="addexperiment"></v-isidebar>
   
	
  <!-- end main side bar -->
   <div style="width: 100%;">
   		<!-- top nav bar -->
     <v-systopnave title="My Courses" username='said'></v-systopnave>        		
   		<!-- end to nav bar -->

   	  <!-- content -->
   		<v-addexperiment class="scroll-y vh-87"></v-addexperiment>
   </div>


</div>

@endsection