@extends('layouts/main')
@section('content-body')
<div style="display: flex;">   
	
	<tlb></tlb>   

   <div style="width: 100%;">
   		<topnave></topnave>
   		<!-- content -->
   		<div style="display: flex;flex-wrap: wrap;">
   			<div style="width: 300px;">
   				<guide></guide>   				
   			</div>
   			<div style="width: 100%;">
   			</div>
   			<div style="flex: 100% 0 0;">
   				<expfooter></expfooter>
   			</div>
   		</div>
   </div>


</div>

@endsection