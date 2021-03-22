<?php
//use File;

//$files = File::files(public_path());

// If you would like to retrieve a list of 
// all files within a given directory including all sub-directories    
//$files = File::allFiles(public_path()); 
 $allImages = [
    asset('images/course_image.png'),
    asset('images/course_image.png')
 ]
?>
@extends('layouts/main')
@section('head')
<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>
<script>
	 $(document).ready(function(){
	 	var filterDataKey='', filterDataValue='';
	 	var $md;
	 	$('#filter').keyup(function(){	 		
	 		window.scrollTo({top:600,left:0, behavior:'smooth'});
	 		filterDataKey = $(this).val();
	 		$('.fholder').each(function(){
	 			$md = $(this);
	 			$(this).find('.fdata').each(function(e){	
	 				filterDataValue = $(this).text();
	 				if(filterDataValue.toLowerCase().includes(filterDataKey.toLowerCase())=== false){	 					
	 					$md.hide();
	 				}else{
	 					$md.show();
	 				}
	 			});
	 			
	 		});
	 		if(!$('.fholder').is(':visible')){
	 			$('#noMatch').show();
	 		}else{
	 			$('#noMatch').hide(100);
	 		}
	 	})
	 	$('.more-detail-pin').click(function(){
	 		$('.more-detail').not($(this).closest('.fholder').next()).slideUp(200);
	 		$(this).closest('.fholder').next().slideToggle(200);
	 	})
	 })
</script>
@endsection
@section('content-body')
<div style="display: flex;">   
<!-- <v-userauth></v-userauth> -->
   <v-msidebar dashboard="{{route('sdashboard')}}" home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('courses')}}" courses="{{route('courses')}}" incourse="0" active="dashboard"  ></v-msidebar>   

    <div class="w-100 m-0 p-0">
        {{-- <img src="{{asset('images/course_image.png')}}"> --}}
        <v-navb home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        	<br><br><br><br>
        <div class="w-100 row px-6 mx-0">
        	<div class="col-lg-6 col-md-12 col-sm-12 p-0">        	
        		
        		<p style="font-size: 3em; font-family: 'Roboto', serif; font-weight:400;">Physical Sciences</p>
        		<p class="text-justify" style="font-family: 'Roboto', serif;font-size: 0.9em;font-weight: 300;">
        			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        		</p>
        	</div>
        	<div class="col-lg-2 col-md-12 col-sm-12"></div>
        	<div class="col-lg-4 col-md-12 col-sm-12 p-0">
        		<div class="boxX p-4" style="">
        			<p class="fs2 fw8 font2">What to Expect</p>
        			<div class="d-flex ">
        				<span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
        				<p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			</div>
        			<div class="d-flex ">
        				<span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
        				<p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			</div>
        			<div class="d-flex ">
        				<span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
        				<p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			</div>
        			<div class="d-flex ">
        				<span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
        				<p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			</div>
        			<div class="d-flex ">
        				<span class="mr-2 fa fa-check text-success p-light border-rounded h1 r1 p-1" ></span>
        				<p class="font2 fs1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        			</div>
        		</div>        		
        	</div>        	
        </div>
        <br><br>
        <div class="px-6">        	
        	<!-- search and filter box for course -->
	     	<div class="row d-lg-flex w-100 m-0" style="">	     		
		     	<div class="col-md-4 pt-1 pl-0 ml-0 mb-5">
		     		<span class="font2 fs2 fw6">2 available courses</span>
		     	</div>
				<div class="some-input-field-class col-md-8 d-flex justify-content-between p-0 mb-5" >					
					<span  class="d-inline">						
		     			<input name="filter" id="filter" class="input-search3" placeholder="Search V-labs">
						<span class="fa fa-search serachicon2"></span> 				   				   		
					</span>
					<div class="d-inline-block" >
						<span class="font2 fs1 fw3">Sort By</span>
						<button class="sort sortbtn" data-sort="name">Name <span class="fa fa-chevron-down"></span></button>
						<span class="ml-2 fa fa-long-arrow-up pl-3 fw2" style="border-left: 1px solid #ccc;"></span>
					</div>
				</div>			
       		 </div>
       		 <!-- courses container -->
        	<div class="p-secondary r2 m-0 p-4 hm300 mb-5">
        	<p id="noMatch" style="display: none;" class=" text-dark text-center fw4 font">No course matches</p>
       		 <div class="row w-100 m-0 ">				
					<!-- experiment box -->
				<div class="p-4 w-100 bg-white shadow-sm my-3 fholder" style="border-radius: 9px;">
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div class="font ">
							<div class="mb-2">
								<span class="fw5 fs01 ftag">PHY 107</span>
								<span class="fw5 fs01 ftag">PHY 107</span>
								<span class="fw5 fs01 ftag">PHY 107</span>
								<span class="fw5 fs01 ftag">PHY 107</span>
							</div>
							<h3 class="fw6 fdata">Other</h3>
							<p class="my-1 font2 fs01 text-secondary" >But I must explain to you how you will go about this experiment</p>
							<p class="my-0 fw5 fs1">4 Practicals</p>
						</div>
						<div>
							<p class="text-success fs1 more-detail-pin" >More Detail <span class="fa fa-chevron-down text-success"></span></p>
						</div>
					</div>
				</div>
				<div class="more-detail">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
				<!-- end experiment box -->

					<!-- experiment box -->
				<div class="p-4 w-100 bg-white shadow-sm my-3 fholder" style="border-radius: 9px;">
					<div class="d-flex justify-content-between align-items-center mb-2">
						<div class="font ">
							<div class="mb-2">
								<span class="fw5 fs01 ftag">PHY 107</span>
								<span class="fw5 fs01 ftag">PHY 107</span>
								<span class="fw5 fs01 ftag">PHY 107</span>
								<span class="fw5 fs01 ftag">PHY 107</span>
							</div>
							<h3 class="fw6 fdata">Virtual Optics</h3>
							<p class="my-1 font2 " style="color:#888;font-size: 0.85em;">But I must explain to you how you will go about this experiment</p>
							<p class="my-0 fw5" style="font-size: 0.9em;">4 Practicals</p>
						</div>
						<div>
							<p class="text-success fs1 more-detail-pin">More Detail <span class="fa fa-chevron-down text-success"></span></p>
						</div>
					</div>					
				</div>
				<div class="more-detail">
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
					</p>
				</div>
				<!-- end experiment box -->


	     	</div>  
	     </div>
	 </div>
    </div>
@endsection