<template>
	<div class="m-0 p-0">
		
	<div class="row bg-light m-0 px-2 pt-4">
            <div class="col-lg-4 col-md-5 col-sm-12 m-0 ">
            	<p class="fs2 fw8 font">Add Experiment</p>
            	<div  class="w-100 bg-white r2 px-4 py-4 shadow-sm"><!-- loop weekly -->
						<div class="d-flex flex-wrap-center mb-4" >
							<span class="ncircle" v-bind:class="{tactive:stageone,tsuccess:stageonep}" >1</span>
							<span class="tline" v-bind:class="{tlactive:stageone,tlsuccess:stageonep}"></span>
							<div class="fs1 w10 no-break ml-3">Experiment Details </div>						
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle" v-bind:class="{tactive:stagetwo,tsuccess:stagetwop}">2</span>
							<span class="tline" v-bind:class="{tlactive:stagetwo,tlsuccess:stagetwop}"></span>
							<div class="fs1 w10 no-break ml-3">Experiment Box</div>							
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle"  v-bind:class="{tactive:stagethree,tsuccess:stagethreep}">3</span>
							<span class="tline" v-bind:class="{tlactive:stagethree,tlsuccess:stagethreep}"></span>
							<div class="fs1 w10 no-break ml-3">Config.</div>
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle"  v-bind:class="{tactive:stagefour,tsuccess:stagefourp}">4</span>							
							<div class="fs1 w10 no-break ml-3">Submit</div>
						</div>
				</div>
            			   	
            </div>
            	
            <div class="col-lg-8 col-md-7 col-sm-12 pt-3" style="height: 76vh;">
            	<!-- course detatil -->            	
            	<div  class="py-4 px-4 mt-3 r2 bg-white shadow-sm vh-70 scroll-y " style="">
            		<div id="edetail" v-if="sectionState==1" class="m-0 p-0">            			
	            		<p class="fw8 fs1 font" style="color: #777;">Details</p>
	            		<div class="row">            			
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Experiment Title *</p>
		            				<input type="text" @keyup="normalize" class="form-control vI" id="etitle">
	            				</div>
	            			</div>
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1" >	            					
		            				<p class="fs001 my-1">Experiment Number * <span class="fs01 fw5" style="color: #888;">I, II, III ...</span></p>		            				
		            				<input type="text" @keyup="normalize" class="form-control vI" id="enumber">
	            				</div>
	            			</div>
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Experiment Video <span class="fs01 fw5" style="color: #888;">video url/link</span></p>		            				
		            				<input type="text" @keyup="normalize" class="form-control " id="elink">
	            				</div>
	            			</div>	      
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Experiment Diagram</p>		            				
		            				<div class="w-100  p-0" style="position: relative;">
		            					<span class="d-flex w-100 cursor-1">		            						
			            					<span class="form-control fw2 font w-60 r-right-none p-text-secondary no-border-right" id="imageName" >.jpg, .png</span>
			            					<span class="form-control  fw2 font w-40 r-left-none p-text-success">Upload File</span>
		            					</span>
		            					<input @change="getDragedInFile"  type="file" style="position: absolute;top: 0; left: 0;" name="files" class="draginto form-control" id="fileI">
		            				</div>
	            				</div>
	            			</div>	      
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Aim</p>            				
	            				<textarea @keyup="normalize" class="form-control vI" rows="4" id="aim"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Theory</p>            				
	            				<textarea @keyup="normalize" class="form-control vI" rows="4" id="theory"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Aparatus</p>            				
	            				<textarea @keyup="normalize" class="form-control " rows="4" id="aparatus"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">procedure</p>            				
	            				<textarea @keyup="normalize" class="form-control " rows="4" id="procedure"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Exercise</p>            				
	            				<div @keyup="normalize" class="form-control editor-container" style="height: 250px;" id="exercise"></div>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Resourses</p>            				
	            				<textarea @keyup="normalize" class="form-control" rows="6" id="resources"></textarea>
	            			</div>
	            		</div>
	            	</div>
	            	<div id="addExperiment" v-if="sectionState==2" class="m-0 p-0 shineA">     
	            			<p class="fw8 fs1 font" style="color: #777;">Add Experiment</p>
	            			<div class="row">            			
		            			<div class="col-lg-12 col-md-12 m-0">
		            				<p class="fs001 my-1">Select Experiment</p>
		            				<div class="d-flex">
		            					<select @keyup="normalize" class="form-control vI" id="selectExperiment">
		            						<option ></option>
		            						<option v-for="experiment in experiments" :value="experiment.value">{{experiment.name}}</option>
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
		            				<table style="min-height: 200px;"  class="table table-striped table-hover">
		            					<tbody id="addEBox">
		            						
		            					</tbody>		            					
		            				</table><!-- 
		            				<div id="addEBox" class="" style="height: 200px;">
		            					
		            				</div> -->
		            			</div>
	            			</div>       			
	            	</div>
	            	<div id="experimentConfig" v-if="sectionState==3" class="m-0 p-0 shineA">     
	            			<p class="fw8 fs1 font" style="color: #777;">Configuration</p>
	            			<div class="row">            			
		            			<div class="col-lg-12 col-md-12 m-0">
		            				<span>		            					
			            				<span class="fs1 fw5 p-text-success ">Practice Mode:</span><input value="practice" class="configV" type="radio" name="config">
			            				<span class="fs1 fw5 p-text-success">Test Mode:</span> <input value="test" class="configV" type="radio" name="config">
		            				</span>
		            			</div>
	            			</div>       			
	            	</div>	            

	            	<div id="addInstructors" v-if="sectionState==4" class="m-0 p-0 shineA">  
	            		<h3 class="text-center fw8 font mt-5 p-text-success">All Process Completed</h3>
	            		<h5 class="text-center fw5 font p-text-success">use the previous button to review or click on submit !</h5>
	            	<!-- 	<p class="fw8 fs1 font" style="color: #777;">Add Instructor</p>   
	            		<div class="d-flex">
    					<select @keyup="normalize" class="form-control vI" id="selectedInstructor">
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
        				</table> -->
		            	<!-- 
	        			<div id="addIBox" class="r1" style="height: 200px;">        					
        				</div> -->
	            	</div>
	            <!-- 	<div id="reviews" v-if="sectionState==5" class="m-0 p-0 shineA" style="overflow-y: scroll;">  
	            		<div v-for="(aitem,i) in alldata">
	            			<div v-if="i==0" class="m-0">
		            			<div class="fw8">Course Detailed</div>
		            			<table class="table table-striped table-hover">
		            				<thead class="bg-dark">
		            					<th class="p-1 text-white bg-dark"></th>
		            					<th class="p-1 text-white bg-dark text-left">Title/No.</th>
		            					<th class="p-1 text-white bg-dark text-left">video url</th>
		            					<th class="p-1 text-white bg-dark text-left">diagram</th>
		            				</thead>
		            				<tbody>
		            					<td>		            						
						            		<td v-for="(edatavalue,j) in aitem" class="p-1">
					            				{{edatavalue}}
						            		</td>	            						            				
		            					</td>
		            				</tbody>
		            			</table>
	            			</div>
	            			         				
		            			<div v-if="i==1" class="col-lg-6 col-md-6 my-2 mx-0 px-0 ">
			            			<div class="fw8 m-0">Selected Experiment</div>
			            			<div class="p-2 border m-0">			            				
					            		<p v-for="(edatavalue,j, inde) in aitem.names">		            				
				            				<b>{{inde}}.</b> {{edatavalue}}
					            		</p>	            				
			            			</div>
		            			</div>
		            			<div v-if="i==2" class=" col-lg-5 col-md-5 mx-0 px-0 ">
			            			<div class="fw8 m-0">Selected Instructor</div>
			            			<div class="p-2 border m-0">			            				
					            		<p v-for="(edatavalue,j, inde) in aitem.names">		            				
				            				<b>{{inde}}.</b> {{edatavalue}}
					            		</p>	            				
			            			</div>
		            			</div>	            	
	            			<div v-if="i==3" class="m-0">
		            			<div class="fw8">image to Upload</div>
		            			<div>
		            				<img width="200px" :src="aitem.image">
		            			</div>				
	            			</div>	            			
	            		</div>
	            	</div> -->
            	</div>
            
            </div> 
   		</div>
        <div class="row bg-white m-0">
            <div class="col-lg-8 col-md-7 col-sm-12">
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12 mx-auto py-2 d-flex">            	
            	<button v-if="sectionState >1" class="btn p-success text-white py-2 px-3 mr-3" @click="prevSection" ><span class="fa fa-arrow-left"></span> Previous </button>
            	<button v-if="sectionState != 4" class="btn p-success text-white py-2 px-3" @click="nextSection" > Continue <span class="fa fa-arrow-right"></span></button>
            	<button v-if="sectionState == 4" class="btn p-success text-white py-2 px-3" @click="submitProcess" >
            	 	<span v-if="!update">Submit </span>
            	 	<span v-if="update">Update</span>
            	 <span class="fa fa-cloud"></span></button>

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
	    	 count:0,
	    	 alldata:[],
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
	    	 imagetoupload:'',
	    	 validateState:false,
	    	 selectedExperiment:[],
	    	 selectedExperimentName:[],
	    	 selectedInstructor:[],
	    	 selectedInstructorName:[],
	    	 percentage:0,
	    	 experiments:[
	    	 	{name:'vernier caliper',value:'vernier_caliper'},
	    	 	{name:'Micrometer Screw Guage',value:'micrometer'},
	    	 	{name:'Simple Pendulum',value:'simple_pendulum'},
	    	 	{name:'Resistor Color Code',value:'resistor_color_code'},
	    	 ],
	    	 dragrelease:false,
	    	 quill:null,
	    	 configMode:'',	    	 
	    	}
        },
        methods:{
        	toggleExperimentGuider: function () {
//        		alert(this.navState);
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
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
				this.sectionState--;
				let $nv = this;
				if (this.sectionState ===1) {					
					setTimeout(function() {
					$nv.quill_init();
					$('#etitle').val($nv.alldata[0]['title']);
					$('#enumber').val($nv.alldata[0]['experiment_number']);
					$('#aim').val($nv.alldata[0]['aim']);					
					$('#elink').val($nv.alldata[0]['video_url']);					
					$('#imageName').val($nv.alldata[0]['diagram_url']);					
					$('#theory').val($nv.alldata[0]['theory']);					
					$('#aparatus').val($nv.alldata[0]['aparatus']);					
					$('#procedure').val($nv.alldata[0]['procedure']);					
					$('#resources').val($nv.alldata[0]['resources']);										
					$('#exercise').find('.ql-editor').append($nv.alldata[0]['exercise']);					
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
				 		$('input[name=config][value='+$nv.configMode+']').attr('checked','checked');		
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
			quill_init: function(){
				 this.quill = new Quill('.editor-container', {
				    modules: {
				    formula: true,
				    toolbar: [
						['bold', 'italic', 'underline', 'strike'],
						['link'],
						['blockquote'],
						[{ 'list': 'ordered'}, { 'list': 'bullet' }],
				  		[{ 'script': 'sub'}, { 'script': 'super' }], 
						['align', { 'align': 'center' }, { 'align': 'right' }, { 'align': 'justify' }],
						['formula']
					]
				  },
				  placeholder: 'editor...',
				  theme: 'snow'  // or 'bubble'
				});
			  var enableMathQuillFormulaAuthoring = mathquill4quill();
			  enableMathQuillFormulaAuthoring(this.quill);
			},
			addEBox:function(){			
				let evalue = $('#selectExperiment').val();
				this.validateState =false;

				if($('#selectExperiment option:selected').text()!=""){
					this.validateState =true;
					let selExpName = $('#selectExperiment option:selected').text();
					if(!this.selectedExperiment.includes(evalue)){						
						if (this.selectedExperiment.length > 0) {
							Swal.fire('only one Experiment Expected');							
						}else{							
						   this.selectedExperiment.push(evalue);
						   this.selectedExperimentName.push(selExpName);
						   let $vm = this;
						   ///alert(this.selectedExperiment.includes(evalue));
						   let indexof = this.selectedExperiment.indexOf(evalue);
							$('#addEBox').append("<tr><td class='d-flex justify-content-between flex-wrap-center ' style='font-size:0.9em;cursor:pointer;' id='"+this.selectedExperiment.indexOf(evalue)+"'><p><b >Experiment "+(Number(this.selectedExperiment.indexOf(evalue))+1)+'</b>:<span class="ml-5"></span> '+selExpName+"</p><span class=' mt-2 close d-flex justify-content-around flex-wrap-center rmexp' style='background:#ccc; border-radius:50%;width:25px;height:25px;' rel='"+indexof+"' >&times</span></td></tr>");
						}
					}else{
					   $('#ar000').remove();
					   $('#addEBox').after('<span class="text-danger requiredv" id="ar000">already exist!</span>');				
					}
					
				}else{
					$('.requiredv').remove();
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
					this.validateI('edetail');
					
					if(this.validateState === true){
													
						this.alldata[0] = {
							title: $('#etitle').val(),
							experiment_number:$('#enumber').val(),
							video_url:$('#elink').val(),
							aim:$('#aim').val(),
							theory:$('#theory').val(),
							aparatus:$('#aparatus').val(),
							exercise:$('#exercise').find('.ql-editor').html(),
							resources:$('#resources').val(),
							procedure:$('#procedure').val(),
						};												
						this.sectionState = 2;						
						this.stageone= false;
				    	this.stageonep = true;
				    	this.stagetwo = true;
					}
					setTimeout(function() {
						if ($nv.selectedExperiment.length != 0) {
							$nv.reiterateSelectedExp();
						}
					}, 200);
				
				}else if (this.sectionState === 2){
					

					if (this.selectedExperiment.length == 0){
					 this.singleValidate('addEBox');
					}else{
						this.stagetwo= false;
				    	this.stagetwop = true;
				    	this.stagethree = true;
				    	this.sectionState = 3;				    	
				    	this.alldata[1]= {				    		
				    		'experiment_url': this.selectedExperiment
				    	};
					}
					let $nv = this;
					setTimeout(function() {
						if ($nv.configMode != "") {
				 			$('input[name=config][value='+$nv.configMode+']').attr('checked','checked');		
						}
					}, 50);
				}else if (this.sectionState === 3){
					this.configMode = $('input[name=config]:checked').val();
					if(this.configMode == ""){
						$('.requiredv').remove();
						$('.configV').parent().after('<span class="text-danger requiredv">Required !</span>')
					}else{
						this.alldata[2] = {
							'config' : this.configMode
						};
				    	this.stagethree = false;
				    	this.stagethreep = true;
				    	this.stagefour = true;
				    	this.sectionState = 4;	
					}

				}
			},
			submitProcess: function(){
					let $vm = this;

					/*if (this.selectedInstructor.length == 0){
					 this.singleValidate('addIBox');
					 return 0;
					}else{									    	    
				    	this.alldata[3] = {
				    		'id': this.selectedInstructor,
				    		'names': this.selectedInstructorName
				    	};
					}*/								

				   try{

				   		const formData = new FormData();				   	
					   	formData.append('title',this.alldata[0].title);
					   	formData.append('experiment_number',this.alldata[0].experiment_number);
					   	formData.append('video_url',this.alldata[0].video_url);
					   	formData.append('theory',this.alldata[0].theory);
					   	formData.append('aim',this.alldata[0].aim);
					   	formData.append('resources',this.alldata[0].resources);
					   	formData.append('exercise',this.alldata[0].exercise);
					   	formData.append('exercise',this.alldata[0].exercise);
					   	formData.append('aparatus',this.alldata[0].aparatus);
					   	formData.append('procedure',this.alldata[0].procedure);
					   	formData.append('experiment_url',this.alldata[1].experiment_url);
					   	formData.append('config',this.alldata[2].config);

				   		$('#system-loader').css('display','flex');

			            $vm.axios.post('api/experiments/create',formData, {headers: $vm.axiosHeader}).then(function(response, status, request) { 		
				   			$('#system-loader').css('display','none');
				   			if(response.status == 200){

				   				Swal.fire({
								  title: $vm.createdMessage,
								  text:'tell us where to go',
								  icon:'success',
								  showDenyButton: true,
								  showCancelButton: true,
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
			            	if(e.response.status === 401 ){
			            		Swal.fire({
			            			title:$vm.errorSessionMessage,
			            			icon: 'warning'
			            		}).then((result)=>{
			            			if (result) {
                                		location.href = "/logout";
			            			}
			            		})
                            }else{
						   		let errMsg = $vm.errorSessionMessage;					   		
						   		Swal.fire({
						   			title: 'something went wrong',
						   			text: 'try again',
						   			icon: 'error'
						   		})
						   	    /*if (e.response.status == 409){					   	    	
						   	    	errMsg = e.response.data.error;
						   	    }*/
                                                                         
                             }        
			            
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
			          console.log(err)//show network error notification
			        }
			},
	/*		dragEnter(e){			
				this.dragrelease = true;
				let $nv = this;	
				let holder = document.getElementById('dgbox');
				holder.classList.add('dragenter');
			    let file = e.dataTransfer.files[0];

				   let reader = new FileReader();
				$('.progress').css('display','block');

				   reader.onloadstart = function(event) {
					    $('.progressi').css('display','block');
					};
					reader.onprogress = function(event) {						
					   if (event.lengthComputable) {
         					$nv.percentage  = (event.loaded/event.total)* 100;					    
         					$('.progress-bar').css('width', $nv.percentage+'%');         					
					    }
					};
					reader.onloadend = function(event) {
				 		$('#imageprev').html('<img id="image_droped" width="200px"  src="'+event.target.result+'">');		
				 		$nv.imagetoupload = event.target.result;					    
					};				
				    reader.readAsDataURL(file);				
				 	e.preventDefault();

			},*/
			getDragedInFile: function(e){					
				if (this.dragrelease==false) {
				    let $nv = this;						
				    let file, filename;
					file = e.target.files[0];					
					filename = file.name;
					   let reader = new FileReader();
					$('.progress').css('display','block');

					   reader.onloadstart = function(event) {
						    $('.progressi').css('display','block');
						};
						reader.onprogress = function(event) {						
						   if (event.lengthComputable) {
	         					$nv.percentage  = (event.loaded/event.total)* 100;					    
	         					$('.progress-bar').css('width', $nv.percentage+'%');         					
						    }
						};
						reader.onloadend = function(event) {
					 		$('#imageName').html(filename);							 		
					 		$nv.imagetoupload = event.target.result;					    
						};
					    /*reader.onload = function (event) {
					    }*/
					    reader.readAsDataURL(file);				
					 	e.preventDefault();

				}
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
         			return null;
         		}
         	}
         },
         mounted: function () {
         	let $vm = this;
			 this.quill_init();

		  this.$nextTick(function () {
		    // Code that will run only after the
		    // entire view has been rendered
         		$(document).on('click', '.rmexp', function() {					
					$vm.selectedExperiment = [];
					$vm.selectedExperimentName = [];
         			$('#'+ $(this).attr('rel')).parent().remove();    			
				});
				$(document).on('click', '.rmexp1', function() {					
					$vm.selectedInstructor.splice($(this).attr('rel'),1);
					$vm.selectedInstructorName.splice($(this).attr('rel'),1);
         			$vm.reiterateSelectedInstructor();         			
				});
				
			
			
		  });


		},
         events :{
         	'toggleClick':'toggleClick'
         }

	}
</script>
<style scoped>
	.close{
		background: #ccc !important;
		border-radius: 50% !important;
		padding: 2px !important;
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
		opacity: 0;
		position: absolute;
	}
	.dragbox{
		position: relative;
		border: 2px dashed #c0c0cf;
		border-radius: 5px;		
		width: 100%;
		padding: 10px 0px;
		background: #f0f0ff;
		display:flex;
		flex-direction: column;
		justify-content: center;
		flex-wrap: wrap;
		align-items: center;
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