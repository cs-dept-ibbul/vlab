@extends('layouts/main')

@section('content-body')
<div class="w-80 bordered bg-secondary p-5">
	<h1 class="text-white font"><i>Sorry Unauthorized Access</i>...</h1>
	<p class="text-white">You Have Not Been Enrolled on this Course</p>
	<center>
		<a href="/explore" class="btn btn-warning text-white">Explore</a>
	</center>
</div>
@endsection