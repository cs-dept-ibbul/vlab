@extends('layouts/main')
@section('content-body')
<div style="display: flex;">   
	<!-- main side bar -->
	<tlb></tlb>   
	<!-- end main side bar -->

   <div style="width: 100%;">
   		<!-- top nav bar -->
   		<topnave></topnave>
   		<!-- end to nav bar -->

   		<!-- content -->
   		<div style="display: flex;flex-wrap: wrap;">
   			
   			<!-- experiment left side bar -->
   			<div style="width: 300px;">
   				<guide></guide>   				
   			</div>
   			<!-- end experiment side bar -->

   			<!-- experiment  -->
   			<div style="width: 100%;">
   			</div>
   			<!-- end experiment -->

   			<!-- experiment footer -->
   			<div style="flex: 100% 0 0;">
   				<expfooter></expfooter>
   			</div>
   			<!-- end experiment footer -->

   		</div>
   </div>


</div>

@endsection