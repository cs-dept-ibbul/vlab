@extends('layouts/main')
@section('content-body')
<div class="content">   		
	
        <v-navb all_roles="{{json_encode(config('calculations.default_roles'))}}" home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>	
        <br><br><br><br>	
     	<div class="font fs1 fw5 ml-4">
     		<span>You are here <i class="fa fa-long-arrow-right"></span></i> <span>Survey<i class="fa fa-angle-double-right"></i> Faculty Survey</span>
     	</div>
     	<div class="p-4">
     		   <iframe src="https://forms.gle/FdDPVNiLvvKDaCou6" width="100%" style="border: none;background: none; height: 100%;"></iframe>	
     	</div>
</div>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

