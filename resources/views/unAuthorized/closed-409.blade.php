@extends('layouts/main')

@section('content-body')
	<v-errorpage title="Submited" page="{{session('reattempt_page')}}" weekly_work_id="{{session('weekly_work_id')}}" code="This Experiment has Been Submitted" message="Please Contact your Course Instructor"></v-errorpage>
@endsection