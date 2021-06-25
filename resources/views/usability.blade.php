@extends('layouts/main')
@section('content-body')
<div class="content">   		
	
        <v-navb all_roles="{{json_encode(config('calculations.default_roles'))}}" home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>	
        <br><br><br><br>	
     	<div class="font fs1 fw5 ml-4">
     		<span>You are here <i class="fa fa-long-arrow-right"></span></i> <span>Survey<i class="fa fa-angle-double-right"></i>Usability Test</span>
     	</div>
     	<div class="px-4 ">
     		<iframe src="https://forms.gle/VtystnxHcdqgT4Gq6" width="100%" style="border: none;background-position: center; background-size: 100px;background-repeat: no-repeat; background-image: url('/loading.gif'); height: 80vh;"></iframe>	     		
     	</div>
</div>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

