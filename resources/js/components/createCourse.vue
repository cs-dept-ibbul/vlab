<template>
	<div class="m-0 p-0">
			<div v-if="update" class="close" style="color: red;position: fixed;top: 0px;right: 5px;font-size: 2em;pointer-events: none;cursor: pointer;">&times</div>
	<div class="row bg-light m-0 px-2 pt-4">
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 m-0 ">
            	<p class="fs2 fw8 font">
            		<span v-if="!update">Create Course</span>
            		<span v-if="update">Update Course</span>
            	</p>
            	<div  class="w-100 bg-white r2 px-4 py-4 shadow-sm"><!-- loop weekly -->
						<div class="d-flex flex-wrap-center mb-4" >
							<span class="ncircle" v-bind:class="{tactive:stageone,tsuccess:stageonep}" >1</span>
							<span class="tline" v-bind:class="{tlactive:stageone,tlsuccess:stageonep}"></span>
							<div class="fs1 w10 no-break ml-3">Course Details </div>						
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle" v-bind:class="{tactive:stagetwo,tsuccess:stagetwop}">2</span>
							<span class="tline" v-bind:class="{tlactive:stagetwo,tlsuccess:stagetwop}"></span>
							<div class="fs1 w10 no-break ml-3">Add Experiment</div>							
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle"  v-bind:class="{tactive:stagethree,tsuccess:stagethreep}">3</span>
							<span class="tline" v-bind:class="{tlactive:stagethree,tlsuccess:stagethreep}"></span>
							<div class="fs1 w10 no-break ml-3">Add Resources</div>
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle"  v-bind:class="{tactive:stagefour,tsuccess:stagefourp}">4</span>							
							<div class="fs1 w10 no-break ml-3">Add Instruction</div>
						</div>
				</div>
            			   	
            </div>
            	
            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 pt-3" style="height: 76vh;">
            	<!-- course detatil -->            	
            	<div  class="py-4 px-4 mt-3 r2 bg-white shadow-sm" style="">
            		<div id="cdetail" v-show="sectionState==1" class="m-0 p-0">            			
	            		<p class="fw8 fs1 font" style="color: #777;">Course Details</p>
	            		<div class="row">            			
	            			<div class="col-lg-6 col-md-12 m-0">
	            				<p class="fs001 my-1">Course Title</p>
	            				<input type="text" @keyup="normalize" class="form-control vI" v-model="title" id="ctitle">
	            			</div>	            			
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<p class="fs001 my-1">Course Code</p>
	            				<input type="text"  @keyup="normalize" class="form-control vI" v-model="course_code" id="ccode">
	            			</div>
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<p class="fs001 my-1">Enrollment Code</p>
	            				<input type="text"  @keyup="normalize" class="form-control" v-model="enrollment_code" id="ecode">
	            			</div>
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<p class="fs001 my-1">Video Url</p>
	            				<input type="text"  placeholder="https://" v-model="video_url" @keyup="normalize" class="form-control" id="ecode">
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Course Description</p>            				
	            				<textarea @keyup="normalize" class="form-control vI w-100" v-model="description" rows="6" id="cdescription"></textarea>
	            			</div>
	            		</div>
	            	</div>
	            	<div v-if="!update" id="addExperiment" v-show="sectionState==2" class="m-0 p-0 shineA" style="min-height: 250px;">     
	            			<p class="fw8 fs1 font" style="color: #777;">Add Experiment</p>
	            			<div class="row">            			
		            			<div class="col-lg-12 col-md-12 m-0">
		            				<p class="fs001 my-1">Select Experiment</p>
		            				<div class="d-flex">
		            					<select @keyup="normalize" class="form-control vI w-100" id="selectExperiment">
		            						<option ></option>
		            						<option v-for="experiment in experiments" :value="experiment.id">{{experiment.name}}</option>
		            					</select>
		            					<button class=" ml-2 sysbtn p-success text-white" @click="addEBox">Add</button>
		            				</div>
		            				<br><br>
		            					<div class="d-flex  justify-content-between w-100">
				        					<div class="hr w-100"></div>
				        					<div class="w-100 text-center mb-2" style="margin-top:-10px;">Added Experiment</div>
				        					<div class="hr w-100"></div>
				        				</div>		            				
		            				<br>
		            				<table class="table table-striped table-hover">
		            					<tbody id="addEBox">
		            						
		            					</tbody>		            					
		            				</table><!-- 
		            				<div id="addEBox" class="" style="height: 200px;">
		            					
		            				</div> -->
		            			</div>
	            			</div>       			
	            	</div>
	            	<div v-if="!update" id="uploadResources" v-show="sectionState==3" class="m-0 p-0 shineA row">  
	            		<p class="fw8 fs1 font col-12" style="color: #777;">Add Resources</p>    
	            		<div class="row w-100">		            			
	            			<div class="col-lg-6 col-md-6 col-sm-12 m-0 mb-1">
	            				<p class="fs001 my-1">Caption</p>
	            				<input type="text" @keyup="normalize" v-model="caption1" class="form-control vI" >
	            			</div>	            				            			
		            		<div class="col-lg-6 col-md-6 col-sm-12">	            			
	            				<p class="fs001 my-1 d-flex justify-between"><span> Upload File:</span> <span rel="1" class="forClear">clear</span></p>	            				
		            			<div class="dragbox dgbox">	
		            				<span class="fileIX" style="opacity: 1;color: #999;">Select file</span>            		
	            					<input @change="getDragedInFile(1, $event)" type="file" name="files1[]" class="draginto vI">
		            			</div>
		            		</div>
	            		</div>
	            		<div class="row w-100">		            			
	            			<div class="col-lg-6 col-md-6 col-sm-12 m-0 mb-1">
	            				<p class="fs001 my-1">Caption</p>
	            				<input type="text" @keyup="normalize" v-model="caption2" class="form-control" >
	            			</div>	            				            			
		            		<div class="col-lg-6 col-md-6 col-sm-12">	            			
	            				<p class="fs001 my-1 d-flex justify-between"><span> Upload File:</span> <span rel="2" class="forClear">clear</span></p>
		            			<div class="dragbox dgbox">	
		            				<span class="fileIX" style="opacity: 1;color: #999;">Select file</span>            		
	            					<input  @change="getDragedInFile(2, $event)"  type="file" name="files2[]" class="draginto">
		            			</div>
		            		</div>
	            		</div>
	            		<div class="row w-100">		            			
	            			<div class="col-lg-6 col-md-6 col-sm-12">
	            				<p class="fs001 my-1">Caption</p>
	            				<input type="text" @keyup="normalize" v-model="caption3" class="form-control vI" id="captionx">
	            			</div>	            				            			
		            		<div class="col-lg-6 col-md-6 col-sm-12">	            			
	            				<p class="fs001 my-1 d-flex justify-between"><span> Upload File:</span> <span rel="3" class="forClear">clear</span></p>
		            			<div class="dragbox dgbox">	
		            				<span class="fileIX" style="opacity: 1;color: #999;">Select file</span>            		
	            					<input @change="getDragedInFile(3, $event)"  type="file" name="files3[]" class="draginto">
		            			</div>
		            		</div>
	            		</div>
	            		<div class="row w-100">		            			
	            			<div class="col-lg-6 col-md-6 col-sm-12 m-0 mb-1">
	            				<p class="fs001 my-1">Caption</p>
	            				<input type="text" @keyup="normalize" v-model="caption4" class="form-control" >
	            			</div>	            				            			
		            		<div class="col-lg-6 col-md-6 col-sm-12">	            			
	            				<p class="fs001 my-1 d-flex justify-between"><span> Upload File:</span> <span rel="4" class="forClear">clear</span></p>
		            			<div class="dragbox dgbox">	
		            				<span class="fileIX" style="opacity: 1;color: #999;">Select file</span>            		
	            					<input @change="getDragedInFile(4, $event)"  type="file" name="files4[]" class="draginto">
		            			</div>
		            		</div>
	            		</div>

	            		<!-- <div class="col-lg-2 col-md-12">
            				<button class="w-100 button p-success mt-2 text-white py-2" @click="addResources">add</button>
	            		</div> -->
	            		<!-- <br>
        				<table style="min-height: 200px;"  class="table table-striped table-hover">
        					<tbody id="resourcesBox">
        						
        					</tbody>		            					
        				</table>
	            		 -->
	            	</div>

	            	<div v-if="!update" id="addInstructors" v-show="sectionState==4" class="m-0 p-0 shineA">  
	            		<p class="fw8 fs1 font" style="color: #777;">Add Instructor</p>   
	            		<div class="d-flex">
    					<select @keyup="normalize" class="form-control vI w-100" id="selectedInstructor">
    						<option></option>
    						<option value="1">Mr. name Caliper</option>
    						<option value="3">Mrs. Screw Guage</option>
    						<option value="2">Dr. Simple Pendulum</option>
    					</select>
    					<button class=" ml-2 sysbtn p-success text-white" @click="addIBox">Add</button>
        				</div>
        				<br><br>
        				<div class="d-flex  justify-content-between w-100">
        					<div class="hr w-100"></div>
        					<div class="w-100 text-center" style="margin-top:-10px;">Added Instructor</div>
        					<div class="hr w-100"></div>
        				</div>
        				<br>
        				<table style="min-height: 200px;"  class="table table-striped table-hover">
        					<tbody id="addIBox">
        						
        					</tbody>		            					
        				</table>
		            	<!-- 
	        			<div id="addIBox" class="r1" style="height: 200px;">        					
        				</div> -->
	            	</div>
	            	<div v-if="update" id="reviews" v-show="sectionState==5" class="m-0 p-0 px-2 shineA" style="overflow-y: scroll;height: 55vh; ">  
	            		<div v-for="(aitem,i) in alldata">
	            			<div v-if="i==0" class="m-0">
		            			<div class="fw8 text-success fs01">Course Detailed</div>
		            			<table class="table table-bordered">		            				
		            				<tbody>		            							            					
					            		<tr v-for="(edatavalue,j,k) in aitem" class="p-1">
	            							<td v-if="k==0" class="text-left fs01 fw6 text-dark" width="40%">Title</td>
	            							<td v-if="k==1" class="text-left fs01 fw6 text-dark" width="40%">Course Code</td>
	            							<td v-if="k==2" class="text-left fs01 fw6 text-dark" width="40%">access code</td>
	            							<td v-if="k==3" class="text-left fs01 fw6 text-dark" width="40%">Course Description</td>
				            				<td width="60%" class="text-left fs01 text-dark"> {{ edatavalue }}</td>
					            		</tr>	            						            			
		            				</tbody>
		            			</table>
	            			</div>
	            			         				
		            			<div v-if="i==1" class="col-lg-6 col-md-6 my-2 mx-0 px-0 ">
			            			<div class="fw8 m-0 text-success fs01">Selected Experiment</div>
			            			<div class="p-2  m-0">			            				
					            		<p v-for="(edatavalue,j, inde) in aitem.names" class="fs01 text-dark">		            				
				            				<b>{{inde}}.</b> {{edatavalue}}
					            		</p>	            				
			            			</div>
		            			</div>
		            			<div v-if="i==2" class=" col-lg-5 col-md-5 mx-0 px-0 ">
			            			<div class="fw8 m-0 text-success fs01">Selected Instructor</div>
			            			<div class="p-2  m-0">			            				
					            		<p v-for="(edatavalue,j, inde) in aitem.names" class="fs01 text-dark">		            				
				            				<b>{{inde}}.</b> {{edatavalue}}
					            		</p>	            				
			            			</div>
		            			</div>	            	
	            			<div v-if="i==3" class="m-0 mt-2">
		            			<div class="fw8 text-success fs01">image to Upload</div>
		            			<div>
		            				<img width="200px" :src="aitem.image">
		            				<img width="200px" :src="imagetoupload">
		            			</div>				
	            			</div>	            			
	            		</div>
	            	</div>
            	</div>
            
            </div> 
   		</div>
        <div class="row bg-white m-0">
            <div class="col-lg-8 col-md-7 col-sm-12">
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 mx-auto py-2 d-flex">            	
            	<button v-show="sectionState >1" class="btn p-success button text-white py-2 px-3 mr-3" @click="prevSection" ><span class="fa fa-arrow-left"></span> Previous </button>            	
            	<button v-show="sectionState < 5" class="btn p-success button text-white py-2 px-3" @click="nextSection" > Continue <span class="fa fa-arrow-right"></span></button>
            	<button v-show="sectionState == 5" class="btn p-success button text-white py-2 px-3" @click="submitProcess" > 
            		<span v-if="!update">Submit</span>
            		<span v-if="update">Update</span> 
            		<span class="fa fa-arrow-right"></span>
            		
            	</button>
            </div>
            <div class="col-md-1 col-sm-12 mx-auto">
            </div>
            <!--  -->
        </div>
	</div>
</template>

<script>
	export default{

	 data:function() {
	    	return{
	    	file1:'',
	    	file2:'',
	    	file3:'',
	    	file4:'',
	    	caption1:'',
	    	caption2:'',
	    	caption3:'',
	    	caption4:'',	 
	    	video_url:'', 
	    	title:'',
			course_code:'',
			enrollment_code:'',
			description:'',
			resource_id1:'',
			resource_id2:'',
			resource_id3:'',
			resource_id4:'',
			course_experiment_id:[],
			resources_path1:'',
			resources_path2:'',
			resources_path3:'',
			resources_path4:'',
	    	 count:0,	    	 
	    	 stageone:true,
	    	 stageonep:false,
	    	 stagetwo:false,
	    	 stagetwop:false,
	    	 stagethree:false,
	    	 stagethreep:false,
	    	 stagefour:false,
	    	 stagefourp:false,
	    	 navState:false,
	    	 courseTrend: 4,
	    	 sectionState: 1,
	    	 title:'',
	    	 ccode:'',
	    	 ecode:'',
	    	 course_id:'',
	    	 imagetoupload:[],
	    	 thisImage:'',
	    	 numforThisImage:0,
	    	 resourceFile:'',
	    	 validateState:false,
	    	 selectedExperiment:[],
	    	 selectedExperimentName:[],
	    	 selectedInstructor:[],
	    	 selectedInstructorName:[],
	    	 deletedCourseExperimentId:[],
	    	 addedExperimentId:[],
	    	 deletedResources:[],
	    	 percentage:0,
	    	 experiments:[],
	    	 dragrelease:false,
	    	 caption:'',
	    	}
        },
    methods:{
        	toggleExperimentGuider: function () {
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			},
			checkstage(state){
				if (state === 1) {					
					this.stageone= false;
				    
				    this.stageonep = false;
				    
				    this.stagetwo = false;						    			    

			    	this.stagetwop = false;			    	

			    	this.stagethree = false;

			    	this.stagethreep = false;

			    	this.stagefour = false;

				}
				if (state === 2) {
					this.stageone= false;

				    this.stageonep = true;

				    this.stagetwo = true;						    			    

			    	this.stagetwop = false;			    	

			    	this.stagethree= false;

			    	this.stagethreep = false;

			    	this.stagefour = false;
				}

				if (state === 3) {
			    	this.stageone= false;

				    this.stageonep = true;

				    this.stagetwo = false;						    			    

			    	this.stagetwop = true;			    	

			    	this.stagethree= true;

			    	this.stagethreep = false;

			    	this.stagefour = false;
				}
				if (state === 4) {
			    	this.stageone= false;

				    this.stageonep = true;

				    this.stagetwo = false;						    			    

			    	this.stagetwop = true;			    	

			    	this.stagethree= false;

			    	this.stagethreep = true;

			    	this.stagefour = true;
				}
				if (state === 5) {
			    	this.stageone= false;

				    this.stageonep = true;

				    this.stagetwo = false;						    			    

			    	this.stagetwop = true;			    	

			    	this.stagethree= false;

			    	this.stagethreep = true;

			    	this.stagefour = true;
			    	this.stagefour = false;
				}
			},
			prevSection:function(){
				if (this.update) {
					this.sectionState = 1;
				}else{
					this.sectionState--;

				}
				let $nv = this;
				if (this.sectionState ===1) {					
					setTimeout(function() {
					$('#ctitle').val($nv.alldata[0]['title']);
					$('#ccode').val($nv.alldata[0]['course_code']);
					$('#ecode').val($nv.alldata[0]['enrollment_code']);
					$('#cdescription').val($nv.alldata[0]['description']);					
					}, 50);				
					this.checkstage(1);
				}
				if (this.sectionState === 2 ) {					
					setTimeout(function() {
					$nv.reiterateSelectedExp();
					},50);
					this.checkstage(2);					
				}
				if (this.sectionState === 3) {					
					setTimeout(function() {
				 		$('#imageprev').html('<img id="image_droped" width="200px"  src="'+$nv.imagetoupload+'">');		
					}, 50);
					this.checkstage(3);					

				}
				if (this.sectionState===4) {					
					setTimeout(function() {
						$nv.reiterateSelectedInstructor();
					}, 50);
					this.checkstage(4);					
				}
			},
			addEBox:function(){
				let obj = $('#selectExperiment');
				let evalue = obj.val();
				this.validateState =false;

				if($('#selectExperiment option:selected').text()!=""){
					this.validateState =true;
					let selExpName = $('#selectExperiment option:selected').text();
					if(!this.selectedExperiment.includes(evalue)){

					  this.selectedExperiment.push(evalue);
					  this.selectedExperimentName.push(selExpName);
					  let $vm = this;

					  if (this.update) {
					  	//tracking new added experiment;
					  	let rmid='',trackexist= 0;
					  	for (let i = 0; i < this.alldata.course_experiment.length; i++) {
					  		if(this.alldata.course_experiment[i].experiment_id === evalue){
					  			rmid = this.alldata.course_experiment[i].id;
					  			trackexist = 1
					  		}
					  	}

			  			if(trackexist==0){
			  				this.addedExperimentId.push(evalue);
			  			}
					  	else{
					  		this.deletedCourseExperimentId.splice(this.deletedCourseExperimentId.indexOf(rmid),1);
					  	}

					  }

					 let indexof = this.selectedExperiment.indexOf(evalue);
						$('#addEBox').append("<tr><td class='d-flex justify-content-between flex-wrap-center py-2' style='font-size:0.9em;cursor:pointer;' id='"+this.selectedExperiment.indexOf(evalue)+"'><p><b >Experiment "+(Number(this.selectedExperiment.indexOf(evalue))+1)+'</b>:<span class="ml-5"></span> '+selExpName+"</p><span class=' mt-2 close d-flex justify-content-around flex-wrap-center rmexp' style='background:#ccc; border-radius:50%;width:25px;height:25px;' rel='"+indexof+"' >&times</span></td></tr>");
					}else{
					   $('#ar000').remove();
					   $('#addEBox').after('<span class="text-danger requiredv" id="ar000">already exist!</span>');				
					}
					
				}else{
					obj.after('<span class="text-danger requiredv">Required !</span>');	
					obj.css('border','1px solid #e45');
				}			
			},
			reiterateSelectedExp(){
				$('#addEBox').html("");
				for (let i = 0; i < this.selectedExperiment.length; i++) {
					$('#addEBox').append("<tr><td class='d-flex justify-content-between flex-wrap-center ' style='font-size:0.9em;cursor:pointer;' id='"+i+"'><p><b >Experiment "+(i+1)+'</b>:<span class="ml-5"></span> '+this.selectedExperimentName[i]+"</p><span class=' mt-2 close d-flex justify-content-around flex-wrap-center rmexp' style='background:#ccc; border-radius:50%;width:25px;height:25px;' rel='"+i+"' >&times</span></td></tr>")	
					}
			},	
			addIBox:function(){
				let obj = $('#selectedInstructor');
				let evalue = Number(obj.val());
				this.validateState =false;

				if($('#selectedInstructor option:selected').text()!=""){
					this.validateState =true;
					let selExpName = $('#selectedInstructor option:selected').text();
					if(!this.selectedInstructor.includes(evalue)){
					  this.selectedInstructor.push(evalue);
					  this.selectedInstructorName.push(selExpName);
					  let $vm = this;
					///alert(this.selectedInstructor.includes(evalue));
					 let indexof = 'inst'+this.selectedInstructor.indexOf(evalue);
						$('#addIBox').append("<tr><td class='d-flex justify-content-between flex-wrap-center ' style='font-size:0.9em;cursor:pointer;' id='inst"+this.selectedInstructor.indexOf(evalue)+"'><p><b >Experiment "+selExpName+"</p><span class=' mt-2 close d-flex justify-content-around flex-wrap-center rmexp1' style='background:#ccc; border-radius:50%;width:25px;height:25px;' rel='"+indexof+"' >&times</span></td></tr>")
					}else{
						$('#ar001').remove();
					   $('#addIBox').after('<span class="text-danger requiredv" id="ar001">already exist!</span>');				
					}
					
				}else{
					obj.after('<span class="text-danger requiredv">Required !</span>');	
					obj.css('border','1px solid #e45');
				}			
			},
			reiterateSelectedInstructor(){
				$('#addIBox').html("");
				for (let i = 0; i < this.selectedInstructor.length; i++) {
					$('#addIBox').append("<tr><td class='d-flex justify-content-between flex-wrap-center ' style='font-size:0.9em;cursor:pointer;' id='inst"+i+"'><p class='py-2 pl-3 my-0'><b >Experiment "+(i+1)+'</b>:<span class="ml-5"></span> '+this.selectedInstructorName[i]+"</p><span class=' mt-2 close d-flex justify-content-around flex-wrap-center rmexp1' style='background:#ccc; border-radius:50%;width:25px;height:25px;' rel='"+i+"' >&times</span></td></tr>")	
					}
			},
			
			singleValidate: function(id){
				$('#'+id).css('border','1px solid #e45');
				$('.requiredv').remove();
				$('#'+id).after('<span class="text-danger requiredv">Required !</span>')
			},
			validateI: function(id,sel=0){
				if (sel ===0) {

					let index =-1;
					$('#'+id).find('.vI').each(function(){
						index++;
					});
					let $vm = this;
					$('#'+id).find('.vI').each(function(e){
						if($(this).val()==""){
							$(this).css('border','1px solid #e45');
							$('.requiredv').remove();
							$(this).after('<span class="text-danger requiredv">Required !</span>');						
							$vm.validateState = false;
							return false;
						}					
						if(e == index){
							$vm.validateState = true;
						}
					})
				}
				if (sel=== 1) {
					if($('#'+id+ 'option:selected').text()==""){
						$('#'+id).css('border','1px solid #e45');
						$('.requiredv').remove();
						$('#'+id).after('<span class="text-danger requiredv">Required !</span>');						
						this.validateState = false;						
					}else{						
						this.validateState = true;	
					}
				}
			},

			//turn input back normal
			normalize:function(el){
				el.target.style.border = "1px solid #eee";
				$('.requiredv').remove();
			},
			nextSection: function(){
				let $nv = this;
				if (this.sectionState === 1){	
					this.validateI('cdetail');
					
					if(this.validateState === true){
						this.ctitle = $('#ctitle').val();										
						this.alldata[0] = {
							title: $('#ctitle').val(),
							course_code:$('#ccode').val(),
							enrollment_code:$('#ecode').val(),
							description:$('#cdescription').val()
						};						
						if (this.update){
							this.sectionState = 5;	
						}else{
							this.sectionState = 2;	
						}					
						this.stageone= false;
				    	this.stageonep = true;
				    	this.stagetwo = true;
					}
				
				}else if (this.sectionState === 2){
					

					if (this.selectedExperiment.length == 0){
					 this.singleValidate('addEBox');
					}else{
						this.stagetwo= false;
				    	this.stagetwop = true;
				    	this.stagethree = true;
				    	this.sectionState = 3;				    	
				    	this.alldata[1]= {
				    		'id': this.selectedExperiment,
				    		'names': this.selectedExperimentName
				    	};
					}
		
				}else if (this.sectionState === 3){
					this.validateI('uploadResources');
					if (this.caption1 !='' && this.file1 != '') {
						this.stagethree= false;
				    	this.stagethreep = true;
				    	this.stagefour = true;
				    	this.sectionState = 4;				    					    	
					}
				}else if (this.sectionState === 4){
					if (this.selectedInstructor.length == 0){
					 this.singleValidate('addIBox');
					}else{
						this.stagefour= false;
				    	this.stagefourp = true;
				    	//this.stage = true;
				    	this.sectionState = 5;				    	
				    	this.alldata[2] = {
				    		'id': this.selectedInstructor,
				    		'names': this.selectedInstructorName
				    	};
					}
					
				 //	$('#imageprev').html('<img id="image_droped" width="200px"  src="'+$nv.imagetoupload+'">');		
					//console.log(this.alldata);

				}
			},
			submitProcess:function(){

				let $vm = this;
				   try{
				   		const formData = new FormData();				   	
					   	formData.append('title',this.title);
					   	formData.append('code',this.course_code);
					   	formData.append('enrollment_code',this.enrollment_code);
					   	formData.append('description',this.alldata[0].description);
					   	if (!this.update) {					   		
						   	formData.append('experiment_id',this.alldata[1].id);
						   	formData.append('instructor_id',this.alldata[2].id);
						   	formData.append('video_url',this.video_url);
						   	formData.append('resource_id1',this.resource_id1);
							formData.append('resource_id2',this.resource_id2);
							formData.append('resource_id3',this.resource_id3);
							formData.append('resource_id4',this.resource_id4);
							formData.append('deletedCourseExperimentId', JSON.stringify(this.deletedCourseExperimentId));
							formData.append('addedExperimentId',JSON.stringify(this.addedExperimentId));
							formData.append('deletedResources',JSON.stringify(this.deletedResources));

							formData.append('course_experiment_id',JSON.stringify(this.course_experiment_id));
						   	let sizeCount = 0;
						   	if (this.caption1 != '' && this.file1 != ''){
						   		sizeCount++;
						   		formData.append('file1',this.file1);					   	
						   		formData.append('caption1',this.caption1);					   	
						   		formData.append('resources_path1',this.resources_path1 );
						   	}
						   	if (this.caption2 != '' && this.file2 != ''){
						   		sizeCount++;
						   		formData.append('file2',this.file2);					   	
						   		formData.append('caption2',this.caption2);					   	
						   		formData.append('resources_path2',this.resources_path2 );
						   	}
						   	if (this.caption3 != '' && this.file3 != ''){
						   		sizeCount++;
						   		formData.append('file3',this.file3);					   	
						   		formData.append('caption3',this.caption3);
						   		formData.append('resources_path3',this.resources_path3 );
						   	} 

						   	if (this.caption4 != '' && this.file4 != ''){
						   		sizeCount++;
						   		formData.append('file4',this.file4);					   	
						   		formData.append('caption4',this.caption4);					   	
						   		formData.append('resources_path4',this.resources_path4 );
						   	}
					   		formData.append('resource_size', sizeCount);					   	
					   	}


				   		$('#system-loader').css('display','flex');
				   			$('#system-loader').css('display','flex');
			   				let route = 'create';
					   		let successMsg = this.reatedMessage;
					   		if (this.update) {
								route = 'update'			   		
					   			formData.append('course_id',this.course_id);

								successMsg = 'Updated Successfully';
					   		}
			            $vm.axios.post('api/courses/'+route,formData, {headers: $vm.axiosHeaderWithFiles}).then(function(response, status, request) { 		
				   			$('#system-loader').css('display','none');
				   			if(response.status == 200){

				   				Swal.fire({
								  title: successMsg,
								  text:'tell us where to go',
								  icon:'success',
								  showDenyButton: true,
								  showCancelButton: true,
								  cancelButtonColor:'#dd000f',					      
					      		confirmButtonColor:'#00b96b',		
								  confirmButtonText: `view created courses`,
								  denyButtonText: `Ok, refresh the page`,
								}).then((result) => {
								  
								  if (result.isConfirmed) {
								    location.href = "/view-created-course";
								  } else if (result.isDenied) {
								    location.reload();
								  }
								})
				   			}else if(response.status == 401){

				   				Swal.fire({
								  title: $vm.errorSessionMessage,								  
								  icon:'success',
								  showDenyButton: true,								  
								  confirmButtonText: `Ok`,		
								  cancelButtonColor:'#dd000f',					      
					      		  confirmButtonColor:'#00b96b',								  
								}).then((result) => {								  
								  if (result.isConfirmed) {
								    $vm.frontendLogout();
								  } else if (result.isDenied) {								    
								  }
								})
				   			}
			            	//console.log(response);			   				           
			            }, function(e) {		  
			            	//console.log(e.status)
			            	
			            	
					   		$('#system-loader').css('display','none');
					   		let errMsg = $vm.errorSessionMessage;					   		
					   	    if (e.response.status == 409) {					   	    	
					   	    	errMsg = e.response.data.error;
					   	    }
			              vt.error(errMsg,{
							  title: undefined,
							  position: "bottom-right",
							  duration: 10000,
							  closable: true,
							  focusable: true,
							  callback: undefined
							});			            		   

			            	//console.log($vm.axiosHeader)
			            });

			        }catch(err){
				   		$('#system-loader').css('display','none');				   	    
			            vt.error($vm.errorNetworkMessage,{
							  title: undefined,
							  position: "bottom-right",
							  duration: 10000,
							  closable: true,
							  focusable: true,
							  callback: undefined
							});
			          //console.log(err)//show network error notification
			        }
			
			    },
				addResources(){
					this.numforThisImage++;								
					if (this.numforThisImage <5) {
						$("#forclone").clone().insertAfter('#uploadResources');
					}else{
						Swal.fire('maximun reached');
					}

			},			
			getDragedInFile: function(type,e){	
				if (type == 1) {
					this.file1 = e.target.files[0];
				}  
				if (type == 2) {
					this.file2 = e.target.files[0];
				}  
				if (type == 3) {
					this.file3 = e.target.files[0];
				}  
				if (type == 4) {
					this.file4 = e.target.files[0];
				}  
				$(e.target).prev().html(e.target.files[0].name);		
				
			}
        },	

        
       props: {
	     	update:{
	     		type:Boolean, 
	     		default: function(){
	     			return false;
	     		}
	     	},
	     	alldata:{
	     		type:Object, 
	     		default: function(){
	     			return {};
	     		}
	     	},
	     	coures_id:{
	     		type:Number,
	     		default: function(){
	     			return 0;
	     		}	     	
	     	}
     	},
         mounted: function () {
         	let $vm = this;
			   	

		  this.$nextTick(function () {
		    // Code that will run only after the
		    // entire view has been rendered
         		$(document).on('click', '.forClear', function() {		
         			$(this).parent().next().find('input').val('');
         			$(this).parent().next().find('span').html('Select file')
         			$(this).parent().parent().prev().find('input').val('');
         			let rel = $(this).attr('rel');

         			if (rel==1){
         				$vm.file1 = '';
         				$vm.caption1 = '';
         			}
         			if (rel==2){
         				$vm.file2 = '';
         				$vm.caption2 = '';
         			}
         			if (rel==3){
         				$vm.file3 = '';
         				$vm.caption3 = '';
         			}
         			if (rel==4){
         				$vm.file4 = '';
         				$vm.caption4 = '';
         			}
         			if ($vm.update) {         				
	     				if(!deletedResources.indexOf(rel)){
	     					deletedResources.push(rel);
	     				}
         			}
         		})
         		$(document).on('change', '.draginto', function() {		

         			$(this).prev().html($(this).prop('files')[0].name);
					console.log($('.draginto').prop('files'))
         		})
         		$(document).on('click', '.rmexp', function() {					
         			
         			if($vm.update){
         				let evalue = $vm.selectedExperiment[$(this).attr('rel')];
         				//tracking deleted experiment
         				let rmid='',trackexist= 0;         				         				
					  	for (let x = 0; x < $vm.alldata.course_experiment.length; x++) {
					  		if($vm.alldata.course_experiment[x].experiment_id === evalue){
					  			rmid = $vm.alldata.course_experiment[x].id;
					  			trackexist = 1
					  		}
					  	}
			  			if(trackexist==1){
					  		$vm.deletedCourseExperimentId.push(rmid);			  									  		
			  			}else{
			  				for (let x = 0; x < $vm.addedExperimentId.length; x++) {
						  		if($vm.addedExperimentId[x] == evalue){
						  			rmid = x;
						  			trackexist = 1
						  		}
					  		}
					  		if (trackexist ==1) {
					  			$vm.addedExperimentId.splice(rmid,1);
					  		}

			  			}
         			}

					$vm.selectedExperiment.splice($(this).attr('rel'),1);
					$vm.selectedExperimentName.splice($(this).attr('rel'),1);
         			$vm.reiterateSelectedExp();         			
				});
				$(document).on('click', '.removeResources', function() {										
					$vm.imagetoupload.splice($(this).attr('rel'),1);         			
					$vm.reiterateResources();
				});
				$(document).on('click', '.rmexp1', function() {					
					$vm.selectedInstructor.splice($(this).attr('rel'),1);
					$vm.selectedInstructorName.splice($(this).attr('rel'),1);
         			$vm.reiterateSelectedInstructor();         			
				});
								
			
		  });


		},
		async created(){			
		    this.experiments  = await this.axiosGet('api/experiments/experiments');
		   if (this.experiments.length< 1) {
		   	this.attemptsFailsV('No Experiment is available', 'to proceed on add Experiment, Click Ok', true,'/add-experiment');
		   }
		    /*initialize datatable */           
			if (this.update) {
				let $this = this;
				$(document).ready(function(){
					$this.title = $this.alldata.title;
					/*$('#ctitle').val();*/
					$this.course_code = $this.alldata.code;
					$this.enrollment_code = $this.alldata.enrollment_code;
					$this.description = $this.alldata.description					
					$this.video_url = $this.alldata.video_url					

					for (var i = 0; i < $this.alldata.course_resources.length; i++) {
						if (i==0) {
							$this.resource_id1 = $this.alldata.course_resources[i].id;
							$this.caption1 =	$this.alldata.course_resources[i].caption;
							$this.file1 =	$this.alldata.course_resources[i].resourceUrl;
							$this.resources_path1  = $this.alldata.course_resources[i].resourceUrl;//for comparison if changed
						}
						if (i==1) {
							$this.resource_id2 = $this.alldata.course_resources[i].id;							
							$this.caption2 =	$this.alldata.course_resources[i].caption;
							$this.file2 =	$this.alldata.course_resources[i].resourceUrl;
							$this.resources_path2 = $this.alldata.course_resources[i].resourceUrl;//for comparison if changed
						}
						if (i==2) {
							$this.resource_id3 = $this.alldata.course_resources[i].id;							
							$this.caption3 =	$this.alldata.course_resources[i].caption;
							$this.file3 =	$this.alldata.course_resources[i].resourceUrl;
							$this.resources_path3 = $this.alldata.course_resources[i].resourceUrl;//for comparison if changed
						}
						if (i==3) {
							$this.resource_id4 = $this.alldata.course_resources[i].id;							
							$this.caption4 =	$this.alldata.course_resources[i].caption;
							$this.file4 =	$this.alldata.course_resources[i].resourceUrl;
							$this.resources_path4 = $this.alldata.course_resources[i].resourceUrl; //for comparison if changed
						}
					}					
				});		
				this.course_id = this.alldata.id;

				for(var j =0; j < this.alldata.course_experiment.length; j++ ){					
					
					this.course_experiment_id[j]= this.alldata.course_experiment[j].id;
					this.selectedExperiment[j] = this.alldata.course_experiment[j].experiments.id;
					this.selectedExperimentName[j] = this.alldata.course_experiment[j].experiments.name;
					this.selectedInstructor[j] ='please skip';
				}
				this.reiterateSelectedExp();
		/*		for(let i =0; i < this.alldata[2].id; i++ ){
					this.selectedInstructor[i] = this.alldata.course_resources[i].id;
					this.selectedInstructorName[i] = this.alldata.course_resources[i].resourceUrl;
				}*/				

			}
		},
         events :{
         	'toggleClick':'toggleClick'
         }

	}
</script>
<style scoped>
	.forClear{
		user-select: none;
		cursor: pointer;
		color: #c56;
	}
	.justify-between{
		justify-content: space-between !important;
		display: flex !important;
		width: 100% !important;	
	}
	.forClear:active{
		text-decoration: underline;
		color:#56c !important;
	}
	.close{
		background: #ccc !important;
		border-radius: 50% !important;
		padding: 2px !important;
	}
	input.form-control{
		width: 100%;
	}
	.form-control:focus{
		outline: none !important;
		box-shadow: none !important;
		border: 1px solid #aaa;
	}
	.bb{
		border-bottom: 1px solid #ccc !important;
	}
	.requiredI{
		transition: all 1s;
		color: #e45 !important;
		background: white;
		border: 1px solid #aaa;
		box-shadow: 1px 2px 3px #bbb;
		border-radius: 5px;
		padding: 4px;
		display: block;
		position: absolute;
		top: 10px; /* At the bottom of the tooltip */
	  	left: 50px;
	  	z-index: 15;
	}
	.requiredI:before {
	  content: " ";
	  position: relative;
	  top: 0%; /* At the bottom of the tooltip */
	  left: 50%;
	  margin-left: -5px;
	  border-width: 5px;
	  border-style: solid;
	  border-color: black transparent transparent transparent;
	}
	.sysbtn{
		 padding: 10px 15px;
		  font-family: 'Roboto',serif;
		  font-size: 0.9em;
		  text-align: center;
		  text-decoration: none;
		  border-radius: 6px;
		  word-break: keep-all;
		  white-space: nowrap;
		  border: none;
		  position: relative;
	}
	.sysbtn:active{
		box-shadow: 0px 2px 0px 0px rgba(0,0,0,.2);
  		top: 1px;
	}
	.sysbtn:focus{
		box-shadow: inset 0 2px 3px #294,
	}
	.ncircle{
		border: 2px solid #bbb; 
		border-radius: 50%;
		width: 25px;
		height: 25px;
		font-size: 0.9em;
		padding: 2px 0px 0px 6.5px !important;
		transition: all 1s;
	}
	div{
		font-family: 'Roboto', sans-serif;
	}
	.no-break{
		white-space: nowrap;
		word-break:keep-all;
	}
	.tline{
		height: 27px; width: 2px; background: #bbb; position: relative; top:26px; left: -13px;
	}
	@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap');
	.syscircle{
		width: 12px !important;
		height: 12px !important;
		border-radius: 50%;
		background: #00b96b;
		display: block;
		margin: 0px 0px 0px 12px;
	}
	.tactive{
		border:2px solid #222 !important;
	}
	.tlactive{
		background: #222 !important;
	}
	.tsuccess{
		border: 2.5px solid #4b6 !important;
		background: #4b6 !important;
		color:white;
		padding-bottom: 2px;
	}
	.tlsuccess{
		background: #4b6 !important;
	}
	.syscircle-o{
		width: 12px;
		height: 12px;
		border-radius: 50%;
		border: 2px solid #999;
		display: block;	
		margin-left:12px;
	}
	.syscircle-o-l{
		width: 22px;
		height: 22px;
		border-radius: 50%;
		border: 2px solid #999;
		display: block;	
		margin-left: 5px;
	}
	.fs3{
		font-size: 2em;
	}
	.fs1{
		font-family: 'Roboto', sans-serif;
		font-size: 0.9em;
		color: #888;
		font-weight: 300;
	}
	.flex-wrap-center{
		flex-wrap: wrap;
		align-items: center;
	}
	.w10{
		width: 60px;
	}
	.timelineX{
		margin-top: 10px; 
		margin-bottom: 120px; 
	}
	.timelineX-o{
		margin-top: 10px; 
		margin-bottom: 120px; 
	}
	.timelineSM:before{
		content: "";
		height: 40px;
		width: 2px;
		background: #00b96b;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineSM-o:before{
		content: "";
		height: 40px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineX-o:before{
		content: "";
		height: 140px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 31px;		
		left: 77px;
	}
	.timelineX:before{
		content: "";
		height: 132px;
		width: 2px;
		background: #00b96b;		
		display: block;
		position: relative;
		top: 10px;		
		left: 5px;
	}
	.timelineX-o:before{
		content: "";
		height: 130px;
		width: 2px;
		background: #999;		
		display: block;
		position: relative;
		top: 10px;		
		left: 3px;
	}
	.fw8{
		font-weight: 600;
		color: #222;
	}
	.fw3{
		font-weight: 600 !important;
		color: #222 !important;
	}
	.fs001{
		font-size: 0.8em;
		color: #888;
	}
	.fs2{
		font-size: 1.2em;
	}
	.wrap-center{
		  flex-wrap: wrap;
      align-items: center;
	}
	.hr{
		height: 1px !important;
		background: #ccc;
		width: 100% !important;
		display: block !important;
	}
	.w35{
		width: 35% !important;
	}
	.w30{
		width: 30%;
	}
	.shineA{
		transition: all 1s;
	}
	.draginto{
		width: 100%;
		height: 100%;		
		position: absolute;
		left: 0;
		z-index: 15;
		cursor: pointer;
		opacity: 0;		
	}
	.dragbox{
		position: relative;
		border: 2px dashed #c0c0cf;
		border-radius: 5px;		
		width: 100%;
		padding: 10px 0px;
		background: #f0f0ff;
		padding: 5px;
		height: 40px;	
	}
	.dragenter{
		border: 2px dashed #c5ddc5 !important;
		background: #f0fff0 !important;
	}
	.progressi {
    background: #eee;
    border-radius: 13px;    
    width: 40%;
    padding: 0px;
    max-height: 7px;
    display: block;
	}
	.progress-bar{
    border-radius: 13px;    
    height: 7px;
    padding: 0px;
    margin: 0px;
    position: relative;
    width: 0%;
    transition: all 1s;
	}
	.p-success{    
	    background: #00b96b !important;  
	}
	.clight{
		color: #777;
	}
	.fs001{
		font-size: 0.86em;
	}
	#imageprev{	
	}
	table tr td{
	}
</style>