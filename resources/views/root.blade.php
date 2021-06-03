@extends('layouts/main')
@section('content-body')
    <div class="content">
		<!-- <v-userauth></v-userauth> -->

        <v-navb all_roles="{{json_encode(config('calculations.default_roles'))}}" home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <main>
            <v-home></v-home>
            <v-sponsor></v-sponsor>
        </main>
    </div>
@endsection