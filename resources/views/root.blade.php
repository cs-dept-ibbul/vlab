@extends('layouts/main')
@section('head')
<style type="text/css">
	#navbarId{
		box-shadow: none !important;
		border-bottom: 1px solid #eee;
	}
</style>
@endsection
@section('content-body')
    <div class="content">
		<!-- <v-userauth></v-userauth> -->

        <v-navb all_roles="{{json_encode(config('calculations.default_roles'))}}" home="{{route('home')}}" explore="{{route('explore')}}" login="{{route('login')}}"></v-navb>
        <main>
            <v-homex></v-homex>
            <v-sponsor></v-sponsor>
        </main>
    </div>
@endsection