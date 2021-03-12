@extends('../layouts/main')
@section('content-body')
<div style="display: flex;">   
	<!-- main side bar -->
   <v-msidebar home="{{route('home')}}" explore="{{route('explore')}}" settings="{{route('home')}}" mycourse="{{route('my-course-review')}}" courses="{{route('courses')}}" incourse="1" active="courses"  ></v-msidebar>   
	<!-- end main side bar -->

   <div class="expr-dashboard-container" style="background-color:#eee;">
   		<!-- top nav bar -->
        <v-systopnave title="Courses" username='said'></v-systopnave>   
   		<!-- end to nav bar -->

   		<!-- content -->
        
        <!-- start tab -->
   		<v-coursestab systabActive="resources"></v-coursestab>
        <!-- End tab -->

        <div class="px-5 mt-5 ml-3 mr-3" style="margin-bottom:2rem; border-radius: 0.8rem;background-color:#fff;">
            <div class="pt-4">
                <div class="pull-right" style="color:green;">Update</div>
                <div><p class="font fw6">General Physics</p></div>
            </div>
            <div class="pl-0 pr-0 mt-4">
                <p style="color:#ccc">Course Code</p>
                <p>Phy107</p>
            </div>
            <div class="col-6 pl-0 pr-0 mt-5" style="margin-bottom:5rem;">
                <p style="color:#ccc">Description</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                    Donec volutpat urna a mollis congue. Nunc sit amet 
                    fermentum est, a suscipit lorem. Maecenas accumsan 
                    enim in odio gravida cursus. Orci varius natoque 
                    penatibus et magnis dis parturient montes.
                </p>
            </div>
        </div>
</div>

@endsection