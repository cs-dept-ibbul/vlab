@extends('layouts/main')

@section('head')
<script src="{{ asset('js/jquery-1.11.3.min.js')}}"></script>

    <script src="{{ asset('js/jsplumb.js')}}"></script>
    <script src="{{ asset('js/jsplumb_list.js')}}"></script>
    <script src="{{ asset('js/plotly-latest.min.js')}}"></script>
    <script src="{{ asset('js/gauge.min.js')}}"></script>
    <script src="{{ asset('js/jquery.ui.js')}}"></script>

@endsection
@section('content-body')
<div class="w-100">   
   <v-simplecircuit></v-simplecircuit>
</div>

@endsection