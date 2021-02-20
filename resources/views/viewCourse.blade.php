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
@section('content-body')
    <div class="w-100 m-0 p-0">
        {{-- <img src="{{asset('images/course_image.png')}}"> --}}
        <v-navb></v-navb>
        	<br><br><br><br>
        <div class="w-100 row px-5">
        	<div class="col-lg-6 col-md-12 col-sm-12">        	
        		
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
        	<div class="col-lg-4 col-md-12 col-sm-12">
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
    </div>
@endsection