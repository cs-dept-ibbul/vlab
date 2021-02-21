<?php
	$courseCate = [
		['id'=>1,'name'=> 'Applied Science','totalCourse'=>'7','totalStudents'=>500],
		['id'=>2,'name'=> 'Science & Engineering ','totalCourse'=>'12','totalStudents'=>1000],
		['id'=>3,'name'=> 'Biological Science','totalCourse'=>'3','totalStudents'=>10],
		['id'=>4,'name'=> 'Others','totalCourse'=>'4','totalStudents'=>100]
	];
	 $courseCate = json_decode(json_encode($courseCate));

?>

@extends('layouts/main')
@section('content-body')
    <div class="w-100 m-0 p-0">
        <v-navb home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <br>
        <div class="my-5 fs9 fw5 font w-100 text-center">Explore Available V-lab Courses</div>
        <div class="w-100 bg-white px-6" style="box-shadow: 1px 6px 5px rgba(100,100,100,.1);position: relative;z-index: 2;">
        	<div class="font2 fw4  systab systabActive ">Course Category</div>
     		<div class="font2 fw4 systab ml-3">Most Visited Courses</div>
        </div>
        <div class="row hm300 w-100 px-6 py-5" style="background: #f0f0f0;">
        	@foreach($courseCate as $cat)
        	<div class="col-lg-4 col-md-4 col-sm-6 mt-5">
        		<a style="text-decoration: none;" href="{{route('viewCourse',$cat->id)}}" class="w-100 cadin">
        			
	        	<div class="w-100 r2 shadow">
	        		<div  class="h130 w-100 p-secondary rt2"></div>
	        		<div class="p-3 bg-white rb2">
	        			<br>
	        			<h5 class="fw5 text-dark">{{$cat->name}}</h5>
	        			<br>
	        			<div class="d-flex justify-content-between text-dark">
	        				<div class="d-flex flex-wrap fs01 font fw4">
	        					<span class="fa fa-table"></span>
	        					<span>{{$cat->totalCourse}} Course</span>
	        				</div>
	        				<div class="d-flex flex-wrap fs01 font fw4">
	        					<span class="fa fa-user"></span>
	        					<span>{{$cat->totalStudents}} students</span>
	        				</div>
	        			</div>
	        		</div>
	        	</div>        		
        		</a>
        	</div>
        	@endforeach
        </div>
    </div>
@endsection