@extends('layouts/main')
@section('content-body')
    <div class="dashboad-content" style="display: flex;">
     

   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="mycourse"  ></v-msidebar>   
        <div class="dashboard-content" style="width: 100%;">
         <!-- top nav bar -->
            <v-topnav></v-topnav>
         <!-- end to nav bar -->
            <v-lactivity></v-lactivity>
            <v-practicaltimeline></v-practicaltimeline>
        </div>
    </div>
@endsection