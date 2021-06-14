@extends('layouts/main')
@section('content-body')
<div style="display: flex;">   	
   <!-- main side bar -->
   <v-asidebar   active="settings"  ></v-asidebar>   
   <!-- end main side bar -->

   <div style="width: 100%; " class="sysbg">
   <v-systopnave title="Settings" username='said'></v-systopnave>     
   <v-adminprofile></v-adminprofile> 
	</div>	
</div>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

