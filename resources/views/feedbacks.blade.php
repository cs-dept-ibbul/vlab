<?php
  $instructorRole =  config('calculations.default_roles.instructor');
  echo $instructorRole;
 ?>
@extends('layouts/main')
@section('content-body')
    <v-feedback></v-feedback>
@endsection