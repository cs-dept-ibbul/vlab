@extends('../layouts/main')
@section('head')
<script src="{{ asset('css/ckeditor/ckeditor.js')}}"></script>
@endsection('head')
@section('content-body')
<div style="display: flex;">   
  <!-- <v-userauth></v-userauth> -->
  
	<!-- main side bar -->      
  <v-isidebar active="experiment" activesub="viewexperiment"></v-isidebar>

       
	<!-- end main side bar -->

  <div class="expr-dashboard-container" style="background-color:#eee;">
  	<!-- top nav bar -->
    <v-systopnave title="View Created Experiment" username='said'></v-systopnave>   
  	<!-- end to nav bar -->
 		<!-- content -->
 		<div style="display: flex;" class="px-4">
        <div class="w-100 mt-2 py-3">
          <a href="{{route('view-created-experiment')}}" class="btn py-3 px-4 text-white fs1 font1 p-success btn-lg pull-right" style="border-radius: 0.6rem">Create New <span class="text-white fa fa-chevron-down"></span></a>          
        <div class="expr-uploads-header">
          <h4><strong>Created Experiment</strong></h4>  
        </div>
        <div class="notification-table">
           <v-viewcreatedexperiment></v-viewcreatedexperiment>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection