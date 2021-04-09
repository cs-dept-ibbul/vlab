@extends('../layouts/main')
@section('head')
 <link href="{{ asset('css/quill.css')}}" rel="stylesheet" media="all">
 <link href="{{ asset('css/katex.css')}}" rel="stylesheet" media="all">
 <link href="{{ asset('css/mathquill.css')}}" rel="stylesheet" media="all">
 <link href="{{ asset('css/mathquill_mix.css')}}" rel="stylesheet" media="all">
<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>

<script src="{{ asset('js/quill.js')}}"></script>
<script src="{{ asset('js/mathquill.js')}}"></script>
<script src="{{ asset('js/katex.js')}}"></script>
<script src="{{ asset('js/mathquill_mix.js')}}"></script>
@endsection('head')
@section('content-body')
<div style="display: flex;">   
<!--   <v-userauth></v-userauth> -->
  
	<!-- main side bar -->
  <v-isidebar home="{{route('home')}}" dashboard="" explore="{{route('explore')}}" settings="{{route('home')}}" setexperiment="{{route('add-experiment')}}" viewexperiment="" student="{{route('view-student')}}"   active="student" activesub="student"></v-isidebar>   
   
	
  <!-- end main side bar -->
   <div style="width: 100%;">
   		<!-- top nav bar -->
     <v-systopnave title="My Courses" username='said'></v-systopnave>        		
   		<!-- end to nav bar -->

   	  <!-- content -->
   		<v-addexperiment></v-addexperiment>
   </div>


</div>

@endsection