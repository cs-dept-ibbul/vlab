@extends('../layouts/main')
@section('head')

  <!-- <link rel="stylesheet" href="{{asset('css/ckeditor/samples/css/samples.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('css/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}"> -->
<script src="{{ asset('css/ckeditor/ckeditor.js')}}"></script>
@endsection('head')
@section('content-body')
<div style="display: flex;">   

	<!-- main side bar -->
   <v-isidebar active="course" activesub="courseExperiment"></v-isidebar>
   
	
  <!-- end main side bar -->
   <div style="width: 100%;">
   		<!-- top nav bar -->
     <v-systopnave title="Addd/Delete Course Experiment" username='said'></v-systopnave>        		
   		<!-- end to nav bar -->

   	  <!-- content -->
   		<v-courseexperiment class="scroll-y vh-87"></v-courseexperiment>
   </div>


</div>

@endsection