@extends('layouts/main')
@section('content-body')
    <div class="content">
        <v-navb home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <v-t></v-t>
        <v-sponsor></v-sponsor>
    </div>
@endsection