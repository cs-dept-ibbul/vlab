@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">       
    
    <!-- main side bar --> 
     <v-isidebar active="task" activesub="task"></v-isidebar>   
    <!-- end main side bar -->

   <div class=" p-secondary " style="width: 100%;">
        <!-- top nav bar -->
        <v-systopnave title="Manage Task" username='said'></v-systopnave>   
        <!-- end to nav bar -->
        <v-task class="scroll-y vh-70 m-0 p-0" style="overflow-x: hidden;width: 93%;"></v-task>
   </div>
</div>
@endsection