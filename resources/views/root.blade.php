@extends('layouts/main')
@section('content-body')
    <div class="content">
        <v-navb home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <main>
            <v-t></v-t>
            <v-sponsor></v-sponsor>
        </main>
    </div>
@endsection