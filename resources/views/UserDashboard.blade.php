@extends('layouts/main')
@section('content-body')
    <div class="dashboad-content">
        <v-msidebar> </v-msidebar>
        <div class="dashboard-content">
         <!-- top nav bar -->
            <v-topnav></v-topnav>
         <!-- end to nav bar -->

       
            <v-lactivity></v-lactivity>
       
            <v-practicaltimeline></v-practicaltimeline>
        

        </div>
    </div>
@endsection