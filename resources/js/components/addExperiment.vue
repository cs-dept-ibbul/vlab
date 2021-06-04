<template>
	<div class="m-0 p-0" style="height: 87.8vh;">
		
	<div class="row m-0 px-2 addExperimentForm" v-bind:class="{'bg-light':!update,'form-body':update,}">
            <div class="col-lg-4 col-md-5 col-sm-12 m-0 vh-76 p-4 mt-2 ">            	
            	<div  class="w-100 bg-white r2 px-4 py-4 shadow-sm vh-33"><!-- loop weekly -->
	            	<p class="fs1 fw8  font mb-1  ml-1">
	            		<span style="color: #777;" v-if="!update">Add Experiment</span>
	            		<span style="color: #777;" v-if="update">Update Experiment</span>
	            	</p>
						<div class="d-flex flex-wrap-center mb-4" >
							<span class="ncircle" v-bind:class="{tactive:stageone,tsuccess:stageonep}" >1</span>
							<span class="tline" v-bind:class="{tlactive:stageone,tlsuccess:stageonep}"></span>
							<div class="fs1 w10 no-break ml-3">Experiment Details </div>						
						</div>
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle" v-bind:class="{tactive:stagetwo,tsuccess:stagetwop}">2</span>
							<span class="tline" v-bind:class="{tlactive:stagetwo,tlsuccess:stagetwop}"></span>
							<div class="fs1 w10 no-break ml-3">Select Experiment</div>							
						</div><!-- 
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle"  v-bind:class="{tactive:stagethree,tsuccess:stagethreep}">3</span>
							<span class="tline" v-bind:class="{tlactive:stagethree,tlsuccess:stagethreep}"></span>
							<div class="fs1 w10 no-break ml-3">Config.</div>
						</div> -->
						<div class="d-flex flex-wrap-center mb-4 ">	
							<span class="ncircle"  v-bind:class="{tactive:stagethree,tsuccess:stagethreep}">4</span>							
							<div class="fs1 w10 no-break ml-3">Submit</div>
						</div>				             
				</div>		
				<div v-if="update" class="w-100 py-2 shadow-sm bg-white my-1 scroll-y" style="height: 150px;">
					<center>
						<video class="mx-auto" :data-id="youtubeID(alldata1.video_url)"></video>
					</center>					
				</div>
				<div v-if="update" class="w-100 py-2 shadow-sm bg-white">
					<center>						
						<img :src="alldata1.experiment_diagram" width="50%;" class="rounded mx-auto">
					</center>
				</div>		
            </div>
            	
            <div class="col-lg-8 col-md-7 col-sm-12 m-0 mt-2 p-4 vh-76" >
            	<!-- course detatil -->            	
            	<div  class="py-4 px-4  r2 bg-white shadow-sm vh-68 scroll-y add-experiment-form">
            		<div id="edetail" v-show="sectionState==1" class="m-0 p-0">            			
	            		<p class="fw8 fs1 font" style="color: #777;">Details</p>
	            		<div class="row">            			
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Experiment Title *</p>
		            				<input type="text" @keyup="normalize" class="form-control w-100 vI" id="etitle">
	            				</div>
	            			</div>
	            			<!-- <div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1" >	            					
		            				<p class="fs001 my-1">Experiment Number * <span class="fs01 fw5" style="color: #888;">I, II, III ...</span></p>		            				
		            				<input type="text" @keyup="normalize" class="form-control w-100 vI" id="enumber">
	            				</div>
	            			</div> -->
	            			<div class="col-lg-6 col-md-6 m-0">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Experiment Diagram</p>		            				
		            				<div class="w-100  p-0 file-cover" style="position: relative;">
		            					<span class="d-flex w-100 cursor-1">		            						
			            					<span class="form-control w-100 fw2 font w-60 r-right-none p-text-secondary no-border-right" id="imageName" >.jpg, .png</span>
			            					<span class="form-control w-100  fw2 font w-40 r-left-none p-text-success">Upload File</span>
		            					</span>
		            					<input @change="onFileChange($event)"  type="file" style="position: absolute;top: 0; left: 0;" name="files" class="draginto form-control w-100" id="fileI">
		            				</div>
	            				</div>
	            			</div>	      
	            			<div class="col-lg-12 col-md-12 m-0 mt-3">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Introduction</p>		            				
		            				<input type="text" @keyup="normalize" placeholder="" class="form-control w-100 " id="experiment_intro">
	            				</div>
	            			</div>
	            			<div class="col-lg-12 col-md-12 m-0 mt-3">
	            				<div class="px-1">	            					
		            				<p class="fs001 my-1">Experiment Video <span class="fs01 fw5" style="color: #888;">video url/link</span></p>		            				
		            				<input type="text" @keyup="normalize" placeholder="https://" class="form-control w-100 " id="elink">
	            				</div>
	            			</div>	      	      
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Aim*</p>            				
	            				<textarea @keyup="normalize" class="form-control w-100 vI" rows="4" id="aim"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Required*</p>            				
	            				<div @keyup="normalize" class="form-control w-100 required-container p-0"  id="required-cover" style="height: 250px;">
	            				<textarea id="editor-1" style="height: 250px;"></textarea>
	            				<!-- <div class="adjoined-bottom m-0 p-0">
									<div class="grid-container m-0 p-0">
										<div class="grid-width-100 m-0 p-0">
											<div >
												
											</div>
										</div>
									</div>
								</div> -->
	            				</div>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">apparatus</p>            				
	            				<textarea @keyup="normalize" class="form-control w-100 " rows="4" id="apparatus"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">procedure</p>            				
	            				<textarea @keyup="normalize" class="form-control w-100 " rows="4" id="procedure"></textarea>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Exercise</p>            				
	            				<div @keyup="normalize" class="form-control w-100 editor-container p-0"  id="exercise" style="height: 250px;">
	            				<div class="adjoined-bottom m-0 p-0">
									<div class="grid-container m-0 p-0">
										<div class="grid-width-100 m-0 p-0">
											<div id="editor" style="height: 250px;">
												
											</div>
										</div>
									</div>
								</div>
	            				</div>
	            			</div>
	            			<div class="col-lg-12 col-md-12 mt-3">
	            				<p class="fs001 my-1">Resourses</p>            				
	            				<textarea @keyup="normalize" class="form-control w-100" rows="6" id="resources"></textarea>
	            			</div>
	            		</div>
	            	</div>
	            	<div id="addExperiment" v-show="sectionState==2" class="m-0 p-0 shineA">     
	            			<p class="fw8 fs1 font" style="color: #777;">Add Experiment</p>
	            			<div class="row">            			
		            			<div class="col-lg-12 col-md-12 m-0">
		            				<p class="fs001 my-1">Select Experiment</p>
		            				<div class="d-flex">
		            					<select @keyup="normalize" v-model="selectedExperiment" class="form-control w-100 vI" id="selectExperiment">
		            						<option ></option>
		            						<option v-for="experiment in experiments" :value="experiment.value">{{experiment.name}}</option>
		            					</select>
		            					<!-- <button class=" ml-2 sysbtn p-success text-white" @click="addEBox">Add</button> -->
		            			<!-- 	</div>
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
		            				</table> --><!-- 
		            				<div id="addEBox" class="" style="height: 200px;">
		            					
		            			-->
		            				</div> 
		            			</div>
	            			</div>       			
	            	</div>
	     
	            	<div id="addInstructors" v-show="sectionState==3" class="m-0 p-0 shineA">  
	            		<h3 class="text-center fw8 font mt-5 p-text-success">All Process Completed</h3>
	            		<h5 class="text-center fw5 font p-text-success">use the previous button to review or click on submit !</h5>
	            	</div>
            	</div>
            
            </div> 
   	</div>
    <div class="row bg-white m-0">
        <div class="col-lg-8 col-md-7 col-sm-12">
        </div>
        <div class="col-lg-4 col-md-3 col-sm-12 mx-auto py-2 d-flex">            	
        	<button v-if="sectionState >1" class="btn p-success text-white py-2 px-3 mr-3" @click="prevSection" ><span class="fa fa-arrow-left"></span> Previous </button>
        	<button v-if="sectionState != 3" class="btn p-success text-white py-2 px-3" @click="nextSection" > Continue <span class="fa fa-arrow-right"></span></button>
        	<button v-if="sectionState == 3" class="btn p-success text-white py-2 px-3" @click="submitProcess" >
	    		<span v-if="!update">Submit</span>
	    		<span v-if="update">Update</span> 
	    		<span class="fa fa-arrow-right"></span>
        	</button>
	        <button onclick="Swal.close()"  class="button bg-danger text-white px-3 py-2 ml-3">Cancel</button>            		


        </div>
        <div class="col-md-1 col-sm-12 mx-auto">
        </div>
 		<template id='swal-template-already-exist'>
		  <!-- <swal-title>Already Exist</swal-title> -->
		</template>
		<button class='d-none' id="swal-id" swal_templater_event='#swal-template-already-exist'></button>

        <!--  -->
    </div>
	</div>
</template>

<script>
	export default{

	 data:function() {
	    	return{
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
	    	 alldata:[],
	    	 courseTrend: 4,
	    	 sectionState: 1,
	    	 title:'',
	    	 ccode:'',
	    	 experiment_id_to_update:'',
	    	 imagetoupload:'',
	    	 validateState:false,
	    	 selectedExperiment:'',
	    	 selectedExperimentName:'',
	    	 selectedInstructor:[],
	    	 selectedInstructorName:[],
	    	 required:'',
	    	 exercise:'',
	    	 percentage:0,
	    	 ediagram:"",
	    	 experiments:[
	    	 	{name:'vernier caliper',value:'vernier-caliper'},
	    	 	{name:'Micrometer Screw Guage',value:'micrometer'},
	    	 	{name:'Simple Pendulum',value:'simple-pendulum'},
	    	 	{name:'Resistor Color Code',value:'resistor-color-code'},
	    	 ],
	    	 dragrelease:false,
	    	 quill:null,
	    	 configMode:''
	    	}
        },
        methods:{
        	toggleExperimentGuider: function () {
//        		alert(this.navState);
        		this.navState = !this.navState;
			   this.$eventBus.$emit('toggleClick',{text:this.navState});
			    //this.newTodoText = ''
			},
			onFileChange(event) {
				console.log(event)
            	this.ediagram = event.target.files[0];
            	$('#imageName').text(this.ediagram.name)
            	let ext = ['image/jpeg','image/png','png','jpg','jpeg'];            	
            	if (!ext.includes(this.ediagram.type)) {
            		$('.requiredv').remove();
            		this.ediagram =  '';
            		$('.file-cover').after('<span class="text-danger requiredv" id="ar001">invalid file type</span>');
            		return false;
            	}
        	},
			initCKEDITOR: function(id){
				if ( CKEDITOR.env.ie && CKEDITOR.env.version < 9 )
						CKEDITOR.tools.enableHtml5Elements( document );
					CKEDITOR.config.height = 150;
					CKEDITOR.config.width = 'auto';

					var initSample = ( function() {
						var wysiwygareaAvailable = isWysiwygareaAvailable(),
							isBBCodeBuiltIn = !!CKEDITOR.plugins.get( 'bbcode' );

						return function() {
							var editorElement = CKEDITOR.document.getById( id );				
							if ( isBBCodeBuiltIn ) {
								editorElement.setHtml(
									/*'Hello world!\n\n' +
									'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].'*/
								);
							}

							// Depending on the wysiwygarea plugin availability initialize classic or inline editor.
							if ( wysiwygareaAvailable ) {
								CKEDITOR.replace( id );							
							} else {
								editorElement.setAttribute( 'contenteditable', 'true' );
								CKEDITOR.inline(id);								
							}
						};

						function isWysiwygareaAvailable() {
							// If in development mode, then the wysiwygarea must be available.
							// Split REV into two strings so builder does not replace it :D.
							if ( CKEDITOR.revision == ( '%RE' + 'V%' ) ) {
								return true;
							}

							return !!CKEDITOR.plugins.get( 'wysiwygarea' );
						}
					} )();
					initSample();
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
					this.checkstage(1);
				}
				if (this.sectionState === 2 ) {					
					this.checkstage(2);					
				}
				if (this.sectionState === 3) {					
					this.checkstage(3);					
				}



			},
			/*addEBox:function(){			
				let evalue = $('#selectExperiment').val();
				this.validateState =false;
				let oldvalue = this.selectedExperiment;
				this.selectedExperiment  = evalue;

				if(evalue != ''){				
					this.validateState = true;
					let selExpName = $('#selectExperiment option:selected').text();
					if(this.selectedExperiment != oldvalue){												
						alert('only experiment can be added')
						this.selectedExperiment = oldvalue;
						Swal.bindClickHandler()	
						Swal.mixin({
						  toast: true,
						}).bindClickHandler('swal_templater_event');		
						document.getElementById('swal-id').click();
						return 0;
					}else{
					   $('#ar000').remove();
					   $('#addEBox').after('<span class="text-danger requiredv" id="ar000">already exist!</span>');
					   return 0;				
					}
																	
				   this.selectedExperimentName = selExpName;
				   let $vm = this;
				   ///alert(this.selectedExperiment.includes(evalue));	
				   this.reiterateSelectedExp();				   				
					
					
				}else{
					$('.requiredv').remove();
					obj.after('<span class="text-danger requiredv">Required !</span>');	
					obj.css('border','1px solid #e45');
				}			
			},*/
			reiterateSelectedExp(){
				$('#addEBox').html("");			
				$('#addEBox').append(`
							<tr>
								<td class='d-flex justify-content-between flex-wrap-center ' style='font-size:0.9em;cursor:pointer;' id='${this.selectedExperiment}'>
									<p>
										<b >Experiment 1</b>:<span class="ml-5"></span> ${this.selectedExperimentName}
									</p>
									<span class=' mt-2 close d-flex justify-content-around flex-wrap-center rmexp' style='background:#ccc; border-radius:50%;width:25px;height:25px;' rel='${this.selectedExperiment}'>&times</span>
								</td>
							</tr>`);
					
			},			
			singleValidate: function(id){
				$('#'+id).css('border','1px solid #e45');
				$('.requiredv').remove();
				$('#'+id).after('<span class="text-danger requiredv">Required !</span>')
			},
			validateR:function(data, id){
				if (data == '') {
					let thisDiv = $('#'+id);
					thisDiv.css('border','1px solid #e45');
					$('.requiredv').remove();
					thisDiv.after('<span class="text-danger requiredv">Required !</span>');					
					this.validateState = false;
					let scrollAmount = thisDiv.offset().top - $('#edetail').offset().top ;					
					$('.add-experiment-form').animate({scrollTop: scrollAmount},1000);
					return false;
				}

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
							let scrollAmount = $(this).offset().top - $('#'+id).offset().top ;					
							$('.add-experiment-form').animate({scrollTop: scrollAmount},1000);

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
					this.required = CKEDITOR.instances['editor-1'].getData();		
					this.exercise = CKEDITOR.instances['editor'].getData();		
					this.validateR(this.required,'required-cover')
					if(this.validateState === true){
													
						this.alldata[0] = {
							title: $('#etitle').val(),
							experiment_intro:$('#experiment_intro').val(),
							video_url:$('#elink').val(),
							experiment_diagram:$('#fileI').prop('files')[0],
							aim:$('#aim').val(),						
							apparatus:$('#apparatus').val(),							
							resources:$('#resources').val(),
							required:$('#required').val(),
							procedure:$('#procedure').val(),
						};	

						this.sectionState = 2;						
						this.stageone= false;
				    	this.stageonep = true;
				    	this.stagetwo = true;
					}
				}else if (this.sectionState === 2){					
					if (this.selectedExperiment == ''){
					 this.singleValidate('selectExperiment');
					}else{
						this.stagetwo= false;
				    	this.stagetwop = true;
				    	this.stagethree = true;
				    	this.sectionState = 3;				    	
				    	this.alldata[1]= {				    		
				    		'experiment_url': this.selectedExperiment
				    	};			    			
					}								
				}				

			},
			submitProcess: function(){
				let $vm = this;		

			   try{

			   		const formData = new FormData();					  
				   	formData.append('experiment_id',this.experiment_id_to_update);
				   	formData.append('name',this.alldata[0].title.replace(/<script>/g,''));
				   	formData.append('experiment_intro',this.alldata[0].experiment_intro.replace(/<script>/g,''));
				   	formData.append('video_url',this.alldata[0].video_url.replace(/<script>/g,''));
				   	formData.append('required',this.required.replace(/<script>/g,''));
				   	formData.append('experiment_goal',this.alldata[0].aim.replace(/<script>/g,''));
				   	formData.append('experiment_diagram',this.ediagram);
				   	formData.append('experiment_resource', this.alldata[0].resources.replace(/<script>/g,''));
				   	formData.append('exercise',this.exercise.replace(/<script>/g,''));					   	
				   	formData.append('apparatus',this.alldata[0].apparatus.replace(/<script>/g,''));
				   	formData.append('procedures',this.alldata[0].procedure.replace(/<script>/g,''));				   	
				   	formData.append('page',this.alldata[1].experiment_url);				   	
				   	//formData.append('config',this.alldata[2].config);

			   		$('#system-loader').css('display','flex');
			   		let route = 'create';
			   		let successMsg = this.reatedMessage;
			   		if (this.update) {
						route = 'update'			   		
						successMsg = 'Updated Successfully';
			   		}
		            $vm.axios.post('api/experiments/'+route,formData, {headers: $vm.axiosHeaderWithFiles}).then(function(response, status, request) { 		
			   			$('#system-loader').css('display','none');
			   			if(response.status == 200){

			   				Swal.fire({
							  title: successMsg,
							  text:'tell us where to go',
							  icon:'success',
							  showDenyButton: true,
							  showCancelButton: true,
							  confirmButtonText: `View Created Experiments`,
							  denyButtonText: `Ok, refresh the page`,
							}).then((result) => {							  
							  if (result.isConfirmed) {
							    location.href = "/view-created-experiment";
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
					    }        
		            
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
						});//show network error notification
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
         	alldata1:{
         		type:Object, 
         		default: function(){
         			return {};
         		},         		
         	},
         	experiment_id:{
	     		type:Number,
	     		default: function(){
	     			return 0;
	     		}	     	
	     	}
         },
          created(){
			if (this.update) {				
				let $this = this;
				$(document).ready(function(){					
					$this.required = $this.alldata1.required;
					$this.exercise =$this.alldata1.exercise
					$this.experiment_id_to_update = $this.alldata1.id;
					setTimeout(function() {
						$('#etitle').val($this.alldata1.name);
						$('#experiment_intro').val($this.alldata1.experiment_intro);
						$('#elink').val($this.alldata1.video_url);
						$('#aim').val($this.alldata1.experiment_goal);
		 				CKEDITOR.instances['editor-1'].setData($this.required);		
						CKEDITOR.instances['editor'].setData($this.exercise);
						$this.selectedExperiment = $this.alldata1.page;					
						$this.selectedExperimentName = $this.alldata1.name;						
						$this.reiterateSelectedExp();

						$this.web_player();

					},3000);			
					$('#apparatus').val($this.alldata1.apparatus);					
					$('#resources').val($this.alldata1.resources);
					$('#procedure').val($this.alldata1.procedures);
				});		
			}
		},
         mounted: function () {
         	let $vm = this;
			 //this.quill_init();
			 this.$nextTick(function () {					 		
	 			this.initCKEDITOR('editor');
	 			this.initCKEDITOR('editor-1');			 		 			 

		        $(document).on('click', '.rmexp', function() {					
					$vm.selectedExperiment = '';
					$vm.selectedExperimentName = '';
         			$('#'+ $(this).attr('rel')).parent().remove();    			
				});
				$(document).on('click', '.rmexp1', function() {					
					$vm.selectedInstructor.splice($(this).attr('rel'),1);
					$vm.selectedInstructorName.splice($(this).attr('rel'),1);
         			$vm.reiterateSelectedInstructor();         			
				});
								
				let interval;
				interval  = setInterval(function() {										
					if($('.cke_dialog_contents').length){					   		   
					   	$('table').find("[name='CCEquationEditor']").find('#CCequation1').prev().remove();
					   clearInterval(interval);
					}
				}, 500);

			 });




		},
         events :{
         	'toggleClick':'toggleClick'
         }

	}
</script>
<style scoped>
	.cpy{
		position: absolute;
		top: 0;
		right: 0;
		display: block;
		background: #2a6;
		color:white;
		cursor: pointer;
		font-size: 0.8em;
		padding: 2px;

	}
	.cpy:focus{
		color: yellow;	
	}
	.close{
		background: #ccc !important;
		border-radius: 50% !important;
		padding: 2px !important;
	}
	.form-control w-100:focus{
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
.table-bordered:not(:first-child) td{
	font-size: 0.9em;
	padding: 2px;
}
.hint-table tr td{
padding: 1px;
font-size: 0.9em;
color: #999;
}
</style>