<?php
  $instructorRole =  config('calculations.default_roles.instructor');  
 ?>
@extends('layouts/main')
@section('content-body')
    <div class="w-100 m-0 p-0 explore">
        <v-navb all_roles="{{json_encode(config('calculations.default_roles'))}}" home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <br>
        <br>
        <br>
        <v-explore :roles="{{ json_encode(config('calculations.default_roles')) }}"></v-explore>
       
    </div>
@endsection