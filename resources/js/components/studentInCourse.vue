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
					<div class="w-100 rounded shadow-sm bg-white p-2" v-for="result in results">
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
						<table class="table table-bordered iresult">
							<thead v-html="returnHeader(result.result_json)" class="bg-white p-2 mx-auto mt-2"></thead>
							<tbody> 
								<tr v-for="tr in getTR(JSON.parse(result.result_json))">
									<td v-for="td in tr">{{td}}</td>
								</tr>								
							</tbody>
						</table>	
						<button class="btn-info button" @click="AllowReattempt(result.id)">Allow Reattempt</button>			
              			<input type="time" name="title" v-model="limitation" min="00:00" class="form-control py-2 d-inline-block vI without_ampm">

					</div>
				</div>									
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
	    				}
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