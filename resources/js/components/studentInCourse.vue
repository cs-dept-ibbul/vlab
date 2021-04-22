<template>
	<div style="position: relative;">
		<div class="viewstudent w-50">
           	<button class="button bg-primary text-white pl-1 pr-2 py-2" @click="viewstudent"><span class="fa fa-chevron-left ml-2 mr-1 text-white"></span>View Student</button>
         </div>
		<v-loader  v-if="loaderState"></v-loader>						
		<br>
		<div v-show="!loaderState" class="row">	
			<div class="col-lg-3 col-md-12 p-1 d-sm-block d-md-block d-lg-none d-xl-none ">
		    	<h4 class="text-center font fw6">Experiments</h4>
		    	<button class="px-4 py-2 button btn btn-light text-dark w-100 fw6 font fs1 my-2 " style="font-weight: 500;" v-for="experiment in experiments" :key="experiment.id" @click="fetchExperimentResult(experiment.id)">{{experiment.name}}</button>
		    </div>
			<div class="col-lg-9 col-md-12" v-show="loaderState2">
				<v-loader></v-loader>						
			</div>
			<div class="col-lg-9 col-md-12" v-show="section">
				<table id="studenttable" class="table table-hover">
					<thead>
						<tr id="cheadV">					
						<th width="10%">S/N</th>
			            <th width="20%">Matric Number</th>
			            <th width="30%">First Name</th>
			            <th width="30%">Last Name</th>
			            <th width="10%">Gender</th>	            
						</tr>
					</thead>
					<tbody>				
				        <tr v-for="(student, index) in students" :key="student.id">
				            <td width="10%">
				            </td>
				            <td width="20%">{{student.matric_number}}</td>	            
				            <td width="30%">{{student.first_name}}</td>
				            <td width="30%">{{student.other_names}}</td>
				            <td width="10%">{{student.gender}}</td>
				        </tr>
			    	</tbody>
			    </table>
			</div>
			<div class="col-lg-9 col-md-12" v-if="section ==false && loaderState2 == false ">
			</div>			    			
		    <div class="col-lg-3 col-md-12 p-1 d-xs-none d-sm-none d-md-none d-lg-block" >
		    	<h4 class="text-center font fw6">Experiments</h4>
		    	<button class="px-4 py-2 button btn btn-light text-dark w-100 fw6 font fs1 my-2 " style="font-weight: 500;" v-for="experiment in experiments" :key="experiment.id" @click="fetchExperimentResult(experiment.id)">{{experiment.name}}</button>
		    </div>
		</div>
	</div>
</template>

<script>
	import loader from './skeletalLoaderA.vue'; 	
	export default{
		components:{		
			'v-loader':loader,
		},
		data(){
			return{
				loaderState:true,
				loaderState2:false,
				section:true,
				students: [
					{id:1,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
					{id:2,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
					{id:3,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
					{id:4,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
					{id:5,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
					{id:6,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
					{id:7,first_name:'ismail',other_names:'hamza',gender:'male',matric_number:'u15/fns/csc/1011'},
				],
				experiments:[
					{id:1,name:'simple pendulum'},
					{id:2,name:'Vernier Caliper'}
				]				
			}
		},
		methods:{
			fetchExperimentResult: function(id){
				this.loaderState2 = true;
				let $this = this;
				this.section = false;
				setTimeout(function() {

				//$this.loaderState2 = false;

				}, 600);


			},
			viewstudent:function(){
				this.loaderState2= false;
				this.section = true;
			}
		},
		mounted(){
			this.$nextTick(function(){

			})
		},
		props:{
			course:{
				type:Object,				
			}
		},
		async created(){

		    let $this = this;

		    //this.students  = await this.axiosGetById('api/students/course_students','course_id',3);
		    //this.experiments  = await this.axiosGetById('api/students/students','course_id',3);
             setTimeout(function() {             	
             	$this.loaderState =false;
		    	$this.rippleButton();
             	 $('#studenttable').DataTable({
			    	pageLength : 5,
			    });
             }, 200);
		},
	}
</script>
<style scoped="">
	button.button:focus{
		box-shadow: none !important;
	}
	.viewstudent{
		position: absolute;
		top: -48px;
		left: 90px;
	}
</style>