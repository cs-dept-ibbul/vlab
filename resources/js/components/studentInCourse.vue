<template>
	<div>		
		<!-- <div class="viewstudent w-50" >
           	<button class="button bg-success text-white px-1 py-1 mt-2 pr-3" ><span class="fa fa-chevron-left  ml-2 mr-1 text-white fs01"></span>Back</button>
        </div> -->        
         <br><br>         
		<v-loader  v-if="loaderState"></v-loader>						
		<br>
		<div v-show="!loaderState" class="row">	
			<div class="col-lg-3 col-md-12 p-1 d-sm-block d-md-block d-lg-none d-xl-none ">
		    	<h4 class="text-center font fw6">Experiments</h4>
		    	<button class="px-4 py-2 button btn btn-light text-dark w-100 fw6 font fs1 my-2 " style="font-weight: 500;" v-for="experiment in experiments" :key="experiment.id" @click="fetchExperimentResult(experiment.id)">{{experiment.name}}</button>
		    </div>
			<div class="col-lg-9 col-md-12 " style="max-height: 65vh; overflow: scroll;" v-if="loaderState2">
				<v-loader v-if="!showresults"></v-loader>							
				<div v-else class="p-2">
					<button class="btn btn-warning text-white py-1 px-3 mb-2" @click="generatePdf">Print</button>
					<div class="w-100 rounded shadow-sm bg-white p-2 my-2" v-for="result in results" v-show="result.student.matric_number != ''" >	
										
						<div class="row">							
							<div class="font  col-lg-8 col-md-12">
								<span class=" no-break">
									<span class="fw5 p-text-success">Matric No.: </span>
									<span class="mr-1">{{result.student.matric_number}}</span>
								</span>
								<span class="no-break">
									<span class="fw5 p-text-success"> Name: </span> {{result.student.first_name + ' '+result.student.other_names}}
								</span>
							</div>
							<div class=" font fs01 col-lg-4 col-md-12">
								<span class=" no-break"><span class="fw5 p-text-success">Started:</span> 3/23/43 </span>						
								<span class=" no-break"><span class="fw5 p-text-success">Submitted:</span> 3/23/43</span>						
							</div>
						</div>

						<div v-for="mresult in JSON.parse(result.result_json)">							
							<h6 class="text-secondary">{{mresult.title}}</h6>
							<table class="table table-bordered iresult" >
								<thead v-html="mresult.mhead" class="bg-white p-2 mx-auto mt-2"></thead>
								<tbody>  
									<tr v-for="tr in mresult.data">
										<td v-for="td in tr">{{td}}</td>
									</tr>								
								</tbody>
							</table>	
						</div>
						<button class="btn-info button" @click="AllowReattempt(result.id)">Allow Reattempt</button>			
              			<input type="time" name="title" v-model="limitation" min="00:00" class="form-control py-2 d-inline-block vI without_ampm">

					</div>
				</div>									
			</div>
			<div class="col-lg-9 col-md-12 v-scroll-x" v-show="section">						
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
					        <tr v-for="(student, index) in students" :key="student.index">
					            <td width="10%">{{index+1}}.
					            </td>
					            <td width="20%">{{student.students.matric_number}}</td>	            
					            <td width="30%">{{student.students.first_name}}</td>
					            <td width="30%">{{student.students.other_names}}</td>
					            <td width="10%">{{student.students.gender}}</td>
					        </tr>
				    	</tbody>
				    </table>				
				<!-- results -->				
			</div>
			<div class="col-lg-9 col-md-12" v-if="section ==false && loaderState2 == false ">
			</div>			    			
		    <div class="col-lg-3 col-md-12 p-1 d-xs-none d-sm-none d-md-none d-lg-block" >		    	
		    	<div class="task-list-container">
		    		<h4 style="border-radius: 5px 5px 0px 0px; background: #00b96b;" class="p-2 text-white text-center font m-0 fw3">Task</h4>
	    			<div v-for="task in tasks" class="bg-white " >
	    				<div class="d-flex justify-between flex-wrap btn-spec px-3 pt-3 pb-1" tabindex="1">
		    				<h6 class="fw3 text-dark">{{task.title}}</h6>
		    				<span class="fa fa-chevron-up fs01 spanIconM iconM d-flex flex-wrap" style="color: #bbb;"></span>	    					
	    				</div>
	    				<ul class="display-none px-3 py-2 ulLeft">
	    <li v-for="exp in task.weekly_work_experiments" @click="showResult(exp.id,$root)" class="font2 text-dark">
	    						{{exp.experiments.name}}
	    					</li>
	    				</ul>
	    			</div>	
	    			
	    		    	
		    		
		    	</div>
		    	<!--
		    		<button class="px-4 py-2 button btn btn-light text-dark w-100 fw6 font fs1 my-2 " style="font-weight: 500;" v-for="task in experiments" :key="experiment.id" @click="fetchExperimentResult(experiment.id)">{{experiment.name}}</button>
		    	-->
	    				
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
				iconchange:false,
				course_code:'',
				limitation:'01:00',
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
				],
				tasks:[],
				showresults:false,
				results: [],
			}
		},
		methods:{
			fetchExperimentResult: function(id){
				this.loaderState2 = true;
				let $this = this;
				this.section = false;

				//this.$eventBus.$emit('viewStudentExperiment',{data:true});
			},
			viewstudent:function(){
				
			},
			getTR(rs){				
				if (rs != null){
					return rs[0].data;
				}else{
					return [];
				}
			},
			returnHeader:function(json){			
				let parser = JSON.parse(json);

				if(parser != null){
					return JSON.parse(json)[0].mhead;
				}else{
					return [];
				}
			},
			generatePdf(){
				var genPdf = `
					<style>
					table, th, td {
					  border: 1px solid black;
					  border-collapse: collapse;
					}
					.w-100{width:100%;}
					.rounded{border-radius:.25rem!important}
					.bg-white{background:white;}.p-2{padding:.5rem!important}
					.row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}
					.row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px}.no-gutters{margin-right:0;margin-left:0}.no-gutters>.col,.no-gutters>[class*=col-]{padding-right:0;padding-left:0}.col,.col-1,.col-10,.col-11,.col-12,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9,.col-auto,.col-lg,.col-lg-1,.col-lg-10,.col-lg-11,.col-lg-12,.col-lg-2,.col-lg-3,.col-lg-4,.col-lg-5,.col-lg-6,.col-lg-7,.col-lg-8,.col-lg-9,.col-lg-auto,.col-md,.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-md-auto,.col-sm,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-sm-auto,.col-xl,.col-xl-1,.col-xl-10,.col-xl-11,.col-xl-12,.col-xl-2,.col-xl-3,.col-xl-4,.col-xl-5,.col-xl-6,.col-xl-7,.col-xl-8,.col-xl-9,.col-xl-auto{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px}.col{-ms-flex-preferred-size:0;flex-basis:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-auto{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-1{-webkit-box-flex:0;-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-4{-webkit-box-flex:0;-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-5{-webkit-box-flex:0;-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-7{-webkit-box-flex:0;-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-10{-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-11{-webkit-box-flex:0;-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}.order-last{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}.order-0{-webkit-box-ordinal-group:1;-ms-flex-order:0;order:0}.order-1{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1}.order-2{-webkit-box-ordinal-group:3;-ms-flex-order:2;order:2}.order-3{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.order-4{-webkit-box-ordinal-group:5;-ms-flex-order:4;order:4}.order-5{-webkit-box-ordinal-group:6;-ms-flex-order:5;order:5}.order-6{-webkit-box-ordinal-group:7;-ms-flex-order:6;order:6}.order-7{-webkit-box-ordinal-group:8;-ms-flex-order:7;order:7}.order-8{-webkit-box-ordinal-group:9;-ms-flex-order:8;order:8}.order-9{-webkit-box-ordinal-group:10;-ms-flex-order:9;order:9}.order-10{-webkit-box-ordinal-group:11;-ms-flex-order:10;order:10}.order-11{-webkit-box-ordinal-group:12;-ms-flex-order:11;order:11}.order-12{-webkit-box-ordinal-group:13;-ms-flex-order:12;order:12}.offset-1{margin-left:8.333333%}.offset-2{margin-left:16.666667%}.offset-3{margin-left:25%}.offset-4{margin-left:33.333333%}.offset-5{margin-left:41.666667%}.offset-6{margin-left:50%}.offset-7{margin-left:58.333333%}.offset-8{margin-left:66.666667%}.offset-9{margin-left:75%}.offset-10{margin-left:83.333333%}.offset-11{margin-left:91.666667%}@media (min-width:576px){.col-sm{-ms-flex-preferred-size:0;flex-basis:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-sm-auto{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-sm-1{-webkit-box-flex:0;-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-sm-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-sm-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-sm-4{-webkit-box-flex:0;-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-sm-5{-webkit-box-flex:0;-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-sm-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-sm-7{-webkit-box-flex:0;-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-sm-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-sm-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-sm-10{-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-sm-11{-webkit-box-flex:0;-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-sm-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-sm-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}.order-sm-last{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}.order-sm-0{-webkit-box-ordinal-group:1;-ms-flex-order:0;order:0}.order-sm-1{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1}.order-sm-2{-webkit-box-ordinal-group:3;-ms-flex-order:2;order:2}.order-sm-3{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.order-sm-4{-webkit-box-ordinal-group:5;-ms-flex-order:4;order:4}.order-sm-5{-webkit-box-ordinal-group:6;-ms-flex-order:5;order:5}.order-sm-6{-webkit-box-ordinal-group:7;-ms-flex-order:6;order:6}.order-sm-7{-webkit-box-ordinal-group:8;-ms-flex-order:7;order:7}.order-sm-8{-webkit-box-ordinal-group:9;-ms-flex-order:8;order:8}.order-sm-9{-webkit-box-ordinal-group:10;-ms-flex-order:9;order:9}.order-sm-10{-webkit-box-ordinal-group:11;-ms-flex-order:10;order:10}.order-sm-11{-webkit-box-ordinal-group:12;-ms-flex-order:11;order:11}.order-sm-12{-webkit-box-ordinal-group:13;-ms-flex-order:12;order:12}.offset-sm-0{margin-left:0}.offset-sm-1{margin-left:8.333333%}.offset-sm-2{margin-left:16.666667%}.offset-sm-3{margin-left:25%}.offset-sm-4{margin-left:33.333333%}.offset-sm-5{margin-left:41.666667%}.offset-sm-6{margin-left:50%}.offset-sm-7{margin-left:58.333333%}.offset-sm-8{margin-left:66.666667%}.offset-sm-9{margin-left:75%}.offset-sm-10{margin-left:83.333333%}.offset-sm-11{margin-left:91.666667%}}@media (min-width:768px){.col-md{-ms-flex-preferred-size:0;flex-basis:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-md-auto{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-md-1{-webkit-box-flex:0;-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-md-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-md-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-md-4{-webkit-box-flex:0;-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-md-5{-webkit-box-flex:0;-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-md-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-md-7{-webkit-box-flex:0;-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-md-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-md-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-md-10{-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-md-11{-webkit-box-flex:0;-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-md-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-md-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}.order-md-last{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}.order-md-0{-webkit-box-ordinal-group:1;-ms-flex-order:0;order:0}.order-md-1{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1}.order-md-2{-webkit-box-ordinal-group:3;-ms-flex-order:2;order:2}.order-md-3{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.order-md-4{-webkit-box-ordinal-group:5;-ms-flex-order:4;order:4}.order-md-5{-webkit-box-ordinal-group:6;-ms-flex-order:5;order:5}.order-md-6{-webkit-box-ordinal-group:7;-ms-flex-order:6;order:6}.order-md-7{-webkit-box-ordinal-group:8;-ms-flex-order:7;order:7}.order-md-8{-webkit-box-ordinal-group:9;-ms-flex-order:8;order:8}.order-md-9{-webkit-box-ordinal-group:10;-ms-flex-order:9;order:9}.order-md-10{-webkit-box-ordinal-group:11;-ms-flex-order:10;order:10}.order-md-11{-webkit-box-ordinal-group:12;-ms-flex-order:11;order:11}.order-md-12{-webkit-box-ordinal-group:13;-ms-flex-order:12;order:12}.offset-md-0{margin-left:0}.offset-md-1{margin-left:8.333333%}.offset-md-2{margin-left:16.666667%}.offset-md-3{margin-left:25%}.offset-md-4{margin-left:33.333333%}.offset-md-5{margin-left:41.666667%}.offset-md-6{margin-left:50%}.offset-md-7{margin-left:58.333333%}.offset-md-8{margin-left:66.666667%}.offset-md-9{margin-left:75%}.offset-md-10{margin-left:83.333333%}.offset-md-11{margin-left:91.666667%}}@media (min-width:992px){.col-lg{-ms-flex-preferred-size:0;flex-basis:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-lg-auto{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-lg-1{-webkit-box-flex:0;-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-lg-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-lg-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-lg-4{-webkit-box-flex:0;-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-lg-5{-webkit-box-flex:0;-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-lg-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-lg-7{-webkit-box-flex:0;-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-lg-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-lg-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-lg-10{-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-lg-11{-webkit-box-flex:0;-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-lg-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-lg-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}.order-lg-last{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}.order-lg-0{-webkit-box-ordinal-group:1;-ms-flex-order:0;order:0}.order-lg-1{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1}.order-lg-2{-webkit-box-ordinal-group:3;-ms-flex-order:2;order:2}.order-lg-3{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.order-lg-4{-webkit-box-ordinal-group:5;-ms-flex-order:4;order:4}.order-lg-5{-webkit-box-ordinal-group:6;-ms-flex-order:5;order:5}.order-lg-6{-webkit-box-ordinal-group:7;-ms-flex-order:6;order:6}.order-lg-7{-webkit-box-ordinal-group:8;-ms-flex-order:7;order:7}.order-lg-8{-webkit-box-ordinal-group:9;-ms-flex-order:8;order:8}.order-lg-9{-webkit-box-ordinal-group:10;-ms-flex-order:9;order:9}.order-lg-10{-webkit-box-ordinal-group:11;-ms-flex-order:10;order:10}.order-lg-11{-webkit-box-ordinal-group:12;-ms-flex-order:11;order:11}.order-lg-12{-webkit-box-ordinal-group:13;-ms-flex-order:12;order:12}.offset-lg-0{margin-left:0}.offset-lg-1{margin-left:8.333333%}.offset-lg-2{margin-left:16.666667%}.offset-lg-3{margin-left:25%}.offset-lg-4{margin-left:33.333333%}.offset-lg-5{margin-left:41.666667%}.offset-lg-6{margin-left:50%}.offset-lg-7{margin-left:58.333333%}.offset-lg-8{margin-left:66.666667%}.offset-lg-9{margin-left:75%}.offset-lg-10{margin-left:83.333333%}.offset-lg-11{margin-left:91.666667%}}@media (min-width:1200px){.col-xl{-ms-flex-preferred-size:0;flex-basis:0;-webkit-box-flex:1;-ms-flex-positive:1;flex-grow:1;max-width:100%}.col-xl-auto{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;width:auto;max-width:none}.col-xl-1{-webkit-box-flex:0;-ms-flex:0 0 8.333333%;flex:0 0 8.333333%;max-width:8.333333%}.col-xl-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%}.col-xl-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%}.col-xl-4{-webkit-box-flex:0;-ms-flex:0 0 33.333333%;flex:0 0 33.333333%;max-width:33.333333%}.col-xl-5{-webkit-box-flex:0;-ms-flex:0 0 41.666667%;flex:0 0 41.666667%;max-width:41.666667%}.col-xl-6{-webkit-box-flex:0;-ms-flex:0 0 50%;flex:0 0 50%;max-width:50%}.col-xl-7{-webkit-box-flex:0;-ms-flex:0 0 58.333333%;flex:0 0 58.333333%;max-width:58.333333%}.col-xl-8{-webkit-box-flex:0;-ms-flex:0 0 66.666667%;flex:0 0 66.666667%;max-width:66.666667%}.col-xl-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%}.col-xl-10{-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%}.col-xl-11{-webkit-box-flex:0;-ms-flex:0 0 91.666667%;flex:0 0 91.666667%;max-width:91.666667%}.col-xl-12{-webkit-box-flex:0;-ms-flex:0 0 100%;flex:0 0 100%;max-width:100%}.order-xl-first{-webkit-box-ordinal-group:0;-ms-flex-order:-1;order:-1}.order-xl-last{-webkit-box-ordinal-group:14;-ms-flex-order:13;order:13}.order-xl-0{-webkit-box-ordinal-group:1;-ms-flex-order:0;order:0}.order-xl-1{-webkit-box-ordinal-group:2;-ms-flex-order:1;order:1}.order-xl-2{-webkit-box-ordinal-group:3;-ms-flex-order:2;order:2}.order-xl-3{-webkit-box-ordinal-group:4;-ms-flex-order:3;order:3}.order-xl-4{-webkit-box-ordinal-group:5;-ms-flex-order:4;order:4}.order-xl-5{-webkit-box-ordinal-group:6;-ms-flex-order:5;order:5}.order-xl-6{-webkit-box-ordinal-group:7;-ms-flex-order:6;order:6}.order-xl-7{-webkit-box-ordinal-group:8;-ms-flex-order:7;order:7}.order-xl-8{-webkit-box-ordinal-group:9;-ms-flex-order:8;order:8}.order-xl-9{-webkit-box-ordinal-group:10;-ms-flex-order:9;order:9}.order-xl-10{-webkit-box-ordinal-group:11;-ms-flex-order:10;order:10}.order-xl-11{-webkit-box-ordinal-group:12;-ms-flex-order:11;order:11}.order-xl-12{-webkit-box-ordinal-group:13;-ms-flex-order:12;order:12}.offset-xl-0{margin-left:0}.offset-xl-1{margin-left:8.333333%}.offset-xl-2{margin-left:16.666667%}.offset-xl-3{margin-left:25%}.offset-xl-4{margin-left:33.333333%}.offset-xl-5{margin-left:41.666667%}.offset-xl-6{margin-left:50%}.offset-xl-7{margin-left:58.333333%}.offset-xl-8{margin-left:66.666667%}.offset-xl-9{margin-left:75%}.offset-xl-10{margin-left:83.333333%}.offset-xl-11{margin-left:91.666667%}}.table{width:100%;max-width:100%;margin-bottom:1rem;background-color:transparent}.table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6}.table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6}.table tbody+tbody{border-top:2px solid #dee2e6}.table .table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered{border:1px solid #dee2e6}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-primary,.table-primary>td,.table-primary>th{background-color:#b8daff}.table-hover .table-primary:hover{background-color:#9fcdff}.table-hover .table-primary:hover>td,.table-hover .table-primary:hover>th{background-color:#9fcdff}.table-secondary,.table-secondary>td,.table-secondary>th{background-color:#d6d8db}.table-hover .table-secondary:hover{background-color:#c8cbcf}.table-hover .table-secondary:hover>td,.table-hover .table-secondary:hover>th{background-color:#c8cbcf}.table-success,.table-success>td,.table-success>th{background-color:#c3e6cb}.table-hover .table-success:hover{background-color:#b1dfbb}.table-hover .table-success:hover>td,.table-hover .table-success:hover>th{background-color:#b1dfbb}.table-info,.table-info>td,.table-info>th{background-color:#bee5eb}.table-hover .table-info:hover{background-color:#abdde5}.table-hover .table-info:hover>td,.table-hover .table-info:hover>th{background-color:#abdde5}.table-warning,.table-warning>td,.table-warning>th{background-color:#ffeeba}.table-hover .table-warning:hover{background-color:#ffe8a1}.table-hover .table-warning:hover>td,.table-hover .table-warning:hover>th{background-color:#ffe8a1}.table-danger,.table-danger>td,.table-danger>th{background-color:#f5c6cb}.table-hover .table-danger:hover{background-color:#f1b0b7}.table-hover .table-danger:hover>td,.table-hover .table-danger:hover>th{background-color:#f1b0b7}.table-light,.table-light>td,.table-light>th{background-color:#fdfdfe}.table-hover .table-light:hover{background-color:#ececf6}.table-hover .table-light:hover>td,.table-hover .table-light:hover>th{background-color:#ececf6}.table-dark,.table-dark>td,.table-dark>th{background-color:#c6c8ca}.table-hover .table-dark:hover{background-color:#b9bbbe}.table-hover .table-dark:hover>td,.table-hover .table-dark:hover>th{background-color:#b9bbbe}.table-active,.table-active>td,.table-active>th{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover{background-color:rgba(0,0,0,.075)}.table-hover .table-active:hover>td,.table-hover .table-active:hover>th{background-color:rgba(0,0,0,.075)}.table .thead-dark th{color:#fff;background-color:#212529;border-color:#32383e}.table .thead-light th{color:#495057;background-color:#e9ecef;border-color:#dee2e6}.table-dark{color:#fff;background-color:#212529}.table-dark td,.table-dark th,.table-dark thead th{border-color:#32383e}.table-dark.table-bordered{border:0}.table-dark.table-striped tbody tr:nth-of-type(odd){background-color:rgba(255,255,255,.05)}.table-dark.table-hover tbody tr:hover{background-color:rgba(255,255,255,.075)}@media (max-width:575.98px){.table-responsive-sm{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-sm>.table-bordered{border:0}}@media (max-width:767.98px){.table-responsive-md{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-md>.table-bordered{border:0}}@media (max-width:991.98px){.table-responsive-lg{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-lg>.table-bordered{border:0}}@media (max-width:1199.98px){.table-responsive-xl{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive-xl>.table-bordered{border:0}}.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar}.table-responsive>.table-bordered{border:0}.form-control{display:block;width:100%;padding:.375rem .75rem;font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out}.form-control::-ms-expand{background-color:transparent;border:0}.form-control:focus{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25)}.form-control::-webkit-input-placeholder{color:#6c757d;opacity:1}.form-control::-moz-placeholder{color:#6c757d;opacity:1}.form-control:-ms-input-placeholder{color:#6c757d;opacity:1}.form-control::-ms-input-placeholder{color:#6c757d;opacity:1}.form-control::placeholder{color:#6c757d;opacity:1}.form-control:disabled,.form-control[readonly]{background-color:#e9ecef;opacity:1}select.form-control:not([size]):not([multiple]){height:calc(2.25rem + 2px)}select.form-control:focus::-ms-value{color:#495057;background-color:#fff}.form-control-file,.form-control-range{display:block;width:100%}.col-form-label{padding-top:calc(.375rem + 1px);padding-bottom:calc(.375rem + 1px);margin-bottom:0;font-size:inherit;line-height:1.5}.col-form-label-lg{padding-top:calc(.5rem + 1px);padding-bottom:calc(.5rem + 1px);font-size:1.25rem;line-height:1.5}.col-form-label-sm{padding-top:calc(.25rem + 1px);padding-bottom:calc(.25rem + 1px);font-size:.875rem;line-height:1.5}.form-control-plaintext{display:block;width:100%;padding-top:.375rem;padding-bottom:.375rem;margin-bottom:0;line-height:1.5;background-color:transparent;border:solid transparent;border-width:1px 0}.form-control-plaintext.form-control-lg,.form-control-plaintext.form-control-sm,.input-group-lg>.form-control-plaintext.form-control,.input-group-lg>.input-group-append>.form-control-plaintext.btn,.input-group-lg>.input-group-append>.form-control-plaintext.input-group-text,.input-group-lg>.input-group-prepend>.form-control-plaintext.btn,.input-group-lg>.input-group-prepend>.form-control-plaintext.input-group-text,.input-group-sm>.form-control-plaintext.form-control,.input-group-sm>.input-group-append>.form-control-plaintext.btn,.input-group-sm>.input-group-append>.form-control-plaintext.input-group-text,.input-group-sm>.input-group-prepend>.form-control-plaintext.btn,.input-group-sm>.input-group-prepend>.form-control-plaintext.input-group-text{padding-right:0;padding-left:0}.form-control-sm,.input-group-sm>.form-control,.input-group-sm>.input-group-append>.btn,.input-group-sm>.input-group-append>.input-group-text,.input-group-sm>.input-group-prepend>.btn,.input-group-sm>.input-group-prepend>.input-group-text{padding:.25rem .5rem;font-size:.875rem;line-height:1.5;border-radius:.2rem}.input-group-sm>.input-group-append>select.btn:not([size]):not([multiple]),.input-group-sm>.input-group-append>select.input-group-text:not([size]):not([multiple]),.input-group-sm>.input-group-prepend>select.btn:not([size]):not([multiple]),.input-group-sm>.input-group-prepend>select.input-group-text:not([size]):not([multiple]),.input-group-sm>select.form-control:not([size]):not([multiple]),select.form-control-sm:not([size]):not([multiple]){height:calc(1.8125rem + 2px)}.form-control-lg,.input-group-lg>.form-control,.input-group-lg>.input-group-append>.btn,.input-group-lg>.input-group-append>.input-group-text,.input-group-lg>.input-group-prepend>.btn,.input-group-lg>.input-group-prepend>.input-group-text{padding:.5rem 1rem;font-size:1.25rem;line-height:1.5;border-radius:.3rem}.input-group-lg>.input-group-append>select.btn:not([size]):not([multiple]),.input-group-lg>.input-group-append>select.input-group-text:not([size]):not([multiple]),.input-group-lg>.input-group-prepend>select.btn:not([size]):not([multiple]),.input-group-lg>.input-group-prepend>select.input-group-text:not([size]):not([multiple]),.input-group-lg>select.form-control:not([size]):not([multiple]),select.form-control-lg:not([size]):not([multiple]){height:calc(2.875rem + 2px)}.form-group{margin-bottom:1rem}.form-text{display:block;margin-top:.25rem}.form-row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-5px;margin-left:-5px}.form-row>.col,.form-row>[class*=col-]{padding-right:5px;padding-left:5px}.form-check{position:relative;display:block;padding-left:1.25rem}.form-check-input{position:absolute;margin-top:.3rem;margin-left:-1.25rem}.form-check-input:disabled~.form-check-label{color:#6c757d}.form-check-label{margin-bottom:0}				
					.table{background-color:#fff}.table-sm td,.table-sm th{padding:.3rem}.table-bordered{border:1px solid #dee2e6}.table-bordered td,.table-bordered th{border:1px solid #dee2e6}.table-bordered thead td,.table-bordered thead th{border-bottom-width:2px}.table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05)}.table-hover tbody tr:hover{background-color:rgba(0,0,0,.075)}.table-primary,.table-primary>td,.table-primary>th{background-color:#b8daff}.table-hover .table-primary:hover{background-color:#9fcdff}.table-hover .table-primary:hover>td,.table-hover .table-primary:hover>th{background-color:#9fcdff}.table-secondary,.table-secondary>td,.table-secondary>th{background-color:#d6d8db}.table-hover .table-secondary:hover{background-color:#c8cbcf}.table-hover .table-secondary:hover>td,.table-hover .table-secondary:hover>th{background-color:#c8cbcf}.table-success,.table-success>td,.table-success>th{background-color:#c3e6cb}.table-hover .table-success:hover{background-color:#b1dfbb}.table-hover .table-success:hover>td,.table-hover .table-success:hover>th{background-color:#b1dfbb}.table-info,.table-info>td,.table-info>th{background-color:#bee5eb}.table-hover .table-info:hover{background-color:#abdde5}.table-hover .table-info:hover>td,.table-hover .table-info:hover>th{background-color:#abdde5}	
					.p-danger {
					  background: #dd000f !important;
					}
					.p-warning {
					  background: orange !important;
					}
					.p-success {
					  background: #00b96b !important;
					}
					.p-transparent-warning{
					  background: #FFDBB5;
					}
					.p-transparent-dark{
					  background: rgba(0,0,0,.4);
					}
					.p-light {
					  background: rgba(0, 190, 70, 0.1) !important;
					}
					.p-secondary {
					  background: #f0f0f0 !important;
					}
					.p-text-warning{
					  color: #FF8200;
					}
					span.p-text-success,.p-text-success,p.p-text-success{
					  color: #00b96b;
					}
					span.p-text-secondary,.p-text-secondary{
					  color: #bbb;
					}
					.p-dark{
					  background: #20154e !important;
					}
					.sys-submit-btn{
					    box-shadow: inset 1px -3px 6px rgb(145,95,200) ;
					    cursor: pointer ;  
					    border:none;  
					    z-index: 5;
					    position: relative;
					    border-radius: 5px;
					}
					button:focus{
					  outline: 0 !important;
					}
					.sys-submit-btn:active{
					    user-select: none;
					     box-shadow: none;
					}

					.p-text-dark{
					  color: #20154e;
					}
					.px-6 {
					  padding-left: 90px;
					  padding-right: 90px;
					}
					.ftag {
					  background: rgba(0, 190, 70, 0.1) !important;
					  color: #00b96b !important;
					  padding: 4px 7px;
					  margin: 1px 2px;
					  border-radius: 5px;
					}
					.h1 {
					  height: 26px;
					}
					.h2{
					  height: 50px !important;
					}
					.h500 {
					  height: 500px;
					}
					.h100 {
					  height: 100px;
					}
					.h-100{
					  height: 100%;
					}
					.cadin {
					  transition: all 1s;
					}
					.cadin:after {
					  content: '';
					  display: block;
					  position: relative;
					  transition: all 1s;
					}
					.cadin:hover:after {
					  content: '';
					  display: block;
					  justify-content: center;
					  position: relative;
					  background: rgba(10, 10, 10, 0.1);
					  width: 100%;
					  height: 100%;
					  top: -100%;
					  z-index: 5;
					  border-radius: 8px;
					}
					</style>

				`;				 
				 for (var i = 0; i < this.results.length; i++) {
				 	if (this.results[i].result_json == null) {
				 		continue;
				 	}
				 	var result = JSON.parse(this.results[i].result_json);				 

					genPdf += `

					

					 <div class="w-100 rounded shadow-sm bg-white p-2">
						<div class="row">							
							<div class="font  col-lg-8 col-md-12">
								<span class=" no-break">
									<span class="fw5 p-text-success">Matric No.: </span>
									<span class="mr-1"> ${ this.results[i].student.matric_number } </span>
								</span>
								<span class="no-break">
									<span class="fw5 p-text-success"> Name: </span> ${this.results[i].student.first_name + ' '+this.results[i].student.other_names}
								</span>
							</div>
							<div class=" font fs01 col-lg-4 col-md-12">
								<span class=" no-break"><span class="fw5 p-text-success">Started:</span>${this.results[i].time_started.split(',')[0]} </span>						
								<span class=" no-break"><span class="fw5 p-text-success">Submitted:</span>${this.results[i].time_submited.split(',')[0]}</span>						
							</div>
						</div>
						`;
							

						for (var t = 0; t < result.length; t++) {
							
						genPdf += `<h4 style="margin-bottom:1px; margin-top:4px;">${result[t].title}</h4>
								        <table class="table table-bordered iresult">
											<thead class="bg-white p-1 mx-auto mt-2">
												${result[t].mhead}
											</thead>
							<tbody>`;								
							for (var j = 1; j < result[t].data.length; j++) {
								var tr = result[t].data[j];
								genPdf += '<tr class="p-0">';
								for (var k= 0; k < tr.length; k++) {
									var td = tr[k]
									genPdf +=`<td  class="px-2 py-0" >${td}</td>`;
								}
								genPdf +=`</tr>`;
							}
							genPdf +=`								
							</tbody>
								</table>`;
							}
							genPdf += `</div>`;
						}
					   var printWin = window.open();					   					   
					   printWin.document.write(genPdf);
					   printWin.document.close();
					   printWin.focus();
					   printWin.print();
					   printWin.close();

			},
			AllowReattempt(rid){
				const formdata  = new FormData();						  
				formdata.append('result_id', rid);		    	    
				formdata.append('time_left', this.limitation);					
				this.axios.post('api/experiments/allow_reattempt_by_result_id', formdata, {headers:this.axiosHeader}).then(function(response, status, request) {        
                    if (response.status === 200) {  	                                       
                      		const Toast = Swal.mixin({
		                    toast: true,
		                    position: 'top-end',
		                    showConfirmButton: false,
		                    timer: 3000,
		                    timerProgressBar: true,
		                    didOpen: (toast) => {
		                      toast.addEventListener('mouseenter', Swal.stopTimer)
		                      toast.addEventListener('mouseleave', Swal.resumeTimer)
		                    }
		                  })

		                  Toast.fire({
		                    icon: 'success',
		                    title: 'Student can now reattempt experiment'
		                  })
                    }else{
                    	$this.attemptsFailsV();
                    }
                });
			},
			attemptsFailsV(){
				Swal.fire({
				  text: 'something went wrong',
				  title: 'click Ok to retry',
				  icon:'error',
				  showClass: {
				    popup: 'animate__animated animate__fadeInDown'
				  },
				  hideClass: {
				    popup: 'animate__animated animate__fadeOutUp'
				  }
				}).then((result) => {
					  /* Read more about isConfirmed, isDenied below */
					  if (result.isConfirmed) {
					    location.reload();
					  } else if (result.isDenied) {
					    Swal.fire('please reload the page', '', 'info')
					  }
				});
			},
			showResult:function(weekly_work_experiment_id,root){				
				let id = weekly_work_experiment_id;							
				this.$eventBus.$emit('viewStudentExperiment',{data:true}); //line 132 listen to me and also viewStudent.vue parent		


				let retryCount = 0;			
				var $this = this;
				
					
					let AxiosFetchData = function(){
						let datafetched = '0';						
						retryCount +=1;							
											
					    const formdata  = new FormData();						  
					    formdata .append('weekly_experiment_id', id)			    	    
	                    $this.axios.post($this.baseApiUrl+'experiments/experiment_results_esid',formdata,{headers: $this.axiosHeader}).then(function(response, status, request) {        
	                            if (response.status === 200) {  	                                       
	                               $this.results = response.data	                               
	                               $this.showresults = true;	
	                            }else{
	                            	if (retryCount < 4) {
	                            		setTimeout(function() {
	                            			AxiosFetchData();
	                            		}, 5000);
	                            	}else{
	                            		/*when all attempts fails inform the user what to do*/
	                            		$this.attemptsFailsV();
	                            	}
	                            }
	                        }, function(e) {        
	                        	
	                             if(e.response.status === 401 ){
	                             	 localStorage.removeItem("LoggedUser");
	                                location.href = "/logout";
	                             }else{
	                               $this.attemptsFailsV()                                           
	                             }                                                                   
	                        })                             
						try{
						}catch(err){
							//console.log(err)
						}
						//return datafetched;
					}							
					return AxiosFetchData();										
			}
		},		
		mounted(){
			this.$nextTick(function(){
				$('.btn-spec').click(function(){
					$(this).find('.spanIconM').toggleClass('spanIcon');
					$(this).next().slideToggle(200);
				});				
			})
			var $this = this;
			$(document).ready(function(){
				if ($this.tasks != null) {
					try{						
						$this.limitation = $this.tasks[0].limitation;
						let expt = $this.limitation.split(':');
						if (expt[0].length == 1) {
							expt[0] = '0'+expt[0]
						}
						if (expt[1].length == 1) {
							expt[1] = '0'+expt[1]
						}
						$this.limitation = expt[0]+':'+expt[1];					
					}catch(err){
						console.log(err);
					}
				}
			});
			this.$eventBus.$on('viewStudentExperiment',data=>{
				this.loaderState2 = true;
				this.section = false;
				this.showresults = false;
			});
		},
		props:{
			course:{
				type:Object,				
			}
		},	
		async created(){
			this.students 	 = this.course.course_student;
			this.tasks		 = this.course.weekly_work;
			this.course_code = this.course.code;
			

		    let $this = this;
		    this.$eventBus.$on('viewstudentBtn2',data=>{				
				this.loaderState2= false;
				this.section = true;
				
			});
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
	tbody tr td{
		text-transform: capitalize;
	}
	.justify-between{
		margin-bottom: 6px;
		justify-content: space-between;
	}
	.btn-spec:focus{
		-webkit-box-shadow: 0 6px 6px -4px #ccc;
		-moz-box-shadow: 0 8px 6px -4px #ccc;
		box-shadow: 0 8px 6px -4px #ccc;
	}	
	.iconM{		
		justify-content: center;		
	}
	.display-none{
		display: none;
	}
	.spanIcon{
		-webkit-transform: rotate(180deg);
  		transform: rotate(180deg);
	}
	.btn-spec{	  
		cursor: pointer;
		-webkit-box-shadow: 0 6px 2px -4px #eee;
		-moz-box-shadow: 0 6px 2px -4px #eee;
		box-shadow: 0 6px 2px -4px #eee;
	}
	.ulLeft li{
		margin-left: 10px;		
		cursor: pointer;
		color: rgb(200,200,200);
	}
	.ulLeft li:hover{
		text-decoration: underline;
	}
/*	.ulLeft:after{
		position: absolute;
		content: '';
		display: block;
		width: 100%;
		height: 3px;
		background: #eee;
		filter: blur(1.4px);
		top:0;
		left: 0px;

	}*/
	.ulLeft{	
		position: relative;	
		border-radius: 5px;
		width: 90%;
		left: 5%;
		margin-top: 4px;
		background: #ccc;
	}
	.iresult tbody tr td{
		padding: 2px;
	}
	.task-list-container{
		min-height: 150px;
		box-shadow: 2px 2px 9px #ccc;
		border-radius: 5px 5px 0px 0px;
		padding: 0px 0px 10px 0px;
		user-select: none;

	}
</style>