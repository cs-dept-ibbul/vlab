<?php
//use File;

//$files = File::files(public_path());

// If you would like to retrieve a list of 
// all files within a given directory including all sub-directories    
//$files = File::allFiles(public_path()); 
$id =  request('id');
 $allImages = [
    asset('images/course_image.png'),
    asset('images/course_image.png')
 ]
?>
@extends('layouts/main')
@section('content-body')
<div style="display: flex;">   
<!-- <v-userauth></v-userauth> -->
<!--    <v-msidebar  incourse="0" active="mycourse" ></v-msidebar>   
 -->
    <div class="w-100 m-0 p-0">
        <v-navb class="vh-15" home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        	<br><br><br><br>
        <div class="vh-85 scroll-y">
        	<v-viewcourses faculty_uuid="{{$id}}"></v-viewcourses>
	 	</div>
    </div>
</div>
@endsection