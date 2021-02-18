@extends('layouts/main')
@section('content-body')
    <div class="dashboad-content">
        <v-msidebar> </v-msidebar>
        <div class="dashboard-content">
         <!-- top nav bar -->
            <v-topnav></v-topnav>
         <!-- end to nav bar -->
         <v-enrolledpracticals></v-enrolledpracticals>
        </div>
    </div>
@endsection