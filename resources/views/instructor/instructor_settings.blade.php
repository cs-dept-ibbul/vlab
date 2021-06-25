@extends('layouts/main')
@section('content-body')
<div style="display: flex;">   	
   <!-- main side bar -->
   <v-isidebar   active="settings"  ></v-isidebar>   
   <!-- end main side bar -->

   <div style="width: 100%; " class="sysbg">
   <v-systopnave title="Settings" username='said'></v-systopnave>     
   <v-studentprofile></v-studentprofile> 
	</div>	
</div>
@endsection

<!-- use this it will give you animate play icon  on embeded video-->

