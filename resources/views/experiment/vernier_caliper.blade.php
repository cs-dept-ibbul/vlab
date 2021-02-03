<?php
$tools = 5;
$toolSizes = [70,90,120,150,230];
$ct = 1;
?>
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
   				<guide ></guide>   	
   				<!--<guide :control="control"></guide>   	-->
   			<!-- end experiment side bar -->

   			<!-- experiment  -->
   			<div style="width: 85%;overflow-x: scroll; padding: 30px;" id="mainExp">
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   				sdsdllksjlkjsdkljklsdjklsdjklsdjkl
   		
   			</div>
   			<!-- end experiment -->
   			<div style="position: absolute;right: 0;top: 85px;width: 200px;height: 539px;background: #50496E;overflow-x: scroll;" class="zero-space">
   					<input type="text" name="search" class="input-search input-dark" style="width:100%;height:40px;background:#2F274E;padding:10px;color:#fff;border:none;"><span class="fa fa-search serachicon " style="color:#eee;position: absolute;right: 10px; top: 10px;"></span>
   				
   					@foreach($toolSizes as $tool)
   					<div style="width: {{$tool}}px;height: 30px; background-image:linear-gradient(#34d, #ddf, #34d); margin: 10px auto;text-align: center; color: black;cursor: pointer;">Size {{$ct++}}</div>
   					@endforeach

   				
   			</div>
   			<!-- experiment footer -->
   			<div style="flex:100%">
   				<expfooter></expfooter>
   			</div>
   			<!-- end experiment footer -->

   		</div>
   </div>

</div>
@endsection
@section('scripts_section')

@endsection