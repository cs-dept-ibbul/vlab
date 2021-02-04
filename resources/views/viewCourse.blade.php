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
    <div class="content">
        {{-- <img src="{{asset('images/course_image.png')}}"> --}}
        <v-navb></v-navb>
        <v-viewcourses ></v-viewcourses>
    </div>
@endsection