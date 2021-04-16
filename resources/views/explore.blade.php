@extends('layouts/main')
@section('content-body')
    <div class="w-100 m-0 p-0 explore">
        <v-navb home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <br>
        <br>
        <br>
        <v-explore></v-explore>
       
    </div>
@endsection