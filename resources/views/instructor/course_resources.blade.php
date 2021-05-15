@extends('../layouts/main')
@section('head')

  <!-- <link rel="stylesheet" href="{{asset('css/ckeditor/samples/css/samples.css')}}"> -->
  <!-- <link rel="stylesheet" href="{{asset('css/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css')}}"> -->
<script src="{{ asset('css/ckeditor/ckeditor.js')}}"></script>
@endsection('head')
@section('content-body')
<div style="display: flex;">   

	<!-- main side bar -->
   <v-isidebar active="course" activesub="courseResources"></v-isidebar>
   
	
  <!-- end main side bar -->
   <div style="width: 100%;">
   		<!-- top nav bar -->
     <v-systopnave title="Course Resources" username='said'></v-systopnave>        		
   		<!-- end to nav bar -->

   	  <!-- content -->
   		<v-courseresources class="scroll-y"></v-courseresources>
   </div>


</div>

@endsection